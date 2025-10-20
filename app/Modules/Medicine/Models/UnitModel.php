<?php namespace App\Modules\Medicine\Models;

class UnitModel
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
        $builder = $this->db->table('unit');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('unit')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_unit($data=[]){
        $builder = $this->db->table('unit');
         return $add_manufacturer = $builder->insert($data);
    }

    public function update_unit($data=[]){
     $query = $this->db->table('unit');   
     $query->where('id', $data['id']);
     return $cus_up =  $query->update($data);  
    }

    public function delete_unit($id){
            $builder = $this->db->table('unit');
            $builder->where('id', $id);
     return $builder->delete();
    }

   





  

}