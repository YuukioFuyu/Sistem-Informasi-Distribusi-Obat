<?php namespace App\Modules\Invoice\Controllers;
class Invoice extends BaseController
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

	    $data['title']      = 'invoice List';
        $data['module']     = "Invoice";
        $data['page']       = "invoice_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckinvoiceList()
     {
        $postData = $this->request->getVar();
        $data     = $this->invoiceModel->getinvoiceList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_invoice_form()
        {
    $setting_data = $this->invoiceModel->setting_data();                       
     date_default_timezone_set($setting_data->timezone);
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
      $invoice_id = $this->generator(10);
        $data = [];
        $data['invoice'] = (object)$invoiceData = array(
        'invoice_id'        => $invoice_id,
        'customer_id'       => $this->request->getVar('customer_id'),
        'date'              => $this->request->getVar('date'),
        'total_amount'      => ($this->request->getVar('n_total')?$this->request->getVar('n_total'):0),
        'invoice'           => $this->number_generator(),
        'total_tax'         => ($this->request->getVar('total_tax')?$this->request->getVar('total_tax'):0),
        'prevous_due'       => ($this->request->getVar('previous')?$this->request->getVar('previous'):0),
        'paid_amount'       => ($this->request->getVar('paid_amount', FILTER_SANITIZE_STRING)?$this->request->getVar('paid_amount', FILTER_SANITIZE_STRING):0),
        'due_amount'        => ($this->request->getVar('due_amount', FILTER_SANITIZE_STRING)?$this->request->getVar('due_amount', FILTER_SANITIZE_STRING):0),
        'total_discount'    => ($this->request->getVar('total_discount', FILTER_SANITIZE_STRING)?$this->request->getVar('total_discount', FILTER_SANITIZE_STRING):0),
        'invoice_discount'  => ($this->request->getVar('invoice_discount', FILTER_SANITIZE_STRING)?$this->request->getVar('invoice_discount', FILTER_SANITIZE_STRING):0),
        'bank_id'           => $this->request->getVar('bank_id'),
        'sales_by'          => $this->session->get('id'),
        'invoice_details'   => $this->request->getVar('details', FILTER_SANITIZE_STRING),
        'payment_type'      => $this->request->getVar('payment_type'),
        'status'            => 1
        );

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'customer_id'   => ['label' => lan('customer_name'),'rules' => 'required'],
                'date'          => ['label' => lan('date'),'rules'          => 'required'],
                'payment_type'  => ['label' => lan('payment_type'),'rules'  => 'required'],
                'invoice_no'    => ['label' => lan('invoice_no'),'rules'    => 'required'],                       
            ];

            if (! $this->validate($rules)) {
                 $info['exception'] = $this->validator->listErrors();
                $info['status'] = false;
                 echo json_encode($info);
                 exit; 
            }else{
                $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
                $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
         if($payment_type == 2 && empty($bank_id)){
                   $info['exception']      = 'You Have Selected Bank Payment But did not Select Bank';
                   $info['status']       = false;
                       echo json_encode($info);
                exit;
                      
                  }
             $invoice_id = $this->invoiceModel->save_invoice($invoiceData);  
             $printdata['company'] = $this->invoiceModel->company_details();
             $printdata['main']    = $this->invoiceModel->invoice_main($invoice_id);
             $printdata['invoice'] = $this->invoiceModel->singledata($invoice_id); 
             $printdata['details'] = $this->invoiceModel->detailsdata($invoice_id);
             $info['message']      = 'Successfully Saved';
             $info['details']      = view('App\Modules\Invoice\Views\direct_manual_print', $printdata);
             $info['status']       = true;
                 echo json_encode($info);
          exit;
        
            }
        }

        $data['module']        = "Invoice";
        $data['title']         = 'Invoice Form';
        $walking_customer      = $this->invoiceModel->pos_customer_setup();
        $data['customer_id']   = ($walking_customer?$walking_customer[0]['customer_id']:'');
        $data['customer_name'] = ($walking_customer?$walking_customer[0]['customer_name']:'');
        $data['bank_list']     = $this->invoiceModel->bank_list();
        $data['taxes']         = $this->invoiceModel->tax_fields();
        $data['invoice_no']    = $this->number_generator();
        $data['page']          = "invoice_form"; 
        return $this->template->layout($data);
    }


     public function bdtask_0002_pos_invoice_form($id = null)
        {
     $setting_data = $this->invoiceModel->setting_data();                       
     date_default_timezone_set($setting_data->timezone);
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}

        $invoice_id = $this->generator(10);
        $data = [];
        $data['invoice'] = (object)$invoiceData = array(
        'invoice_id'        => $invoice_id,
        'customer_id'       => $this->request->getVar('customer_id'),
        'date'              => date('Y-m-d'),
        'total_amount'      => ($this->request->getVar('n_total')?$this->request->getVar('n_total'):0),
        'invoice'           => $this->number_generator(),
        'total_tax'         => ($this->request->getVar('total_tax')?$this->request->getVar('total_tax'):0),
        'prevous_due'       => ($this->request->getVar('previous')?$this->request->getVar('previous'):0),
        'paid_amount'       => ($this->request->getVar('paid_amount')?$this->request->getVar('paid_amount'):0),
        'due_amount'        => ($this->request->getVar('due_amount')?$this->request->getVar('due_amount'):0),
        'total_discount'    => ($this->request->getVar('total_discount')?$this->request->getVar('total_discount'):0),
        'invoice_discount'  => ($this->request->getVar('invoice_discount')?$this->request->getVar('invoice_discount'):0),
        'bank_id'           => $this->request->getVar('bank_id'),
        'sales_by'          => $this->session->get('id'),
        'invoice_details'   => 'Thank you',
        'payment_type'      => $this->request->getVar('payment_type'),
        'status'            => 1
        );

        if ($this->request->getMethod() == 'post') {
    
            $rules = [
                'customer_id'       => ['label' => lan('customer'),'rules' => 'required'],
                'grand_total_price' => ['label' => lan('grand_total'),'rules' => 'required'],
                ];

   

            if (! $this->validate($rules)) {
                $info['exception'] = $this->validator->listErrors();
                $info['status'] = false;
                 echo json_encode($info);
                 exit; 
            }else{
             $invoice_id = $this->invoiceModel->save_invoice($invoiceData);  

             $printdata['company'] = $this->invoiceModel->company_details();
             $printdata['main']    = $this->invoiceModel->invoice_main($invoice_id);
             $printdata['details'] = $this->invoiceModel->invoice_details($invoice_id);
             $info['message']      = lan('save_successfully');
             $info['details']      = view('App\Modules\Invoice\Views\pos_print', $printdata);
             $info['status']       = true;
                 echo json_encode($info);
          exit;

            }
        }

        $data['module']         = "Invoice";
        if(!empty($id)){
        $data['invoice']        = $this->invoiceModel->singledata($id); }
        $data['title']          = 'POS Invoice';
        $walking_customer       = $this->invoiceModel->pos_customer_setup();
        $data['customer_id']    = ($walking_customer?$walking_customer[0]['customer_id']:'');
        $data['customer_name']  = ($walking_customer?$walking_customer[0]['customer_name']:'');
        $data['product_list']   = $this->invoiceModel->medicine_list();
        $data['bank_list']      = $this->invoiceModel->bank_list();
        $data['categorylist']   = $this->invoiceModel->category_list();
        $data['itemlist']       = $this->invoiceModel->medicine_list();
        $data['todays_sale']    = $this->invoiceModel->todays_saleList();
        $data['taxes']          = $this->invoiceModel->tax_fields();
        $data['page']           = "pos_invoice_form"; 
        return $this->template->layout($data);
    }


       public function getitemlist(){
                $catid           = $this->request->getVar('category_id');
                $category_id     = (!empty($catid)?$catid:'');
                $getproduct      = $this->invoiceModel->getitemlist($category_id);
                if(!empty($getproduct)){
                $data['itemlist'] = $getproduct;
                echo view('App\Modules\Invoice\Views\getproductlist', $data);  
                }else{
                $title['title'] = 'Medicine Not found';
                 echo view('App\Modules\Invoice\Views\product_not_found', $title);
                }
        }


      public function getmedicine_byname(){
            $product_name     = $this->request->getVar('product_name');
            $getproduct       = $this->invoiceModel->searchprod_byname($product_name);
            if(!empty($getproduct)){
            $data['itemlist'] = $getproduct;
            echo view('App\Modules\Invoice\Views\getproductlist', $data);  
            }else{
            $title['title']   = 'Medicine Not found';
            echo view('App\Modules\Invoice\Views\product_not_found', $title);
            }
     }

    public function bdtask_002m_invoice_details($id)
    { 
        $data['title']        ='Invoice Details';
        $data['invoice']      = $this->invoiceModel->singledata($id); 
        $data['details']      = $this->invoiceModel->detailsdata($id);
        $data['module']       = "Invoice";
        $data['page']         = "invoice_details"; 
        return $this->template->layout($data);
    }


     public function bdtask_003m_invoice_edit($id = null)
    { 
             if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
      $invoice_id = $this->request->getVar('invoice_id');
        $data = [];
        $data['invoice'] = (object)$invoiceData = array(
        'invoice_id'        => $invoice_id,
        'customer_id'       => $this->request->getVar('customer_id'),
        'date'              => $this->request->getVar('date'),
        'total_amount'      => ($this->request->getVar('n_total')?$this->request->getVar('n_total'):0),
        'invoice'           => $this->request->getVar('invoice_no'),
        'total_tax'         => ($this->request->getVar('total_tax')?$this->request->getVar('total_tax'):0),
        'prevous_due'       => ($this->request->getVar('previous')?$this->request->getVar('previous'):0),
        'paid_amount'       => ($this->request->getVar('paid_amount')?$this->request->getVar('paid_amount'):0),
        'due_amount'        => ($this->request->getVar('due_amount')?$this->request->getVar('due_amount'):0),
        'total_discount'    => ($this->request->getVar('total_discount')?$this->request->getVar('total_discount'):0),
        'invoice_discount'  => ($this->request->getVar('invoice_discount')?$this->request->getVar('invoice_discount'):0),
        'bank_id'           => $this->request->getVar('bank_id'),
        'sales_by'          => $this->session->get('id'),
        'invoice_details'   => $this->request->getVar('details', FILTER_SANITIZE_STRING),
        'payment_type'      => $this->request->getVar('payment_type'),
        'status'            => 1
        );

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'customer_id'   => ['label' => lan('customer_name'),'rules' => 'required'],
                'date'          => ['label' => lan('date'),'rules'          => 'required'],
                'payment_type'  => ['label' => lan('payment_type'),'rules'  => 'required'],
                'invoice_no'    => ['label' => lan('invoice_no'),'rules'    => 'required'],                       
            ];

            if (! $this->validate($rules)) {
                 $info['exception'] = $this->validator->listErrors();
                $info['status'] = false;
                 echo json_encode($info);
                 exit; 
            }else{
                $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
                $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                   $info['exception']      = 'You Have Selected Bank Payment But did not Select Bank';
                   $info['status']       = false;
                       echo json_encode($info);
                exit;
                      
                  }
             $invoice_id = $this->invoiceModel->update_invoice($invoiceData);  
             $printdata['company'] = $this->invoiceModel->company_details();
             $printdata['main']    = $this->invoiceModel->invoice_main($invoice_id);
             $printdata['invoice'] = $this->invoiceModel->singledata($invoice_id); 
             $printdata['details'] = $this->invoiceModel->detailsdata($invoice_id);
             $info['message']      = lan('save_successfully');
             $info['details']      = view('App\Modules\Invoice\Views\direct_manual_print', $printdata);
             $info['status']       = true;
                 echo json_encode($info);
          exit;
        
            }
        }
        $data['title']         = 'Invoice Update Form';
        $walking_customer      = $this->invoiceModel->pos_customer_setup();
        $data['customer_id']   = ($walking_customer?$walking_customer[0]['customer_id']:'');
        $data['customer_name'] = ($walking_customer?$walking_customer[0]['customer_name']:'');
        $data['bank_list']     = $this->invoiceModel->bank_list();
        $data['taxes']         = $this->invoiceModel->tax_fields();
        $data['taxvalu']       = $this->invoiceModel->invoice_taxinfo($id);
        $data['invoice']       = $this->invoiceModel->singledata($id); 
        $data['details']       = $this->invoiceModel->detailsdata($id);
        $data['module']        = "Invoice";
        $data['page']          = "invoice_edit"; 
        return $this->template->layout($data);
    }

    public function bdtask_004m_invoice_update(){
        $data['invoice'] = (object)$invoiceData = array(
        'invoice_id'        => $this->request->getVar('invoice_id'),
        'manufacturer_id'   => $this->request->getVar('manufacturer_id'),
        'invoice_date'      => $this->request->getVar('date'),
        'chalan_no'         => $this->request->getVar('invoice_no'),
        'invoice_details'   => $this->request->getVar('details'),
        'payment_type'      => $this->request->getVar('payment_type'),
        'grand_total_amount'=> $this->request->getVar('grand_total_price'),
        'paid_amount'       => $this->request->getVar('paid_amount'),
        'due_amount'        => $this->request->getVar('due_amount'),
        'total_discount'    => $this->request->getVar('discount'),
        'bank_id'           => $this->request->getVar('bank_id'),
        'status'            => 1
        );

           if ($this->request->getMethod() == 'post') {
            $rules = [
                'manufacturer_id'   => ['label' => lan('manufacturer'),
                                      'rules' => 'required'],

                'date'              => ['label'   => lan('date'),
                                      'rules' => 'required'],
                'payment_type'      => ['label'   => lan('payment_type'),
                                      'rules' => 'required'],
                'invoice_no'        => ['label'   => lan('invoice_no'),
                                      'rules' => 'required'],                       
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $this->session->setFlashdata('exception', $this->validator->listErrors());
                 return  redirect()->to(base_url('/Invoice/invoice_edit/'.$invoiceData['invoice_id']));
            }else{
             $payment_type = $this->request->getVar('payment_type', FILTER_SANITIZE_STRING);
                $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
               if($payment_type == 2 && empty($bank_id)){
                   $info['exception']      = 'You Have Selected Bank Payment But did not Select Bank';
                   $info['status']       = false;
                       echo json_encode($info);
                exit;
                      
                  }
                $this->invoiceModel->update_invoice($invoiceData);
                $this->session->setFlashdata('message', lan('successfully_updated'));
                return  redirect()->to(base_url('/Invoice/invoice_list/'));
          

            }
        }
    }

    public function bdtask_005_invoice_pos_print($invoice_id = null){
        $data['title']   = 'POS Print';
        $data['company'] = $this->invoiceModel->company_details();
        $data['main']    = $this->invoiceModel->invoice_main($invoice_id);
        $data['details'] = $this->invoiceModel->invoice_details($invoice_id);
        $data['module']  = "Invoice";
        $data['page']    = "pos_print_manual"; 
        return $this->template->layout($data);
    }

    public function delete_invoice($id = null)
    { 
        if ($this->invoiceModel->delete_invoice($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('invoice/invoice_list');
    }

   public function search_customers()
    {   
        $customer_name    = $this->request->getVar('customer_name');
        $customer_info    = $this->invoiceModel->search_customers($customer_name);
         if(!empty($customer_info)){
        $list[''] = '';
        foreach ($customer_info as $value) {
            $json_customer[] = array('label'=>$value['customer_name'],'value'=>$value['customer_id']);
        } 
    }else{
        $json_customer[] = 'No Customer Found';
        }
        echo json_encode($json_customer);
    }

    public function product_search_by_manufacturer()
    {
        $manufacturer_id= $this->request->getVar('manufacturer_id');
        $product_name   = $this->request->getVar('product_name');
        $product_info   = $this->invoiceModel->product_search_item($manufacturer_id,$product_name);
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


    public function pos_setup(){
        $product_id      = $this->request->getVar('product_id');
        $product_details = $this->invoiceModel->pos_invoice_setup($product_id);
        $batch           = $this->invoiceModel->batch_search_item($product_id);
        $taxfield        = $this->invoiceModel->tax_fields();
        $total_stock     = 0;
        $currency_details= 1;
        $prinfo = $this->db->table('product_information')
                                ->select('*')
                                ->where('product_id',$product_id)
                                ->get()
                                ->getResultArray();
        $tr = " ";
        if (!empty($product_details)){
            $product_id = $product_id;
   
            //Batch id retrive from database
            $html = "";
            if (empty($batch)) {
                $html .="Not Found!";
            }else{
                // Select option created for product
        $html .="<select name=\"batch_id[]\"   class=\"batch_id_".$product_details->product_id." form-control-sm select2\" id=\"batch_id_".$product_details->product_id."\"  onchange=\"product_stock_pos('".$product_details->product_id."')\" required>";
        $html .= "<option value=''>".lan('select_batch')."</option>";
                    foreach ($batch as $product) {
        $total_purchase_batch = $this->invoiceModel->purchase_batch_data($product_id,$product['batch_id']);
        $total_sale_batch     = $this->invoiceModel->invoice_batch_data($product_id,$product['batch_id']);
        $batch_stock          = ($total_purchase_batch->total_purchase - $total_sale_batch->total_sale);

        if($batch_stock > 0){
                $html .="<option value=".$product['batch_id'].">".$product['batch_id']."</option>";
                    }   
                }
                $html .="</select>";
            }

    $tr .= "<tr id=\"row_".$product_details->product_id."\">
                <td class=\"\" style=\"width:220px\">
                    <input type=\"text\" name=\"product_name\" onkeypress=\"invoice_productList(".$product_details->product_id.");\" class=\"form-control form-control-sm \" value='".$product_details->product_name."- (".$product_details->strength.")"."' placeholder='".lan('medicine_name')."'  id=\"product_name_".$product_details->product_id."\" tabindex=\"\" readonly>
                    <input type=\"hidden\" class=\"form-control autocomplete_hidden_value product_id_".$product_details->product_id."\" name=\"product_id[]\" id=\"product_id_".$product_details->product_id."\" value = \"$product_details->product_id\" />
                </td>
                <td>$html</td>
                
                <td> <span id=\"expire_date_".$product_details->product_id."\"></span> <input type=\"hidden\" name=\"available_quantity[]\" class=\"form-control form-control-sm text-right available_quantity_".$product_details->product_id."\" value=\"$total_stock\" readonly=\"\" id=\"available_quantity_".$product_details->product_id."\"/></td>
            
                <td>
                <input type=\"text\" class=\"onlyNumber total_qntt_".$product_details->product_id." form-control  form-control-sm \" min=\"1\" id=\"total_qntt_".$product_details->product_id."\" name=\"product_quantity[]\" onkeypress=\"image_activation('".$product_details->product_id."')\" onkeyup=\"quantity_calculate_pos('".$product_details->product_id."'),image_activation('".$product_details->product_id."')\" onchange=\"quantity_calculate_pos('".$product_details->product_id."'),checkqty('".$product_details->product_id."'),image_activation('".$product_details->product_id."');\"   placeholder=\"0.00\" autocomplete=\"off\"  value=\"0\" tabindex=\"8\" />

                </td>

                <td>
                     <input type=\"text\" name=\"product_rate[]\" id=\"price_item_".$product_details->product_id."\" class=\"price_item1 price_item form-control form-control-sm text-right allownumericwithdecimal\" tabindex=\"9\" required=\"\" onkeyup=\"quantity_calculate_pos('".$product_details->product_id."');\" onchange=\"quantity_calculate_pos('".$product_details->product_id."');\" value='".$product_details->price."' placeholder=\"0.00\" min=\"0\" />
                </td>

                <td>
                    <input type=\"text\" name=\"discount[]\" onkeyup=\"quantity_calculate_pos('".$product_details->product_id."');\"  onchange=\"quantity_calculate_pos('".$product_details->product_id."'');\" id=\"discount_".$product_details->product_id."\" class=\"form-control form-control-sm text-right allownumericwithdecimal\" min=\"0\" tabindex=\"10\" placeholder=\"0.00\"/>

                      
                </td>
                <td class=\"text-right\" style=\"width:100px\">
                     <input class=\"total_price form-control text-right form-control-sm\" type=\"text\" name=\"total_price[]\" id=\"total_price_".$product_details->product_id."\" value=\"0.00\" readonly=\"readonly\" />
                </td>

                <td>";
                    $sl=0;
                        foreach ($taxfield as $taxes) {
                            $txs = 'tax'.$sl;
                           $tr .= "<input type=\"hidden\" id=\"total_tax".$sl."_" . $product_details->product_id . "\" class=\"total_tax".$sl."_" . $product_details->product_id . "\" value='" . $prinfo[0][$txs] . "'/>
                            <input type=\"hidden\" id=\"all_tax".$sl."_" . $product_details->product_id . "\" class=\" total_tax".$sl."\" value='" . $prinfo[0][$txs]*$product_details->price . "' name=\"tax[]\"/>";  
                       $sl++; }
         
                $tr .= "<input type=\"hidden\" id=\"total_discount_".$product_details->product_id."\" class=\"\" />
                    <input type=\"hidden\" id=\"all_discount_".$product_details->product_id."\" class=\"total_discount dppr\"/>

                    <a style=\"text-align: right;\" class=\"btn btn-danger-soft btn-sm\" href=\"#\"  onclick=\"deleteRow(this,".$product_id.")\">" . '<i class="fas fa-trash-alt"></i>' . "</a>
                    <a href=\"#\" class=\"btn btn-success-soft btn-sm\" onclick=\"detailsmodal('".$product_details->product_name."','".$product_details->strength."','".$product_details->unit."','".number_format($product_details->price,2)."','".$product_details->image."','".$product_details->product_id."')\">".'<i class="fa fa-eye"></i>'."</a>
                     
                </td>
            </tr>";
    echo $tr;

        }else{
            return false;
        }
    }


    public function retrieve_product_batchid()
    {   
        $batch_id     = $this->request->getVar('batch_id');
        $product_id   = $this->request->getVar('product_id');
        $product_info = $this->invoiceModel->get_total_product_batch($batch_id,$product_id);
        echo json_encode($product_info);
    }


        public function previous() {
        $customer_id = $this->request->getVar('customer_id');
        $result = $this->db->table('customer_information a')
                             ->select('a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance')
                             ->join('acc_coa b','a.customer_id = b.customer_id','left')
                             ->where('a.customer_id',$customer_id)
                             ->get()
                             ->getResultArray();
       $balance = $result[0]['balance'];   
       $b = (!empty($balance)?$balance:0);                            
        if ($b){
           echo  $b;
        } else {
           echo  $b;
        }

    }


    public function number_generator() {
        $result     = $this->db->table('invoice')
                            ->select('max(invoice) as invoice_no')
                            ->get()
                            ->getResultArray();
        $invoice_no = $result[0]['invoice_no'];
        if ($invoice_no != '') {
            $invoice_no = $invoice_no + 1;
        } else {
            $invoice_no = 1000;
        }
        return $invoice_no;
    }


     public function bdtask_006_instant_customer(){
     
        $data = array(
            'customer_name'    => $this->request->getVar('customer_name',FILTER_SANITIZE_STRING),
            'customer_address' => $this->request->getVar('address',FILTER_SANITIZE_STRING),
            'customer_mobile'  => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
            'customer_email'   => $this->request->getVar('email',FILTER_SANITIZE_STRING),
            'status'           => 1
        );

         $builder = $this->db->table('customer_information');
         $result = $builder->insert($data);
        if ($result) {

        $customer_id = $this->db->insertID();
       
        //Customer  basic information adding.
        $coa = $this->customerModel->headcode();
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="102030000001";
            }
   $c_acc      = $customer_id.'-'.$this->request->getVar('customer_name',FILTER_SANITIZE_STRING);
   $createby   = $this->session->get('id');
   $createdate = date('Y-m-d H:i:s');

    $customer_coa = [
             'HeadCode'         => $headcode,
             'HeadName'         => $c_acc,
             'PHeadName'        => 'Customer Receivable',
             'HeadLevel'        => '4',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'A',
             'IsBudget'         => '0',
             'IsDepreciation'   => '0',
             'DepreciationRate' => '0',
             'customer_id'      => $customer_id,
             'CreateBy'         => $createby,
             'CreateDate'       => $createdate,
        ];
            
            $coa = $this->db->table('acc_coa');
           $coa_insert = $coa->insert($customer_coa);
          
            $data['status']        = true;
            $data['message']       = lan('save_successfully');
            $data['customer_id']   = $customer_id;
            $data['customer_name'] = $data['customer_name'];
        } else {
            $data['status'] = false;
            $data['exception'] = lan('please_try_again');
        }
         echo json_encode($data);
        }


        public function autocompleteproductsearch(){
        $product_name   = $this->request->getVar('product_name');
        $product_info   = $this->invoiceModel->autocompletproductdata($product_name);

       if(!empty($product_info)){
        $json_product[''] = '';
        foreach ($product_info as $value) {
            $json_product[] = array('label'=>$value['product_name'].'('.$value['strength'].')','value'=>$value['product_id']);
        } 
    }else{
        $json_product[] = 'No Medicine Found';
        }
        echo json_encode($json_product);
    
    }

    public function retrieve_product_data_inv()
    {   
        $product_id = $this->request->getVar('product_id',FILTER_SANITIZE_STRING);
        $product_info = $this->invoiceModel->get_total_product_invoic($product_id);
        echo json_encode($product_info);
    }

}
