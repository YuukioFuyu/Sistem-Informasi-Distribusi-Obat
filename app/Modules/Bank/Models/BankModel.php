<?php namespace App\Modules\Bank\Models;
use App\Libraries\Permission;
class BankModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
        $this->permission = new Permission();
         helper(['form','url']);
         $this->request = \Config\Services::request();
    }

    public function findAll()
    {
        $builder = $this->db->table('bank_information');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('bank_information')
                             ->where('bank_id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_bank($data=[]){
        $builder = $this->db->table('bank_information');
        $add_bank = $builder->insert($data);

         $bank_id = $this->db->insertID();
          $coa = $this->headcode();
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="102010200001";
            }
    $c_acc      = $bank_id.'-'.$data['bank_name'];
    $createby   = $this->session->get('id');
    $createdate = date('Y-m-d H:i:s');
       
    $bank_coa = [
             'HeadCode'         => $headcode,
             'HeadName'         => $data['bank_name'],
             'PHeadName'        => 'Cash At Bank',
             'HeadLevel'        => '4',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'A',
             'IsBudget'         => '0',
             'IsDepreciation'   => '0',
             'DepreciationRate' => '0',
             'bank_id'          => $bank_id,
             'CreateBy'         => $createby,
             'CreateDate'       => $createdate,
        ];




        if($add_bank){
               $acc_coatbl = $this->db->table('acc_coa');
               $acc_coatbl->insert($bank_coa);
        }
         if($add_bank){
        return true;
         }else{
        return false;
        }
    }

    public function update_bank($data=[]){
     $query = $this->db->table('bank_information');   
     $query->where('bank_id', $data['bank_id']);
     $cus_up =  $query->update($data);  

        $c_acc=$data["bank_name"];
         $bank_coa = [
             'HeadName'         => $c_acc
        ]; 
        if($cus_up){
        $coa_up = $this->db->table('acc_coa');   
        $coa_up->where('bank_id', $data['bank_id']);
       return  $coa_up->update($bank_coa);    
        }else{
       return false;
        }
    }

    public function delete_bank($id){
            $builder = $this->db->table('bank_information');
            $builder->where('bank_id', $id);
     $cus_info =  $builder->delete();
    if($cus_info){
     $coa = $this->db->table('acc_coa');
            $coa->where('bank_id', $id);
     return $coa->delete();
    }else{
    return false;
     }
    }

   


        public function getbankList($postData=null){
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
            $searchQuery  = " (a.bank_name like '%".$searchValue."%' or a.ac_name like '%".$searchValue."%' or a.ac_number like '%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('bank_information a');
           $builder1->select("count(*) as allcount");
           $builder1->join('acc_coa b', 'a.bank_id = b.bank_id');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('bank_information a');
           $builder2->select("count(*) as allcount");
           $builder2->join('acc_coa b', 'a.bank_id = b.bank_id');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('bank_information a');
          $builder3->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
          $builder3->join('acc_coa b', 'a.bank_id = b.bank_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->groupBy('a.bank_id');      
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
          $img = (!empty($record->signature_pic)?$record->signature_pic:'/assets/dist/img/bank/bank.jpg');
           $image = '<img src="'.$base_url.$img.'" class="img img-responsive" height="50" width="50">';
         if($this->permission->method('bank_list','update')->access()){  
        $button .=' <a href="'.$base_url.'/bank/edit_bank/'.$record->bank_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
              }

        if($this->permission->method('bank_list','delete')->access()){       
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/bank/delete_bank/'.$record->bank_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
   }
            $data[] = array( 
               'sl'                =>$sl,
                'bank_name'        =>$record->bank_name,
                'ac_name'          =>$record->ac_name,
                'ac_number'        =>$record->ac_number,
                'branch'           =>$record->branch,
                'signature_pic'    =>$image,
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
         $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102010200%'");
        return $query->getRow();

    }



}