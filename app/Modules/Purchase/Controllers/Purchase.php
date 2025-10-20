<?php namespace App\Modules\Purchase\Controllers;
class Purchase extends BaseController
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

	    $data['title']      = 'Purchase List';
        $data['module']     = "Purchase";
        $data['page']       = "purchase_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckpurchaseList()
     {
        $postData = $this->request->getVar();
        $data     = $this->purchaseModel->getpurchaseList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_purchase_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('purchase_id'));
        $data = [];
        $data['purchase'] = (object)$purchaseData = array(
        'purchase_id'       => $this->generator(10),
        'manufacturer_id'   => $this->request->getVar('manufacturer_id'),
        'purchase_date'     => $this->request->getVar('date', FILTER_SANITIZE_STRING),
        'chalan_no'         => $this->request->getVar('invoice_no', FILTER_SANITIZE_STRING),
        'purchase_details'  => $this->request->getVar('details', FILTER_SANITIZE_STRING),
        'payment_type'      => $this->request->getVar('payment_type', FILTER_SANITIZE_STRING),
        'grand_total_amount'=> $this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING),
        'paid_amount'       => ($this->request->getVar('paid_amount', FILTER_SANITIZE_STRING)?$this->request->getVar('paid_amount', FILTER_SANITIZE_STRING):0),
        'due_amount'        => ($this->request->getVar('due_amount', FILTER_SANITIZE_STRING)?$this->request->getVar('due_amount', FILTER_SANITIZE_STRING):0),
        'total_discount'    => ($this->request->getVar('discount', FILTER_SANITIZE_STRING)?$this->request->getVar('discount', FILTER_SANITIZE_STRING):0),
        'bank_id'           => $this->request->getVar('bank_id', FILTER_SANITIZE_STRING),
        'total_vat'         => ($this->request->getVar('vat', FILTER_SANITIZE_STRING)?$this->request->getVar('vat', FILTER_SANITIZE_STRING):0),
        'status'            => 1,
        'purchase_by'       => $this->session->get('id'),
        );

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'manufacturer_id'   => ['label'   => lan('manufacturer'),'rules' => 'required'],
                'date'              => ['label'   => lan('date'),'rules'         => 'required'],
                'payment_type'      => ['label'   => lan('payment_type'),'rules' => 'required'],
                'invoice_no'        => ['label'   => lan('invoice_no'),'rules'   => 'required'],                       
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
             
     $manufacturer_id = $this->request->getVar('manufacturer_id');
      $p_id     = $this->request->getVar('product_id');
          for ($i=0, $n=count($p_id); $i < $n; $i++) {
      $product_id =$p_id[$i];
      $value=$this->purchaseModel->product_manufacturer_check($product_id,$manufacturer_id);
      if($value==0){
          session()->setFlashdata(array('exception'=>"Medicine And Manufacturer Did Not Match"));
         return  redirect()->to(base_url('/purchase/add_purchase/'));
         exit();
          
      }
    }

   $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
    $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);

      if($payment_type == 2 && empty($bank_id)){
          session()->setFlashdata(array('exception'=>"You Have Selected Bank Payment But did not Select Bank"));
         return  redirect()->to(base_url('/purchase/add_purchase/'));
         exit();
          
      }
                $this->purchaseModel->save_purchase($purchaseData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/purchase/purchase_list/'));
          

            }
        }



        $data['module']       = "Purchase";
        if(!empty($id)){
        $data['purchase']     = $this->purchaseModel->singledata($id);
        $data['leaf_pattern'] = $this->purchaseModel->leaf_setting_list();
         }
        $data['title']        = 'Purchase';
        $data['manufacturers']= $this->purchaseModel->manufacturer_list();
        $data['leaf_pattern'] = $this->purchaseModel->leaf_setting_list();
        $data['bank_list']    = $this->purchaseModel->bank_list();
        $data['page']         = "purchase_form"; 
        return $this->template->layout($data);
    }


    public function bdtask_002m_purchase_details($id)
    { 
        $data['purchase']     = $this->purchaseModel->singledata($id); 
        $data['details']      = $this->purchaseModel->detailsdata($id);
        $data['title']        = 'Purchase Details';
        $data['module']       = "Purchase";
        $data['page']         = "purchase_details"; 
        return $this->template->layout($data);
    }


     public function bdtask_003m_purchase_edit($id)
    {   $data['title']        = 'Edit Purchase';
        $data['purchase']     = $this->purchaseModel->singledata($id); 
        $data['details']      = $this->purchaseModel->detailsdata($id);
        $data['manufacturers']= $this->purchaseModel->manufacturer_list();
        $data['leaf_pattern'] = $this->purchaseModel->leaf_setting_list();
        $data['bank_list']    = $this->purchaseModel->bank_list();
        $data['module']       = "Purchase";
        $data['page']         = "purchase_edit"; 
        return $this->template->layout($data);
    }

    public function bdtask_004m_purchase_update(){
        $data['purchase'] = (object)$purchaseData = array(
        'purchase_id'       => $this->request->getVar('purchase_id'),
        'manufacturer_id'   => $this->request->getVar('manufacturer_id', FILTER_SANITIZE_STRING),
        'purchase_date'     => $this->request->getVar('date', FILTER_SANITIZE_STRING),
        'chalan_no'         => $this->request->getVar('invoice_no', FILTER_SANITIZE_STRING),
        'purchase_details'  => $this->request->getVar('details', FILTER_SANITIZE_STRING),
        'payment_type'      => $this->request->getVar('payment_type', FILTER_SANITIZE_STRING),
        'grand_total_amount'=> ($this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING)?$this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING):0),
        'paid_amount'       => ($this->request->getVar('paid_amount', FILTER_SANITIZE_STRING)?$this->request->getVar('paid_amount', FILTER_SANITIZE_STRING):0),
        'due_amount'        => ($this->request->getVar('due_amount', FILTER_SANITIZE_STRING)?$this->request->getVar('due_amount', FILTER_SANITIZE_STRING):0),
        'total_discount'    => ($this->request->getVar('discount', FILTER_SANITIZE_STRING)?$this->request->getVar('discount', FILTER_SANITIZE_STRING):0),
        'total_vat'         => ($this->request->getVar('vat', FILTER_SANITIZE_STRING)?$this->request->getVar('vat', FILTER_SANITIZE_STRING):0),
        'bank_id'           => $this->request->getVar('bank_id', FILTER_SANITIZE_STRING),
        'status'            => 1
        );

           if ($this->request->getMethod() == 'post') {
            $rules = [
                'manufacturer_id'   => ['label'   => lan('manufacturer'),'rules' => 'required'],
                'date'              => ['label'   => lan('date'),'rules'         => 'required'],
                'payment_type'      => ['label'   => lan('payment_type'),'rules' => 'required'],
                'invoice_no'        => ['label'   => lan('invoice_no'),'rules'   => 'required'],                       
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $this->session->setFlashdata('exception', $this->validator->listErrors());
                 return  redirect()->to(base_url('/purchase/purchase_edit/'.$purchaseData['purchase_id']));
            }else{
             
                  $manufacturer_id = $this->request->getVar('manufacturer_id');
                  $p_id     = $this->request->getVar('product_id');
                      for ($i=0, $n=count($p_id); $i < $n; $i++) {
                  $product_id =$p_id[$i];
                  $value=$this->purchaseModel->product_manufacturer_check($product_id,$manufacturer_id);
                  if($value==0){
                      session()->setFlashdata(array('exception'=>"Medicine And Manufacturer Did Not Match"));
                     return  redirect()->to(base_url('/purchase/add_purchase/'));
                     exit();
                      
                  }
                }

               $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
                $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);

                  if($payment_type == 2 && empty($bank_id)){
                      session()->setFlashdata(array('exception'=>"You Have Selected Bank Payment But did not Select Bank"));
                     return  redirect()->to(base_url('/purchase/add_purchase/'));
                     exit();
                      
                  }
                $this->purchaseModel->update_purchase($purchaseData);
                $this->session->setFlashdata('message', lan('successfully_updated'));
                return  redirect()->to(base_url('/purchase/purchase_list/'));
          

            }
        }
    }

    public function delete_purchase($id = null)
    { 
        if ($this->purchaseModel->delete_purchase($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('purchase/purchase_list');
    }


    public function retrieve_product_data()
    {   
        $product_id      = $this->request->getVar('product_id');
        $manufacturer_id = $this->request->getVar('manufacturer_id');
        $product_info    = $this->purchaseModel->get_total_product($product_id,$manufacturer_id);

        echo json_encode($product_info);
    }


    public function product_search_by_manufacturer()
    {
        $manufacturer_id= $this->request->getVar('manufacturer_id', FILTER_SANITIZE_STRING);
        $product_name   = $this->request->getVar('product_name', FILTER_SANITIZE_STRING);
        $product_info   = $this->purchaseModel->product_search_item($manufacturer_id,$product_name);
       if(!empty($product_info)){
        $list[''] = '';
        foreach ($product_info as $value) {
            $json_product[] = array('label'=>$value['product_name'].'('.$value['strength'].')','value'=>$value['product_id']);
        } 
    }else{
        $json_product[] = 'No Medicine Found';
        }
        echo json_encode($json_product);
    
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

}
