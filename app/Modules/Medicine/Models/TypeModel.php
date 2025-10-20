<?php namespace App\Modules\Medicine\Models;

class TypeModel
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
        $builder = $this->db->table('product_type');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('product_type')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_type($data=[]){
        $builder = $this->db->table('product_type');
         return $add_manufacturer = $builder->insert($data);
    }

    public function update_type($data=[]){
     $query = $this->db->table('product_type');   
     $query->where('id', $data['id']);
     return $cus_up =  $query->update($data);  
    }

    public function delete_type($id){
            $builder = $this->db->table('product_type');
            $builder->where('id', $id);
     return $builder->delete();
    }

   





  

}