<?php namespace App\Modules\Medicine\Models;

class LeafModel
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
        $builder = $this->db->table('medicine_leaf_setting');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('medicine_leaf_setting')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_leaf($data=[]){
        $builder = $this->db->table('medicine_leaf_setting');
         return $add_manufacturer = $builder->insert($data);
    }

    public function update_leaf($data=[]){
     $query = $this->db->table('medicine_leaf_setting');   
     $query->where('id', $data['id']);
     return $cus_up =  $query->update($data);  
    }

    public function delete_leaf($id){
            $builder = $this->db->table('medicine_leaf_setting');
            $builder->where('id', $id);
     return $builder->delete();
    }


}