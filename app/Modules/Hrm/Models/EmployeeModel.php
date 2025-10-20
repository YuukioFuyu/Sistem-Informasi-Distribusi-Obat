<?php namespace App\Modules\Hrm\Models;
use App\Libraries\Permission;
class EmployeeModel
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
    $builder = $this->db->table('employee_information');
		$builder->select("*");
        $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('employee_information')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_employee($data=[]){
        $builder = $this->db->table('employee_information');
         $add_employee = $builder->insert($data);
        $id = $this->db->insertID();
        $coa = $this->headcode();
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="502040001";
            }
    $c_acc=$id.'-'.$data['first_name'].''.$data['last_name'];
    $createby=$this->session->get('id');
    $createdate=date('Y-m-d H:i:s');
    $employee_coa = [
             'HeadCode'         => $headcode,
             'HeadName'         => $c_acc,
             'PHeadName'        => 'Employee Ledger',
             'HeadLevel'        => '3',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'L',
             'IsBudget'         => '0',
             'IsDepreciation'   => '0',
             'DepreciationRate' => '0',
             'CreateBy'         => $createby,
             'CreateDate'       => $createdate,
        ];

        if($add_employee){
         $coa = $this->db->table('acc_coa');
         $coa->insert($employee_coa);  
           return true;
        }else{
            return false;
        }
    }

     public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='3' And HeadCode LIKE '50204000%'");
        return $query->getRow();

    }

    public function update_employee($data=[]){
     $query = $this->db->table('employee_information');   
     $query->where('id', $data['id']);
     return $query->update($data);  

    }

    public function delete_employee($id){
        $employee_info =  $this->db->table('employee_information')
                             ->where('id', $id)
                             ->get()
                             ->getRow();
            $headcode = $id.'-'.$employee_info->first_name.''.$employee_info->last_name;
            $coa = $this->db->table('acc_coa');
            $coa->where('HeadName', $headcode);
            $coa->delete();

            $builder = $this->db->table('employee_information');
            $builder->where('id', $id);
     return $builder->delete();

      

    }

   


        public function getemployeeList($postData=null){
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
            $searchQuery  = " (a.first_name like '%".$searchValue."%' or a.last_name like'%".$searchValue."%' or a.country like'%".$searchValue."%' or c.designation like'%".$searchValue."%' or a.city like'%".$searchValue."%' or a.zip like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('employee_information a');
           $builder1->select("count(*) as allcount");
           $builder1->join('designation c','c.id = a.designation','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('employee_information a');
           $builder2->select("count(*) as allcount");
           $builder2->join('designation c','c.id = a.designation','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('employee_information a');
          $builder3->select("a.*,c.designation");
           $builder3->join('designation c','c.id = a.designation','left');
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
          $img = (!empty($record->image)?$record->image:'/assets/dist/img/employees/employee.jpg');
          $jsaction = "return confirm('Are You Sure ?')";
         $image = '<img src="'.$base_url.$img.'" class="img img-responsive" height="50" width="50">';
         if($this->permission->method('employee_list','update')->access()){   
        $button .=' <a href="'.$base_url.'/employee/edit_employee/'.$record->id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
           }
        if($this->permission->method('employee_list','delete')->access()){   
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/employee/delete_employee/'.$record->id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
   }
            $data[] = array( 
                'sl'               =>$sl,
                'first_name'       =>$record->first_name,
                'last_name'        =>$record->last_name,
                'designation'      =>$record->designation,
                'email'            =>$record->email,
                'phone'            =>$record->phone,
                'hrate'            =>$record->hrate,
                'blood_group'      =>$record->blood_group,
                'country'          =>$record->country,
                'image'            =>$image,
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


public function designation_list()
{
        $builder = $this->db->table('designation');
        $builder->select('*');
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Designation');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->id]=$value->designation;
            }
        }
        return $list;  
}


    


}