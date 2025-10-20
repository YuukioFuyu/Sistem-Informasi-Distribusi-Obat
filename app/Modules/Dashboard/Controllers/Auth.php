<?php namespace App\Modules\Dashboard\Controllers;

class Auth extends BaseController
{
    
 #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    


   public function index()
    {  

 if ($this->session->get('isLogIn')){
        return redirect()->route('dashboard/home');
    }
       $data = [];
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
            'email'    => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|max_length[255]',
               
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules,$errors)) {
            $data['validation']   = $this->validator;
            $data['settingsdata'] = $this->auth_model->setting_data();
            $data['title']        = 'login';
           return view('template/login', $data);
            }else{
             $data['user'] = (object)$userData = array(
            'email'      => $this->request->getVar('email'),
            'password'   => $this->request->getVar('password'),
        );
         $user = $this->auth_model->checkUser($userData);
        if(count($user->getResult()) > 0) {
               if($user->getRow()->is_admin == 1){

            $checkPermission = $this->auth_model->userPermissionadmin($user->getRow()->id);
        }
        else{
            $checkPermission = $this->auth_model->userPermission($user->getRow()->id);
          
        }
        
        $permission = array();
        if(!empty($checkPermission))
            foreach ($checkPermission as $value) {
                $permission[$value->directory] = array(
                    'create' => $value->create,
                    'read'   => $value->read,
                    'update' => $value->update,
                    'delete' => $value->delete
                );
            }

            $key = md5(time());
            $key = str_replace("1", "z", $key);
            $key = str_replace("2", "J", $key);
            $key = str_replace("3", "y", $key);
            $key = str_replace("4", "R", $key);
            $key = str_replace("5", "Kd", $key);
            $key = str_replace("6", "jX", $key);
            $key = str_replace("7", "dH", $key);
            $key = str_replace("8", "p", $key);
            $key = str_replace("9", "Uf", $key);
            $key = str_replace("0", "eXnyiKFj", $key);
            $sid_web = substr($key, rand(0, 3), rand(28, 32));
               
            
            // codeigniter session stored data          
         $sData = array(
                    'isLogIn'     => true,
                    'isAdmin'     => (($user->getRow()->is_admin == 1)?true:false),
                    'id'          => $user->getRow()->id,
                    'fullname'    => $user->getRow()->fullname,
                    'firstname'   => $user->getRow()->firstname,
                    'lastname'    => $user->getRow()->lastname,
                    'user_level'  => $user->getRow()->user_level,
                    'email'       => $user->getRow()->email,
                    'image'       => $user->getRow()->image,
                    'last_login'  => $user->getRow()->last_login,
                    'last_logout' => $user->getRow()->last_logout,
                    'ip_address'  => $user->getRow()->ip_address,
                    'permission'  => json_encode($permission) 
                    );  

                    //store date to session 
                    $this->session->set($sData);
                    $ipadd = $this->request->getIPAddress();
                    $this->auth_model->last_login($ipadd);
                    $this->session->setFlashdata('message', lan('welcome_back').' '.$user->getRow()->fullname);
                   return redirect()->route('dashboard/home');

            } else {

                $data['title']      = 'login';
                $data['settingsdata'] = $this->auth_model->setting_data();
                $data['exception']  = 'Email or Password don\'t match';
             return view('template/login', $data);
               
            } 
      
    }
        }else{
         $data['title']      = 'login';
        $data['settingsdata'] = $this->auth_model->setting_data();
        return view('template/login', $data);
}
}
   
  
    public function logout()
    { 
        //destroy session
      $ipadd = $this->request->getIPAddress();
      $this->auth_model->last_logout($ipadd);
      $this->session->destroy();
         return redirect()->route('login');
    }
  

}
