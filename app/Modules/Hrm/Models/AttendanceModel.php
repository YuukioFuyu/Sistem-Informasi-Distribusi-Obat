<?php namespace App\Modules\Hrm\Models;
use CodeIgniter\I18n\Time;
use App\Libraries\Permission;
class AttendanceModel
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
    $builder = $this->db->table('employee_information');
		$builder->select("*");
        $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('attendance')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_attendance($data=[]){
        $builder = $this->db->table('attendance');
         $add_attendance = $builder->insert($data);
       
        if($add_attendance){
           return true;
        }else{
            return false;
        }
    }

    public function check_exist($data=[]){
         $exitstdata = $this->db->table('attendance')
                             ->where('employee_id', $data['employee_id'])
                             ->where('date', $data['date'])
                             ->countAllResults(); 
                            
               if($exitstdata > 0){
                return true;
               }else{
                return false;
               }              
    }

   

    public function update_attendance($data=[]){
     $query = $this->db->table('attendance');   
     $query->where('id', $data['id']);
     return $query->update($data);  

    }

    public function delete_attendance($id){
            $builder = $this->db->table('attendance');
            $builder->where('id', $id);
     return $builder->delete();

      

    }

   


        public function getattendanceList($postData=null){
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
            $searchQuery  = " (b.first_name like '%".$searchValue."%' or b.last_name like'%".$searchValue."%' or a.date like'%".$searchValue."%' or a.sign_in like'%".$searchValue."%' or a.sign_out like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('attendance a');
           $builder1->select("count(*) as allcount");
           $builder1->join('employee_information b','b.id = a.employee_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('attendance a');
           $builder2->select("count(*) as allcount");
           $builder2->join('employee_information b','b.id = a.employee_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('attendance a');
          $builder3->select("a.*,b.first_name,b.last_name");
           $builder3->join('employee_information b','b.id = a.employee_id','left');
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
         
          $jsaction = "return confirm('Are You Sure ?')";
       if($this->permission->method('attendance_list','update')->access()){ 
        $button .=' <a href="'.$base_url.'/attendance/edit_attendance/'.$record->id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
        }
        if($this->permission->method('attendance_list','delete')->access()){ 
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/attendance/delete_attendance/'.$record->id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
       $signouts = ' <button class="client-add-btn btn btn-success" type="button" aria-hidden="true" onclick="singout_modal('.$record->id.')">'.lan('sign_out').'</button>';
            $data[] = array( 
                'sl'               =>$sl,
                'employee'         =>$record->first_name.' '.$record->last_name,
                'date'             =>$record->date,
                'sign_in'          =>$record->sign_in,
                'sign_out'         =>($record->sign_out?$record->sign_out:$signouts),
                'staytime'         =>$record->staytime,
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


public function employee_list()
{
        $builder = $this->db->table('employee_information');
        $builder->select('*');
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Employee');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->id]=$value->first_name.' '.$value->last_name;
            }
        }
        return $list;  
}


  public function employee_signout(){
    $id = $this->request->getVar('attendance_id');
   $attendance_info = $this->db->table('attendance')
                             ->select('*')
                             ->where('id',$id)
                             ->get()
                             ->getRow();
   $sign_out =  $this->request->getVar('sign_out',FILTER_SANITIZE_STRING);
   $sign_in  =  $attendance_info->sign_in;

    $in=new \DateTime($sign_in);
    $Out=new \DateTime($sign_out);
    $interval=$in->diff($Out);
    $stay =  $interval->format('%H:%I:%S');
     $sign_outdata = array(
        'sign_out'         => $this->request->getVar('sign_out',FILTER_SANITIZE_STRING),
        'staytime'         => $stay,
    );

     $query = $this->db->table('attendance');   
     $query->where('id', $id);
      $updata = $query->update($sign_outdata); 
      if($updata){
        return true;
      }else{
        return false;
      } 
  }  


  public function datewise_report($employee_id,$from_date,$to_date)
  {
     $data = $this->db->table('attendance a')
                             ->select('a.*,b.first_name,b.last_name')
                             ->join('employee_information b','a.employee_id=b.id')
                             ->where('a.date >=', $from_date)
                             ->where('a.date <=', $to_date)
                             ->where('a.employee_id', $employee_id)
                             ->get()
                             ->getResultArray(); 
        return $data;

  }


}