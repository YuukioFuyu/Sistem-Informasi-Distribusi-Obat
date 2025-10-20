<?php namespace App\Modules\Hrm\Models;

class DesignationModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->request = \Config\Services::request();
    }

    public function findAll()
    {
        $builder = $this->db->table('designation');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('designation')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_designation($data=[]){
        $builder = $this->db->table('designation');
         return $add_manufacturer = $builder->insert($data);
    }

    public function update_designation($data=[]){
     $query = $this->db->table('designation');   
     $query->where('id', $data['id']);
     return $cus_up =  $query->update($data);  
    }

    public function delete_designation($id){
            $builder = $this->db->table('designation');
            $builder->where('id', $id);
     return $builder->delete();
    }

   





  

}