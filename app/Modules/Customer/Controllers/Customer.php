<?php namespace App\Modules\Customer\Controllers;
class Customer extends BaseController
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

	    $data['title']      = 'Customer List';
        $data['module']     = "Customer";
        $data['page']       = "customer_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckcustomerList()
     {
        $postData = $this->request->getVar();
        $data     = $this->customerModel->getCustomerList($postData);
        echo json_encode($data);
    } 

        public function bdtask_customer_form($id = null)
        {
        $id = (!empty($id)?$id:$this->request->getVar('customer_id'));
        $data = [];
           $data['customer'] = (object)$userLevelData = array(
            'customer_id'      => ($this->request->getVar('customer_id')?$this->request->getVar('customer_id'):''),
            'customer_name'    => $this->request->getVar('customer_name', FILTER_SANITIZE_STRING),
            'customer_mobile'  => $this->request->getVar('customer_mobile', FILTER_SANITIZE_STRING),
            'customer_email'   => $this->request->getVar('customer_email', FILTER_SANITIZE_STRING),
            'email_address'    => $this->request->getVar('email_address', FILTER_SANITIZE_STRING),
            'contact'          => $this->request->getVar('contact', FILTER_SANITIZE_STRING),
            'phone'            => $this->request->getVar('phone', FILTER_SANITIZE_STRING),
            'fax'              => $this->request->getVar('fax', FILTER_SANITIZE_STRING), 
            'city'             => $this->request->getVar('city', FILTER_SANITIZE_STRING) ,
            'state'            => $this->request->getVar('state', FILTER_SANITIZE_STRING) ,
            'zip'              => $this->request->getVar('zip', FILTER_SANITIZE_STRING) ,
            'country'          => $this->request->getVar('country', FILTER_SANITIZE_STRING) ,
            'customer_address' => $this->request->getVar('customer_address', FILTER_SANITIZE_STRING) ,
            'address2'         => $this->request->getVar('address2', FILTER_SANITIZE_STRING) ,
            'status'           => 1,
            'create_by'        => 1 ,
        );

        if ($this->request->getMethod() == 'post') {
            if(empty($id)){
            $rules = [
                'customer_name'   => ['label' => lan('customer_name'),'rules' => 'required|min_length[3]|max_length[20]'],
                'customer_mobile' => ['label' => lan('mobile_no'),'rules'     => 'required|min_length[6]|max_length[20]|is_unique[customer_information.customer_mobile]'],
            ];
        }else{
             $rules = [
                'customer_name'  => ['label' => lan('customer_name'), 'rules' => 'required|min_length[3]|max_length[20]'],
                'customer_mobile'=> ['label' => lan('mobile_no'),'rules'      => 'required|min_length[6]|max_length[20]'],
                 
            ];
        }

            if (! $this->validate($rules)) {
             
                $this->session->setFlashdata(array('exception'=>$this->validator->listErrors()));
          return  redirect()->to(base_url('customer/add_customer'));
            }else{
               if(empty($id)){
                $this->customerModel->save_customer($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/customer/add_customer/'));
               
            }else{
             $this->customerModel->update_customer($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/customer/customer_list/'));
               
            }

            }
        }

        $data['module']     = "Customer";
        if(!empty($id)){
        $data['customer']   = $this->customerModel->singledata($id); }
        $data['title']      = 'Customer';
        $data['page']       = "customer_form"; 
        return $this->template->layout($data);
    }


   public function bdtask_02_credit_customer()
   {
        $data['title']      = 'Credit Customer';
        $data['module']     = "Customer";
        $data['page']       = "credit_customer"; 
        return $this->template->layout($data);
   }

   public function bdtask_003creditCustomer_checkdata()
   {
     $postData = $this->request->getVar();
        $data     = $this->customerModel->getCreditCustomerList($postData);
        echo json_encode($data);
   }


      public function bdtask_004_paid_customer()
   {
   

        $data['title']      = 'Credit Customer';
        $data['module']     = "Customer";
        $data['page']       = "paid_customer"; 
        return $this->template->layout($data);
   }

    public function bdtask_004paidCustomer_checkdata()
   {
        $postData = $this->request->getVar();
        $data     = $this->customerModel->getPaidCustomerList($postData);
        echo json_encode($data);
   }


    public function delete_customer($id = null)
    { 
        $check_calculation = $this->customerModel->bdtask_checkcustomer_calculation($id);
        if($check_calculation == 0){
        if ($this->customerModel->delete_customer($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }
         }else{
          $this->session->setFlashdata('exception', 'Customer Already Engaged In Calculation');
         }
        return redirect()->route('customer/customer_list');
    }


    public function bdtask_05_customer_ledger()
   {
        $cmbGLCode       = '';
        $cmbCode         = ($this->request->getVar('customer_id')?$this->request->getVar('customer_id'):1020301);
        $dtpFromDate     = ($this->request->getVar('from_date')?$this->request->getVar('from_date'):date('Y-m-d'));
        $dtpToDate       = ($this->request->getVar('to_date')?$this->request->getVar('to_date'):date('Y-m-d'));
        $chkIsTransction = 1;

        $HeadName        = $this->accountModel->general_led_report_headname($cmbGLCode);
        $HeadName2       = $this->accountModel->general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction);
        $pre_balance     = $this->accountModel->general_led_report_prebalance($cmbCode,$dtpFromDate);
        $data = array(
            'title'          => lan('customer_ledger'),
            'dtpFromDate'    => $dtpFromDate,
            'dtpToDate'      => $dtpToDate,
            'customer_id'    => $cmbCode,
            'HeadName'       => $HeadName,
            'HeadName2'      => $HeadName2,
            'prebalance'     => $pre_balance,
            'chkIsTransction'=> $chkIsTransction,

        );

        $data['ledger']       = $this->accountModel->general_led_report_headname($cmbCode);
        $data['customer_list']= $this->customerModel->customer_list();
        $data['module']       = "Customer";
        $data['page']         = "customer_ledger"; 
       return $this->template->layout($data);
     
   }

   public function bdtask_006_customerleder_checkdata()
   {
     $postData = $this->request->getVar();
        $data     = $this->customerModel->getCreditCustomerList($postData);
        echo json_encode($data);
   }




}
