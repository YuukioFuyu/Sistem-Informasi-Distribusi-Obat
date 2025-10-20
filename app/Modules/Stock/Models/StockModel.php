<?php namespace App\Modules\Stock\Models;

class StockModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->request = \Config\Services::request();
    }

    

        public function getstockList($postData=null){
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
            $searchQuery  = " (a.product_name like '%".$searchValue."%' or a.strength like '%".$searchValue."%' or a.price like'%".$searchValue."%' or a.manufacturer_price like'%".$searchValue."%' or m.manufacturer_name like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_information a');
           $builder1->select("count(*) as allcount,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder1->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =  $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_information a');
           $builder2->select("count(*) as allcount,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder2->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }

                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('product_information a');
          $builder3->select("a.*,
                a.product_name,
                a.product_id,
                a.strength,
                a.manufacturer_price,
                a.box_size,
                m.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock',(select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`) as 'total_in',(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) as 'total_out',(select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2) as 'total_purchase_return',(select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) as 'total_sale_return'
                ");
          $builder3->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
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
                 $button = '';
          $base_url = base_url();
               
            $data[] = array( 
                'sl'                =>  $sl,
                'product_name'      =>  $record->product_name.'('.$record->strength.')',
                'manufacturer_name' =>  $record->manufacturer_name,
                'strength'          =>  $record->strength,
                'sales_price'       =>  $record->price,
                'purchase_p'        =>  $record->manufacturer_price,
                'totalPurchaseQnty' =>  ($record->total_in?$record->total_in:0) + ($record->total_sale_return?$record->total_sale_return:0),
                'totalSalesQnty'    =>  ($record->total_out?$record->total_out:0) + ($record->total_purchase_return?$record->total_purchase_return:0),
                'stok_quantity'     =>  $record->stock,
                'stock_box'         =>  $record->stock/$record->box_size,
                'total_sale_price'  =>  $record->stock*number_format($record->price,2),
                'purchase_total'    =>  $record->stock*number_format($record->manufacturer_price,2),
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



    public function getCheckBatchStock($postData=null){
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
            $searchQuery  = " (m.product_name like '%".$searchValue."%' or a.batch_id like '%".$searchValue."%' or a.expeire_date like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_purchase_details a');
           $builder1->select("count(*) as allcount");
           $builder1->join('product_information m','m.product_id = a.product_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                $builder1->groupBy('a.batch_id');
                $builder1->groupBy('a.product_id');
                $query1       =  $builder1->countAllResults();
                $records      =  $query1;
                $totalRecords = $records;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_purchase_details a');
           $builder2->select("count(*) as allcount");
           $builder2->join('product_information m','m.product_id = a.product_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                $builder2->groupBy('a.batch_id');
                $builder2->groupBy('a.product_id');
                $query2      =  $builder2->countAllResults();
                $records     =  $query2;
         $totalRecordwithFilter = $records;
        ## Fetch records
          $builder3 = $this->db->table('product_purchase_details a');
          $builder3->select("a.*,
                m.product_name,
                m.strength,
                m.box_size,
                ");
          $builder3->join('product_information m','m.product_id = a.product_id','left');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->groupBy('a.batch_id');
         $builder3->groupBy('a.product_id');
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();

          $stockout = $this->db->table('invoice_details')
                            ->select("SUM(quantity) as totalSalesQnty")
                            ->where('product_id',$record->product_id)
                            ->where('batch_id',$record->batch_id)
                            ->get()
                            ->getRow();

         $stockin = $this->db->table('product_purchase_details')
                            ->select("SUM(quantity) as totalPurchaseQnty")
                            ->where('product_id',$record->product_id)
                            ->where('batch_id',$record->batch_id)
                            ->get()
                            ->getRow();

          $salesreturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_sales_return")
                            ->where('product_id',$record->product_id)
                            ->where('batch_id',$record->batch_id)
                            ->where('usablity',1)
                            ->get()
                            ->getRow();
          
          $purchasereturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_purchase_return")
                            ->where('product_id',$record->product_id)
                            ->where('batch_id',$record->batch_id)
                            ->where('usablity',2)
                            ->get()
                            ->getRow();   


           $stock_qty = (!empty($stockin->totalPurchaseQnty)?$stockin->totalPurchaseQnty:0)-(!empty($stockout->totalSalesQnty)?$stockout->totalSalesQnty:0) + ($salesreturn->total_sales_return?$salesreturn->total_sales_return:0) - ($purchasereturn->total_purchase_return?$purchasereturn->total_purchase_return:0);

               
            $data[] = array( 
                 'sl'              =>   $sl,
                'product_name'     =>  $record->product_name,
                'strength'         =>  $record->strength,
                'batch_id'         =>  $record->batch_id,
                'expeire_date'     =>  $record->expeire_date,
                'inqty'            =>  (!empty($stockin->totalPurchaseQnty)?$stockin->totalPurchaseQnty:0) + ($salesreturn->total_sales_return?$salesreturn->total_sales_return:0),
                'outqty'           =>  (!empty($stockout->totalSalesQnty)?$stockout->totalSalesQnty:0) + ($purchasereturn->total_purchase_return?$purchasereturn->total_purchase_return:0),
                'stock'            =>  $stock_qty,
                'stock_box'        =>  $stock_qty/($record->box_size?$record->box_size:1),
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



/*available stock list*/
        public function getavailable_stockList($postData=null){
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
            $searchQuery  = " (a.product_name like '%".$searchValue."%' or a.strength like '%".$searchValue."%' or a.price like'%".$searchValue."%' or a.manufacturer_price like'%".$searchValue."%' or m.manufacturer_name like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_information a');
           $builder1->select("((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder1->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
          
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
               $builder1->having('stock > 0');  
                $query1       =  $builder1->get();
                $records      =  $query1->getResult();
                $totalRecords = count($records);

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_information a');
           $builder2->select("((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock'");
           $builder2->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
           
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
             $builder2->having('stock > 0');
                   $query2      =  $builder2->get();
                   $records     =  $query2->getResult();
         $totalRecordwithFilter = count($records);
        ## Fetch records
          $builder3 = $this->db->table('product_information a');
          $builder3->select("a.*,
                a.product_name,
                a.product_id,
                a.strength,
                a.manufacturer_price,
                a.box_size,
                m.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'stock',(select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`) as 'total_in',(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) as 'total_out',(select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2) as 'total_purchase_return',(select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) as 'total_sale_return'
                ");
          $builder3->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->having('stock > 0');  
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();
               
            $data[] = array( 
                'sl'                =>  $sl,
                'product_name'      =>  $record->product_name.'('.$record->strength.')',
                'manufacturer_name' =>  $record->manufacturer_name,
                'strength'          =>  $record->strength,
                'sales_price'       =>  $record->price,
                'purchase_p'        =>  $record->manufacturer_price,
                'totalPurchaseQnty' =>  ($record->total_in?$record->total_in:0) + ($record->total_sale_return?$record->total_sale_return:0),
                'totalSalesQnty'    =>  ($record->total_out?$record->total_out:0) + ($record->total_purchase_return?$record->total_purchase_return:0),
                'stok_quantity'     =>  $record->stock,
                'stock_box'         =>  $record->stock/$record->box_size,
                'total_sale_price'  =>  $record->stock*$record->price,
                'purchase_total'   =>   $record->stock*$record->manufacturer_price,
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