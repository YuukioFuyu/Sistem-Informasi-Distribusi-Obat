<?php namespace App\Modules\Stock\Controllers;
class Stock extends BaseController
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

	    $data['title']      = 'stock List';
        $data['module']     = "Stock";
        $data['page']       = "stock_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckstockList()
     {
        $postData = $this->request->getVar();
        $data     = $this->stockModel->getstockList($postData);
        echo json_encode($data);
    } 

    

        public function batch_wise_stock()
    {
         if (!$this->session->get('isLogIn')){
        return redirect()->route('login');
    }

        $data['title']      = 'Batch Wise stock List';
        $data['module']     = "Stock";
        $data['page']       = "stock_report_batchwise"; 
        return $this->template->layout($data);

    }

        public function Checkbatchstock(){
        $postData = $this->request->getVar();
        $data = $this->stockModel->getCheckBatchStock($postData);
        echo json_encode($data);
    } 


    public function available_stock()
    {
         if (!$this->session->get('isLogIn')){
        return redirect()->route('login');
    }

        $data['title']      = 'Available Stock List';
        $data['module']     = "Stock";
        $data['page']       = "available_stock"; 
        return $this->template->layout($data);

    }

        public function Check_available_stock(){
        $postData = $this->request->getVar();
        $data     = $this->stockModel->getavailable_stockList($postData);
        echo json_encode($data);
    } 


       
}
