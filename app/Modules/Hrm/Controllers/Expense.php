<?php namespace App\Modules\Hrm\Controllers;
class Expense extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function index()
	{
        

	    $data['title']      = 'Expense Item List';
      $data['module']     = "Hrm";
      $data['items']      = $this->expense_model->findAll_item();
      $data['page']       = "expense/expense_item_list"; 
		return $this->template->layout($data);

	}

    

        public function bdtask_0001_expenseitem_form($id = null)
        {
       

        $data = [];
        $data['expense'] = (object)$userLevelData = array(
        'id'                   => ($this->request->getVar('id')?$this->request->getVar('id'):null),
        'expense_item_name'    => $this->request->getVar('expense_item_name', FILTER_SANITIZE_STRING),
        
        );
        if ($this->request->getMethod() == 'post') {
            
            $rules = [
            'expense_item_name' => ['label' => lan('expense_item_name'),'rules' => 'required'],
                
               
            ];
  

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $check = $this->expense_model->check_exist($userLevelData);
                if($check == false){
                if($this->expense_model->save_item($userLevelData)){
                   $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/expense/expense_item_list/'));  
            }else{
                 $this->session->setFlashdata('exception', lan('please_try_again'));
                return  redirect()->to(base_url('/expense/expense_item_list/'));
            }
           }else{
             $this->session->setFlashdata('exception', 'Already Added');
                return  redirect()->to(base_url('/expense/add_expense_item/')); 
           }
               
               
            }else{
             $this->expense_model->update_expense_item($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/expense/expense_item_list/'));
               
            }

            }
        }

        $data['module']           = "Hrm";
        if(!empty($id)){
        $data['expense']          = $this->expense_model->singledata($id); }
        $data['title']            = 'Expense Item';
        $data['page']             = "expense/expense_item_form"; 
        return $this->template->layout($data);
    }

    public function delete_expense_item($id = null)
    { 
        if ($this->expense_model->delete_expense_item($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('expense/expense_item_list');
    }


  
    public function bdtask_add_expense()
    {
    $data['title']        = lan('add_expense');
    $data['expense_item'] = $this->expense_model->expense_item_list();
    $data['bank_list']    = $this->expense_model->bank_list();
    $data['module']       = "Hrm";  
    $data['page']         = "expense/expense_form";  
     return $this->template->layout($data);
    }
   

      public function bdtask_create_expense(){
         $rules = [
            'dtpDate'      => ['label' => lan('date'),'rules'         => 'required'],
            'expense_type' => ['label' => lan('expense_type'),'rules' => 'required'],
            'paytype'      => ['label' => lan('payment_type'),'rules' => 'required'],
            'amount'       => ['label' => lan('amount'),'rules'       => 'required'],
            ];
         if ($this->validate($rules)) { 
          $payment_type = $this->request->getVar('paytype', FILTER_SANITIZE_STRING);
           $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                $this->session->setFlashdata('exception', 'You Have Selected Bank Payment But did not Select Bank');
                  return  redirect()->to(base_url('/expense/add_expense'));
                exit;
                      
                  }  
         if ($this->expense_model->save_expense()) { 
          $this->session->setFlashdata('message', lan('save_successfully'));
            return redirect()->route('expense/add_expense');
          }else{
                $this->session->setFlashdata('exception',  lan('please_try_again'));
              }
            return redirect()->route('expense/add_expense');
          }else{
          $this->session->setFlashdata('exception',  $this->validator->listErrors());
         return redirect()->route('expense/add_expense');
         }

      }

   public function expense_list()
    {
    $data['title']        = lan('add_expense');
    $data['module']       = "Hrm";  
    $data['page']         = "expense/expense_list";  
     return $this->template->layout($data);
    }

      public function bdtask_CheckexpenseList()
     {
        $postData = $this->request->getVar();
        $data     = $this->expense_model->getexpenseList($postData);
        echo json_encode($data);
    } 

 
    public function delete_expense($id = null)
    { 
        if ($this->expense_model->delete_expense($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('expense/expense_list');
    }



    public function bdtask_expense_statement()
    {
      $data['title']        = lan('expense_statement');
      $expense_item         = ($this->request->getVar('expense_type')?$this->request->getVar('expense_type'):'');
      $from_date            = ($this->request->getVar('from_date')?$this->request->getVar('from_date'):date('Y-m-d'));
      $to_date              = ($this->request->getVar('to_date')?$this->request->getVar('to_date'):date('Y-m-d'));
      $data['expense_item'] = $this->expense_model->expense_item_list();
      $data['eitem']        = $expense_item;
      $data['from_date']    = $from_date;
      $data['to_date']      = $to_date;
      $data['expense_info'] = $this->expense_model->expense_searchdata($expense_item,$from_date,$to_date);
      $data['module']       = "Hrm";  
      $data['page']         = "expense/expense_statement";  
       return $this->template->layout($data);
    }
   
}
