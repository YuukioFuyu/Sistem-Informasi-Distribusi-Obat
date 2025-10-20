<?php namespace App\Modules\Hrm\Controllers;
class Attendance extends BaseController
{
   
   #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    
 
    public function index()
	{
        

	      $data['title']      = 'Attendance List';
        $data['module']     = "Hrm";
        $data['page']       = "attendance/attendance_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckattendanceList()
     {
        $postData = $this->request->getVar();
        $data     = $this->attendanceModel->getattendanceList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_attendance_form($id = null)
        {
       

        $data = [];
       $data['attendance'] = (object)$userLevelData = array(
        'id'              => ($this->request->getVar('id')?$this->request->getVar('id'):null),
        'employee_id'     => $this->request->getVar('employee_id', FILTER_SANITIZE_STRING),
        'date'            => $this->request->getVar('date', FILTER_SANITIZE_STRING),
        'sign_in'         => $this->request->getVar('sign_in',FILTER_SANITIZE_STRING),
    );



        if ($this->request->getMethod() == 'post') {
            
            $rules = [
                'employee_id' => ['label' => lan('employee'),'rules' => 'required'],
                'date'        => ['label' => lan('date'),'rules'     => 'required'],
                'sign_in'     => ['label' => lan('sign_in'),'rules'  => 'required'],
               
            ];
  

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $check = $this->attendanceModel->check_exist($userLevelData);
                if($check == false){
                if($this->attendanceModel->save_attendance($userLevelData)){
                   $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/attendance/attendance_list/'));  
            }else{
                 $this->session->setFlashdata('exception', lan('please_try_again'));
                return  redirect()->to(base_url('/attendance/attendance_list/'));
            }
        }else{
             $this->session->setFlashdata('exception', 'Already Signed In');
                return  redirect()->to(base_url('/attendance/add_attendance/')); 
        }
               
               
            }else{
             $this->attendanceModel->update_attendance($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/attendance/attendance_list/'));
               
            }

            }
        }

        $data['module']           = "Hrm";
        if(!empty($id)){
        $data['attendance']       = $this->attendanceModel->singledata($id); }
        $data['title']            = 'attendance';
        $data['employee_list']    = $this->attendanceModel->employee_list();
        $data['page']             = "attendance/attendance_form"; 
        return $this->template->layout($data);
    }

    public function delete_attendance($id = null)
    { 
        if ($this->attendanceModel->delete_attendance($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('attendance/attendance_list');
    }



   public function  bdtask_signout(){
     if ($this->request->getMethod() == 'post') {
    $rules = [
        'sign_out'          => ['label' => lan('sign_out'),'rules'  => 'required'],

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->attendanceModel->employee_signout();   
        $info['message']           = 'Successfully Saved';
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
      }
    }

   }


        public function report()
        {
        $from_date                = $this->request->getVar('from_date');
        $to_date                  = $this->request->getVar('to_date');
        $employee_id              = $this->request->getVar('employee_id');
        $data['employee_list']    = $this->attendanceModel->employee_list();
        if($employee_id && $from_date){
        $data['result']           = $this->attendanceModel->datewise_report($employee_id,$from_date,$to_date);
       }else{
         $data['result']          = [];
       }
        $data['from_date']        = $from_date;
        $data['to_date']          = $to_date;
        $data['employee_id']      = $employee_id;
        $data['module']           = "Hrm";
        $data['title']            = 'attendance';
        $data['page']             = "attendance/attendance_report"; 
        return $this->template->layout($data);
    }




   
}
