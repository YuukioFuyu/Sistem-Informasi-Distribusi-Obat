<?php namespace App\Modules\Service\Models;
use App\Libraries\Permission;
class ServiceModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
          $this->permission = new Permission();
         $this->request = \Config\Services::request();
    }

    

         public function save_service($data=[]) {
          $setting_data = $this->setting_data();                       
          date_default_timezone_set($setting_data->timezone);
           $builder     = $this->db->table('product_service');
           $add_service = $builder->insert($data);
           $s_id        = $this->db->insertID();
           $CreateBy    = $this->session->get('id');
           $createdate  = date('Y-m-d H:i:s');
         
            $coa = $this->headcode();
       
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="101080001";
            }
            
        // coa head create   
     $acc_service = [
             'HeadCode'         => $headcode,
             'HeadName'         => $this->request->getVar('service_name',FILTER_SANITIZE_STRING).'-'.$s_id,
             'PHeadName'        => 'Service Receive',
             'HeadLevel'        => '3',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'A',
             'IsBudget'         => '1',
             'service_id'       => $s_id,
             'IsDepreciation'   => 1,
             'DepreciationRate' => 1,
             'CreateBy'         => $CreateBy,
             'CreateDate'       => $createdate,
        ];
            
            if($add_service){ 
            $coa     = $this->db->table('acc_coa');
            $add_coa = $coa->insert($acc_service);
            return TRUE;
            }else{
              return false;
            }
        
    }


        public function singledata($id){
        $builder = $this->db->table('product_service')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
    return $builder;


    }

    public function sudata($id)
    {
       $builder = $this->db->table('product_service')
                             ->where('id', $id)
                             ->get()
                             ->getResultArray(); 
    return $builder;
    }



    public function findall(){
      return $services = $this->db->table('product_service ')
                            ->select("*")
                            ->get()
                            ->getResultArray();

    }

     public function bank_list()
  {
        $builder = $this->db->table('bank_information');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Bank');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->bank_id]=$value->bank_name;
            }
        }
        return $list;
  }


     public function getinvoiceList($postData=null){
         $response = array();
          $fromdate = $this->request->getVar('fromdate');
          $todate   = $this->request->getVar('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (b.customer_name like '%".$searchValue."%' or a.voucher_no like '%".$searchValue."%' or a.date like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('service_invoice a');
           $builder1->select("count(*) as allcount");
           $builder1->join('customer_information b', 'b.customer_id = a.customer_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                if(!empty($fromdate) && !empty($todate)){
             $builder1->where($datbetween);
             }
                
                $query1       =  $builder1->get();
                $records      =  $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('service_invoice a');
           $builder2->select("count(*) as allcount");
           $builder2->join('customer_information b', 'b.customer_id = a.customer_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
               if(!empty($fromdate) && !empty($todate)){
             $builder2->where($datbetween);
             }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('service_invoice a');
          $builder3->select("a.*,b.customer_name");
          $builder3->join('customer_information b', 'b.customer_id = a.customer_id','left');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
           if(!empty($fromdate) && !empty($todate)){
             $builder3->where($datbetween);
             }   
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";
          $type = $record->payment_type;
          if($type == 1){
            $pay_type = 'Cash Payment';
          }else{
            $pay_type = 'Bank Payment';
          }
      
        $button .=' <a href="'.$base_url.'/service/service_invoice_details/'.$record->voucher_no.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>';
        if($this->permission->method('service_invoice_list','update')->access()){
        $button .=' <a href="'.$base_url.'/service/edit_service_invoice/'.$record->voucher_no.'" class="btn btn-primary-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
        }
        if($this->permission->method('service_invoice_list','delete')->access()){
        $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/service/delete_service_invoice/'.$record->voucher_no.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
      }
            $data[] = array( 
                'sl'               =>$sl,
                'invoice_no'       =>$record->voucher_no,
                'pay_type'         =>$pay_type,
                'customer_name'    =>$record->customer_name,
                'date'             =>$record->date,
                'total_amount'     =>$record->total_amount,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData"               => $data
         );

         return $response; 
    }


    public function update_service($data=[])
    {
     $query = $this->db->table('product_service');   
     $query->where('id', $data['id']);
     $service_up =  $query->update($data); 

     $coa_data = array(
      'HeadName' => $data['service_name']

     ); 
     if($service_up){
     $coa = $this->db->table('acc_coa');   
     $coa->where('service_id', $data['id']);
      $coa->update($coa_data);
      return true;
     }else{
      return false;
     }
    }


  
    public function tax_fields(){
    return $result = $this->db->table('tax_settings')
                              ->select('tax_name,default_value')
                              ->get()
                              ->getResultArray();
  }


      public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='3' And HeadCode LIKE '10108000%' ORDER BY CreateDate DESC");
        return $query->getRow();

    }


    public function delete_service($id){
            $builder = $this->db->table('product_service');
            $builder->where('id', $id);
     $cus_info =  $builder->delete();
    if($cus_info){
     $coa = $this->db->table('acc_coa');
            $coa->where('service_id', $id);
     return $coa->delete();
    }else{
    return false;
     }
    }


    public function employee_list()
    {
        $builder = $this->db->table('employee_information ');
        $builder->select('*');
        $query=$builder->get();
        $data=$query->getResult();
       $list = []; 
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->id]=$value->first_name.' '.$value->last_name;
            }
        }
        return $list;  
    }


     public function searchservice_byname($servicename= null)
    { 
       $servicedata = $this->db->table('product_service')
                        ->select('*')
                        ->like('service_name',$servicename,'both')
                        ->orderBy('service_name','asc')
                        ->limit(30)
                        ->get()
                        ->getResultArray();
        return $servicedata;
    }


    public function get_service_details($id = null)
    {
       $servicedata = $this->db->table('product_service')
                        ->select('*')
                        ->where('id',$id)
                        ->get()
                        ->getResultArray();



    $tablecolumn = $this->db->getFieldData('tax_collection');
    $num_column  = count($tablecolumn)-4;

  if($num_column > 0){
   $taxfield='';
   $taxvar = [];
   for($i=0;$i<$num_column;$i++){
    $taxfield = 'tax'.$i;
    $data[$taxfield] = $servicedata[0][$taxfield];
    $taxvar[$i]      = $servicedata[0][$taxfield];
    $data['taxdta']  = $taxvar;
   }
}

              $data['charge']  = $servicedata[0]['charge'];
              $data['txnmber'] = $num_column;
        return $data;

    }


    public function save_service_invoice()
    {
      $setting_data = $this->setting_data();                       
      date_default_timezone_set($setting_data->timezone);
          $tablecolumn      = $this->db->getFieldData('tax_collection');
          $num_column       = count($tablecolumn)-4;
          $employee         = $this->request->getVar('employee_id');
          $employee_id      = implode(',' , $employee);
          $invoice_id       = date('Ymdhis');
          $createby         = $this->session->get('id');
          $createdate       = date('Y-m-d H:i:s');
          $paid_amount      = ($this->request->getVar('paid_amount')?$this->request->getVar('paid_amount'):0);
          $customer_id      = $this->request->getVar('customer_id');
          $tax_amount       = ($this->request->getVar('total_tax_amount')?$this->request->getVar('total_tax_amount'):0);
          $payment_type     = $this->request->getVar('payment_type');
          $datainv = array(
            'employee_id'     => $employee_id,
            'customer_id'     => $customer_id,
            'date'            => (!empty($this->request->getVar('invoice_date'))?$this->request->getVar('invoice_date'):date('Y-m-d')),
            'total_amount'    => ($this->request->getVar('grand_total_price')?$this->request->getVar('grand_total_price'):0),
            'total_tax'       => ($this->request->getVar('total_tax_amount')?$this->request->getVar('total_tax_amount'):0),
            'voucher_no'      => $invoice_id,
            'details'         => (!empty($this->request->getVar('inva_details'))?$this->request->getVar('inva_details'):'Service Invoice'),
            'invoice_discount'=> ($this->request->getVar('invoice_discount')?$this->request->getVar('invoice_discount'):null),
            'total_discount'  => ($this->request->getVar('total_discount')?$this->request->getVar('total_discount'):null),
            'shipping_cost'   => ($this->request->getVar('shipping_cost')?$this->request->getVar('shipping_cost'):0),
            'paid_amount'     => ($this->request->getVar('paid_amount')?$this->request->getVar('paid_amount'):0),
            'due_amount'      => ($this->request->getVar('due_amount')?$this->request->getVar('due_amount'):0),
            'previous'        => ($this->request->getVar('previous')?$this->request->getVar('previous'):0),
            'payment_type'    => $this->request->getVar('payment_type'),
            'bank_id'         => $this->request->getVar('bank_id'),
            
        );



    $coainfo = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('customer_id',$customer_id)
                     ->get()
                     ->getRow();
    $customer_headcode = $coainfo->HeadCode;

  
        $bank_id     = $this->request->getVar('bank_id');
        if(!empty($bank_id)){
      $bank_coa_i = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('bank_id', $bank_id)
                            ->get()
                            ->getRow();
    
       $bankcoaid = $bank_coa_i->HeadCode;
       }else{
           $bankcoaid = '';
       }  

         // Cash in Hand debit
      $cc = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'SERVICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  1020101,
      'Narration'      =>  $this->request->getVar('inva_details'),
      'Debit'          =>  $this->request->getVar('paid_amount'),
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 


      $bd = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'SERVICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  $this->request->getVar('inva_details'),
      'Debit'          =>  $this->request->getVar('paid_amount'),
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
      );
     
//service income
$service_income = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'SERVICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  305,
      'Narration'      =>  $this->request->getVar('inva_details'),
      'Debit'          =>  0,
      'Credit'         =>  $this->request->getVar('grand_total_price')-(!empty($this->request->getVar('total_tax_amount'))?$this->request->getVar('total_tax_amount'):0),
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );


 $tax_info = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'SERVICE',
      'VDate'          => $createdate,
      'COAID'          => 50206,
      'Narration'      => 'Service Tax',
      'Debit'          => $this->request->getVar('total_tax_amount'),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

     
    //Customer debit for service Value
    $cosdr = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'SERVICE',
      'VDate'          => $createdate,
      'COAID'          => $customer_headcode,
      'Narration'      => $this->request->getVar('inva_details'),
      'Debit'          => $this->request->getVar('grand_total_price'),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

       ///Customer credit for Paid Amount
       $coscr = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'SERVICE',
      'VDate'          => $createdate,
      'COAID'          => $customer_headcode,
      'Narration'      => $this->request->getVar('inva_details'),
      'Debit'          => 0,
      'Credit'         => $this->request->getVar('paid_amount'),
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

      $invoicetbl   = $this->db->table('service_invoice');
      $invoice_main =  $invoicetbl->insert($datainv);
      
      $acc_coatbl = $this->db->table('acc_transaction');
      $acc_coatbl->insert($cosdr);
      $acc_coatbl->insert($service_income);
      if($tax_amount > 0){
      $acc_coatbl->insert($tax_info); 
      }

       if($paid_amount > 0){
         $acc_coatbl->insert($coscr);
        if($payment_type == 1){
          $acc_coatbl->insert($cc);
        }
        if($payment_type == 2){
          $acc_coatbl->insert($bd);
        }
       }

      

        $quantity            = $this->request->getVar('product_quantity');
        $rate                = ($this->request->getVar('product_rate')?$this->request->getVar('product_rate'):0);
        $serv_id             = $this->request->getVar('service_id');
        $total_amount        = ($this->request->getVar('total_price')?$this->request->getVar('total_price'):0);
        $discount_rate       = ($this->request->getVar('discount_amount')?$this->request->getVar('discount_amount'):0);
        $discount_per        = ($this->request->getVar('discount')?$this->request->getVar('discount'):0);
        $tax_amount          = ($this->request->getVar('tax')?$this->request->getVar('tax'):0);
        $invoice_description = ($this->request->getVar('desc')?$this->request->getVar('desc'):0);

        for ($i = 0, $n   = count($serv_id); $i < $n; $i++) {
            $service_qty  = $quantity[$i];
            $product_rate = $rate[$i];
            $service_id   = $serv_id[$i];
            $total_price  = $total_amount[$i];
            $disper       = $discount_per[$i];
            $disamnt      = $discount_rate[$i];
           
             $service_info = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('service_id',$service_id)
                     ->get()
                     ->getRow();

            $service_details = array(
                'service_inv_id'     => $invoice_id,
                'service_id'         => $service_id,
                'qty'                => $service_qty,
                'charge'             => $product_rate,
                'discount'           => $disper,
                'discount_amount'    => $disamnt,
                'total'              => $total_price,
            );
        $service_signle = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'service',
          'VDate'          =>  $this->request->getVar('invoice_date'),
          'COAID'          =>  $service_info->HeadCode,
          'Narration'      =>  (!empty($this->request->getVar('inva_details'))?$this->request->getVar('inva_details'):'Service Invoice'),
          'Debit'          =>  $total_price,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $createby,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 
          $invoice_detailstbl = $this->db->table('service_invoice_details');
          $trans_table = $this->db->table('acc_transaction'); 
            if (!empty($service_qty)){
              $invoice_detailstbl->insert($service_details);
              $trans_table->insert($service_signle);
               
            }
           

        }


          for($j=0;$j<$num_column;$j++){
                $taxfield = 'tax'.$j;
                $taxvalue = 'total_tax'.$j;
              $taxdata[$taxfield]=$this->request->getVar($taxvalue);
            }
            $taxdata['customer_id'] = $customer_id;
            $taxdata['date']        = (!empty($this->request->getVar('invoice_date'))?$this->request->getVar('invoice_date'):date('Y-m-d'));
            $taxdata['relation_id'] = $invoice_id;
            if($invoice_main){
            $tax_table = $this->db->table('tax_collection');
            $tax_table->insert($taxdata);
          }

     return true;
    }


    public function service_invoice_main($id)
    {
      $data = $this->db->table('service_invoice a')
                     ->select('a.*,b.customer_name,b.customer_address,b.customer_mobile,b.email_address')
                     ->join('customer_information b','b.customer_id = a.customer_id','left')
                     ->where('a.voucher_no',$id)
                     ->get()
                     ->getRow();
                     return $data;
    }


    public function service_invoice_details($id)
    {
       $data = $this->db->table('service_invoice_details a')
                     ->select('b.*,b.service_name,a.*,a.charge as charge')
                     ->join('product_service b','b.id=a.service_id')
                     ->where('a.service_inv_id',$id)
                     ->get()
                     ->getResultArray();
                     return $data;
    }


    public function service_invoice_tax($id)
    {
      $data = $this->db->table('tax_collection')
                     ->select('*')
                     ->where('relation_id',$id)
                     ->get()
                     ->getResultArray();
                     return $data;
    }




     public function update_service_invoice()
    {
      $setting_data = $this->setting_data();                       
       date_default_timezone_set($setting_data->timezone);
        $tablecolumn      = $this->db->getFieldData('tax_collection');
        $num_column       = count($tablecolumn)-4;
        $employee         = $this->request->getVar('employee_id');
        $employee_id      = implode(',' , $employee);
        $invoice_id       = $this->request->getVar('invoice_id');
        $createby         = $this->session->get('id');
        $createdate       = date('Y-m-d H:i:s');
        $paid_amount      = $this->request->getVar('paid_amount');
        $customer_id      = $this->request->getVar('customer_id');
        $tax_amount       = $this->request->getVar('total_tax_amount');
        $payment_type     = $this->request->getVar('payment_type');
         $datainv = array(
            'employee_id'     => $employee_id,
            'customer_id'     => $customer_id,
            'date'            => (!empty($this->request->getVar('invoice_date'))?$this->request->getVar('invoice_date'):date('Y-m-d')),
            'total_amount'    => ($this->request->getVar('grand_total_price')?$this->request->getVar('grand_total_price'):0),
            'total_tax'       => ($this->request->getVar('total_tax_amount')?$this->request->getVar('total_tax_amount'):0),
            'voucher_no'      => $invoice_id,
            'details'         => (!empty($this->request->getVar('inva_details'))?$this->request->getVar('inva_details'):'Service Invoice'),
            'invoice_discount'=> ($this->request->getVar('invoice_discount')?$this->request->getVar('invoice_discount'):0),
            'total_discount'  => ($this->request->getVar('total_discount')?$this->request->getVar('total_discount'):0),
            'shipping_cost'   => ($this->request->getVar('shipping_cost')?$this->request->getVar('shipping_cost'):0),
            'paid_amount'     => ($this->request->getVar('paid_amount')?$this->request->getVar('paid_amount'):0),
            'due_amount'      => ($this->request->getVar('due_amount')?$this->request->getVar('due_amount'):0),
            'previous'        => ($this->request->getVar('previous')?$this->request->getVar('previous'):0),
            'payment_type'    => $this->request->getVar('payment_type'),
            'bank_id'         => $this->request->getVar('bank_id'),
            
        );



    $coainfo = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('customer_id',$customer_id)
                     ->get()
                     ->getRow();
    $customer_headcode = $coainfo->HeadCode;

  
        $bank_id     = $this->request->getVar('bank_id');
        if(!empty($bank_id)){
      $bank_coa_i = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('bank_id', $bank_id)
                            ->get()
                            ->getRow();
    
       $bankcoaid = $bank_coa_i->HeadCode;
       }else{
           $bankcoaid = '';
       }  

         // Cash in Hand debit
      $cc = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'SERVICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  1020101,
      'Narration'      =>  $this->request->getVar('inva_details'),
      'Debit'          =>  $this->request->getVar('paid_amount'),
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 


      $bd = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'SERVICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  $this->request->getVar('inva_details'),
      'Debit'          =>  $this->request->getVar('paid_amount'),
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
      );
     
//service income
$service_income = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'SERVICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  305,
      'Narration'      =>  $this->request->getVar('inva_details'),
      'Debit'          =>  0,
      'Credit'         =>  $this->request->getVar('grand_total_price')-(!empty($this->request->getVar('total_tax_amount'))?$this->request->getVar('total_tax_amount'):0),
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );


 $tax_info = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'SERVICE',
      'VDate'          => $createdate,
      'COAID'          => 50206,
      'Narration'      => 'Service Tax',
      'Debit'          => $this->request->getVar('total_tax_amount'),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

     
    //Customer debit for service Value
    $cosdr = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'SERVICE',
      'VDate'          => $createdate,
      'COAID'          => $customer_headcode,
      'Narration'      => $this->request->getVar('inva_details'),
      'Debit'          => $this->request->getVar('grand_total_price'),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

       ///Customer credit for Paid Amount
       $coscr = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'SERVICE',
      'VDate'          => $createdate,
      'COAID'          => $customer_headcode,
      'Narration'      => $this->request->getVar('inva_details'),
      'Debit'          => 0,
      'Credit'         => $this->request->getVar('paid_amount'),
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

     $inv_main = $this->db->table('service_invoice');   
     $inv_main->where('voucher_no', $invoice_id);
     $inv_up  =  $inv_main->update($datainv); 

     if($inv_up){
       $trans_table = $this->db->table('acc_transaction');
       $trans_table->where('VNo', $invoice_id);
       $trans_table->delete();

       $inv_details = $this->db->table('service_invoice_details');
       $inv_details->where('service_inv_id', $invoice_id);
       $inv_details->delete();

       $tax_c = $this->db->table('tax_collection');
       $tax_c->where('relation_id', $invoice_id);
       $tax_c->delete();

      $acc_coatbl = $this->db->table('acc_transaction');
      $acc_coatbl->insert($cosdr);
      $acc_coatbl->insert($service_income);
      if($tax_amount > 0){
      $acc_coatbl->insert($tax_info); 
      }

       if($paid_amount > 0){
         $acc_coatbl->insert($coscr);
        if($payment_type == 1){
          $acc_coatbl->insert($cc);
        }
        if($payment_type == 2){
          $acc_coatbl->insert($bd);
        }
       }

       
     }
      
    
        $quantity            = $this->request->getVar('product_quantity');
        $rate                = $this->request->getVar('product_rate');
        $serv_id             = $this->request->getVar('service_id');
        $total_amount        = $this->request->getVar('total_price');
        $discount_rate       = $this->request->getVar('discount_amount');
        $discount_per        = $this->request->getVar('discount');
        $tax_amount          = $this->request->getVar('tax');
        $invoice_description = $this->request->getVar('desc');

        for ($i = 0, $n   = count($serv_id); $i < $n; $i++) {
            $service_qty  = $quantity[$i];
            $product_rate = $rate[$i];
            $service_id   = $serv_id[$i];
            $total_price  = $total_amount[$i];
            $disper       = $discount_per[$i];
            $disamnt      = $discount_rate[$i];
           
             $service_info = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('service_id',$service_id)
                     ->get()
                     ->getRow();

            $service_details = array(
                'service_inv_id'     => $invoice_id,
                'service_id'         => $service_id,
                'qty'                => ($service_qty?$service_qty:0),
                'charge'             => ($product_rate?$product_rate:0),
                'discount'           => ($disper?$disper:0),
                'discount_amount'    => ($disamnt?$disamnt:0),
                'total'              => ($total_price?$total_price:0),
            );
              $service_signle = array(
              'VNo'            =>  $invoice_id,
              'Vtype'          =>  'service',
              'VDate'          =>  $this->request->getVar('invoice_date'),
              'COAID'          =>  $service_info->HeadCode,
              'Narration'      =>  (!empty($this->request->getVar('inva_details'))?$this->request->getVar('inva_details'):'Service Invoice'),
              'Debit'          =>  $total_price,
              'Credit'         =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $createby,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
        ); 
          $invoice_detailstbl = $this->db->table('service_invoice_details');
          $trans_table = $this->db->table('acc_transaction'); 
              if($inv_up){
            if (!empty($service_qty)){
              $invoice_detailstbl->insert($service_details);
              $trans_table->insert($service_signle);
               
            }
           
         }
        }


          for($j=0;$j<$num_column;$j++){
                $taxfield = 'tax'.$j;
                $taxvalue = 'total_tax'.$j;
              $taxdata[$taxfield]=$this->request->getVar($taxvalue);
            }
            $taxdata['customer_id'] = $customer_id;
            $taxdata['date']        = (!empty($this->request->getVar('invoice_date'))?$this->request->getVar('invoice_date'):date('Y-m-d'));
            $taxdata['relation_id'] = $invoice_id;
            if($inv_up){
            $tax_table = $this->db->table('tax_collection');
            $tax_table->insert($taxdata);
          }

     return true;
    }

    public function delete_service_invoice($id)
    {
      $builder = $this->db->table('service_invoice');
      $builder->where('voucher_no', $id);
      $main =  $builder->delete();
  
     $trans = $this->db->table('acc_transaction');
     $trans->where('VNo', $id);
     $trans->delete();

      $tax_c = $this->db->table('tax_collection');
      $tax_c->where('relation_id', $id);
      $tax_c->delete();

      $inv_details = $this->db->table('service_invoice_details');
      $inv_details->where('service_inv_id', $id);
      $inv_details->delete();
   
    if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }
    }


    public function setting_data()
    {
          $setting = $this->db->table('setting')
                             ->get()
                             ->getRow();  
                             return $setting;
    }


     public function servicename_check($service_id)
  {
 

   $query = $this->db->table('product_service')
                              ->select("*")
                              ->where('id',$service_id);

    if ($query->countAllResults() > 0) {
      return true;  
    }
    return 0;
  }

}