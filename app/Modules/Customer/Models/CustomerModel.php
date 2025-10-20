<?php namespace App\Modules\Customer\Models;
use App\Libraries\Permission;
class CustomerModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->request = \Config\Services::request();
         $this->permission = new Permission();
    }

    public function findAll()
    {
        $builder = $this->db->table('customer_information');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('customer_information')
                             ->where('customer_id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_customer($data=[]){
        $builder = $this->db->table('customer_information');
         $add_customer = $builder->insert($data);

         $customer_id = $this->db->insertID();
          $coa = $this->headcode();
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="102030000001";
            }
    $c_acc      = $customer_id.'-'.$data['customer_name'];
    $createby   = $this->session->get('id');
    $createdate = date('Y-m-d H:i:s');
       
    $customer_coa = [
             'HeadCode'         => $headcode,
             'HeadName'         => $c_acc,
             'PHeadName'        => 'Customer Receivable',
             'HeadLevel'        => '4',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'A',
             'IsBudget'         => '0',
             'IsDepreciation'   => '0',
             'DepreciationRate' => '0',
             'customer_id'      => $customer_id,
             'CreateBy'         => $createby,
             'CreateDate'       => $createdate,
        ];

        if($add_customer){
               $acc_coatbl = $this->db->table('acc_coa');
               $acc_coatbl->insert($customer_coa);
        }
        if($add_customer && !empty($this->request->getVar('previous_balance'))){
        $this->previous_balance_add($this->request->getVar('previous_balance'), $customer_id);
          }
        if($add_customer){
        return true;
         }else{
        return false;
        }
    }

    public function update_customer($data=[]){
     $query = $this->db->table('customer_information');   
     $query->where('customer_id', $data['customer_id']);
     $cus_up =  $query->update($data);  

        $c_acc=$data['customer_id'].'-'.$data["customer_name"];
         $customer_coa = [
             'HeadName'         => $c_acc
        ]; 
        if($cus_up){
        $coa_up = $this->db->table('acc_coa');   
        $coa_up->where('customer_id', $data['customer_id']);
       return  $coa_up->update($customer_coa);    
        }else{
       return false;
        }
    }

    public function delete_customer($id){
            $builder = $this->db->table('customer_information');
            $builder->where('customer_id', $id);
     $cus_info =  $builder->delete();
    if($cus_info){
     $coa = $this->db->table('acc_coa');
            $coa->where('customer_id', $id);
     return $coa->delete();
    }else{
    return false;
     }
    }

   


        public function getCustomerList($postData=null){
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
            $searchQuery  = " (a.customer_name like '%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('customer_information a');
           $builder1->select("count(*) as allcount");
           $builder1->join('acc_coa b', 'a.customer_id = b.customer_id');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                   $query1   =  $builder1->get();
                   $records =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('customer_information a');
           $builder2->select("count(*) as allcount");
           $builder2->join('acc_coa b', 'a.customer_id = b.customer_id');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('customer_information a');
          $builder3->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
          $builder3->join('acc_coa b', 'a.customer_id = b.customer_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->groupBy('a.customer_id');      
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
       if($this->permission->method('customer_list','update')->access()){  
        $button .=' <a href="'.$base_url.'/customer/edit_customer/'.$record->customer_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
           }
            if($this->permission->method('customer_list','delete')->access()){  
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/customer/delete_customer/'.$record->customer_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
               'sl'                =>$sl,
                'customer_name'    =>$record->customer_name,
                'address'          =>$record->customer_address,
                'address2'         =>$record->address2,
                'mobile'           =>$record->customer_mobile,
                'phone'            =>$record->phone,
                'email'            =>$record->customer_email,
                'email_address'    =>$record->email_address,
                'contact'          =>$record->contact,
                'fax'              =>$record->fax,
                'city'             =>$record->city,
                'state'            =>$record->state,
                'zip'              =>$record->zip,
                'country'          =>$record->country,
                'balance'          =>(!empty($record->balance)?$record->balance:0),
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }



    public function getCreditCustomerList($postData=null)
    {
         $response        = array();
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.customer_name like '%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('customer_information a');
           $builder1->select("((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
           $builder1->join('acc_coa b', 'a.customer_id = b.customer_id');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
            $builder1->having('balance > 0');
                
            $query1       =  $builder1->get();
            $records      =   $query1->getResult();
            $totalRecords = count($records);

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('customer_information a');
           $builder2->select("((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
           $builder2->join('acc_coa b', 'a.customer_id = b.customer_id');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
            $builder2->having('balance > 0');
            $query2      =  $builder2->get();
            $records     =   $query2->getResult();
            $totalRecordwithFilter = count($records);
        ## Fetch records
          $builder3 = $this->db->table('customer_information a');
          $builder3->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
          $builder3->join('acc_coa b', 'a.customer_id = b.customer_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->having('balance > 0');
         $builder3->groupBy('a.customer_id');      
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
       if($this->permission->method('customer_list','update')->access()){ 
        $button .=' <a href="'.$base_url.'/customer/edit_customer/'.$record->customer_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
                   }
       if($this->permission->method('customer_list','delete')->access()){  
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/customer/delete_customer/'.$record->customer_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
               'sl'                =>$sl,
                'customer_name'    =>$record->customer_name,
                'address'          =>$record->customer_address,
                'address2'         =>$record->address2,
                'mobile'           =>$record->customer_mobile,
                'phone'            =>$record->phone,
                'email'            =>$record->customer_email,
                'email_address'    =>$record->email_address,
                'contact'          =>$record->contact,
                'fax'              =>$record->fax,
                'city'             =>$record->city,
                'state'            =>$record->state,
                'zip'              =>$record->zip,
                'country'          =>$record->country,
                'balance'          =>(!empty($record->balance)?$record->balance:0),
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response;  
    }


        public function getPaidCustomerList($postData=null)
    {
         $response        = array();
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.customer_name like '%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('customer_information a');
           $builder1->select("((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
           $builder1->join('acc_coa b', 'a.customer_id = b.customer_id');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
            $builder1->having('balance <= 0');
                
            $query1       =  $builder1->get();
            $records      =   $query1->getResult();
            $totalRecords = count($records);

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('customer_information a');
           $builder2->select("((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
           $builder2->join('acc_coa b', 'a.customer_id = b.customer_id');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
            $builder2->having('balance <= 0');
            $query2      =  $builder2->get();
            $records     =   $query2->getResult();
            $totalRecordwithFilter = count($records);
        ## Fetch records
          $builder3 = $this->db->table('customer_information a');
          $builder3->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
          $builder3->join('acc_coa b', 'a.customer_id = b.customer_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->having('balance <= 0');
         $builder3->groupBy('a.customer_id');      
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
      if($this->permission->method('customer_list','update')->access()){ 
        $button .=' <a href="'.$base_url.'/customer/edit_customer/'.$record->customer_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
      }
      if($this->permission->method('customer_list','delete')->access()){ 
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/customer/delete_customer/'.$record->customer_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
               'sl'                =>$sl,
                'customer_name'    =>$record->customer_name,
                'address'          =>$record->customer_address,
                'address2'         =>$record->address2,
                'mobile'           =>$record->customer_mobile,
                'phone'            =>$record->phone,
                'email'            =>$record->customer_email,
                'email_address'    =>$record->email_address,
                'contact'          =>$record->contact,
                'fax'              =>$record->fax,
                'city'             =>$record->city,
                'state'            =>$record->state,
                'zip'              =>$record->zip,
                'country'          =>$record->country,
                'balance'          =>(!empty($record->balance)?$record->balance:0),
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


        public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '1020300%'");
        return $query->getRow();

    }


    public function previous_balance_add($balance, $customer_id)
    {

    $cusifo = $this->db->table('customer_information')
                             ->where('customer_id', $customer_id)
                             ->get()
                             ->getRow();                
    $coainfo = $this->db->table('acc_coa')
                             ->where('customer_id', $customer_id)
                             ->get()
                             ->getRow();
    $customer_headcode = $coainfo->HeadCode;
    $transaction_id = date('Ymdhis');
       

// Customer debit for previous balance
      $cosdr = array(
      'VNo'            =>  $transaction_id,
      'Vtype'          =>  'PR Balance',
      'VDate'          =>  date("Y-m-d"),
      'COAID'          =>  $customer_headcode,
      'Narration'      =>  'Customer debit For '.$cusifo->customer_name,
      'Debit'          =>  $balance,
      'Credit'         =>  0,
      'IsPosted'       => 1,
      'CreateBy'       => $this->session->get('id'),
      'CreateDate'     => date('Y-m-d H:i:s'),
      'IsAppove'       => 1
    );
       $inventory = array(
      'VNo'            =>  $transaction_id,
      'Vtype'          =>  'PR Balance',
      'VDate'          =>  date("Y-m-d"),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory credit For Old sale For'.$cusifo->customer_name,
      'Debit'          =>  0,
      'Credit'         =>  $balance,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $this->session->get('id'),
      'CreateDate'     => date('Y-m-d H:i:s'),
      'IsAppove'       => 1
    ); 

       
        if(!empty($balance)){
               $acc_taranstbl = $this->db->table('acc_transaction');
               $acc_taranstbl->insert($cosdr);
               $acc_taranstbl->insert($inventory);
        }
    }

      public function customer_list()
{
        $data = $this->db->table('customer_information a')
                            ->select('a.customer_name,b.HeadCode')
                            ->join('acc_coa b','b.customer_id = a.customer_id')
                            ->get()
                            ->getResult();
        
       $list = array('' => 'Select Customer Name');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->HeadCode]=$value->customer_name;
            }
        }
        return $list;  
}


 public function bdtask_checkcustomer_calculation($id)
 {
    $data = $this->db->table('invoice')
                            ->select('*')
                            ->where('customer_id',$id)
                            ->countAllResults();

    return $data;
 }
}