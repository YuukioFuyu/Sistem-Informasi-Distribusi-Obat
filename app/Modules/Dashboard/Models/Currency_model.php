<?php namespace App\Modules\Dashboard\Models;

class Currency_model
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
        $builder = $this->db->table('currency_tbl');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('currency_tbl')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_currency($data=[]){
        $builder = $this->db->table('currency_tbl');
         return $add_manufacturer = $builder->insert($data);
    }

    public function update_currency($data=[]){
     $query = $this->db->table('currency_tbl');   
     $query->where('id', $data['id']);
     return $cus_up =  $query->update($data);  
    }

    public function delete_currency($id){
            $builder = $this->db->table('currency_tbl');
            $builder->where('id', $id);
     return $builder->delete();
    }

   





  

}