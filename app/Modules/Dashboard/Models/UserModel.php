<?php namespace App\Modules\Dashboard\Models;

class UserModel
{
    
     public function __construct()
    {
        $this->db = db_connect();
    }

    public function findAll()
    {
        $builder = $this->db->table('user');
        $builder->select("*,CONCAT_WS(' ',firstname, lastname) AS fullname");
         $query   = $builder->get(); 
        return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('user')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
        return $builder;


    }

   public function  get_company_info()
   {
     $builder = $this->db->table('setting')
                             ->get()
                             ->getRow(); 
        return $builder;
   }

    public function save_user($data=[]){
        $builder = $this->db->table('user');
        return  $builder->insert($data);
    }

    public function update_user($data=[]){
     $query = $this->db->table('user');   
     $query->where('id', $data['id']);
     return $query->update($data);   
    }

    public function delete_user($id){
            $builder = $this->db->table('user');
            $builder->where('id', $id);
     return $builder->delete();
    }
    
    
     public function check_email($email)
    {
       return $exitstdata = $this->db->table('user')
                             ->where('email', $email)
                             ->countAllResults();
    }

public function token_set($email,$token){
    $data = array(
        'password_reset_token' => $token,
        );
     $query = $this->db->table('user');   
     $query->where('email', $email);
     return $query->update($data);   
}
   
   
   public function check_token($email,$token)
   {
        return $exitstdata = $this->db->table('user')
                             ->where('email', $email)
                             ->where('password_reset_token',$token)
                             ->countAllResults();
   }
   
   public function reset_password($email,$password){
        $data = array(
        'password_reset_token' => 'NULL',
        'password'             =>md5($password),
        );
     $query = $this->db->table('user');   
     $query->where('email', $email);
     return $query->update($data);   
   }
}