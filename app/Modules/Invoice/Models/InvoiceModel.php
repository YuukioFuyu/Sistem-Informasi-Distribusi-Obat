<?php namespace App\Modules\Invoice\Models;
use App\Libraries\Permission;
class InvoiceModel
{
  
   public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url','array']);
         $this->permission = new Permission();
         $this->request = \Config\Services::request();
    }

 

    public function singledata($id){
        $builder = $this->db->table('invoice a')
                            ->select('a.*,b.*')
                            ->join('customer_information b','b.customer_id = a.customer_id')
                            ->where('a.invoice_id', $id)
                            ->get()
                            ->getRow(); 
    return $builder;
    }

     public function detailsdata($id){
        $builder = $this->db->table('invoice_details a')
                             ->select('a.*,b.*,c.unit_name')
                             ->join('product_information b','b.product_id = a.product_id')
                             ->join('unit c','c.id = b.unit')
                             ->where('a.invoice_id', $id)
                             ->where('a.quantity >', 0)
                             ->get()
                             ->getResultArray(); 
    return $builder;


    }

    public function pos_customer_setup() {
        return $query = $this->db->table('customer_information')
                ->select('*')
                ->like('customer_name', 'Walking','after')
                ->get()
                ->getResultArray(); 
    }

    public function save_invoice($data=[]){
        $setting_data = $this->setting_data();                       
     date_default_timezone_set($setting_data->timezone);
       $builder      = $this->db->table('invoice');
       $add_invoice  = $builder->insert($data);
       $receive_by   = $this->session->get('id');
       $createdate   = date('Y-m-d H:i:s');;
       $invoice_id   = $data['invoice_id'];
       $gtotal       = $data['total_amount'];
       $customer_id  = $data['customer_id'];
       $p_amount     = $data['paid_amount'];
       $date         = date('Y-m-d');
       $quantity     = $this->request->getVar('product_quantity');
       $product_id   = $this->request->getVar('product_id');
       if($p_amount > $gtotal){
         $paid_amount= $gtotal;
       }else{
        $paid_amount = $data['paid_amount'];
       }

       $payment_type = $data['payment_type'];
       $cutomerinfo  = $this->db->table('customer_information')
                            ->select("*")
                            ->where('customer_id',$data['customer_id'])
                            ->get()
                            ->getRow();

        $customer_coa = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('customer_id',$data['customer_id'])
                            ->get()
                            ->getRow();
        $customer = $cutomerinfo->customer_name;

        $bank_id     = $data['bank_id'];
        if(!empty($bank_id)){
       $bankinfo = $this->db->table('bank_information')
                            ->select("*")
                            ->where('bank_id',$bank_id)
                            ->get()
                            ->getRow();
      $bank_coa_i = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('bank_id', $bank_id)
                            ->get()
                            ->getRow();
    
       $bankcoaid = $bank_coa_i->HeadCode;
       }else{
           $bankcoaid = '';
       }  

      $customerdebit = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'Invoice',
          'VDate'          =>  $data['date'],
          'COAID'          =>  $customer_coa->HeadCode,
          'Narration'      =>  'Customer debit for  .'.$customer,
          'Debit'          =>  $data['total_amount']-(!empty($data['prevous_due'])?$data['prevous_due']:0),
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $data['date'],
          'IsAppove'       =>  1
        );    

     $customer_credit = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'Invoice',
          'VDate'          =>  $data['date'],
          'COAID'          =>  $customer_coa->HeadCode,
          'Narration'      =>  'Customer .'.$customer,
          'Debit'          =>  0,
          'Credit'         =>  $paid_amount,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $data['date'],
          'IsAppove'       =>  1
        );


   $prinfo  = $this->db->table('product_purchase_details')
                            ->select("product_id,Avg(rate) as product_rate")
                            ->whereIn('product_id', $product_id)
                            ->groupBy('product_id')
                            ->get()
                            ->getResult();
    $purchase_ave = [];
    $i=0;
    foreach ($prinfo as $avg) {
      $purchase_ave [] =  $avg->product_rate*$quantity[$i];
      $i++;
    }
   $sumval = array_sum($purchase_ave);


          ///Inventory Credit
       $inventory = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'Invoice',
      'VDate'          => $data['date'],
      'COAID'          => 10107,
      'Narration'      => 'Inventory Credit For Sale to '.$customer,
      'Debit'          => 0,
      'Credit'         => $sumval,
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $data['date'],
      'IsAppove'       => 1
    ); 

 

             $cashinhand = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'Invoice',
      'VDate'          =>  $data['date'],
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Sale to '.$customer,
      'Debit'          =>  $paid_amount,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $data['date'],
      'IsAppove'       =>  1
    ); 

  
    $pro_sale_income = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INVOICE',
      'VDate'          =>  $data['date'],
      'COAID'          =>  304,
      'Narration'      =>  'Customer debit For Invoice No'.$invoice_id,
      'Debit'          =>  0,
      'Credit'         =>  $data['total_amount']-(!empty($data['prevous_due'])?$data['prevous_due']:0),
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );

             
      // bank ledger debit
     $bankd = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'Invoice',
          'VDate'          =>  $data['date'],
          'COAID'          =>  $bankcoaid,
          'Narration'      =>  'Paid amount for Sale to  '.$customer,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 


        if($add_invoice){
               $acc_coatbl = $this->db->table('acc_transaction');
               $acc_coatbl->insert($inventory);
               $acc_coatbl->insert($customerdebit);
               $acc_coatbl->insert($pro_sale_income);
               if($paid_amount > 0){
                $acc_coatbl->insert($customer_credit);
                if($payment_type == 1){
                $acc_coatbl->insert($cashinhand);  
                }
                if($payment_type == 2){
                $acc_coatbl->insert($bankd);  
                }
           $tablecolumn = $this->db->getFieldData('tax_collection');
               $num_column = count($tablecolumn)-4;
           $tax_v = 0;
            for($j=0;$j<$num_column;$j++){
                $taxfield        = 'tax'.$j;
                $taxvalue        = 'total_tax'.$j;
              $taxdata[$taxfield]=$this->request->getVar($taxvalue);
              
            }
            $taxdata['customer_id'] = $customer_id;
            $taxdata['date']        = (!empty($data['date'])?$data['date']:date('Y-m-d'));
            $taxdata['relation_id'] = $invoice_id;
             $tax_table = $this->db->table('tax_collection');
              $tax_table->insert($taxdata); 

               }

    $customerinfo = $this->db->table('customer_information')
                            ->select('*')
                            ->where('customer_id', $customer_id)
                            ->get()
                            ->getRow(); 

    $quantity       = $this->request->getVar('product_quantity');
    $rate           = $this->request->getVar('product_rate');
    $p_id           = $this->request->getVar('product_id');
    $total_amount   = $this->request->getVar('total_price');
    $discount_rate  = $this->request->getVar('discount');
    $batch_id       = $this->request->getVar('batch_id');
    for ($i=0, $n= count($p_id); $i < $n; $i++) {
      $product_quantity = $quantity[$i];
      $product_rate     = $rate[$i];
      $product_id       = $p_id[$i];
      $total_price      = $total_amount[$i];
      $manufacturer_rate=$this->manufacturer_rate($product_id);
      $discount         = $discount_rate[$i];
      $batch            = $batch_id[$i];
      
      $details = array(
        'invoice_id'          =>  $invoice_id,
        'product_id'          =>  $product_id,
        'batch_id'            =>  $batch,
        'quantity'            =>  ($product_quantity?$product_quantity:0),
        'rate'                =>  ($product_rate?$product_rate:0),
        'discount'            =>  ($discount?$discount:0),
        'manufacturer_rate'   =>  ($manufacturer_rate[0]['manufacturer_price']?$manufacturer_rate[0]['manufacturer_price']:0),
        'total_price'         =>  ($total_price?$total_price:0),
        'status'              =>  1
      );
      
      $prinfo  = $this->db->table('product_purchase_details')
                            ->select("product_id,rate as product_rate")
                            ->where('product_id', $product_id)
                            ->where('batch_id', $batch)
                            ->groupBy('product_id')
                            ->get()
                            ->getRow();
                            
                            
          $cogp = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'Invoice',
      'VDate'          => $data['date'],
      'COAID'          => 401,
      'Narration'      => 'Cost of goods purchsase '.$product_id,
      'Debit'          => $prinfo->product_rate * ($product_quantity?$product_quantity:0),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $data['date'],
      'IsAppove'       => 1
    ); 
      
      if($product_quantity > 0)
      {
        

         $invoice_details = $this->db->table('invoice_details');
         $invoice_details->insert($details);
         $this->db->table('acc_transaction')->insert($cogp);
      }
    }
   return $invoice_id;
        }else{
          return false;
        }
    

    
    }


  public function manufacturer_rate($product_id)
  {
     $builder = $this->db->table('product_information')
                            ->select('manufacturer_price')
                            ->where('product_id', $product_id)
                            ->get()
                            ->getResultArray(); 
                            return $builder; 
  
  }

    public function update_invoice($data=[]){
      $setting_data = $this->setting_data();                       
      date_default_timezone_set($setting_data->timezone);    
       $builder        = $this->db->table('invoice');
       $builder->where('invoice_id', $data['invoice_id']);
       $update_invoice =  $builder->update($data); 
       $receive_by   = $this->session->get('id');
       $createdate   = date('Y-m-d H:i:s');;
       $invoice_id   = $data['invoice_id'];
       $gtotal       = $data['total_amount'];
       $customer_id  = $data['customer_id'];
       $p_amount     = $data['paid_amount'];
       $date         = date('Y-m-d');
       $quantity     = $this->request->getVar('product_quantity');
       $product_id   = $this->request->getVar('product_id');
       if($p_amount > $gtotal){
         $paid_amount  = $gtotal;
       }else{
        $paid_amount  = $data['paid_amount'];
       }

       $payment_type = $data['payment_type'];
       $cutomerinfo  = $this->db->table('customer_information')
                            ->select("*")
                            ->where('customer_id',$data['customer_id'])
                            ->get()
                            ->getRow();

        $customer_coa = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('customer_id',$data['customer_id'])
                            ->get()
                            ->getRow();
        $customer = $cutomerinfo->customer_name;

        $bank_id     = $data['bank_id'];
        if(!empty($bank_id)){
       $bankinfo = $this->db->table('bank_information')
                            ->select("*")
                            ->where('bank_id',$bank_id)
                            ->get()
                            ->getRow();
      $bank_coa_i = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('bank_id', $bank_id)
                            ->get()
                            ->getRow();
    
       $bankcoaid = $bank_coa_i->HeadCode;
       }else{
           $bankcoaid = '';
       }  

      $customerdebit = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'Invoice',
          'VDate'          =>  $data['date'],
          'COAID'          =>  $customer_coa->HeadCode,
          'Narration'      =>  'Customer debit for  .'.$customer,
          'Debit'          =>  $data['total_amount']-(!empty($data['prevous_due'])?$data['prevous_due']:0),
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        );    

     $customer_credit = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'Invoice',
          'VDate'          =>  $data['date'],
          'COAID'          =>  $customer_coa->HeadCode,
          'Narration'      =>  'Customer .'.$customer,
          'Debit'          =>  0,
          'Credit'         =>  $paid_amount,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        );


   $prinfo  = $this->db->table('product_purchase_details')
                            ->select("product_id,Avg(rate) as product_rate")
                            ->whereIn('product_id', $product_id)
                            ->groupBy('product_id')
                            ->get()
                            ->getResult();
    $purchase_ave = [];
    $i=0;
    foreach ($prinfo as $avg) {
      $purchase_ave [] =  $avg->product_rate*$quantity[$i];
      $i++;
    }
   $sumval = array_sum($purchase_ave);


          ///Inventory Credit
       $inventory = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'Invoice',
      'VDate'          => $data['date'],
      'COAID'          => 10107,
      'Narration'      => 'Inventory Credit For Sale to '.$customer,
      'Debit'          => 0,
      'Credit'         => $sumval,
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

 

             $cashinhand = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'Invoice',
      'VDate'          =>  $data['date'],
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Sale to '.$customer,
      'Debit'          =>  $paid_amount,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

  
    $pro_sale_income = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INVOICE',
      'VDate'          =>  $createdate,
      'COAID'          =>  304,
      'Narration'      =>  'Customer debit For Invoice No'.$invoice_id,
      'Debit'          =>  0,
      'Credit'         =>  $data['total_amount']-(!empty($data['prevous_due'])?$data['prevous_due']:0),
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );

             
      // bank ledger debit
     $bankd = array(
          'VNo'            =>  $invoice_id,
          'Vtype'          =>  'Invoice',
          'VDate'          =>  $data['date'],
          'COAID'          =>  $bankcoaid,
          'Narration'      =>  'Paid amount for Sale to  '.$customer,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 


        if($update_invoice){

             $d_transaction = $this->db->table('acc_transaction');
             $d_transaction->where('VNo', $invoice_id);
             $d_transaction->delete();
             $d_tax = $this->db->table('tax_collection');
             $d_tax->where('relation_id', $invoice_id);
             $d_tax->delete();
             $d_details = $this->db->table('invoice_details');
             $d_details->where('invoice_id', $invoice_id);
             $d_details->delete();
               $acc_coatbl = $this->db->table('acc_transaction');
               $acc_coatbl->insert($inventory);
               $acc_coatbl->insert($customerdebit);
               $acc_coatbl->insert($pro_sale_income);
               if($paid_amount > 0){
                $acc_coatbl->insert($customer_credit);
                if($payment_type == 1){
                $acc_coatbl->insert($cashinhand);  
                }
                if($payment_type == 2){
                $acc_coatbl->insert($bankd);  
                }
           $tablecolumn = $this->db->getFieldData('tax_collection');
               $num_column = count($tablecolumn)-4;
           $tax_v = 0;
            for($j=0;$j<$num_column;$j++){
                $taxfield        = 'tax'.$j;
                $taxvalue        = 'total_tax'.$j;
              $taxdata[$taxfield]=$this->request->getVar($taxvalue);
              
            }
            $taxdata['customer_id'] = $customer_id;
            $taxdata['date']        = (!empty($data['date'])?$data['date']:date('Y-m-d'));
            $taxdata['relation_id'] = $invoice_id;
            $tax_table = $this->db->table('tax_collection');
            $tax_table->insert($taxdata); 

               }

    $customerinfo = $this->db->table('customer_information')
                            ->select('*')
                            ->where('customer_id', $customer_id)
                            ->get()
                            ->getRow(); 

    $quantity       = $this->request->getVar('product_quantity');
    $rate           = $this->request->getVar('product_rate');
    $p_id           = $this->request->getVar('product_id');
    $total_amount   = $this->request->getVar('total_price');
    $discount_rate  = $this->request->getVar('discount');
    $batch_id       = $this->request->getVar('batch_id');
    for ($i=0, $n= count($p_id); $i < $n; $i++) {
      $product_quantity = $quantity[$i];
      $product_rate     = $rate[$i];
      $product_id       = $p_id[$i];
      $total_price      = $total_amount[$i];
      $manufacturer_rate=$this->manufacturer_rate($product_id);
      $discount         = $discount_rate[$i];
      $batch            = $batch_id[$i];
      
      $details = array(
        'invoice_id'          =>  $invoice_id,
        'product_id'          =>  $product_id,
        'batch_id'            =>  $batch,
        'quantity'            =>  ($product_quantity?$product_quantity:0),
        'rate'                =>  ($product_rate?$product_rate:0),
        'discount'            =>  ($discount?$discount:0),
        'manufacturer_rate'   =>  ($manufacturer_rate[0]['manufacturer_price']?$manufacturer_rate[0]['manufacturer_price']:0),
        'total_price'         =>  ($total_price?$total_price:0),
        'status'              =>  1
      );
      
        $prinfo  = $this->db->table('product_purchase_details')
                            ->select("product_id,rate as product_rate")
                            ->where('product_id', $product_id)
                            ->where('batch_id', $batch)
                            ->groupBy('product_id')
                            ->get()
                            ->getRow();
                            
                            
          $cogp = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'Invoice',
      'VDate'          => $data['date'],
      'COAID'          => 401,
      'Narration'      => 'Cost of goods purchsase '.$product_id,
      'Debit'          => $prinfo->product_rate * ($product_quantity?$product_quantity:0),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $data['date'],
      'IsAppove'       => 1
    ); 
      
      
      if($product_quantity > 0)
      {
        

         $invoice_details = $this->db->table('invoice_details');
         $invoice_details->insert($details);
         $this->db->table('acc_transaction')->insert($cogp);
      }
    }
   return $invoice_id;
        }else{
          return false;
        }
    }

    public function delete_invoice($invoice_id){
             $d_transaction = $this->db->table('acc_transaction');
             $d_transaction->where('VNo', $invoice_id);
             $d_transaction->delete();
             $d_tax = $this->db->table('tax_collection');
             $d_tax->where('relation_id', $invoice_id);
             $d_tax->delete();
             $d_details = $this->db->table('invoice_details');
             $d_details->where('invoice_id', $invoice_id);
             $d_details->delete();
             $d_invoice = $this->db->table('invoice');
             $d_invoice->where('invoice_id', $invoice_id);
             $delete_invoice =   $d_invoice->delete();
    if($delete_invoice){
    
     return true;
    }else{
    return false;
     }
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
            $searchQuery  = " (b.customer_name like '%".$searchValue."%' or a.invoice like '%".$searchValue."%' or a.date like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('invoice a');
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
           $builder2 = $this->db->table('invoice a');
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
          $builder3 = $this->db->table('invoice a');
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


          $button .=' <a href="'.$base_url.'/invoice/invoice_details/'.$record->invoice_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>';

           $button .=' <a href="'.$base_url.'/invoice/pos_print/'.$record->invoice_id.'" class="btn btn-warning-soft btn-sm" data-toggle="tooltip" data-placement="left" title="POS Print"><i class="fas fa-fax" aria-hidden="true"></i></a>';
       if($this->permission->method('invoice_list','update')->access()){  
        $button .=' <a href="'.$base_url.'/invoice/invoice_edit/'.$record->invoice_id.'" class="btn btn-primary-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
          }
       if($this->permission->method('invoice_list','delete')->access()){     
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/invoice/delete_invoice/'.$record->invoice_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
                'sl'               =>$sl,
                'invoice_no'       =>$record->invoice,
                'invoice_id'       =>$record->invoice_id,
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




  public function manufacturer_list()
{
        $builder = $this->db->table('manufacturer_information');
        $builder->select('*');
        $query   = $builder->get();
        $data    = $query->getResult();
        
       $list = array('' => 'Select Manufacturer');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->manufacturer_id]=$value->manufacturer_name;
            }
        }
        return $list;  
}


  public function get_total_product($product_id,$manufacturer_id)
  {
    
   $total_purchase = $this->db->table('product_purchase_details')
                            ->select("SUM(quantity) as total_purchase")
                            ->where('product_id',$product_id)
                            ->get()
                            ->getRow();

   $total_sale  = $this->db->table('invoice_details')
                            ->select("SUM(quantity) as total_sale")
                            ->where('product_id',$product_id)
                            ->get()
                            ->getRow();

   $product_information  = $this->db->table('product_information')
                            ->select("*")
                            ->where('product_id',$product_id)
                            ->where('manufacturer_id',$manufacturer_id)
                            ->get()
                            ->getRow();
    $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);
    $data2 = array(
      'total_product'      => (!empty($available_quantity)?$available_quantity:0)/$product_information->box_size, 
      'manufacturer_price' => $product_information->m_b_price, 
      'price'              => $product_information->price, 
      'manufacturer_id'    => $product_information->manufacturer_id,
      'unit'               => $product_information->unit,
      'box_qty'            => $product_information->box_size,

      );

    return $data2;
  }


     public function search_customers($customer_name)
    {   
         $customer_information  = $this->db->table('customer_information')
                              ->select("*")
                              ->like('customer_name',$customer_name,'both')
                              ->orderBy('customer_name','asc')
                              ->limit(15)
                              ->get()
                              ->getResultArray();                     
return $customer_information;  
    }


    public function product_search_item($manufacturer_id,$product_name)
    {

 $product_information  = $this->db->table('product_information')
                              ->select("*")
                              ->where('manufacturer_id',$manufacturer_id)
                              ->like('product_name',$product_name,'both')
                              ->orderBy('product_name','asc')
                              ->limit(15)
                              ->get()
                              ->getResultArray();                     
return $product_information;  
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

  public function medicine_list(){
        $builder = $this->db->table('product_information');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        return $data=$query->getResult();
  }


  public function category_list(){
     $builder = $this->db->table('product_category');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        return $data=$query->getResultArray();
  }

 public function invoice_main($invoice_id){
   return  $details_info = $this->db->table('invoice a')
            ->select('a.*,c.customer_name,d.firstname,d.lastname')
            ->join('customer_information c','a.customer_id=c.customer_id','left')
            ->join('user d','a.sales_by=d.id')
            ->where('a.invoice_id',$invoice_id)
            ->get()
            ->getRow();
  }  

  public function company_details(){
    return  $details_info = $this->db->table('setting')
            ->select('*')
            ->get()
            ->getRow();
  }

  public function invoice_details($invoice_id){
   return  $details_info = $this->db->table('invoice_details a')
            ->select('a.*,c.product_name,c.strength')
            ->join('product_information c','a.product_id=c.product_id','left')
            ->where('a.invoice_id',$invoice_id)
            ->get()
            ->getResultArray();
  }



public function pos_invoice_setup($product_id){

    $product_information = $this->db->table('product_information a')
            ->select('a.*,c.*')
            ->join('product_purchase_details c','a.product_id=c.product_id','left')
            ->where('a.product_id',$product_id)
            ->get()
            ->getRow();

    if ($product_information != null) {

      $total_purchase = $this->db->table('product_purchase_details a')
            ->select('SUM(a.quantity) as total_purchase')
            ->where('a.product_id',$product_id)
            ->get()
            ->getRow();


      $total_sale = $this->db->table('invoice_details b')
            ->select('SUM(b.quantity) as total_sale')
            ->where('b.product_id',$product_id)
            ->get()
            ->getRow();

      $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

      $medicineinfo = (object)array(
        'total_product'      => $available_quantity,
        'manufacturer_price' => $product_information->manufacturer_price, 
        'price'              => $product_information->price, 
        'batch_id'           => $product_information->batch_id,
        'strength'           => $product_information->strength,
        'expeire_date'       => $product_information->expeire_date,
        'manufacturer_id'    => $product_information->manufacturer_id, 
        'product_id'         => $product_information->product_id, 
        'discount'           => $product_information->product_id,
        'product_name'       => $product_information->product_name, 
        'unit'               => $product_information->unit,
        'image'              => $product_information->image
        );

      return $medicineinfo;
    }else{
      return false;
    }
  }


    public function batch_search_item($product_id){

            $batchdata =  $this->db->table('product_purchase_details a')
                              ->select("a.*, m.product_name, m.strength")
                              ->join('product_information m','m.product_id = a.product_id','left')
                              ->where('a.product_id',$product_id)
                              ->groupBy('a.batch_id')
                              ->limit(15)
                              ->get()
                              ->getResultArray();
                              return $batchdata;
  }

  public function tax_fields(){
    return $tax_data = $this->db->table('tax_settings')
                                ->select('*')
                                ->get()
                                ->getResultArray();
  }


  public function purchase_batch_data($product_id,$batch_id){
    return $batch_stocks = $this->db->table('product_purchase_details a')
            ->select('a.expeire_date,SUM(a.quantity) as total_purchase')
            ->where('a.batch_id',$batch_id)
            ->where('a.product_id',$product_id)
            ->get()
            ->getRow();
  }

    public function invoice_batch_data($product_id,$batch_id){
    return $batch_stocks = $this->db->table('invoice_details b')
            ->select('SUM(b.quantity) as total_sale')
            ->where('b.batch_id',$batch_id)
            ->where('b.product_id',$product_id)
            ->get()
            ->getRow();
  }


    public function get_total_product_batch($batch_id,$product_id){

    $total_purchase = $this->db->table('product_purchase_details a')
                           ->select('a.expeire_date,SUM(a.quantity) as total_purchase')
                           ->where('a.batch_id',$batch_id)
                           ->where('a.product_id',$product_id)
                           ->get()
                           ->getRow();

     $total_sale = $this->db->table('invoice_details b')
                        ->select('SUM(b.quantity) as total_sale')
                        ->where('b.batch_id',$batch_id)
                        ->where('b.product_id',$product_id)
                        ->get()
                        ->getRow();

    $available_quantity = (($total_purchase->total_purchase?$total_purchase->total_purchase:0) - ($total_sale->total_sale?$total_sale->total_sale:0));

    $data['total_product'] = $available_quantity;
    $data['expire_date']   = $total_purchase->expeire_date;

    return $data;
  }

public function getitemlist($cid)
{
     $builder = $this->db->table('product_information');
        $builder->select('*');
        $builder->where('status',1);
          if($cid !='all'){
        $builder->where('category_id',$cid);
          }
        $query = $builder->get();
        $data = $query->getResult();

        if($data){
          return $data;
        }else{
          return false;
        }

}


 public function searchprod_byname($pname= null)
    { 
       $itemlist= $this->db->table('product_information')
                        ->select('*')
                        ->like('product_name',$pname,'both')
                        ->where('status',1)
                        ->orderBy('product_name','asc')
                        ->limit(30)
                        ->get()
                        ->getResult();
        return $itemlist;
    }


    public function todays_saleList(){
      $date = date('Y-m-d');
         return  $details_info = $this->db->table('invoice a')
            ->select('a.*,c.customer_name,d.firstname,d.lastname')
            ->join('customer_information c','a.customer_id=c.customer_id','left')
            ->join('user d','a.sales_by=d.id')
            ->where('a.date',$date)
            ->get()
            ->getResultArray();
    }


   public function autocompletproductdata($product_name=null){
    return  $query = $this->db->table('product_information')
                        ->select('*')
                        ->like('product_name',$product_name,'both')
                        ->where('status',1)
                        ->orderBy('product_name','asc')
                        ->limit(15)
                        ->get()
                        ->getResultArray();

        
  }


    public function get_total_product_invoic($product_id){
    $total_purchase = $this->db->table('product_purchase_details a')
                           ->select('a.expeire_date,SUM(a.quantity) as total_purchase')
                           ->where('a.product_id',$product_id)
                           ->get()
                           ->getRow();


    $total_sale = $this->db->table('invoice_details b')
                        ->select('SUM(b.quantity) as total_sale')
                        ->where('b.product_id',$product_id)
                        ->get()
                        ->getRow();


    $salesreturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_sales_return")
                            ->where('product_id',$product_id)
                            ->where('usablity',1)
                            ->get()
                            ->getRow();


          
    $purchasereturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_purchase_return")
                            ->where('product_id',$product_id)
                            ->where('usablity',2)
                            ->get()
                            ->getRow();                    

    $product_information = $this->db->table('product_information a')
            ->select('a.*,b.unit_name')
            ->join('unit b','b.id = a.unit')
            ->where('a.product_id',$product_id)
            ->where('a.status',1)
            ->get()
            ->getRow();

    $available_quantity = ((!empty($total_purchase->total_purchase)?$total_purchase->total_purchase:0) - (!empty($total_sale->total_sale)?$total_sale->total_sale:0) +($salesreturn->total_sales_return?$salesreturn->total_sales_return:0) - ($purchasereturn->total_purchase_return?$purchasereturn->total_purchase_return:0));
      $content = $this->batch_search_item($product_id);
        $html = "";
        if (empty($content)) {
          $html .="No Product Found !";
      }else{

     
        // Select option created for product
          $html .="<select name=\"batch_id[]\"   class=\"batch_id_1 form-control select2\" id=\"batch_id_1\">";
            $html .= "<option>".lan('select_batch')."</option>";
            foreach ($content as $product) {
    $total_purchase_batch = $this->db->table('product_purchase_details a')
                           ->select('a.expeire_date,SUM(a.quantity) as total_purchase')
                           ->where('a.batch_id',$product['batch_id'])
                           ->where('a.product_id',$product_id)
                           ->get()
                           ->getRow();

    $total_sale_batch = $this->db->table('invoice_details b')
                        ->select('SUM(b.quantity) as total_sale')
                        ->where('b.batch_id',$product['batch_id'])
                        ->where('b.product_id',$product_id)
                        ->get()
                        ->getRow();

      $salesreturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_sales_return")
                            ->where('product_id',$product['product_id'])
                            ->where('batch_id',$product['batch_id'])
                            ->where('usablity',1)
                            ->get()
                            ->getRow();


          
    $purchasereturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_purchase_return")
                            ->where('product_id',$product['product_id'])
                            ->where('batch_id',$product['batch_id'])
                            ->where('usablity',2)
                            ->get()
                            ->getRow();                     

    $batch_stock = (($total_purchase_batch->total_purchase?$total_purchase_batch->total_purchase:0) - ($total_sale_batch->total_sale?$total_sale_batch->total_sale:0) + ($salesreturn->total_sales_return?$salesreturn->total_sales_return:0) - ($purchasereturn->total_purchase_return?$purchasereturn->total_purchase_return:0));
          if($batch_stock > 0){
            $html .="<option value=".$product['batch_id'].">".$product['batch_id']."</option>";
          }
            } 
          $html .="</select>";
      }
        $tablecolumn = $this->db->getFieldData('tax_collection');
               $num_column = count($tablecolumn)-4;
               if($num_column > 0){
  $taxfield='';
  $taxvar = [];
   for($i=0;$i<$num_column;$i++){
    $taxfield = 'tax'.$i;
    $data2[$taxfield] = $product_information->$taxfield;
    $taxvar[$i]       = $product_information->$taxfield;
    $data2['taxdta']  = $taxvar;
   }
}

    
      $data2['total_product']      = $available_quantity; 
      $data2['manufacturer_price'] = $product_information->manufacturer_price; 
      $data2['price']              = $product_information->price; 
      $data2['manufacturer_id']    = $product_information->manufacturer_id;
      $data2['unit']               = $product_information->unit_name;
      $data2['box_qty']            = $product_information->box_size;
      $data2['batch']              = $html;
      $data2['txnmber']            = $num_column;
      

    return $data2;
  }


  public function selected_batch_edit($product_id){
        $builder = $this->db->table('product_purchase_details');
        $builder->select('*');
        $builder->where('product_id',$product_id);
        $builder->groupBy('batch_id');
        $query=$builder->get();
        $data=$query->getResult();
        
       $batchList = array('' => 'Select Batch');
        if(!empty($data)){
            foreach ($data as $value){
                $batchList[$value->batch_id]=$value->batch_id;
            }
        }

        return $batchList;
  }

     public function batch_expiry($product_id,$batch_id){
    $batch = $this->db->table('product_purchase_details')
                           ->select('expeire_date')
                           ->where('batch_id',$batch_id)
                           ->get()
                           ->getRow();

 $total_purchase_batch = $this->db->table('product_purchase_details a')
                           ->select('a.expeire_date,SUM(a.quantity) as total_purchase')
                           ->where('a.batch_id',$batch_id)
                           ->where('a.product_id',$product_id)
                           ->get()
                           ->getRow();

                         

    $total_sale_batch = $this->db->table('invoice_details b')
                        ->select('SUM(b.quantity) as total_sale')
                        ->where('b.batch_id',$batch_id)
                        ->where('b.product_id',$product_id)
                        ->get()
                        ->getRow();
   
     $salesreturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_sales_return")
                            ->where('product_id',$product_id)
                            ->where('batch_id',$batch_id)
                            ->where('usablity',1)
                            ->get()
                            ->getRow();


          
    $purchasereturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_purchase_return")
                            ->where('product_id',$product_id)
                            ->where('batch_id',$batch_id)
                            ->where('usablity',2)
                            ->get()
                            ->getRow(); 


    $batch_stock = (($total_purchase_batch->total_purchase?$total_purchase_batch->total_purchase:0) - ($total_sale_batch->total_sale?$total_sale_batch->total_sale:0) + ($salesreturn->total_sales_return?$salesreturn->total_sales_return:0) - ($purchasereturn->total_purchase_return?$purchasereturn->total_purchase_return:0));

                          
           $data['total_stock']     = $batch_stock; 
           $data['expeire_date']    = $batch->expeire_date; 

           return $data;
                         }


    public function invoice_taxinfo($invoice_id){
             $collected_tax = $this->db->table('tax_collection')
                           ->select('*')
                           ->where('relation_id',$invoice_id)
                           ->get()
                           ->getResultArray();
                           return $collected_tax;
    }
    
     public function setting_data()
    {
          $setting = $this->db->table('setting')
                             ->get()
                             ->getRow();  
                             return $setting;
    }
}