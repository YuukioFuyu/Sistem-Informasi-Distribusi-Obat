<?php namespace App\Modules\Manufacturer\Controllers;
class Manufacturer extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function index()
	{
         if (!$this->session->get('isLogIn')){
        return redirect()->route('login');
    }

	    $data['title']      = 'Manufacturer List';
        $data['module']     = "Manufacturer";
        $data['total_manu'] = $this->manufacturerModel->countallmanufacturer();
        $data['page']       = "manufacturer_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckmanufacturerList()
     {
        $postData = $this->request->getVar();
        $data     = $this->manufacturerModel->getmanufacturerList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_manufacturer_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('manufacturer_id'));
        $data = [];
           $data['manufacturer'] = (object)$userLevelData = array(
            'manufacturer_id'  => ($this->request->getVar('manufacturer_id')?$this->request->getVar('manufacturer_id'):null),
            'manufacturer_name'=> $this->request->getVar('manufacturer_name', FILTER_SANITIZE_STRING),
            'address'          => $this->request->getVar('address', FILTER_SANITIZE_STRING),
            'address2'         => $this->request->getVar('address2', FILTER_SANITIZE_STRING),
            'mobile'           => $this->request->getVar('manufacturer_mobile', FILTER_SANITIZE_STRING),
            'phone'            => $this->request->getVar('phone', FILTER_SANITIZE_STRING),
            'contact'          => $this->request->getVar('contact', FILTER_SANITIZE_STRING),
            'emailnumber'      => $this->request->getVar('manufacturer_email', FILTER_SANITIZE_STRING),
            'email_address'    => $this->request->getVar('email_address', FILTER_SANITIZE_STRING),
            'fax'              => $this->request->getVar('fax', FILTER_SANITIZE_STRING),
            'city'             => $this->request->getVar('city', FILTER_SANITIZE_STRING),
            'state'            => $this->request->getVar('state', FILTER_SANITIZE_STRING),
            'zip'              => $this->request->getVar('zip', FILTER_SANITIZE_STRING),
            'country'          => $this->request->getVar('country', FILTER_SANITIZE_STRING),
            'details'          => $this->request->getVar('details', FILTER_SANITIZE_STRING),
            'status'           => 1
        );

        if ($this->request->getMethod() == 'post') {
            if(empty($id)){
            $rules = [
                'manufacturer_name'   => ['label' => lan('manufacturer_name'),'rules' => 'required|min_length[3]|max_length[20]'],

                'manufacturer_mobile' => ['label' => lan('mobile_no'),'rules'         => 'required|min_length[6]|max_length[20]|is_unique[manufacturer_information.mobile]'], 
            ];
        }else{
             $rules = [
                'manufacturer_name'  => ['label' => lan('manufacturer_name'), 'rules'  => 'required|min_length[3]|max_length[20]'],
                'manufacturer_mobile'=> ['label' => lan('mobile_no'),'rules'           => 'required|min_length[6]|max_length[20]'],
                 
            ];
        }

            if (! $this->validate($rules)) {
               
    $this->session->setFlashdata(array('exception'=>$this->validator->listErrors()));
          return  redirect()->to(base_url('manufacturer/add_manufacturer'));
            }else{
               if(empty($id)){
                $this->manufacturerModel->save_manufacturer($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/manufacturer/manufacturer_list/'));
               
            }else{
             $this->manufacturerModel->update_manufacturer($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/manufacturer/manufacturer_list/'));
               
            }

            }
        }

        $data['module']      = "Manufacturer";
        if(!empty($id)){
        $data['manufacturer']= $this->manufacturerModel->singledata($id); }
        $data['title']       = 'Manufacturer';
        $data['page']        = "manufacturer_form"; 
        return $this->template->layout($data);
    }

    public function delete_manufacturer($id = null)
    { 
      $check_calculation = $this->manufacturerModel->bdtask_checkmanufacturer_calculation($id);
      if($check_calculation == 0){
        if ($this->manufacturerModel->delete_manufacturer($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }
      }else{
        $this->session->setFlashdata('exception', 'Manufacturer Already Engaged In Calculation');
      }

        return redirect()->route('manufacturer/manufacturer_list');
    }


        public function bdtask_02_manufacturer_ledger()
   {
        $cmbGLCode       = '';
        $cmbCode         = ($this->request->getVar('manufacturer_id')?$this->request->getVar('manufacturer_id'):50202);
        $dtpFromDate     = ($this->request->getVar('from_date')?$this->request->getVar('from_date'):date('Y-m-d'));
        $dtpToDate       = ($this->request->getVar('to_date')?$this->request->getVar('to_date'):date('Y-m-d'));
        $chkIsTransction = 1;

        $HeadName        = $this->accountModel->general_led_report_headname($cmbGLCode);
        $HeadName2       = $this->accountModel->general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction);
        $pre_balance     = $this->accountModel->general_led_report_prebalance($cmbCode,$dtpFromDate);
        $data = array(
            'title'          => lan('manufacturer_ledger'),
            'dtpFromDate'    => $dtpFromDate,
            'dtpToDate'      => $dtpToDate,
            'manufacturer_id'=> $cmbCode,
            'HeadName'       => $HeadName,
            'HeadName2'      => $HeadName2,
            'prebalance'     => $pre_balance,
            'chkIsTransction'=> $chkIsTransction,

        );

        $data['ledger']           = $this->accountModel->general_led_report_headname($cmbCode);
        $data['manufacturer_list']= $this->manufacturerModel->manufacturer_list();
        $data['module']           = "Manufacturer";
        $data['page']             = "manufacturer_ledger"; 
       return $this->template->layout($data);
     
   }


       public function importFile(){

      // Validation
      $input = $this->validate([
         'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,csv],'
      ]);

      if (!$input) { // Not valid
        $this->session->setFlashdata(array('exception'=>$this->validator->listErrors()));
      return  redirect()->to(base_url('manufacturer/add_manufacturer'));
      
      }else{ // Valid

         if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {

               // Get random file name
               $newName = $file->getRandomName();

               // Store file in public/csvfile/ folder
               $file->move('./assets/csvfile/medicine', $newName);

               // Reading file
               $file = fopen("./assets/csvfile/medicine/".$newName,"r");
               
               $i = 0;
               $numberOfFields = 3; // Total number of fields

               $importData_arr = array();

               // Initialize $importData_arr Array
               while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                  $num = count($filedata);

                  // Skip first row & check number of fields
                  if($i > 0 && $num == $numberOfFields){ 
                     
                            
                  $importData_arr[$i]['manufacturer_name']  = (!empty($filedata[0])?$filedata[0]:null);
                  $importData_arr[$i]['mobile']             = (!empty($filedata[1])?$filedata[1]:null);
                  $importData_arr[$i]['address']            = (!empty($filedata[2])?$filedata[2]:null);

                  }

                  $i++;

               }
               fclose($file);
                  
               // Insert data
               $count = 0;
             
               foreach($importData_arr as $insert_csv){
                if($insert_csv['manufacturer_name'] == ''){
                  $excel_row = $count+1;
                 session()->setFlashdata('exception', 'Input Manufacturer Name row Number '.$excel_row);
                   return  redirect()->to(base_url('manufacturer/add_manufacturer'));
                }

                   if($insert_csv['mobile'] == ''){
                  $excel_row = $count+1;
                 session()->setFlashdata('exception', 'Input Mobile No row Number '.$excel_row);
                   return  redirect()->to(base_url('manufacturer/add_manufacturer'));
                }


       $data = array(
                'manufacturer_name' => $insert_csv['manufacturer_name'],
                'address'           => $insert_csv['address'],
                'mobile'            => $insert_csv['mobile'],
                'details'           => '',
                'status'            => 1
              );  




        $result = $this->db->table('manufacturer_information')
                        ->select('*')
                        ->where('manufacturer_name',$data['manufacturer_name'])
                        ->where('mobile',$data['mobile'])
                        ->get()
                        ->getRow();
              if (empty($result)){
                $manufacturer_info = $this->db->table('manufacturer_information');
                $add_manufacturer  = $manufacturer_info->insert($data);
                 $manufacturer_id  = $this->db->insertID();
                $coa = $this->manufacturerModel->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="50202000001";
        }
        $c_acc      = $manufacturer_id.'-'.$insert_csv['manufacturer_name'];
        $createby   = $this->session->get('id');
        $createdate = date('Y-m-d H:i:s');

       
         $manufacturer_coa = [
            'HeadCode'         => $headcode,
            'HeadName'         => $c_acc,
            'PHeadName'        => 'Account Payable',
            'HeadLevel'        => '3',
            'IsActive'         => '1',
            'IsTransaction'    => '1',
            'IsGL'             => '0',
            'HeadType'         => 'L',
            'IsBudget'         => '0',
            'manufacturer_id'  => $manufacturer_id,
            'IsDepreciation'   => '0',
            'DepreciationRate' => '0',
            'CreateBy'         => $createby,
            'CreateDate'       => $createdate,
        ];

        
          $mcoa = $this->db->table('acc_coa');
          $add_manufacturercoa = $mcoa->insert($manufacturer_coa);
                 }else {
               $result = $this->db->table('manufacturer_information')
                        ->select('*')
                        ->where('manufacturer_name',$data['manufacturer_name'])
                        ->where('mobile',$data['mobile'])
                        ->get()
                        ->getRow();   
                $manufacturer_id   = $result->manufacturer_id;    
            $udata = array(
                'manufacturer_name' => $insert_csv['manufacturer_name'],
                'address'           => $insert_csv['address'],
                'mobile'            => $insert_csv['mobile'],
                'details'           => '',
                'status'            => 1
                   );
            $upc_acc      = $manufacturer_id.'-'.$insert_csv['manufacturer_name'];

              $manufacturer_coaup = [
            'HeadName'         => $upc_acc,
        ];
              $manufacturer_data = $this->db->table('manufacturer_information');   
              $manufacturer_data->where('manufacturer_id', $result->manufacturer_id);
              $manufacturer_data->update($udata);

              $manufacturer_coa = $this->db->table('acc_coa');   
              $manufacturer_coa->where('manufacturer_id', $result->manufacturer_id);
              $manufacturer_coa->update($manufacturer_coaup);    
                  
              }

              $count++;

              }


               // Set Session
               session()->setFlashdata('message', $count.' Record inserted successfully!');
               session()->setFlashdata('alert-class', 'alert-success');
             
            }else{
               // Set Session
               session()->setFlashdata('message', 'File not imported.');
               session()->setFlashdata('alert-class', 'alert-danger');
            }
         }else{
            // Set Session
            session()->setFlashdata('message', 'File not imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
         }

      }

      return  redirect()->to(base_url('manufacturer/manufacturer_list'));
   }

}
