<?php namespace App\Modules\Tax\Controllers;
class Tax extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

       public function bdtask_tax_settings(){
       $taxsinfo =  $this->db->table('tax_settings')
                             ->countAllResults(); 
        if($taxsinfo > 0){
           return  redirect()->to(base_url('/tax/update_tax_setting'));
        }
        $data['title']    = lan('tax_settings');
        $data['module']   = "Tax";  
        $data['page']     = "tax_settings";  
        return $this->template->layout($data);    
    }

       public function tax_settings_updateform(){
        $data['title']    = lan('tax_settings');
        $data['setinfo']  = $this->tax_model->tax_setting_info();
        $data['module']   = "Tax";  
        $data['page']     = "tax_settings_update";  
        return $this->template->layout($data);  
    }

     public function create_tax_settins(){
        $taxfield = $this->request->getVar('taxfield');
        $dfvalue  = $this->request->getVar('default_value');
        $nt       = $this->request->getVar('nt');
        $reg_no   = $this->request->getVar('reg_no');
        $ishow    = $this->request->getVar('is_show');
         for ($i=0; $i < sizeof($taxfield); $i++) {
                     $tax    = $taxfield[$i];
                    $default = $dfvalue[$i];
                    $rg_no   = $reg_no[$i];
                    $is_show = (!empty($ishow[$i])?$ishow[$i]:0);
          $data = array(
                'default_value' => $default,
                'tax_name'      => $tax,
                'nt'            => $nt,
                'reg_no'        => $rg_no,
                 ); 
           $tax_table = $this->db->table('tax_settings');
         $tax_table->insert($data);                                    
            }
           

             for ($i=0; $i < sizeof($taxfield); $i++) {
             $fld = 'tax'.$i;

        if (!empty($fld)) {
            if (!$this->db->fieldExists($fld, 'product_service')) {
                $this->dbforge->addColumn('product_service', [
                    $fld       => [
                        'type' => 'TEXT'
                    ]
                ]);

            }
             $this->dbforge->addColumn('tax_collection', [
                    $fld       => [
                        'type' => 'TEXT'
                    ]
                ]);
               if (!$this->db->fieldExists($fld, 'product_information')) {
                $this->dbforge->addColumn('product_information', [
                    $fld       => [
                        'type' => 'TEXT'
                    ]
                ]);
            }

   
            
        } 
            }
            
            $this->session->setFlashdata('message', lan('save_successfully'));
            return  redirect()->to(base_url('/tax/tax_setting'));
    }



    public function update_tax_settins(){

           $tablecolumn = $this->db->getFieldNames('product_service');
           $num_column = count($tablecolumn)-4;
        for ($t=0; $t < $num_column; $t++) {
        $txd = 'tax'.$t;
         if ($this->db->fieldExists($txd, 'product_service')) {
            $this->dbforge->dropColumn('product_service', $txd);
        }
        if ($this->db->fieldExists($txd, 'tax_collection')) {
            $this->dbforge->dropColumn('tax_collection', $txd);
        }
        if ($this->db->fieldExists($txd, 'product_information')) {
            $this->dbforge->dropColumn('product_information', $txd);
        }
    
       echo  'successfully_deleted';
          }

        $taxfield  = $this->request->getVar('taxfield');
        $dfvalue   = $this->request->getVar('default_value');
        $nt        = $this->request->getVar('nt');
        $reg_no    = $this->request->getVar('reg_no');
        $id        = $this->request->getVar('id');
        $ishow     = $this->request->getVar('is_show');
        $tax_table = $this->db->table('tax_settings');
        $tax_table->truncate();
         for ($x=0; $x < sizeof($taxfield); $x++) {
                     $tax     = $taxfield[$x];
                     $default = $dfvalue[$x];
                     $rg_no   = $reg_no[$x];
                     $is_show = (!empty($ishow[$x])?$ishow[$x]:0);

          $data = array(
                'default_value' => $default,
                'tax_name'      => $tax,
                'nt'            => $nt,
                'reg_no'        => $rg_no,
                 ); 
         $tax_table = $this->db->table('tax_settings');
         $tax_table->insert($data);                 
            }
            $tupfild ='';
              for ($y=0; $y < sizeof($taxfield); $y++) {
        $tupfild = 'tax'.$y;

        if (!empty($tupfild)) {
            
            if (!$this->db->fieldExists($tupfild, 'product_service')) {
                $this->dbforge->addColumn('product_service', [
                    $tupfild   => [
                        'type' => 'TEXT'
                    ]
                ]);
            }

             if (!$this->db->fieldExists($tupfild, 'tax_collection')) {
                $this->dbforge->addColumn('tax_collection', [
                    $tupfild   => [
                        'type' => 'TEXT'
                    ]
                ]);
            }
            if (!$this->db->fieldExists($tupfild, 'product_information')) {
                $this->dbforge->addColumn('product_information', [
                    $tupfild   => [
                        'type' => 'TEXT'
                    ]
                ]);
            }


           echo  lan('update_successfully');
        } 
            }
           
            $this->session->setFlashdata('message', lan('update_successfully'));
            return  redirect()->to(base_url('/tax/tax_setting'));
    }



      public function bdtask_income_tax(){
        $data['title']    = lan('income_tax');
        $data['module']   = "Tax";  
        $data['page']     = "income_tax_form";  
        return $this->template->layout($data);   
    }

       // ================ Income tax entry   ======
    public function bdtask_create_income_tax(){
        $sm = $this->request->getVar('start_amount');
        $em = $this->request->getVar('end_amount');
        $rt = $this->request->getVar('rate');
        if(empty($sm)){
                $this->session->setFlashdata('exception', 'Please Add Tax Range');
                  return  redirect()->to(base_url('/tax/add_income_tax'));
                exit;   
        }
         for ($i=0; $i < sizeof($sm); $i++) {
                $postData = [
                    'start_amount'  => $sm[$i],
                    'end_amount'    => $em[$i],
                    'rate'          => $rt[$i],                 
                ];     
                $this->tax_model->taxsetup_create($postData);
            }
            $this->session->setFlashdata('message', lan('save_successfully'));
            return  redirect()->to(base_url('/tax/income_tax_list'));
    }


        // ================= manage Income tax  ===============
    public function manage_income_tax(){
        $data['title']    = lan("manage_income_tax"); 
        $data['taxs']     = $this->tax_model->viewTaxsetup();
        $data['module']   = "Tax";  
        $data['page']     = "income_tax_list";  
        return $this->template->layout($data);
    }


        public function edit_income_tax($id = null){
        $data['title']    = "Edit Inocme Tax"; 
        $data['data']     = $this->tax_model->taxsetup_updateForm($id); 
        $data['module']   = "Tax";  
        $data['page']     = "income_tax_updateform";  
        return $this->template->layout($data);    
    }


        public function update_income_tax(){
        $postData = [
                'id'              => $this->request->getVar('tax_setup_id'),
                'start_amount'    => $this->request->getVar('start_amount'),
                'end_amount'      => $this->request->getVar("end_amount"),
                'rate'            => $this->request->getVar("rate"),
            ];      
            if ($this->tax_model->update_taxsetup($postData)) { 
                $this->session->setFlashdata('message', lan('successfully_updated'));
            } else {
                $this->session->setFlashdata('exception',  lan('please_try_again'));
            }
           return  redirect()->to(base_url('/tax/income_tax_list'));
    }


        public function delete_income_tax($id = null){ 
        if ($this->tax_model->taxsetup_delete($id)) {
            #set success message
            $this->session->setFlashdata('message',lan('successfully_deleted'));
        } else {
            #set exception message
            $this->session->setFlashdata('exception',lan('please_try_again'));
        }
        return  redirect()->to(base_url('/tax/income_tax_list'));
    }

}
