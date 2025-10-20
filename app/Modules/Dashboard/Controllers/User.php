<?php namespace App\Modules\Dashboard\Controllers;
class User extends BaseController
{
   #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function __construct()
    {
        
      $this->session = \Config\Services::session();
    }
           

   
    public function index()
    {
         if (!$this->session->get('isLogIn')){
        return redirect()->route('login');
    }

        $data['title']      = lan('user_list');
        $data['module']     = "Dashboard";
        $data['user']       = $this->userModel->findAll();
        $data['page']       = "user/user_list"; 
        return $this->template->layout($data);

    }

        public function add_user($id = null){
        $id = (!empty($id)?$id:$this->request->getVar('id'));
        $data = [];
        helper(['form','url']);
        $this->validation =  \Config\Services::validation();
        if(!empty($this->request->getFile('image'))){
            $this->validation->setRule('image', lan('image'), 'ext_in[image,png,jpg,jpeg,gif,ico]|is_image[image]');
        }

        if($this->validation->withRequest($this->request)->run() && $this->request->getFile('image')){

            $image_path = $this->imageupload->upload_image($this->request->getFile('image'), 'assets/dist/img/user/', $this->request->getVar('image'), 60, 70);
        } else {
            $image_path = "";
        }
        $old_image    = $this->request->getVar('old_image');
        $old_password = $this->request->getVar('old_password');
           $data['user'] = (object)$userLevelData = array(
            'id'          => ($this->request->getVar('id')?$this->request->getVar('id'):null),
            'firstname'   => $this->request->getVar('firstname', FILTER_SANITIZE_STRING),
            'lastname'    => $this->request->getVar('lastname', FILTER_SANITIZE_STRING),
            'email'       => $this->request->getVar('email', FILTER_SANITIZE_STRING),
            'password'    => (!empty($this->request->getVar('password', FILTER_SANITIZE_STRING))?md5($this->request->getVar('password')):$old_password),
            'about'       => $this->request->getVar('about', FILTER_SANITIZE_STRING),
            'image'       => (($image_path !='/')?$image_path:$old_image),
            'last_login'  => null,
            'last_logout' => null,
            'ip_address'  => null,
            'status'      => $this->request->getVar('status', FILTER_SANITIZE_STRING),
            'is_admin'    => $this->request->getVar('is_admin', FILTER_SANITIZE_STRING)
        );

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            if(empty($id)){
            $rules = [
                'firstname' => ['label' => lan('firstname'),'rules' => 'required|min_length[2]|max_length[20]'],
                'lastname'  => ['label' => lan('lastname'),'rules'  => 'required|min_length[2]|max_length[20]'],
                'email'     => ['label' => lan('email'),'rules'     => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]'],
                'password'  => ['label' => lan('password'),'rules'  => 'required|min_length[8]|max_length[255]'] ,
                
            ];
        }else{
             $rules = [
                'firstname' => ['label' => lan('firstname'),'rules' => 'required|min_length[2]|max_length[20]'],
                'lastname'  => ['label' => lan('lastname'),'rules'  => 'required|min_length[2]|max_length[20]'],
                'email'     => ['label' => lan('email'),'rules'     => 'required|min_length[6]|max_length[50]|valid_email'],
                
            ];
        }

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $this->userModel->save_user($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return redirect()->route('user/user_list');
               
            }else{
             $this->userModel->update_user($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             return redirect()->route('user/user_list');
               
            }

            }
        }

        $data['module']     = "Dashboard";
        if(!empty($id)){
        $data['user']       = $this->userModel->singledata($id);
             }
        $data['title']      = lan('add_user');
        $data['page']       = "user/add_user"; 
        return $this->template->layout($data);
    }


    public function delete_user($id = null)
    { 
        if ($this->userModel->delete_user($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('user/user_list');
    }
    
    
  public function send_usermail(){
      helper(['form','url']);
        $this->validation =  \Config\Services::validation();
    $email_id = $this->request->getVar('rec_email', FILTER_SANITIZE_STRING);
    $token = date('Ymdhis');
    $company_info = $this->userModel->get_company_info();
    $rules = [
                'rec_email' => ['label' => lan('email'),'rules' => 'required|valid_email|max_length[30]'],
            ];

  if (! $this->validate($rules)) {
    $data['status']    = 0;
    $data['exception'] = $this->validator->listErrors();
   }else{
   $checkmail = $this->userModel->check_email($email_id);
   if($checkmail > 0){
   $message = "click here for change your password ".base_url('recovery_form/').'?email='.$email_id.'&token='.$token;
   $email = \Config\Services::email();
   $email->setFrom($company_info->email, 'Password Recovery');
   $email->setTo($email_id);
   $email->setSubject('Recovery Password');
   $email->setMessage($message);
    $filename = '/img/yourPhoto.jpg';
    $email->attach($filename);
   //$email->send();
   if(!$email->send()){
     $data['status'] = 0;
    $data['exception'] = 'Email fail';
   
   }else{
    $this->userModel->token_set($email_id,$token);      
    $data['status'] = 1;
    $data['message'] = 'Email sent'; 
   }
   }else{
   $data['status'] = 0;
    $data['exception'] = 'Email Not Found';  
  }
  }
  
   echo json_encode($data);
   exit();
}

public function change_password()
{
             $data['email'] = $this->request->getGet('email');
             $data['token'] = $this->request->getGet('token');
             $data['title']      = 'change password';
             return view('template/password_recovery_form', $data);
}

public function update_password(){
    
    helper(['form','url']);
    $this->validation =  \Config\Services::validation();
    $email_id = $this->request->getVar('email', FILTER_SANITIZE_STRING);
    $new_password = $this->request->getVar('new_password', FILTER_SANITIZE_STRING);
    $token = $this->request->getVar('token');
    $rules = [
                'new_password' => ['label' => 'New Password','rules' => 'required|min_length[8]|max_length[20]'],
            ];

  if (! $this->validate($rules)) {
    $data['status']    = 0;
    $data['exception'] = $this->validator->listErrors();
   }else{
   $checktoken = $this->userModel->check_token($email_id,$token);
   if($checktoken > 0){
    $this->userModel->reset_password($email_id,$new_password);      
    $data['status'] = 1;
    $data['message'] = 'Your Password Successfully Changed'; 
   }else{
   $data['status'] = 0;
    $data['exception'] = 'The Link Expired';  
  }
  
  }
  
   echo json_encode($data);
   exit();
}

}
