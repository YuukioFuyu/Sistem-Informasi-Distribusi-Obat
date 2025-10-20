<?php namespace App\Modules\Returns\Models;

class Return_model
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->request = \Config\Services::request();
    }

    public function findAll()
    {
        $builder = $this->db->table('manufacturer_information');
		    $builder->select("*");
        $query   = $builder->get(); 
		return $query->getResult(); 
    }

    public function check_invoiceno($id)
    {
      return $result = $this->db->table('invoice')
                            ->select('*')
                            ->where('invoice', $id)
                            ->countAllResults();
                          
    }

    public function invoice_return_data($invoice_id) {
       return $data = $this->db->table('invoice a')
                  ->select('a.*, sum(c.quantity) as sum_quantity, a.total_tax as taxs,a. prevous_due,b.customer_name,c.*,c.product_id,d.product_name,d.strength,d.unit,d.*')
                 ->join('customer_information b', 'b.customer_id = a.customer_id')
                 ->join('invoice_details c', 'c.invoice_id = a.invoice_id')
                 ->join('product_information d', 'd.product_id = c.product_id')
                 ->where('a.invoice', $invoice_id)
                 ->groupBy('d.product_id')
                 ->get()
                 ->getResultArray();
    }


     public function detailsdata($id){
        $builder = $this->db->table('product_purchase_details a')
                             ->select('a.*,b.product_name,b.strength,b.box_size')
                             ->join('product_information b','b.product_id = a.product_id')
                             ->where('a.purchase_id', $id)
                             ->get()
                             ->getResultArray(); 
    return $builder;


    }


      public function return_invoice_entry() {
        $setting_data = $this->setting_data();                       
     date_default_timezone_set($setting_data->timezone);
        $invoice_id     = $this->request->getVar('invoice_id');
        $total          = $this->request->getVar('grand_total_price');
        $customer_id    = $this->request->getVar('customer_id');
        $isrtn          = $this->request->getVar('rtn');
        $cusifo = $this->db->table('customer_information')
                           ->select('*')
                           ->where('customer_id',$customer_id)
                           ->get()
                           ->getRow();
        $headn = $customer_id.'-'.$cusifo->customer_name;
        $coainfo = $this->db->table('acc_coa')
                            ->select('*')
                            ->where('customer_id',$customer_id)
                            ->get()
                            ->getRow();
      $customer_headcode = $coainfo->HeadCode;

        $date      = date('Y-m-d');
        $createby  = $this->session->get('id');
        $createdate= date('Y-m-d H:i:s');
      
  $cosdr = array(
      'VNo'            => $invoice_id,
      'Vtype'          => 'Return',
      'VDate'          => $date,
      'COAID'          => $customer_headcode,
      'Narration'      => 'Customer debit For Return '.$cusifo->customer_name,
      'Debit'          => 0,
      'Credit'         => $total,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 


      

        $ads          = $this->request->getVar('radio');
        $quantity     = $this->request->getVar('product_quantity');
        $batch        = $this->request->getVar('batch_id');
        $rate         = $this->request->getVar('product_rate');
        $p_id         = $this->request->getVar('product_id');
        $total_amount = $this->request->getVar('total_price');
        $discount_rate= $this->request->getVar('discount');
        $tax_amount   = $this->request->getVar('tax');
        $soldqty      = $this->request->getVar('sold_qty');


            for ($i = 0; $i < count($p_id); $i++) {

                $product_quantity = $quantity[$i];
                $product_rate     = $rate[$i];
                $product_id       = $p_id[$i];
                $sqty             = $soldqty[$i];
                $total_price      = $total_amount[$i];
                $discount         = $discount_rate[$i];
                $tax              = -$tax_amount[$i];
                $batch_id         = $batch[$i];
   

                $returns = array(
                'return_id'        => date('Ymdhis'),
                'invoice_id'       => $invoice_id,
                'product_id'       => $product_id,
                'customer_id'      => $this->request->getVar('customer_id'),
                'ret_qty'          => $product_quantity,
                'byy_qty'          => $sqty,
                'batch_id'         => $batch_id,
                'date_purchase'    => $this->request->getVar('invoice_date'),
                'date_return'      => $date,
                'product_rate'     => $product_rate,
                'deduction'        => $discount,
                'total_deduct'     => $this->request->getVar('total_discount'),
                'total_tax'        => $this->request->getVar('total_tax'),
                'total_ret_amount' => $total_price,
                'net_total_amount' => $this->request->getVar('grand_total_price'),
                'reason'           => $this->request->getVar('details'),
                'usablity'         => $this->request->getVar('radio')
                );


                 $return = $this->db->table('product_return');
                 $return->insert($returns);
               

            }

            $transaction = $this->db->table('acc_transaction');
            $transaction->insert($cosdr);

        return true;
    }

   

      public function retrieve_invoice_html_data($invoice_id)
      {
        $result =  $this->db->table('product_return c') 
                  ->select('c.total_ret_amount,
                        c.*,
                        b.*,
                        d.product_id,
                        d.product_name,
                        d.product_details,d.strength')
                 ->join('customer_information b', 'b.customer_id = c.customer_id')
                 ->join('product_information d', 'd.product_id = c.product_id')
                 ->where('c.invoice_id', $invoice_id)
                 ->get()
                 ->getResultArray();
                 return $result;
      
    }


     public function getinvoicereturnList($postData=null)
     {
         $response = array();
          $fromdate = $this->request->getVar('fromdate');
          $todate   = $this->request->getVar('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.date_return BETWEEN '$fromdate' AND '$todate')";
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
            $searchQuery  = " (b.customer_name like '%".$searchValue."%' or a.invoice_id like '%".$searchValue."%' or a.date_return like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_return a');
           $builder1->select("count(*) as allcount");
           $builder1->join('customer_information b', 'b.customer_id = a.customer_id','left');
           $builder1->where('a.usablity',1);
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
           $builder2 = $this->db->table('product_return a');
           $builder2->select("count(*) as allcount");
           $builder2->join('customer_information b', 'b.customer_id = a.customer_id','left');
           $builder2->where('a.usablity',1);
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
          $builder3 = $this->db->table('product_return a');
          $builder3->select("a.*,b.customer_name");
          $builder3->join('customer_information b', 'b.customer_id = a.customer_id','left');
          $builder3->where('a.usablity',1);
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
      
          $button .=' <a href="'.$base_url.'/return/invoice_return_details/'.$record->invoice_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>';

     
            $data[] = array( 
                'sl'               =>$sl,
                'invoice_id'       =>$record->invoice_id,
                'customer_name'    =>$record->customer_name,
                'date_return'      =>$record->date_return,
                'net_total_amount' =>$record->net_total_amount,
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



    public function check_purchase($purchase_id){
     return $data = $this->db->table('product_purchase')
                       ->select('purchase_id')
                       ->where('purchase_id', $purchase_id)
                       ->countAllResults();
    }


  public function supplier_return($purchase_id) {
       $data =  $this->db->table('product_purchase c')
                         ->select('c.*,a.*,b.*,a.product_id,d.product_name,d.strength')
                         ->join('product_purchase_details a', 'a.purchase_id = c.purchase_id')
                         ->join('product_information d', 'd.product_id = a.product_id')
                         ->join('manufacturer_information b', 'b.manufacturer_id = c.manufacturer_id')
                         ->where('c.purchase_id', $purchase_id)
                         ->groupBy('d.product_id', 'desc')
                         ->get()
                         ->getResultArray();
                         return $data;
        
    }


  public function return_manufacturer_entry()
  {
    $setting_data = $this->setting_data();                       
     date_default_timezone_set($setting_data->timezone);
     $purchase_id     = $this->request->getVar('purchase_id');
     $total           = $this->request->getVar('grand_total_price');
     $manufacturer_id = $this->request->getVar('manufacturer_id');
     $isrtn           = $this->request->getVar('rtn'); 
     $sup_coa         = $this->db->table('acc_coa')->select('*')->where('manufacturer_id',$manufacturer_id)->get()->getRow();
     $receive_by      = $this->session->get('id');
     $receive_date    = date('Y-m-d');   
     $date            = date('Y-m-d'); 

    $manufacturerledger = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Return',
          'VDate'          =>  $date,
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'manufacturer Return to .'.$sup_coa->HeadName,
          'Debit'          =>  0,
          'Credit'         =>  $total,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 

      if($this->request->getVar('radio') == 2){
        $trans_table = $this->db->table('acc_transaction');
        $trans_table->insert($manufacturerledger);
        }
      $quantity            = $this->request->getVar('product_quantity');
      $rate                = $this->request->getVar('product_rate');
      $p_id                = $this->request->getVar('product_id');
      $total_amount        = $this->request->getVar('total_price');
      $discount_rate       = $this->request->getVar('discount');
      $soldqty             = $this->request->getVar('ret_qty');
      $batch               = $this->request->getVar('batch_id');
      $expire_date         = $this->request->getVar('expire_date');
      $ret_id              = date('Ymdhis');
     
    if (is_array($p_id))
     for ($i=0; $i < count($p_id); $i++) 
    { 
      
        $product_quantity = $quantity[$i];
        $product_rate     = $rate[$i];
        $product_id       = $p_id[$i];
        $batch_id         = $batch[$i];
        $expire           = $expire_date[$i];
        $sqty             = $soldqty[$i];
        $total_price      = $total_amount[$i];
        $return_id        = $ret_id[$i];
        $discount         = $discount_rate[$i];



        $returns = array(
          'return_id'             => $ret_id,
          'purchase_id'           => $purchase_id,
          'product_id'            => $product_id,
          'manufacturer_id'       => $this->request->getVar('manufacturer_id'),
          'ret_qty'               => $product_quantity,
          'byy_qty'               => $sqty,
            'batch_id'            => $batch_id,
          'date_purchase'         => $this->request->getVar('return_date'),
          'date_return'           => $date,
          'product_rate'          => $product_rate,
          'deduction'             => $discount,
          'total_deduct'          => $this->request->getVar('total_discount'),
          'total_ret_amount'      => $total_price,
          'net_total_amount'      => $this->request->getVar('grand_total_price'),
          'reason'                => $this->request->getVar('details'),
          'usablity'              => $this->request->getVar('radio')
        ); 


     $r_details = $this->db->table('product_return');
     $r_details->insert($returns);
    }
     
     return true;
  }


  public function getmanufacturerreturnList($postData=null)
     {
         $response = array();
          $fromdate = $this->request->getVar('fromdate');
          $todate   = $this->request->getVar('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.date_return BETWEEN '$fromdate' AND '$todate')";
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
            $searchQuery  = " (b.manufacturer_name like '%".$searchValue."%' or a.invoice_id like '%".$searchValue."%' or a.date_return like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_return a');
           $builder1->select("count(*) as allcount");
           $builder1->join('manufacturer_information b', 'b.manufacturer_id = a.manufacturer_id','left');
           $builder1->where('a.usablity',2);
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
           $builder2 = $this->db->table('product_return a');
           $builder2->select("count(*) as allcount");
           $builder2->join('manufacturer_information b', 'b.manufacturer_id = a.manufacturer_id','left');
           $builder2->where('a.usablity',2);
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
          $builder3 = $this->db->table('product_return a');
          $builder3->select("a.*,b.manufacturer_name");
          $builder3->join('manufacturer_information b', 'b.manufacturer_id = a.manufacturer_id','left');
          $builder3->where('a.usablity',2);
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
      
          $button .=' <a href="'.$base_url.'/return/manufacturer_return_details/'.$record->purchase_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>';

     
            $data[] = array( 
                'sl'               =>$sl,
                'purchase_id'      =>$record->purchase_id,
                'manufacturer_name'=>$record->manufacturer_name,
                'date_return'      =>$record->date_return,
                'net_total_amount' =>$record->net_total_amount,
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


  public function manufacturer_return_html_data($ret_id)
  {
    $data = $this->db->table('product_return c')
                 ->select('c.total_ret_amount,c.*, b.*,d.product_id,d.product_name,d.product_details,d.strength')
                 ->join('manufacturer_information b','b.manufacturer_id = c.manufacturer_id')
                 ->join('product_information d','d.product_id = c.product_id')
                 ->where('c.purchase_id',$ret_id)
                 ->get()
                 ->getResultArray();
        return $data;
  }
  
    public function setting_data()
    {
          $setting = $this->db->table('setting')
                             ->get()
                             ->getRow();  
                             return $setting;
    }


     public function getwastagereturnList($postData=null)
     {
         $response = array();
          $fromdate = $this->request->getVar('fromdate');
          $todate   = $this->request->getVar('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.date_return BETWEEN '$fromdate' AND '$todate')";
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
            $searchQuery  = " (b.customer_name like '%".$searchValue."%' or a.invoice_id like '%".$searchValue."%' or a.date_return like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_return a');
           $builder1->select("count(*) as allcount");
           $builder1->join('customer_information b', 'b.customer_id = a.customer_id','left');
           $builder1->join('manufacturer_information c', 'c.manufacturer_id = a.manufacturer_id','left');
           $builder1->where('a.usablity',3);
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
           $builder2 = $this->db->table('product_return a');
           $builder2->select("count(*) as allcount");
           $builder2->join('customer_information b', 'b.customer_id = a.customer_id','left');
           $builder2->join('manufacturer_information c', 'c.manufacturer_id = a.manufacturer_id','left');
           $builder2->where('a.usablity',3);
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
          $builder3 = $this->db->table('product_return a');
          $builder3->select("a.*,b.customer_name,c.manufacturer_name");
          $builder3->join('customer_information b', 'b.customer_id = a.customer_id','left');
          $builder3->join('manufacturer_information c', 'c.manufacturer_id = a.manufacturer_id','left');
          $builder3->where('a.usablity',3);
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
      
      if($record->invoice_id){
          $button .=' <a href="'.$base_url.'/return/invoice_return_details/'.$record->invoice_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>';
      }else{
       $button .=' <a href="'.$base_url.'/return/manufacturer_return_details/'.$record->purchase_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>'; 
      }
     
            $data[] = array( 
                'sl'               =>$sl,
                'invoice_id'       =>$record->invoice_id,
                'purchase_id'      =>$record->purchase_id,
                'customer_name'    =>$record->customer_name,
                'manufacturer_name'=>$record->manufacturer_name,
                'date_return'      =>$record->date_return,
                'net_total_amount' =>$record->net_total_amount,
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
}