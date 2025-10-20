<?php namespace App\Modules\Dashboard\Models;

class Dashboard_model
{
	 public function __construct()
    {
        $this->db = db_connect();
    }

    public function total_customer()
    {
    	$data = $this->db->table('customer_information')
    	                 ->select('*')
    	                 ->countAllResults();
    	                 return $data;
    }


     public function total_medicine()
    {
    	$data = $this->db->table('product_information')
    	                 ->select('*')
    	                 ->countAllResults();
    	                 return $data;
    }


    public function out_of_stock_count()
    {
     $data = $this->db->table('product_information a')
            ->select("a.product_name,a.generic_name,a.strength,b.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'")
            ->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id')
            ->having('stock < 10')
            ->groupBy('a.product_id')
            ->countAllResults();
         return $data;


    }

     public function out_of_date_count()
     {
         $date=date('Y-m-d');
         $data = $this->db->table('product_information a')
                  ->select("b.*,a.product_name,a.strength,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'")
                  ->join('product_purchase_details b','b.product_id=a.product_id','left')
                  ->where('b.expeire_date <=', $date)
                  ->having('stock > 0')
                  ->groupBy('b.batch_id')
                  ->groupBy('a.product_id')
                  ->countAllResults();
        return $data;


    }


    public function best_sales_products() 
        {
        $data = $this->db->table('invoice_details a') 	
                ->select('b.product_id, b.product_name, sum(a.quantity) as quantity,sum(a.total_price) as sales_amount,c.date')
                ->join('invoice c', 'c.invoice_id = a.invoice_id')
                ->join('product_information b', 'b.product_id = a.product_id')
                ->where('MONTH(c.date)',date('m'))
                ->groupBy('a.product_id')
                ->orderBy('quantity', 'desc')
                ->limit(10)
                ->get()
                ->getResult();

               

        return $data;
		    
    }


     public function pie_total_saleamount(){
        $month = date('m');
        $year  = date('Y');
        $query = $this->db->table('invoice')
                 ->select("sum(total_amount) as total")
                 ->where('YEAR(date)',$year)
                 ->where('MONTH(date)',$month)
                 ->get()
                 ->getRow(); 
            $amount =  $query->total;   
        return (!empty($amount)?$amount:1);
    }

    public function pie_total_purchaseamount(){
        $month = date('m');
        $year  = date('Y');
        $query = $this->db->table('product_purchase')
                 ->select("sum(grand_total_amount) as total")
                 ->where('YEAR(purchase_date)',$year)
                 ->where('MONTH(purchase_date)',$month) 
                 ->get()
                 ->getRow(); 
            $amount =  $query->total;   
        return (!empty($amount)?$amount:1);
    }

    public function pie_total_serviceamount(){
        $month = date('m');
        $year  = date('Y');
        $query = $this->db->table('service_invoice')
                 ->select("sum(total_amount) as total")
                 ->where('YEAR(date)',$year)
                 ->where('MONTH(date)',$month)
                 ->get()
                 ->getRow();  
            $amount =  $query->total;   
        return (!empty($amount)?$amount:1);
    }

    public function pie_total_salaryamount(){
        $month = date('m');
        $year  = date('Y');
        $query = $this->db->table('employee_salary_payment')
                 ->select("sum(total_salary) as total")
                 ->where('YEAR(payment_date)',$year)
                 ->where('MONTH(payment_date)',$month)
                 ->where('paid_by !=',NULL)
                 ->get()
                 ->getRow();  
            $amount =  $query->total;   
        return (!empty($amount)?$amount:1);
    }



       public function pie_total_expenseamount(){
        $expense_amount = 0;
        $month = date('m');
        $year  = date('Y');
       $result = $this->db->table('acc_coa')
			        ->select('*')
			        ->where('PHeadName', 'Expence')
			        ->get()
			        ->getResultArray();
        if($result){
            foreach($result as $data){
        $amount = $this->db->table('acc_transaction')    	
                 ->select('sum(Debit) as amount')
                 ->where('COAID', $data['HeadCode'])
                 ->where('YEAR(VDate)',$year)
                 ->where('MONTH(VDate)',$month) 
                 ->where('IsAppove', 1)
                 ->get()
                 ->getResultArray();
        $expense_amount += $amount[0]['amount'];
    }
        }
        return ($expense_amount?$expense_amount:1);

   }


    public function allday_of_yearmonth(){
    $list  = array();
    $month = date('m');
    $year  = date('Y');

    for($d=1; $d<=31; $d++)
    {
        $time=mktime(12, 0, 0, $month, $d, $year);          
        if (date('m', $time)==$month)       
            $list[]=date('Y-m-d', $time);
    }

		    return $list;

    }

    public function datewise_total_sale($date)
    {
    	$query = $this->db->table('invoice')
                 ->select("sum(total_amount) as total")
                 ->where('date',$date)
                 ->get()
                 ->getRow(); 
            $amount =  $query->total;   
        return (!empty($amount)?$amount:0);
    }

    public function datewise_total_purchase($date)
    {
    	 $query = $this->db->table('product_purchase')
                 ->select("sum(grand_total_amount) as total")
                 ->where('purchase_date',$date)
                 ->get()
                 ->getRow(); 
            $amount =  $query->total;   
        return (!empty($amount)?$amount:0);
    }


     public function datewise_total_cashreceive($date)
    {
    	 $query = $this->db->table('acc_transaction')
                 ->select("sum(Debit) as total")
                 ->where('VDate',$date)
                 ->where('COAID',1020101)
                 ->get()
                 ->getRow(); 
            $amount =  $query->total;   
        return (!empty($amount)?$amount:0);
    }


        public function total_bank_receive($datse)
        {
        $bank_amount = 0;
        $result  = $this->db->table('acc_coa')
                 ->select('*')
                 ->where('PHeadName', 'Cash At Bank')
                 ->get()
                 ->getResultArray();
        if($result){
            foreach($result as $data){
          $amount = $this->db->table('acc_transaction')    	
                 ->select('sum(Debit) as amount')
                 ->where('COAID', $data['HeadCode'])
                 ->where('VDate', $datse)
                 ->where('IsAppove', 1)
                 ->get()
                 ->getResultArray();
        $bank_amount += $amount[0]['amount'];
    }
        }
        return $bank_amount;

    }

    public function todays_total_service_amount($date){
        $query = $this->db->table('service_invoice')
                 ->select("sum(total_amount) as total")
                 ->where('date',$date)
                 ->get()
                 ->getRow();
            $amount =  $query->total;   
        return (!empty($amount)?$amount:0);
    }



     public function out_of_date_medicinelist()
     {
         $date=date('Y-m-d');
         $data = $this->db->table('product_information a')
                  ->select("b.*,a.product_name,a.strength,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'")
                  ->join('product_purchase_details b','b.product_id=a.product_id','left')
                  ->where('b.expeire_date <=', $date)
                  ->having('stock > 0')
                  ->groupBy('b.batch_id')
                  ->groupBy('a.product_id')
                  ->get()
                  ->getResult();
        return $data;


    }


    public function out_of_stock_medicinelist()
    {
     $data = $this->db->table('product_information a')
            ->select("a.product_name,a.generic_name,a.strength,b.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'")
            ->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id')
            ->having('stock < 10')
            ->groupBy('a.product_id')
            ->get()
            ->getResult();
         return $data;


    }

    public function out_of_datemedicine_list()
    {
        $date=date('Y-m-d');
        $data = $this->db->table('product_information a')
         ->select("b.*,b.expeire_date as expdate,a.product_name,a.strength,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'")
         ->join('product_purchase_details b','b.product_id=a.product_id','left')
         ->where('b.expeire_date <=', $date)
         ->having('stock > 0')
         ->groupBy('b.batch_id')
         ->groupBy('a.product_id')
         ->limit(20)
         ->get()
         ->getResultArray();
      return $data;
    }

    public function out_of_stocklist()
    {  
        $out_of_stock = $this->db->table('product_information a')
        ->select("a.*,b.manufacturer_name,a.product_name,a.generic_name,a.strength,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'")
         ->join('manufacturer_information b','b.manufacturer_id=a.manufacturer_id','left')
         ->having('stock < 10')
         ->groupBy('a.product_id')
         ->orderBy('a.product_name','asc')
         ->limit(20)
         ->get()
         ->getResultArray();
         return $out_of_stock;
       
    }

     public function getstockoutMedicineList($postData=null)
    {
        $response = array();
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.product_name like '%".$searchValue."%' or a.generic_name like '%".$searchValue."%' or a.strength like'%".$searchValue."%' or b.manufacturer_name like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_information a');
           $builder1->select("count(*) as allcount,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder1->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                 $builder1->having('stock < 10');
                 $builder1->groupBy('a.product_id');
                
                $query1       =  $builder1->countAllResults();
                $records      =  $query1;
                $totalRecords = $records;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_information a');
           $builder2->select("count(*) as allcount,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder2->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                  $builder2->having('stock < 10');
                  $builder2->groupBy('a.product_id');
                   $query2      =  $builder2->countAllResults();
                   $records     =   $query2;
         $totalRecordwithFilter = $records;
        ## Fetch records
          $builder3 = $this->db->table('product_information a');
          $builder3->select("a.product_name,a.generic_name,a.strength,b.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
          $builder3->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id');
            $builder3->having('stock < 10');
            $builder3->groupBy('a.product_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               } 
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
   
            $data[] = array( 
                'sl'               =>$sl,
                'product_name'     =>$record->product_name.'('.$record->strength.')',
                'manufacturer_name'=>$record->manufacturer_name,
                'generic_name'     =>$record->generic_name,
                'stock'            =>$record->stock,
                
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


        public function getexpiredMedicineList($postData=null)
    {
        $response = array();
        $date=date('Y-m-d');
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.product_name like '%".$searchValue."%' or a.generic_name like '%".$searchValue."%' or a.strength like'%".$searchValue."%' or b.batch_id like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_information a');
           $builder1->select("count(*) as allcount,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder1->join('product_purchase_details b','b.product_id=a.product_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                 $builder1->having('stock > 0');
                 $builder1->where('b.expeire_date <=', $date);
                 $builder1->groupBy('b.batch_id');
                 $builder1->groupBy('a.product_id');
                
                $query1       =  $builder1->countAllResults();
                $records      =  $query1;
                $totalRecords = $records;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_information a');
           $builder2->select("count(*) as allcount,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder2->join('product_purchase_details b','b.product_id=a.product_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                  $builder2->having('stock > 0');
                  $builder2->where('b.expeire_date <=', $date);
                  $builder2->groupBy('b.batch_id');
                  $builder2->groupBy('a.product_id');
                   $query2      =  $builder2->countAllResults();
                   $records     =   $query2;
         $totalRecordwithFilter = $records;
        ## Fetch records
          $builder3 = $this->db->table('product_information a');
          $builder3->select("b.*,a.product_name,a.generic_name,a.strength,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
          $builder3->join('product_purchase_details b','b.product_id=a.product_id','left');
            $builder3->having('stock > 0');
            $builder3->where('b.expeire_date <=', $date);
            $builder3->groupBy('b.batch_id');
            $builder3->groupBy('a.product_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               } 
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
   
            $data[] = array( 
                'sl'               =>$sl,
                'product_name'     =>$record->product_name.'('.$record->strength.')',
                'batch_id'         =>$record->batch_id,
                'expeire_date'     =>$record->expeire_date,
                'stock'            =>$record->stock,
                
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