<?php namespace App\Modules\Tax\Models;

class TaxModel
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->request = \Config\Services::request();
    }

 public function tax_setting_info(){
        $data = $this->db->table('tax_settings')
                 ->select('*')
                 ->get()
                 ->getResultArray();
        if ($data) {
            return $data;
        }
        return false;
 }


    public function taxsetup_create($data = array()){
      $tax_table = $this->db->table('payroll_tax_setup');
         return $tax_table->insert($data);
    }

   public function viewTaxsetup()
    {
        return $this->db->table('payroll_tax_setup')
                        ->select('*')   
                        ->orderBy('id', 'asc')
                        ->get()
                        ->getResult();
    }


    public function taxsetup_updateForm($id){
         return $this->db->table('payroll_tax_setup')
                        ->select('*')   
                        ->where('id',$id)
                        ->get()
                        ->getResultArray();
    }


    public function update_taxsetup($data = array())
    {

     $query = $this->db->table('payroll_tax_setup');   
     $query->where('id', $data['id']);
     return  $query->update($data); 


    }

  public function taxsetup_delete($id = null){
       $taxdata = $this->db->table('payroll_tax_setup');
       $taxdata->where('id', $id);
       $taxdata->delete();

        if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }
    }



}