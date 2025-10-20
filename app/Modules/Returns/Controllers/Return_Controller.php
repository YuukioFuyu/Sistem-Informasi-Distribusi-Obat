<?php namespace App\Modules\Returns\Controllers;
class Return_Controller extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function invoice_return_list()
	{
	    $data['title']      = 'retrun List';
        $data['module']     = "Returns";
        $data['page']       = "return_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckinvoiceretrunList()
     {
        $postData = $this->request->getVar();
        $data     = $this->return_model->getinvoicereturnList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_retrun_form($id = null)
        {
        $data['module']       = "Returns";
        $data['title']        = 'retruns';
        $data['page']         = "return_form"; 
        return $this->template->layout($data);
    }


    public function bdtask_002m_invoice_return_form()
    { 
        $invoice_no           = trim($this->request->getVar('invoice_no'));
        $check_invoice        = $this->return_model->check_invoiceno($invoice_no);
        if($check_invoice == 0){
          $this->session->setFlashdata('exception', 'Invalid Invoice No. Please Input Valid Invoice NO');
            return  redirect()->to(base_url('return/add_return'));
        }else{
           
        $data['invoice_data'] = $this->return_model->invoice_return_data($invoice_no);    
        }
        $data['title']        = 'retrun Details';
        $data['module']       = "Returns";
        $data['page']         = "invoice_return"; 
        return $this->template->layout($data);
    }


    public function save_invoice_return()
    {
          $rules = [
            'customer_id'     => ['label' => lan('customer'),'rules' => 'required'],
            'invoice_date'    => ['label' => lan('date'),'rules'    => 'required'],
           

            ];
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
               }else{
           
                $this->return_model->return_invoice_entry();
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/return/add_return/'));
               
            }
        }
    


    public function generator($lenth)
    {
        $number=array("1","2","3","4","5","6","7","8","9","0");
    
        for($i=0; $i<$lenth; $i++)
        {
            $rand_value=rand(0,9);
            $rand_number=$number["$rand_value"];
        
            if(empty($con))
            { 
            $con=$rand_number;
            }
            else
            {
            $con="$con"."$rand_number";}
        }
        return $con.date('s');
    }

        public function invoice_return_details($invoice_id)
         {

        $invoice_detail = $this->return_model->retrieve_invoice_html_data($invoice_id);
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;

        $data = array(
            'title'            => lan('invoice_return'),
            'invoice_id'       => $invoice_detail[0]['invoice_id'],
            'invoice_no'       => $invoice_detail[0]['return_id'],
            'customer_name'    => $invoice_detail[0]['customer_name'],
            'customer_address' => $invoice_detail[0]['customer_address'],
            'customer_mobile'  => $invoice_detail[0]['customer_mobile'],
            'customer_email'   => $invoice_detail[0]['customer_email'],
            'date_return'      => $invoice_detail[0]['date_return'],
            'total_amount'     => number_format($invoice_detail[0]['net_total_amount'], 2, '.', ','),
            'subTotal_quantity'=> $subTotal_quantity,
            'deduction'        => number_format($invoice_detail[0]['deduction'], 2, '.', ','),
            'total_deduct'     => number_format($invoice_detail[0]['total_deduct'], 2, '.', ','),
            'total_tax'        => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
            'totalnamount'     => number_format(($invoice_detail[0]['total_tax'])-$invoice_detail[0]['total_deduct'], 2, '.', ','),
            'note'             => $invoice_detail[0]['reason'],
            'invoice_all_data' => $invoice_detail,
        );

        $data['module']   = "Returns";  
        $data['page']     = "return_invoice_html";  
         return $this->template->layout($data);
    }


      public function bdtask_supplier_return() 
      {
        $purchase_id = trim($this->request->getVar('purchase_id'));
        $check = $this->return_model->check_purchase($purchase_id);
        if ($check == 0) {
            $this->session->setFlashdata(array('exception' => 'Invalid purchase id. Please Input Valid purchase id'));
            return  redirect()->to(base_url('return/add_return'));
        }
        $purchase_detail = $this->return_model->supplier_return($purchase_id);

        $data = array(
            'title'             => lan('supplier_return'),
            'purchase_id'       => $purchase_detail[0]['purchase_id'],
            'manufacturer_id'   => $purchase_detail[0]['manufacturer_id'],
            'manufacturer_name' => $purchase_detail[0]['manufacturer_name'],
            'date'              => $purchase_detail[0]['purchase_date'],
            'total_amount'      => $purchase_detail[0]['total_amount'],
            'total_discount'    => $purchase_detail[0]['total_discount'],
            'purchase_all_data' => $purchase_detail,
        );
        $data['module']   = "Returns";  
        $data['page']     = "manufacturer_return_form";  
       return $this->template->layout($data);
    }


    public function save_manufacturer_return()
    {
          $rules = [
            'manufacturer_id' => ['label' => lan('manufacturer'),'rules' => 'required'],
            'return_date'     => ['label' => lan('date'),'rules'         => 'required'],
           
            ];
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
               }else{
           
                $this->return_model->return_manufacturer_entry();
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/return/add_return/'));
               
            }
        }


 public function manufacturer_return_list()
    {
        $data['title']      = 'retrun List';
        $data['module']     = "Returns";
        $data['page']       = "manufacturer_return_list"; 
        return $this->template->layout($data);

    }

     public function bdtask_CheckmanufacturerretrunList()
     {
        $postData = $this->request->getVar();
        $data     = $this->return_model->getmanufacturerreturnList($postData);
        echo json_encode($data);
    } 


    public function manufacturer_return_details($ret_id)
    {
        
        $return_detail      = $this->return_model->manufacturer_return_html_data($ret_id);
        $subTotal_quantity  = 0;
        $subTotal_cartoon   = 0;
        $subTotal_discount  = 0;
        $subTotal_ammount   = 0;
        if(!empty($return_detail)){
            foreach($return_detail as $k=>$v){
                $subTotal_quantity = $subTotal_quantity+$return_detail[$k]['ret_qty'];
                $subTotal_ammount  = $subTotal_ammount+$return_detail[$k]['total_ret_amount'];
            }

            $i=0;
            foreach($return_detail as $k=>$v){$i++;
               $return_detail[$k]['sl']=$i;
            }
        }
        $data['purchase_id']       =  $return_detail[0]['purchase_id'];
        $data['invoice_no']        =  $return_detail[0]['return_id'];
        $data['manufacturer_name'] =  $return_detail[0]['manufacturer_name'];
        $data['address']           =  $return_detail[0]['address'];
        $data['mobile']            =  $return_detail[0]['mobile'];
        $data['date']              =  $return_detail[0]['date_return'];
        $data['total_amount']      =  number_format($return_detail[0]['net_total_amount'], 2, '.', ',');
        $data['deduction']         =  number_format($return_detail[0]['deduction'], 2, '.', ',');
        $data['total_deduct']      =  number_format($return_detail[0]['total_deduct'], 2, '.', ',');
        $data['note']              =  $return_detail[0]['reason'];
        $data['subTotal_ammount']  =  number_format($subTotal_ammount, 2, '.', ',');
        $data['subTotal_quantity'] =  $subTotal_quantity;
        $data['return_detail']     =  $return_detail;
        $data['title']             = 'Return Details';
        $data['module']            = "Returns";
        $data['page']              = "manufacturer_return_details"; 
        return $this->template->layout($data);
    }


    public function wastage_return_list()
    {
        $data['title']      = 'retrun List';
        $data['module']     = "Returns";
        $data['page']       = "wastage_list"; 
        return $this->template->layout($data);

    }

     public function bdtask_CheckwastageretrunList()
     {
        $postData = $this->request->getVar();
        $data     = $this->return_model->getwastagereturnList($postData);
        echo json_encode($data);
    } 

}
