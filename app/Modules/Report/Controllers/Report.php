<?php namespace App\Modules\Report\Controllers;
class Report extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function closing_list()
	{
 
	    $data['title']      = 'Closing List';
        $data['module']     = "Report";
        $data['page']       = "closing_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckclosingList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getclosingList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_closing_form()
        {
        $data = [];
           $data['report'] = (object)$userLevelData = array(
            'last_day_closing'  => str_replace(',', '', $this->request->getVar('last_day_closing')),
            'cash_in'           => str_replace(',', '', $this->request->getVar('cash_in')),
            'cash_out'          => str_replace(',', '', $this->request->getVar('cash_out')),
            'date'              => date('Y-m-d'),
            'amount'            => str_replace(',', '', $this->request->getVar('cash_in_hand')),
            'status'            => 1,
            'closed_by'         => $this->session->get('id'),
        );

        if ($this->request->getMethod() == 'post') {
         

             $rules = [
            'last_day_closing' => ['label' => lan('last_day_closing'),'rules' => 'required'],
            'cash_in'          => ['label' => lan('cash_in'),'rules'          => 'required'],
            'cash_out'         => ['label' => lan('cash_out'),'rules'         => 'required'],
            'cash_in_hand'     => ['label' => lan('cash_in_hand'),'rules'     => 'required'],

            ];
        

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
               }else{
           
                $check_exist = $this->report_model->check_exist_closing();
                if($check_exist == 0){
                $this->report_model->daily_closing_entry($userLevelData);
                $this->session->setFlashdata('message', lan('save_successful'));
                return  redirect()->to(base_url('/report/closing_list/'));
                }else{
                $this->session->setFlashdata('exception', 'Cash Already Closed');
                return  redirect()->to(base_url('/report/add_closing'));    
                }
            }
        }

        $data['title']    = "Reports | Daily Closing";
        $data['info']     = $this->report_model->accounts_closing_data();
        $data['module']   = "Report";
        $data['page']     = "closing_form"; 
       return $this->template->layout($data);
    }


    public function sales_report()
    {
        $data['title']      = 'Sale Report';
        $data['module']     = "Report";
        $data['page']       = "sales_report"; 
        return $this->template->layout($data);

    }

     public function bdtask_ChecksalesreportList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getsalesreportList($postData);
        echo json_encode($data);
    }


    public function userwise_sales_report()
    {
        $data['title']      = 'User Wise Sale Report';
        $data['module']     = "Report";
        $data['user_list']  = $this->report_model->user_list();
        $data['page']       = "userwise_sales_report"; 
        return $this->template->layout($data);

    }

    public function bdtask_CheckuserwisesalesreportList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getuserwise_salesreportList($postData);
        echo json_encode($data);
    } 

    public function productwise_sales_report()
    {
        $data['title']         = 'Product Wise Sale Report';
        $data['module']        = "Report";
        $data['product_list']  = $this->report_model->medicine_list();
        $data['page']          = "productwise_sales_report"; 
        return $this->template->layout($data);

    }

    public function bdtask_CheckproductwisesalesreportList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getproductwise_salesreportList($postData);
        echo json_encode($data);
    }


    public function categorywise_sales_report()
    {
        $data['title']         = 'Category Wise Sale Report';
        $data['module']        = "Report";
        $data['category_list'] = $this->report_model->category_list();
        $data['page']          = "categorywise_sales_report"; 
        return $this->template->layout($data);

    }

    public function bdtask_CheckcategorywisesalesreportList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getcategorywise_salesreportList($postData);
        echo json_encode($data);
    }


    public function purchase_report()
    {
        $data['title']         = 'Purchase Report';
        $data['module']        = "Report";
        $data['page']          = "purchase_report"; 
        return $this->template->layout($data);

    }

    public function bdtask_CheckpurchasereportList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getpurchasereportList($postData);
        echo json_encode($data);
    }


     public function categorywise_purchase_report()
    {
        $data['title']         = 'Purchase Report';
        $data['module']        = "Report";
        $data['category_list'] = $this->report_model->category_list();
        $data['page']          = "purchase_report_categorywise"; 
        return $this->template->layout($data);

    }

    public function bdtask_CheckcategorywisepurchasereportList()
     {
        $postData = $this->request->getVar();
        $data     = $this->report_model->getcategorywise_purchasereportList($postData);
        echo json_encode($data);
    }


}
