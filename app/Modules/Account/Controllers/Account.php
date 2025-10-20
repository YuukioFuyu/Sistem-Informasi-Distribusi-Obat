<?php namespace App\Modules\Account\Controllers;
class Account extends BaseController
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
        $data['title']      = 'Chart of Accounts';
        $data['userList']   = $this->accountModel->get_userlist();
        $data['parent']     = $this->accountModel->get_parenthead();
        $data['userID']     = set_value('userID');
        $data['module']     = "Account";
        $data['page']       = "treeview"; 
    return $this->template->layout($data);

  }


      public function selectedform($id){

        $role_reult = $this->accountModel->treeview_selectform($id);
        if ($role_reult){
            $html = "";
            $html .= form_open('','id="treeview_form" class="form-vertical"');
      $html .= "<div id=\"newData\" class=\"row\">
      <div class=\"col-sm-12\">
      <div class=\"row form-custom\">
        <label class=\"col-sm-3\"><b>Head Code</b></label>
        <div class=\"col-sm-9\"><input type=\"text\" name=\"txtHeadCode\" id=\"txtHeadCode\" class=\"form_input form-control\"  value=\"".$role_reult->HeadCode."\" readonly=\"readonly\"/></div>
      </div>
       </div>
  
     <div class=\"col-sm-12\">
      <div class=\"row form-custom\">
        <label class=\"col-sm-3\"><b>Head Name</b></label>
        <div class=\"col-sm-9\"><input type=\"text\" name=\"txtHeadName\" id=\"txtHeadName\" class=\"form_input form-control\" value=\"".$role_reult->HeadName."\"/>
<input type=\"hidden\" name=\"HeadName\" id=\"HeadName\" class=\"form_input\" value=\"".$role_reult->HeadName."\"/>
        </div>
      </div>
      </div>
     <div class=\"col-sm-12\">
      <div class=\"row form-custom\">
        <label class=\"col-sm-3\"><b>Parent Head</b></label>
        <div class=\"col-sm-9\"><input type=\"text\" name=\"txtPHead\" id=\"txtPHead\" class=\"form_input form-control\" readonly=\"readonly\" value=\"".$role_reult->PHeadName."\"/></div>
      </div>
      </div>
       <div class=\"col-sm-12\">
      <div class=\"row form-custom\">

        <label class=\"col-sm-3\"><b>Head Level</b></label>
        <div class=\"col-sm-9\"><input type=\"text\" name=\"txtHeadLevel\" id=\"txtHeadLevel\" class=\"form_input form-control\" readonly=\"readonly\" value=\"".$role_reult->HeadLevel."\"/></div>
      </div>
      </div>
       <div class=\"col-sm-12\">
      <div class=\"row form-custom\">
        <label class=\"col-sm-3\"><b>Head Type</b></label>
        <div class=\"col-sm-9\"><input type=\"text\" name=\"txtHeadType\" id=\"txtHeadType\" class=\"form_input form-control\" readonly=\"readonly\" value=\"".$role_reult->HeadType."\"/></div>
      </div>
      </div>

       <div class=\"col-sm-12\">
      <div class=\"row form-custom\">
         <div class=\"col-sm-9 col-sm-offset-3\">
         <div class=\"align-center\">
           <div class=\"mr-15\">
           <input type=\"checkbox\" name=\"IsTransaction\" value=\"1\" class=\"mr-5\" id=\"IsTransaction\" size=\"28\"  onchange=\"IsTransaction_change()\"";
           if($role_reult->IsTransaction==1){ $html .="checked";}
            $html .= "/><label for=\"IsTransaction\"> IsTransaction</label>
            </div>

            <div class=\"mr-15\">
           <input type=\"checkbox\" value=\"1\" name=\"IsActive\" class=\"mr-5\" id=\"IsActive\" size=\"28\"";
            if($role_reult->IsActive==1){ $html .="checked";}
            $html .= "/><label for=\"IsActive\"> IsActive</label>
            </div>

            <div class=\"mr-15\">
           <input type=\"checkbox\" value=\"1\" name=\"IsGL\" class=\"mr-5\" id=\"IsGL\" size=\"28\" onchange=\"IsGL_change();\"";
           if($role_reult->IsGL==1){ $html .="checked";}
            $html .= "/><label for=\"IsGL\"> IsGL</label>
            </div>
          </div>

        </div>";
      $html .= "</div>
      </div>
       <div class=\"col-sm-12\">
       <div class=\"row mx-0\">
                    <div class=\"col-sm-9 col-sm-offset-3\">";
                     $html .="<input type=\"button\" name=\"btnNew\" id=\"btnNew\" value=\"New\" onClick=\"newHeaddata(".$role_reult->HeadCode.")\" class=\"btn btn-sub btn-info\"/>
                      <input type=\"btn\" name=\"btnSave\" id=\"btnSave\" value=\"Save\" disabled=\"disabled\" class=\"btn btn-sub btn-success\" onclick=\"treeSubmit()\"/>";
                     
          $html .=" <input type=\"button\" name=\"btnUpdate\" id=\"btnUpdate\" value=\"Update\" onclick=\"treeSubmit()\" class=\"btn btn-sub btn-primary\"/>  <button type=\"button\" class=\"btn btn-sub btn-danger\" data-dismiss=\"modal\">Close</button></div>";
    $html .= "</div></div>
 </form>
            ";
        }

        echo json_encode($html);
    }


    public function newform($id){
    $newdata =  $this->db->table('acc_coa')
                     ->select('*')
                     ->where('HeadCode',$id)
                     ->get()
                     ->getRow();

    
           
  $newidsinfo = $this->db->table('acc_coa')
                     ->select('*,max(HeadCode) as hc')
                     ->where('PHeadName',$newdata->HeadName)
                     ->get()
                     ->getRow();


$nid  = $newidsinfo->hc;
if($nid){
  $n =$nid + 1;
  $HeadCode = $n;
}else{
  $HeadCode = $id .'00'. 1;
}

  $info['headcode']  =  $HeadCode;
  $info['rowdata']   =  $newdata;
  $info['headlabel'] =  $newdata->HeadLevel+1;
    echo json_encode($info);
  }



    public function insert_coa(){
    $headcode    = $this->request->getVar('txtHeadCode', FILTER_SANITIZE_STRING);
    $HeadName    = $this->request->getVar('txtHeadName', FILTER_SANITIZE_STRING);
    $PHeadName   = $this->request->getVar('txtPHead', FILTER_SANITIZE_STRING);
    $HeadLevel   = $this->request->getVar('txtHeadLevel', FILTER_SANITIZE_STRING);
    $txtHeadType = $this->request->getVar('txtHeadType', FILTER_SANITIZE_STRING);
    $isact       = $this->request->getVar('IsActive', FILTER_SANITIZE_STRING);
    $IsActive    = (!empty($isact)?$isact:0);
    $trns        = $this->request->getVar('IsTransaction', FILTER_SANITIZE_STRING);
    $IsTransaction = (!empty($trns)?$trns:0);
    $isgl        = $this->request->getVar('IsGL', FILTER_SANITIZE_STRING);
    $hname       = $this->request->getVar('HeadName');
     $IsGL       = (!empty($isgl)?$isgl:0);
    $createby    = $this->session->get('id');
    $createdate  = date('Y-m-d H:i:s');
       $postData = array(
      'HeadCode'       => $headcode,
      'HeadName'       => $HeadName,
      'PHeadName'      => $PHeadName,
      'HeadLevel'      => $HeadLevel,
      'IsActive'       => $IsActive,
      'IsTransaction'  => $IsTransaction,
      'IsGL'           => $IsGL,
      'HeadType'       => $txtHeadType,
      'IsBudget'       => 0,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
    ); 
 $upinfo = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('HeadCode',$headcode)
                     ->get()
                     ->getRow();
            if(empty($upinfo)){
           $acc_coa    = $this->db->table('acc_coa');
           $acc_coa->insert($postData);             

  $data['status']  = true;
  $data['message'] = lan('save_successfully');
}else{

    $updata = array(
    'PHeadName'      =>  $HeadName,
    );
       $acc_coa       = $this->db->table('acc_coa');
       $acc_coa->where('HeadCode', $headcode);
       $update_invoice =  $acc_coa->update($postData); 

      $acc_coa    = $this->db->table('acc_coa');
      $acc_coa->where('PHeadName',$hname);
      $acc_coa->update($updata);
      $data['status']  = true;
      $data['message'] = 'Successfully Updated'.$hname;
}


        
        echo json_encode($data);
  }


      public function bdtask_004opening_balance_form(){
        $data['title']      = lan('opening_balance');
        $data['headss']     = $this->accountModel->get_userlist();
        $data['voucher_no'] = $this->accountModel->opeing_voucher();
        $data['module']     = "Account";
        $data['page']       = "opening_balance"; 
        return $this->template->layout($data);
    }

        public function bdtask_add_opening_balance(){
          $setting_data = $this->accountModel->setting_data();                       
         date_default_timezone_set($setting_data->timezone);
            $createby   = $this->session->get('id');
            $createdate = date('Y-m-d H:i:s');
              $postData = array(
              'VNo'            => $this->request->getVar('txtVNo', FILTER_SANITIZE_STRING),
              'Vtype'          => 'Opening',
              'VDate'          => $this->request->getVar('dtpDate', FILTER_SANITIZE_STRING),
              'COAID'          => $this->request->getVar('headcode', FILTER_SANITIZE_STRING),
              'Narration'      => $this->request->getVar('txtRemarks', FILTER_SANITIZE_STRING),
              'Debit'          => $this->request->getVar('amount', FILTER_SANITIZE_STRING),
              'Credit'         => 0,
              'IsPosted'       => 1,
              'is_opening'     => 1,
              'CreateBy'       => $createby,
              'CreateDate'     => $createdate,
              'IsAppove'       => 1
      );

              if ($this->request->getMethod() == 'post') {
            $rules = [
                'txtVNo'        => ['label' => lan('txtVNo'),'rules'  => 'required'],
                'dtpDate'       => ['label' => lan('date'),'rules'    => 'required'],
                'amount'        => ['label' => lan('amount'),'rules'  => 'required'],
                'headcode'      => ['label' => lan('headcode'),'rules'=> 'required'],                       
            ];

            if (! $this->validate($rules)) {
                $info['exception'] = $this->validator->listErrors();
                $info['status']    = false;
                 echo json_encode($info);
                 exit; 
            }else{
            $opening = $this->accountModel->create_opening($postData); 
            if($opening == true){
              $info['message']     = lan('save_successfully');
            $info['status']      = true;
             echo json_encode($info);
                 exit;    
             }else{
                $info['exception'] = 'Please Try Again';
                $info['status']    = false;
                 echo json_encode($info);
                 exit;  
             }    
           
            }
    }
}


     public function bdtask_manufacturer005_payment() {
        $data['title']             = lan('manufacturer_payment');
        $data['manufacturer_list'] = $this->accountModel->get_manufacturer();
        $data['voucher_no']        = $this->accountModel->mpayment_voucher();
        $data['bank_list']         = $this->accountModel->bank_list();
        $data['module']            = "Account";
        $data['page']              = "manufacturer_payment_form"; 
        return $this->template->layout($data);
    }



public function save_manufacturer_payment(){
    $manufacturer_id = $this->request->getVar('manufacturer_id', FILTER_SANITIZE_STRING);
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'txtAmount'       => ['label' => lan('amount'),'rules'      => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        'paytype'         => ['label' => lan('paytype'),'rules'     => 'required'],
        'manufacturer_id' => ['label' => lan('manufacturer'),'rules'=> 'required'],                       
    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
    }else{
        $payment_type = $this->request->getVar('paytype', FILTER_SANITIZE_STRING);
        $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
        if($payment_type == 2 && empty($bank_id)){
        $info['exception'] = "You Have Selected Bank Payment But did not Select Bank";
        $info['status']    = false;
         echo json_encode($info);
         exit(); 
                      
                  }  
    $paymentinfo               = $this->accountModel->manufacturer_payment_insert(); 
    $printdata['company']      = $this->accountModel->company_details();
    $printdata['payment_info'] = $this->accountModel->manufacturerpaymentinfo($paymentinfo['vno'],$paymentinfo['code']);
    $printdata['manufacturer'] = $this->accountModel->manufacturer_details($manufacturer_id);
    $info['details']           = view('App\Modules\Account\Views\manufacturer_receipt', $printdata);   
    $info['message']           = lan('save_successfully');
    $info['status']            = true;
     echo json_encode($info);
         exit;    
    
   
    }
}

}


     public function manufacturer_headcode($id){
    $manufaccode = $this->db->table('acc_coa')
                            ->select('*')
                            ->where('manufacturer_id',$id)
                            ->get()
                            ->getRow();
      $code = $manufaccode->HeadCode;       
    echo json_encode($code);

   }


   public function customer_receive(){
    $data['customer_list'] = $this->accountModel->get_customer();
    $data['voucher_no']    = $this->accountModel->customer_receive_voucher();
    $data['bank_list']     = $this->accountModel->bank_list();
    $data['title']         = lan('customer_receive');
    $data['module']        = "Account";
    $data['page']          = "customer_receive_form"; 
   return $this->template->layout($data);
}

 

 public function save_customer_receive(){
    $customer_id = $this->request->getVar('customer_id', FILTER_SANITIZE_STRING);
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules' => 'required'],
        'txtAmount'       => ['label' => lan('amount'),'rules'     => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'       => 'required'],
        'paytype'         => ['label' => lan('paytype'),'rules'    => 'required'],
        'customer_id'     => ['label' => lan('customer'),'rules'   => 'required'],                       
    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
    }else{
       $payment_type  = $this->request->getVar('paytype', FILTER_SANITIZE_STRING);
        $bank_id      = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
        if($payment_type == 2 && empty($bank_id)){
        $info['exception'] = "You Have Selected Bank Payment But did not Select Bank";
        $info['status']    = false;
         echo json_encode($info);
         exit(); 
                      
                  } 
    $paymentinfo               = $this->accountModel->customer_receive_insert(); 
    $printdata['company']      = $this->accountModel->company_details();
    $printdata['payment_info'] = $this->accountModel->manufacturerpaymentinfo($paymentinfo['vno'],$paymentinfo['code']);
    $printdata['customer']     = $this->accountModel->customer_details($customer_id);
    $info['details']           = view('App\Modules\Account\Views\customer_receipt', $printdata);   
    $info['message']           = lan('save_successfully');
    $info['status']            = true;
     echo json_encode($info);
         exit;    
    
   
    }
}

}


   public function customer_headcode($id){

    $customerhcode = $this->db->table('acc_coa')
                            ->select('*')
                            ->where('customer_id',$id)
                            ->get()
                            ->getRow();
      $code = $customerhcode->HeadCode;       
    echo json_encode($code);

   }

    public function bdtask_cash_adjustment(){
    $data['title']      = lan('cash_adjustment');
    $data['voucher_no'] = $this->accountModel->Cashvoucher();
    $data['module']     = "Account";
    $data['page']       = "cash_adjustment"; 
   return $this->template->layout($data);
  }



   public function save_cash_adjustment(){
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'     => 'required'],
        'txtAmount'       => ['label' => lan('amount'),'rules'         => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'           => 'required'],
        'type'            => ['label' => lan('adjustment_type'),'rules'=> 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
    }else{
      $this->accountModel->cash_adjustment_insert();   
    $info['message']           = lan('save_successfully');
    $info['status']            = true;
     echo json_encode($info);
         exit;    
    
   
    }
}

}


    public function bdtask_debit_voucher(){
    $data['title']      = lan('debit_voucher');
    $data['acc']        = $this->accountModel->Transacc();
    $data['voucher_no'] = $this->accountModel->voNO();
    $data['crcc']       = $this->accountModel->Cracc();
    $data['module']     = "Account";
    $data['page']       = "debit_voucher"; 
     return $this->template->layout($data); 
  }



    public function debtvouchercode($id){
     $debitvcode = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$id) 
                             ->get()
                             ->getRow();
      $code = $debitvcode->HeadCode;       
      echo json_encode($code);

   }




    public function save_debit_voucher(){
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'cmbDebit'        => ['label' => lan('account_head'),'rules'=> 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
    }else{
      $this->accountModel->insert_debitvoucher();   
    $info['message']           = lan('save_successfully');
    $info['status']            = true;
     echo json_encode($info);
         exit;    
    
   
    }
}

}

  

    public function bdtask_credit_voucher(){
    $data['title']      = lan('credit_voucher');
    $data['acc']        = $this->accountModel->Transacc();
    $data['voucher_no'] = $this->accountModel->crVno();
    $data['crcc']       = $this->accountModel->Cracc();
    $data['module']     = "Account";
    $data['page']       = "credit_voucher"; 
    return $this->template->layout($data);  
  }


    public function save_credit_voucher(){
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'cmbDebit'        => ['label' => lan('account_head'),'rules'=> 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->accountModel->insert_creditvoucher();   
        $info['message']           = lan('save_successfully');
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
    }
}

}


  public function bdtask_contra_voucher(){
    $data['title']      = lan('contra_voucher');
    $data['acc']        = $this->accountModel->Transacc();
    $data['voucher_no'] = $this->accountModel->contra();
    $data['module']     = "Account";
    $data['page']       = "contra_voucher"; 
    return $this->template->layout($data);
  }



   public function  bdtask_create_contra_voucher(){
     if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->accountModel->insert_contravoucher();   
        $info['message']           = lan('save_successfully');
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
    }
}

   }


    public function bdtask_journal_voucher(){
    $data['title']      = lan('journal_voucher');
    $data['acc']        = $this->accountModel->Transacc();
    $data['voucher_no'] = $this->accountModel->journal();
    $data['module']     = "Account";
    $data['page']       = "journal_voucher"; 
     return $this->template->layout($data);
  }


     public function  bdtask_create_journal_voucher(){
     if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->accountModel->insert_journalvoucher();   
        $info['message']           = lan('save_successfully');
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
    }
}

   }


    public function bdtask_voucher_list(){
    $data['title']   = lan('voucher_list');
    $data['module']  = "Account";
    $data['page']    = "voucher_list"; 
     return $this->template->layout($data);
}

public function check_Voucherlist(){
   $postData = $this->request->getVar();
   $data     = $this->voucher_Model->getVoucherList($postData);
    echo json_encode($data);
}


public function isapprove($id = null, $action = null)
  {

    $action   = 1;
    $postData = array(
      'VNo'      => $id,
      'IsAppove' => $action
    );

    if ($this->voucher_Model->approved($postData)) {
      $this->session->setFlashdata('message', lan('successfully_approved'));
    } else {
      $this->session->setFlashdata('exception', lan('please_try_again'));
    }

    
    return  redirect()->to($_SERVER['HTTP_REFERER']);
  }




  public function voucher_update($id= null){
       $vtype = $this->db->table('acc_transaction')
                             ->select('*')
                             ->where('VNo',$id)
                             ->get()
                             ->getResultArray();
                         

                   
        if($vtype[0]['Vtype'] =="DV"){
    $data['title']          = lan('update_debit_voucher');
    $data['dbvoucher_info'] = $this->accountModel->dbvoucher_updata($id);
    $data['credit_info']    = $this->accountModel->crvoucher_updata($id);
    $data['page']           = "update_dbt_crtvoucher"; 

    } 
 
     if($vtype[0]['Vtype'] =="JV"){
    $data['title']        = lan('update_journal_voucher');
    $data['acc']          = $this->accountModel->Transacc();
    $data['voucher_info'] = $this->accountModel->journal_updata($id);
    $data['page']         = "update_journal_voucher";    
    } 


     if($vtype[0]['Vtype'] =="Contra"){
    $data['title']         = 'Update'.' '.lan('contra_voucher');
    $data['acc']           = $this->accountModel->Transacc();
    $data['voucher_info']  = $this->accountModel->journal_updata($id); 
     $data['page']         = "update_contra_voucher";    
    } 

    if($vtype[0]['Vtype'] =="CV"){
    $data['title']          = lan('update_credit_voucher');
    $data['crvoucher_info'] = $this->accountModel->crdtvoucher_updata($id);
    $data['debit_info']     = $this->accountModel->debitvoucher_updata($id);
    $data['page']           = "update_credit_bdtvoucher";  
    }
    $data['crcc']           = $this->accountModel->Cracc();
    $data['acc']            = $this->accountModel->Transacc();
    $data['module']         = "Account";
    return $this->template->layout($data);
  }



      public function update_debit_voucher(){
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'cmbDebit'        => ['label' => lan('account_head'),'rules'=> 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
    }else{
      $this->accountModel->update_debitvoucher();   
    $info['message']           = 'Successfully Updated';
    $info['status']            = true;
     echo json_encode($info);
         exit;    
    
   
    }
}

}

    public function  bdtask_update_journal_voucher()
    {
     if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->accountModel->update_journalvoucher();   
        $info['message']           = 'Successfully Updated';
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
    }
}

   }



    public function update_credit_voucher()
    {
    if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'cmbDebit'        => ['label' => lan('account_head'),'rules'=> 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->accountModel->update_creditvoucher();   
        $info['message']           = 'Successfully Updated';
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
    }
}

}



   public function  bdtask_update_contra_voucher()
   {
     if ($this->request->getMethod() == 'post') {
    $rules = [
        'txtVNo'          => ['label' => lan('voucher_no'),'rules'  => 'required'],
        'dtpDate'         => ['label' => lan('date'),'rules'        => 'required'],
        

    ];

    if (! $this->validate($rules)) {
        $info['exception'] = $this->validator->listErrors();
        $info['status']    = false;
         echo json_encode($info);
         exit; 
        }else{
        $this->accountModel->update_contravoucher();   
        $info['message']           = 'Successfully Updated';
        $info['status']            = true;
         echo json_encode($info);
             exit;    
    
   
    }
}

   }


    public function voucher_delete($voucher)
    {
     if ($this->accountModel->delete_voucher($voucher)) {
      $this->session->setFlashdata('message', lan('successfully_deleted'));
    } else {
      $this->session->setFlashdata('exception', lan('please_try_again'));
    }

     return  redirect()->to($_SERVER['HTTP_REFERER']);

  }

   /*report part start*/
       public function bdtask_cash_book(){
       $data['title']    = lan('cash_book');
       $FromDate         = (!empty($this->request->getVar('from_date'))?$this->request->getVar('from_date'):date('Y-m-d'));
       $ToDate           = (!empty($this->request->getVar('to_date'))?$this->request->getVar('to_date'):date('Y-m-d'));
       $HeadCode         = 1020101;
       $data['from_date']= $FromDate;
       $data['to_date']  = $ToDate;
       $data['previous'] = $this->accountModel->cashbook_firstqury($FromDate,$HeadCode);
       $data['oResult']  = $this->accountModel->cashbook_secondqury($FromDate,$HeadCode,$ToDate);
       $data['module']   = "Account";
       $data['page']     = "cash_book"; 
      return $this->template->layout($data);
    }


      public function bdtask_bank_book(){
      $data['title']    = lan('bank_book');
      $HeadCode         = (!empty($this->request->getVar('txtCode'))?$this->request->getVar('txtCode'):date('Y-m-d'));;
      $FromDate         = (!empty($this->request->getVar('from_date'))?$this->request->getVar('from_date'):date('Y-m-d'));
      $ToDate           = (!empty($this->request->getVar('to_date'))?$this->request->getVar('to_date'):date('Y-m-d'));
      $HeadName         = (!empty($this->request->getVar('txtName'))?$this->request->getVar('txtName'):'Bank Book');
      $data['from_date']= $FromDate;
      $data['to_date']  = $ToDate;
      $data['HeadName'] = $HeadName;
      $data['bank_head']= $this->accountModel->bank_head();
      $data['previous'] = $this->accountModel->bankbook_firstqury($FromDate,$HeadCode);
      $data['oResult']  = $this->accountModel->bankbook_secondqury($FromDate,$HeadCode,$ToDate);
      $data['module']   = "Account";
      $data['page']     = "bank_book"; 
     return $this->template->layout($data);
     }


      public function bdtask_inventory_ledger()
      {
       $data['title']    = lan('inventory_ledger');
       $FromDate         = (!empty($this->request->getVar('from_date'))?$this->request->getVar('from_date'):date('Y-m-d'));
       $ToDate           = (!empty($this->request->getVar('to_date'))?$this->request->getVar('to_date'):date('Y-m-d'));
       $HeadCode         = 10107;
       $data['from_date']= $FromDate;
       $data['to_date']  = $ToDate;
       $data['previous'] = $this->accountModel->cashbook_firstqury($FromDate,$HeadCode);
       $data['oResult']  = $this->accountModel->cashbook_secondqury($FromDate,$HeadCode,$ToDate);
       $data['module']   = "Account";
       $data['page']     = "inventory_ledger"; 
      return $this->template->layout($data);
    }
      



       public function bdtask_general_ledger()
       {
        $data['title']          = lan('general_ledger');
        $data['general_ledger'] = $this->accountModel->get_general_ledger();
        $data['module']         = "Account";
        $data['page']           = "general_ledger"; 
        return $this->template->layout($data);
    }


    public function general_led()
    {
        $Headid   = $this->request->getVar('Headid');
        $HeadName = $this->accountModel->general_led_get($Headid);
        echo  "<option value=\"\">Transaction Head</option>";
        $html = "";
        foreach($HeadName as $data){
            $html .="<option value='$data->HeadCode'>$data->HeadName</option>";
            
        }
        echo $html;
    }


      public function accounts_report_search()
      {
        $cmbGLCode       = $this->request->getVar('cmbGLCode');
        $cmbCode         = $this->request->getVar('cmbCode');
        $dtpFromDate     = $this->request->getVar('dtpFromDate');
        $dtpToDate       = $this->request->getVar('dtpToDate');
        $chkIsTransction = $this->request->getVar('chkIsTransction');

         $rules = [
        'cmbGLCode'       => ['label' => lan('general_head'),'rules'     => 'required'],
        'cmbCode'         => ['label' => lan('transaction_head'),'rules' => 'required'],
        'dtpFromDate'     => ['label' => lan('from_date'),'rules'        => 'required'],
        'dtpToDate'       => ['label' => lan('to_date'),'rules'          => 'required'],

    ];

    if (! $this->validate($rules)) {
      $this->session->setFlashdata('exception', $this->validator->listErrors());
     return  redirect()->to(base_url('/account/general_ledger/'));
    }else{
        $HeadName        = $this->accountModel->general_led_report_headname($cmbGLCode);
        $HeadName2       = $this->accountModel->general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction);
        $pre_balance     = $this->accountModel->general_led_report_prebalance($cmbCode,$dtpFromDate);

        $data = array(
            'title'          => lan('general_ledger_report'),
            'dtpFromDate'    => $dtpFromDate,
            'dtpToDate'      => $dtpToDate,
            'HeadName'       => $HeadName,
            'HeadName2'      => $HeadName2,
            'prebalance'     => $pre_balance,
            'chkIsTransction'=> $chkIsTransction,

        );

        $data['ledger']  = $this->accountModel->general_led_report_headname($cmbCode);
        $data['module']  = "Account";
        $data['page']    = "general_ledger_report"; 
       return $this->template->layout($data);
     }

    }


      public function bdtask_trial_balance_form()
      {
        $data['title']   = lan('trial_balance');
        $data['module']  = "Account";
        $data['page']    = "trial_balance"; 
        return $this->template->layout($data);
        }


      public function bdtask_trial_balance_report()
      {
       $dtpFromDate     =  $this->request->getVar('dtpFromDate');
       $dtpToDate       =  $this->request->getVar('dtpToDate');
       $chkWithOpening  =  $this->request->getVar('chkWithOpening');
       $results         =  $this->accountModel->trial_balance_report($dtpFromDate,$dtpToDate,$chkWithOpening);

    
       if ($results['WithOpening'] == 1) {
            $data['oResultTr']    = $results['oResultTr'];
            $data['oResultInEx']  = $results['oResultInEx'];
            $data['dtpFromDate']  = $dtpFromDate;
            $data['dtpToDate']    = $dtpToDate;
            $data['title']        = lan('trial_balance');
            $data['module']       = "account";
            $data['page']         = "trial_balance_with_opening"; 
            return $this->template->layout($data);
       }else{

            $data['oResultTr']    = $results['oResultTr'];
            $data['oResultInEx']  = $results['oResultInEx'];
            $data['dtpFromDate']  = $dtpFromDate;
            $data['dtpToDate']    = $dtpToDate;
            $data['title']        = lan('trial_balance');
            $data['module']       = "Account";
            $data['page']         = "trial_balance_without_opening"; 
           return $this->template->layout($data);
       }

    }


            //Profit loss report page
    public function bdtask_profit_loss_report_form(){
        $data['title']   = lan('profit_loss');
        $data['module']  = "Account";
        $data['page']    = "profit_loss_report"; 
         return $this->template->layout($data);
    }

        //Profit loss serch result
    public function bdtask_profit_loss_report_search()
    {
        $dtpFromDate              = $this->request->getVar('dtpFromDate');
        $dtpToDate                = $this->request->getVar('dtpToDate');
        $get_profit               = $this->accountModel->profit_loss_serach();
        $data['oResultAsset']     = $get_profit['oResultAsset'];
        $data['oResultLiability'] = $get_profit['oResultLiability'];
        $data['dtpFromDate']      = $dtpFromDate;
        $data['dtpToDate']        = $dtpToDate;
        $data['pdf']              = 'assets/data/pdf/Statement of Comprehensive Income From '.$dtpFromDate.' To '.$dtpToDate.'.pdf';
        $data['title']            =  lan('profit_loss');
        $data['module']           = "Account";
        $data['page']             = "profit_loss_report_search"; 
        return $this->template->layout($data);
    }


     public function bdtask_cash_flow_form()
     {
        $data['title']  = lan('cash_flow');
        $data['module'] = "Account";
        $data['page']   = "cash_flow_report"; 
       return $this->template->layout($data);
    }

         //Cash flow report search
    public function cash_flow_report_search()
    {
        $dtpFromDate          = $this->request->getVar('dtpFromDate');
        $dtpToDate            = $this->request->getVar('dtpToDate');
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['title']        = lan('cash_flow');
        $data['module']       = "Account";
        $data['page']         = "cash_flow_report_search"; 
        return $this->template->layout($data);
    }

      public function bdtask_coa_print()
      {
       $data['title']        = lan('coa_print');
       $data['module']       = "Account";
       $data['page']         = "coa_print"; 
       return $this->template->layout($data);
    }

    public function bdtask_balance_sheet()
    {
    $data['title']       = lan('balance_sheet');
    $from_date           = (!empty($this->request->getVar('dtpFromDate'))?$this->request->getVar('dtpFromDate'):date('Y-m-d'));
    $to_date             = (!empty($this->request->getVar('dtpToDate'))?$this->request->getVar('dtpToDate'):date('Y-m-d'));
    $data['from_date']   = $from_date;
    $data['to_date']     = $to_date;
    $data['fixed_assets']= $this->accountModel->fixed_assets();
    $data['liabilities'] = $this->accountModel->liabilities_data();
    $data['incomes']     = $this->accountModel->income_fields();
    $data['expenses']    = $this->accountModel->expense_fields();
    $data['module']      = "Account";
    $data['page']        = "balance_sheet"; 
   return $this->template->layout($data);
    }


  
}
