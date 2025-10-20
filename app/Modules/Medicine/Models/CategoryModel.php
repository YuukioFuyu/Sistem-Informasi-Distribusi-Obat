<?php namespace App\Modules\Medicine\Models;

class CategoryModel
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
        $builder = $this->db->table('product_category');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('product_category')
                             ->where('category_id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_category($data=[]){
        $builder = $this->db->table('product_category');
         return $add_manufacturer = $builder->insert($data);
    }

    public function update_category($data=[]){
     $query = $this->db->table('product_category');   
     $query->where('category_id', $data['category_id']);
     return $cus_up =  $query->update($data);  
    }

    public function delete_category($id){
            $builder = $this->db->table('product_category');
            $builder->where('category_id', $id);
     return $builder->delete();
    }

   





  

}