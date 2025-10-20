<?php namespace App\Modules\Hrm\Controllers;
class Personal_loan extends BaseController
{
   
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function index()
	 {
        
	    $data['title']      = 'Person  List';
      $data['module']     = "Hrm";
      $data['page']       = "personal_loan/person_list"; 
		return $this->template->layout($data);

  	}

     public function bdtask_CheckpersonList()
     {
        $postData = $this->request->getVar();
        $data     = $this->personalloan_model->getperson_informationList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_person_form($id = null)
        {
       
        $data = [];
        $data['person'] = (object)$userLevelData = array(
        'id'             => ($this->request->getVar('id')?$this->request->getVar('id'):null),
        'person_name'    => $this->request->getVar('person_name', FILTER_SANITIZE_STRING),
        'person_phone'   => $this->request->getVar('phone', FILTER_SANITIZE_STRING),
        'person_address' => $this->request->getVar('address', FILTER_SANITIZE_STRING),
        'status'         => 1,
        );
        if ($this->request->getMethod() == 'post') {
            
            $rules = [
            'person_name'     => ['label' => lan('name'),'rules'     => 'required'],
            'phone'           => ['label' => lan('phone'),'rules'    => 'required'],
                 
               
            ];
  

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
            
                if($this->personalloan_model->save_person_information($userLevelData)){
                   $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/loan/person_list/'));  
            }else{
                 $this->session->setFlashdata('exception', lan('please_try_again'));
                return  redirect()->to(base_url('/loan/person_list/'));
            }
          
               
               
            }else{
             $this->personalloan_model->update_person_information($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/loan/person_list/'));
               
            }

            }
        }

        $data['module']           = "Hrm";
        if(!empty($id)){
        $data['person']           = $this->personalloan_model->singledata($id); }
        $data['title']            = 'personal_loan';
        $data['page']             = "personal_loan/person_form"; 
        return $this->template->layout($data);
    }

    public function delete_person($id = null)
    { 
        if ($this->personalloan_model->delete_person_information($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('loan/person_list');
    }


   public function bdtask_0002_add_loan()
   {
    $data['title']        = lan('add_loan');
    $data['person_list']  = $this->personalloan_model->person_list();
    $data['bank_list']    = $this->expense_model->bank_list();
    $data['module']       = "Hrm";  
    $data['page']         = "personal_loan/loan_form";  
     return $this->template->layout($data);

      }


  public function bdtask_m_004_loanlist()
   {
      $data['title']      = 'Person  List';
      $data['module']     = "Hrm";
      $data['page']       = "personal_loan/person_list"; 
    return $this->template->layout($data);

    }

     public function bdtask_CheckloanList()
     {
        $postData = $this->request->getVar();
        $data     = $this->personalloan_model->getperson_informationList($postData);
        echo json_encode($data);
    } 

   
   public function bdtask_m_005_loanpayment()
   {
      if ($this->request->getMethod() == 'post') {
    $rules = [
        'dtpDate'          => ['label' => lan('date'),'rules'          => 'required'],
        'person_id'        => ['label' => lan('person_name'),'rules'   => 'required'],
        'paytype'          => ['label' => lan('payment_type'),'rules'  => 'required'],
        'amount'           => ['label' => lan('amount'),'rules'        => 'required'],
    ];

    if (! $this->validate($rules)) {
         $this->session->setFlashdata('exception', $this->validator->listErrors());
         return  redirect()->to(base_url('/loan/add_loan'));
        }else{
             $payment_type = $this->request->getVar('paytype', FILTER_SANITIZE_STRING);
              $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                $this->session->setFlashdata('exception', 'You Have Selected Bank Payment But did not Select Bank');
                  return  redirect()->to(base_url('/loan/add_loan'));
                exit;
                      
                  }
        $this->personalloan_model->save_loan();   
        $this->session->setFlashdata('message', lan('save_successfully'));
          return  redirect()->to(base_url('/loan/loan_list'));
    
   
      }
    }
   }


    public function bdtask_m_006_paymentlist()
   {
      $data['title']      = 'Person  List';
      $data['module']     = "Hrm";
      $data['page']       = "personal_loan/loan_list"; 
    return $this->template->layout($data);

    }

     public function bdtask_CheckpaymentList()
     {
        $postData = $this->request->getVar();
        $data     = $this->personalloan_model->getloan_informationList($postData);
        echo json_encode($data);
    } 


    public function delete_loan($id = null)
    { 
        if ($this->personalloan_model->delete_loan_information($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('loan/loan_list');
    }



    public function person_ledger()
    {
      $data['person_list']= $this->personalloan_model->person_list();
      $data['title']      = 'Person  Ledger';
      $data['module']     = "Hrm";
      $data['page']       = "personal_loan/person_ledger"; 
    return $this->template->layout($data);
    }


      public function bdtask_CheckpersonLedger()
     {
        $postData = $this->request->getVar();
        $data     = $this->personalloan_model->getpersonledger_informationList($postData);
        echo json_encode($data);
    } 

   


    public function bdtask_m_006_payment()
   {
      if ($this->request->getMethod() == 'post') {
    $rules = [
        'dtpDate'          => ['label' => lan('date'),'rules'         => 'required'],
        'person_id'        => ['label' => lan('person_name'),'rules'  => 'required'],
        'paytype'          => ['label' => lan('payment_type'),'rules' => 'required'],
        'amount'           => ['label' => lan('amount'),'rules'       => 'required'],
    ];

    if (! $this->validate($rules)) {
         $this->session->setFlashdata('exception', $this->validator->listErrors());
         return  redirect()->to(base_url('/loan/person_ledger'));
        }else{
        $payment_type = $this->request->getVar('paytype', FILTER_SANITIZE_STRING);
        $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                $this->session->setFlashdata('exception', 'You Have Selected Bank Payment But did not Select Bank');
                  return  redirect()->to(base_url('/loan/add_payment'));
                exit;
                      
                  }  
        $this->personalloan_model->save_payment();   
        $this->session->setFlashdata('message', lan('save_successfully'));
          return  redirect()->to(base_url('/loan/person_ledger'));
    
   
      }
    }

      $data['person_list']= $this->personalloan_model->person_list();
      $data['bank_list']  = $this->expense_model->bank_list();
      $data['title']      = 'Person  Ledger';
      $data['module']     = "Hrm";
      $data['page']       = "personal_loan/add_payment"; 
    return $this->template->layout($data);
   }

}
