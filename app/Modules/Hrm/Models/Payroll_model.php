<?php namespace App\Modules\Hrm\Models;
use CodeIgniter\I18n\Time;
use App\Libraries\Permission;
class Payroll_model
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
        helper(['form','url']);
        $this->permission = new Permission();
        $this->request = \Config\Services::request();
    }



    public function singledata($id){
        $builder = $this->db->table('salary_benefit')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

       public function benefit_list(){
        $list = $this->db->table('salary_benefit')
                             ->get()
                             ->getResultArray(); 
    return $list;


    }

    public function save_salary_benefit($data=[]){
        $builder = $this->db->table('salary_benefit');
         $add_salary_benefit = $builder->insert($data);
       
        if($add_salary_benefit){
           return true;
        }else{
            return false;
        }
    }

    public function check_exist($data=[]){
         $exitstdata = $this->db->table('salary_benefit')
                             ->where('benefit_name', $data['benefit_name'])
                             ->countAllResults(); 
                            
               if($exitstdata > 0){
                return true;
               }else{
                return false;
               }              
    }

   

    public function update_salary_benefit($data=[]){
     $query = $this->db->table('salary_benefit');   
     $query->where('id', $data['id']);
     return $query->update($data);  

    }

    public function delete_salary_benefit($id){
            $builder = $this->db->table('salary_benefit');
            $builder->where('id', $id);
     return $builder->delete();

    }

    public function salary_typeName()
    {
        return  $this->db->table('salary_benefit')
                             ->where('benefit_type', 1)
                             ->get()
                             ->getResult(); 
    }

   public function salary_typedName()
    {
        return  $this->db->table('salary_benefit')
                             ->where('benefit_type', 2)
                             ->get()
                             ->getResult(); 
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


   public function salary_setup_create($data = array())
    {
       
         $builder = $this->db->table('employee_salary_setup');
         $add_salary_setup = $builder->insert($data);
       
        if($add_salary_setup){
           return true;
        }else{
            return false;
        }
    }



      public function check_exist_salarysetup($employee_id){
              $exitstdata = $this->db->table('employee_salary_setup')
                             ->where('employee_id', $employee_id)
                             ->countAllResults(); 
                            
               if($exitstdata > 0){
                return $exitstdata;
               }else{
                return $exitstdata;
               }             

    }

  
          public function getsalarysetupList($postData=null){
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
            $searchQuery  = " (c.first_name like '%".$searchValue."%' or c.last_name like'%".$searchValue."%' or a.create_date like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('employee_salary_setup a');
           $builder1->select("count(*) as allcount");
           $builder1->join('employee_information c','c.id = a.employee_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
            $builder1->groupBy('a.employee_id');    
            $query1       = $builder1->countAllResults();
            $totalRecords = $query1;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('employee_salary_setup a');
           $builder2->select("count(*) as allcount");
           $builder2->join('employee_information c','c.id = a.employee_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                 $builder2->groupBy('a.employee_id');
                 $query2      =  $builder2->countAllResults();
          $totalRecordwithFilter = $query2;
        ## Fetch records
          $builder3 = $this->db->table('employee_salary_setup a');
          $builder3->select("a.*,c.first_name,c.last_name");
           $builder3->join('employee_information c','c.id = a.employee_id','left');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }     
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
          $builder3->groupBy('a.employee_id');
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();
         
          $jsaction = "return confirm('Are You Sure ?')";
      if($this->permission->method('salary_setup_list','update')->access()){
        $button .=' <a href="'.$base_url.'/payroll/edit_salary_setup/'.$record->employee_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
       }
       if($this->permission->method('salary_setup_list','delete')->access()){
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/payroll/delete_salsetup/'.$record->employee_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
                'sl'               =>$sl,
                'employee'         =>$record->first_name.' '.$record->last_name,
                'salary_type'      =>($record->sal_type == 2?lan('salary'):lan('hourly')),
                'create_date'      =>$record->create_date,
                'gross_salary'     =>$record->gross_salary,
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

 
    public function salary_s_updateForm($id)
    {
        return $data = $this->db->table('employee_salary_setup')
                             ->where('employee_id',$id)
                             ->get()
                             ->getResultArray(); 
    }

     public function salary_amountlft($id){
      return $data = $this->db->table('employee_salary_setup a')
                     ->select('a.*,b.benefit_type,b.benefit_name')
                     ->join('salary_benefit b','b.id=a.salary_type_id')
                     ->where('a.employee_id',$id)
                     ->where('b.benefit_type',2)
                     ->get()
                     ->getResult(); 
    }

        public function salary_amount($id){
         return $data = $this->db->table('employee_salary_setup a')
                     ->select('a.*,b.benefit_type,b.benefit_name')
                     ->join('salary_benefit b','b.id=a.salary_type_id')
                     ->where('a.employee_id',$id)
                     ->where('b.benefit_type',1)
                     ->get()
                     ->getResult(); 
    }



       public function employee_informationId($id)
    {
        return $result = $this->db->table('employee_information')
                                  ->select('*')
                                  ->where('id',$id)
                                  ->get()
                                  ->getResultArray();

    }


    public function update_sal_stup($data = array())
    {
    $term = array('employee_id' => $data['employee_id'], 'salary_type_id' => $data['salary_type_id']);
     $salupdate = $this->db->table('employee_salary_setup');   
     $salupdate->where($term);
     return $salupdate->update($data); 
    }



      public function emp_salstup_delete($id = null)
      {
        $builder = $this->db->table('employee_salary_setup');
        $builder->where('employee_id', $id);
        $builder->delete();
        if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }
    } 

    public function bdtask_006_salary_generate($data = array())
    {

         $builder = $this->db->table('salary_sheet_generate');
         $salary_generate = $builder->insert($data);
       
        if($salary_generate){
           return true;
        }else{
            return false;
        }
    }


    public function get_salarygenerateList($postData=null)
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
            $searchQuery  = " (c.firstname like '%".$searchValue."%' or c.lastname like'%".$searchValue."%' or a.date like'%".$searchValue."%' or a.gdate like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('salary_sheet_generate a');
           $builder1->select("count(*) as allcount");
           $builder1->join('user c','c.id = a.generate_by','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }   
            $query1       = $builder1->countAllResults();
            $totalRecords = $query1;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('salary_sheet_generate a');
           $builder2->select("count(*) as allcount");
           $builder2->join('user c','c.id = a.generate_by','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                 $query2      =  $builder2->countAllResults();
          $totalRecordwithFilter = $query2;
        ## Fetch records
          $builder3 = $this->db->table('salary_sheet_generate a');
          $builder3->select("a.*,c.firstname,c.lastname");
           $builder3->join('user c','c.id = a.generate_by','left');
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
          if($this->permission->method('salary_sheet','delete')->access()){
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/payroll/delete_salaryshett/'.$record->ssg_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
            $data[] = array( 
                'sl'               =>$sl,
                'generate_by'      =>$record->firstname.' '.$record->lastname,
                'gdate'            =>$record->gdate ,
                'date'             =>$record->date,
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


        public function sal_generate_delete($id = null) {
        $esalary = $this->db->table('employee_salary_payment');
        $esalary->where('generate_id', $id);
        $esalary->delete();

        $gtable = $this->db->table('salary_sheet_generate');
        $gtable->where('ssg_id', $id);
        $gtable->delete();
        if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }
    
    } 


    public function get_salarypaymentList($postData=null)
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
            $searchQuery  = " (c.first_name like '%".$searchValue."%' or c.last_name like'%".$searchValue."%' or a.create_date like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('employee_salary_payment a');
           $builder1->select("count(*) as allcount");
           $builder1->join('employee_information c','c.id = a.employee_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }   
            $query1       = $builder1->countAllResults();
            $totalRecords = $query1;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('employee_salary_payment a');
           $builder2->select("count(*) as allcount");
           $builder2->join('employee_information c','c.id = a.employee_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                 $query2      =  $builder2->countAllResults();
          $totalRecordwithFilter = $query2;
        ## Fetch records
          $builder3 = $this->db->table('employee_salary_payment a');
          $builder3->select("a.*,c.first_name,c.last_name,d.firstname,d.lastname");
          $builder3->join('employee_information c','c.id = a.employee_id','left');
          $builder3->join('user d','d.id = a.paid_by','left');
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
          $params = $record->emp_sal_pay_id.",".$record->employee_id.","."$record->total_salary".","."$record->total_working_minutes".","."$record->working_period".","."'$record->salary_month'";
         $payslip = '<a href="'.base_url('payroll/payslip/'.$record->emp_sal_pay_id).'" class="btn btn-primary-soft">'.lan('payslip').'</a>';
           
         $button .= ' <button class="client-add-btn btn btn-success" type="button" aria-hidden="true" onclick="payment_modal('.$params.')">'.lan('pay_now').'</button>';
            $data[] = array( 
                'sl'                    =>$sl,
                'employee'              =>$record->first_name.' '.$record->last_name,
                'total_salary'          =>$record->total_salary ,
                'total_working_minutes' =>number_format($record->total_working_minutes,2),
                'working_period'        =>$record->working_period,
                'payment_due'           =>$record->payment_due,
                'payment_date'          =>$record->payment_date,
                'paid_by'               =>$record->firstname.' '.$record->lastname,
                'salary_month'          =>$record->salary_month,
                'button'                =>($record->payment_due == 'paid'?$payslip:$button),
                
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


    public function update_payment($data = array())
    {
     $salupdate = $this->db->table('employee_salary_payment');   
     $salupdate->where('emp_sal_pay_id', $data["emp_sal_pay_id"]);
     return $salupdate->update($data); 
    }



    public function salary_paymentinfo($id = null){
            return $result = $this->db->table('employee_salary_payment pment')
                                        ->select('count(DISTINCT(pment.emp_sal_pay_id)) as emp_sal_pay_id,pment.*,p.id as employee_id,p.first_name,p.last_name,desig.designation as position_name,p.hrate as basic,p.rate_type as salarytype')   
                                        ->join('employee_information p', 'pment.employee_id = p.id', 'left')
                                        ->join('designation desig', 'desig.id = p.designation', 'left')
                                        ->where('pment.emp_sal_pay_id',$id)
                                        ->groupBy('pment.emp_sal_pay_id')
                                        ->get()
                                        ->getResultArray();

    }

    public function salary_addition_fields($id)
    {
        return $result = $this->db->table('employee_salary_setup')
                             ->select('employee_salary_setup.*,salary_benefit.*') 
                             ->join('salary_benefit','salary_benefit.id=employee_salary_setup.salary_type_id')
                             ->where('employee_salary_setup.employee_id',$id)
                             ->where('salary_benefit.benefit_type',1)
                             ->get()
                             ->getResult();
    }


    public function salary_deduction_fields($id){
        return $result = $this->db->table('employee_salary_setup')
                                 ->select('employee_salary_setup.*,salary_benefit.*') 
                                 ->join('salary_benefit','salary_benefit.id=employee_salary_setup.salary_type_id')
                                 ->where('employee_salary_setup.employee_id',$id)
                                 ->where('salary_benefit.benefit_type',2)
                                 ->get()
                                 ->getResult();
    }
    
        public function setting_data()
    {
          $setting = $this->db->table('setting')
                             ->get()
                             ->getRow();  
                             return $setting;
    }

}