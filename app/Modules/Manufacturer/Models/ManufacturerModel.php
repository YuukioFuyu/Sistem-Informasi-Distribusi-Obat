<?php namespace App\Modules\Manufacturer\Models;
use App\Libraries\Permission;
class ManufacturerModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->permission = new Permission();
         $this->request = \Config\Services::request();
    }

    public function findAll()
    {
        $builder = $this->db->table('manufacturer_information');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('manufacturer_information')
                             ->where('manufacturer_id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_manufacturer($data=[]){
        $builder = $this->db->table('manufacturer_information');
         $add_manufacturer = $builder->insert($data);

         $manufacturer_id = $this->db->insertID();
          $coa = $this->headcode();
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="502000001";
            }
    $c_acc      = $manufacturer_id.'-'.$data['manufacturer_name'];
    $createby   = $this->session->get('id');
    $createdate = date('Y-m-d H:i:s');
       
    $manufacturer_coa = [
            'HeadCode'         => $headcode,
            'HeadName'         => $c_acc,
            'PHeadName'        => 'Account Payable',
            'HeadLevel'        => '3',
            'IsActive'         => '1',
            'IsTransaction'    => '1',
            'IsGL'             => '0',
            'HeadType'         => 'L',
            'IsBudget'         => '0',
            'manufacturer_id'  => $manufacturer_id,
            'IsDepreciation'   => '0',
            'DepreciationRate' => '0',
            'CreateBy'         => $createby,
            'CreateDate'       => $createdate,
        ];




        if($add_manufacturer){
               $acc_coatbl = $this->db->table('acc_coa');
               $acc_coatbl->insert($manufacturer_coa);
        }
        if(!empty($this->request->getVar('previous_balance'))){
        $this->previous_balance_add($this->request->getVar('previous_balance'), $manufacturer_id);
          }
        if($add_manufacturer){
        return true;
         }else{
        return false;
        }
    }

    public function update_manufacturer($data=[]){
     $query = $this->db->table('manufacturer_information');   
     $query->where('manufacturer_id', $data['manufacturer_id']);
     $cus_up =  $query->update($data);  

        $c_acc=$data['manufacturer_id'].'-'.$data["manufacturer_name"];
         $manufacturer_coa = [
             'HeadName'         => $c_acc
        ]; 
        if($cus_up){
        $coa_up = $this->db->table('acc_coa');   
        $coa_up->where('manufacturer_id', $data['manufacturer_id']);
       return  $coa_up->update($manufacturer_coa);    
        }else{
       return false;
        }
    }

    public function delete_manufacturer($id){
            $builder = $this->db->table('manufacturer_information');
            $builder->where('manufacturer_id', $id);
     $cus_info =  $builder->delete();
    if($cus_info){
     $coa = $this->db->table('acc_coa');
            $coa->where('manufacturer_id', $id);
     return $coa->delete();
    }else{
    return false;
     }
    }

   


        public function getmanufacturerList($postData=null){
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
            $searchQuery  = " (a.manufacturer_name like '%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('manufacturer_information a');
           $builder1->select("count(*) as allcount");
           $builder1->join('acc_coa b', 'a.manufacturer_id = b.manufacturer_id');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('manufacturer_information a');
           $builder2->select("count(*) as allcount");
           $builder2->join('acc_coa b', 'a.manufacturer_id = b.manufacturer_id');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('manufacturer_information a');
          $builder3->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
          $builder3->join('acc_coa b', 'a.manufacturer_id = b.manufacturer_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->groupBy('a.manufacturer_id');      
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
       if($this->permission->method('manufacturer_list','update')->access()){  
        $button .=' <a href="'.$base_url.'/manufacturer/edit_manufacturer/'.$record->manufacturer_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
      }

       if($this->permission->method('manufacturer_list','delete')->access()){ 
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/manufacturer/delete_manufacturer/'.$record->manufacturer_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
               'sl'                =>$sl,
                'manufacturer_name'=>$record->manufacturer_name,
                'address'          =>$record->address,
                'address2'         =>$record->address2,
                'mobile'           =>$record->mobile,
                'phone'            =>$record->phone,
                'email'            =>$record->emailnumber,
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
          $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='3' And HeadCode LIKE '502000%'");
        return $query->getRow();

    }

    public function countallmanufacturer(){
       return $all = $this->db->table('manufacturer_information')
                       ->countAllResults();
    }


    public function previous_balance_add($balance, $manufacturer_id)
    {

    $cusifo = $this->db->table('manufacturer_information')
                             ->where('manufacturer_id', $manufacturer_id)
                             ->get()
                             ->getRow();                
    $coainfo = $this->db->table('acc_coa')
                             ->where('manufacturer_id', $manufacturer_id)
                             ->get()
                             ->getRow();
    $manufacturer_headcode = $coainfo->HeadCode;
    $transaction_id = date('Ymdhis');
       

// manufacturer debit for previous balance
      $cosdr = array(
      'VNo'            =>  $transaction_id,
      'Vtype'          =>  'PR Balance',
      'VDate'          =>  date("Y-m-d"),
      'COAID'          =>  $manufacturer_headcode,
      'Narration'      =>  'manufacturer debit For '.$cusifo->manufacturer_name,
      'Debit'          =>  0,
      'Credit'         =>  $balance,
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
      'Narration'      =>  'Inventory Debit For Old sale For'.$cusifo->manufacturer_name,
      'Debit'          =>  $balance,
      'Credit'         => 0,//purchase price asbe
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



public function manufacturer_list()
{
        $data = $this->db->table('manufacturer_information a')
                            ->select('a.manufacturer_name,b.HeadCode')
                            ->join('acc_coa b','b.manufacturer_id = a.manufacturer_id')
                            ->get()
                            ->getResult();
        
       $list = array('' => 'Select Manufacturer Name');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->HeadCode]=$value->manufacturer_name;
            }
        }
        return $list;  
}

public function bdtask_checkmanufacturer_calculation($id)
 {
    $data = $this->db->table('product_purchase')
                            ->select('*')
                            ->where('manufacturer_id',$id)
                            ->countAllResults();

    return $data;
 }

}