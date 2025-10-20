<?php namespace App\Modules\Service\Controllers;
class Service extends BaseController
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

	    $data['title']        = 'service List';
        $data['service_list'] = $this->serviceModel->findall();
        $data['taxfield']     = $this->serviceModel->tax_fields();
        $data['module']       = "Service";
        $data['page']         = "service_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckserviceList()
     {
        $postData = $this->request->getVar();
        $data     = $this->serviceModel->getserviceList($postData);
        echo json_encode($data);
    } 

    
   public function bdtask_0001_service_form($id = null)
        {
       
        $data = [];
        $data['service'] = (object)$userLevelData = array(
        'id'             => ($this->request->getVar('id')?$this->request->getVar('id'):null),
        'service_name'   => $this->request->getVar('service_name', FILTER_SANITIZE_STRING),
        'description'    => $this->request->getVar('description', FILTER_SANITIZE_STRING),
        'charge'         => ($this->request->getVar('charge', FILTER_SANITIZE_STRING)?$this->request->getVar('charge', FILTER_SANITIZE_STRING):0),
        'status'         => 1,
        );
       $tablecolumn = $this->db->getFieldNames('product_service');
       $num_column  = count($tablecolumn)-5;
       $taxfield    = [];
       for($i=0;$i<$num_column;$i++){
        $taxfield[$i] = 'tax'.$i;
       }
       foreach ($taxfield as $key => $value) {
        $userLevelData[$value] = $this->request->getVar($value)/100;
       }
        if ($this->request->getMethod() == 'post') {
            
            $rules = [
            'service_name'=> ['label' => lan('service_name'),'rules' => 'required'],
            'charge'      => ['label' => lan('charge'),'rules'       => 'required'],
                 
               
            ];
  

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
            
                if($this->serviceModel->save_service($userLevelData)){
                   $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/service/service_list/'));  
            }else{
                 $this->session->setFlashdata('exception', lan('please_try_again'));
                return  redirect()->to(base_url('/service/service_list/'));
            }
          
            }else{
             $this->serviceModel->update_service($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
              return  redirect()->to(base_url('/service/service_list/'));
               
            }

            }
        }

        $data['module']           = "Service";
        if(!empty($id)){
        $data['service']          = $this->serviceModel->singledata($id);
        $data['sudata']           = $this->serviceModel->sudata($id);
         }else{
        $data['sudata']           = [];
         }
        $data['title']            = 'Add Service';
        $data['taxfield']         = $this->serviceModel->tax_fields();
        $data['page']             = "service_form"; 
        return $this->template->layout($data);
    }


    public function delete_service($id = null)
    { 
        if ($this->serviceModel->delete_service($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('service/service_list');
    }


        public function bdtask_service_invoice_form() {
        if ($this->request->getMethod() == 'post') {
        $rules = [
        'invoice_date'     => ['label' => lan('date'),'rules'           => 'required'],
        'employee_id'      => ['label' => lan('employee_name'),'rules'  => 'required'],
        'payment_type'     => ['label' => lan('payment_type'),'rules'   => 'required'],
        'customer_id'      => ['label' => lan('customer_name'),'rules'  => 'required'],
        ];

    if (! $this->validate($rules)) {
         $this->session->setFlashdata('exception', $this->validator->listErrors());
         return  redirect()->to(base_url('/service/service_invoice_form'));
        }else{
         $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
        $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                $this->session->setFlashdata('exception', 'You Have Selected Bank Payment But did not Select Bank');
                  return  redirect()->to(base_url('/service/service_invoice_form'));
                exit;  
                  }
     $s_id =  $this->request->getVar('service_id');
          for ($i=0, $n=count($s_id); $i < $n; $i++) {
      $service_id =$s_id[$i];
      $value=$this->serviceModel->servicename_check($service_id);
      if($value==0){
         $this->session->setFlashdata('exception', 'You Need input existing Service Name');
                  return  redirect()->to(base_url('/service/service_invoice_form'));
                exit;
          
      }
    }


        $this->serviceModel->save_service_invoice();   
        $this->session->setFlashdata('message', lan('save_successfully'));
          return  redirect()->to(base_url('/service/service_invoice_list'));
    
   
      }
    }    
        $data = array(
            'title'         => lan('service_invoice'),
            'employee_list' => $this->serviceModel->employee_list(),
            'taxes'         => $this->serviceModel->tax_fields(),
        );
        $data['bank_list']  = $this->serviceModel->bank_list();
        $data['module']     = 'Service';
        $data['page']       = 'add_invoice_form';
        return $this->template->layout($data);
    }

  
   public function retrieve_service_info()
    {   
        $service_name  = $this->request->getVar('service_name');
        $service_info  = $this->serviceModel->searchservice_byname($service_name);
       
       if(!empty($service_info)){
        $return_service[''] = '';
        foreach ($service_info as $value) {
            $return_service[] = array('label'=>$value['service_name'],'value'=>$value['id']);
        } 
    }else{
        $return_service[] = 'Service Not Found';
        }
        echo json_encode($return_service);
    }


    public function retrieve_service_details()
    {   
        $service_id   = $this->request->getVar('service_id',FILTER_SANITIZE_STRING);
        $service_info = $this->serviceModel->get_service_details($service_id);
        echo json_encode($service_info);
    }


    public function service_invoice_list()
    {
       
        $data['title']      = 'invoice List';
        $data['module']     = "Service";
        $data['page']       = "invoice_list"; 
        return $this->template->layout($data);

    }

     public function bdtask_Checkservice_invoiceList()
     {
        $postData = $this->request->getVar();
        $data     = $this->serviceModel->getinvoiceList($postData);
        echo json_encode($data);
    } 


    public function edit_service_invoice($id= null)
    {
        $data = array(
            'title'         => lan('service_invoice'),
            'employee_list' => $this->serviceModel->employee_list(),
            'taxes'         => $this->serviceModel->tax_fields(),
        );
        $data['bank_list']      = $this->serviceModel->bank_list();
        $data['main']           = $this->serviceModel->service_invoice_main($id);
        $data['details']        = $this->serviceModel->service_invoice_details($id);
        $data['tax_collection'] = $this->serviceModel->service_invoice_tax($id);
        $data['module']         = 'Service';
        $data['page']           = 'invoice_edit';
        return $this->template->layout($data);
    }

    public function update_service_invoice()
    {
        $invoice_id = $this->request->getVar('invoice_id');
         if ($this->request->getMethod() == 'post') {
        $rules = [
        'invoice_date'     => ['label' => lan('date'),'rules'           => 'required'],
        'employee_id'      => ['label' => lan('employee_name'),'rules'  => 'required'],
        'payment_type'     => ['label' => lan('payment_type'),'rules'   => 'required'],
        'customer_id'      => ['label' => lan('customer_name'),'rules'  => 'required'],
        ];

    if (! $this->validate($rules)) {
         $this->session->setFlashdata('exception', $this->validator->listErrors());
         return  redirect()->to(base_url('/service/edit_service_invoice/'.$invoice_id));
        }else{
        $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
        $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                $this->session->setFlashdata('exception', 'You Have Selected Bank Payment But did not Select Bank');
                  return  redirect()->to(base_url('/service/edit_service_invoice/'.$invoice_id));
                exit;  
                  }     
        $this->serviceModel->update_service_invoice();   
        $this->session->setFlashdata('message', lan('update_successfully'));
          return  redirect()->to(base_url('/service/service_invoice_list'));
    
   
      }
    }  
    }

       

  public function service_invoice_details($id= null)
    {
        $data = array(
            'title'         => lan('invoice_details'),
            'employee_list' => $this->serviceModel->employee_list(),
            'taxes'         => $this->serviceModel->tax_fields(),
        );
        $data['bank_list']      = $this->serviceModel->bank_list();
        $data['main']           = $this->serviceModel->service_invoice_main($id);
        $data['details']        = $this->serviceModel->service_invoice_details($id);
        $data['tax_collection'] = $this->serviceModel->service_invoice_tax($id);
        $data['module']         = 'Service';
        $data['page']           = 'invoice_details';
        return $this->template->layout($data);
    }



    public function delete_service_invoice($id = null)
    { 
        if ($this->serviceModel->delete_service_invoice($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('service/service_invoice_list');
    }
}
