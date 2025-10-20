<?php namespace App\Modules\Hrm\Controllers;
class Payroll extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    public function index()
	{
        

	    $data['title']      = 'Benefit List';
      $data['module']     = "Hrm";
      $data['list']       = $this->payroll_model->benefit_list();
      $data['page']       = "payroll/benefit_list"; 
		return $this->template->layout($data);

	}



        public function bdtask_0001_benefits_form($id = null)
        {
        $data = [];
       $data['benefits'] = (object)$benefitdata = array(
        'id'              => ($this->request->getVar('id')?$this->request->getVar('id'):null),
        'benefit_name'    => $this->request->getVar('benefit_name', FILTER_SANITIZE_STRING),
        'benefit_type'    => $this->request->getVar('benefit_type', FILTER_SANITIZE_STRING),
        'status'          => $this->request->getVar('status',FILTER_SANITIZE_STRING),
    );



        if ($this->request->getMethod() == 'post') {
            
            $rules = [
                'benefit_name' => ['label' => lan('benefit_name'),'rules' => 'required'],
                'benefit_type' => ['label' => lan('benefit_type'),'rules' => 'required'],
                'status'       => ['label' => lan('status'),'rules'       => 'required'],
               
            ];
  

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $check = $this->payroll_model->check_exist($benefitdata);
                if($check == false){
                if($this->payroll_model->save_salary_benefit($benefitdata)){
                   $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/payroll/benefit_list/'));  
            }else{
                 $this->session->setFlashdata('exception', lan('please_try_again'));
                return  redirect()->to(base_url('/payroll/benefit_list/'));
            }
        }else{
             $this->session->setFlashdata('exception', 'Benefit Type Already Added');
                return  redirect()->to(base_url('/payroll/add_benefits/')); 
        }
               
               
            }else{
             $this->payroll_model->update_salary_benefit($benefitdata);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/payroll/benefit_list/'));
               
            }

            }
        }

        $data['module']           = "Hrm";
        if(!empty($id)){
        $data['benefits']         = $this->payroll_model->singledata($id); }
        $data['title']            = 'add benefits';
        $data['employee_list']    = $this->payroll_model->employee_list();
        $data['page']             = "payroll/benefit_form"; 
        return $this->template->layout($data);
    }



    public function delete_benefit($id = null)
    { 
        if ($this->payroll_model->delete_salary_benefit($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('payroll/benefit_list');
    }



    public function bdtask_0002_salarysetup_form()
    {
     $data['title']            = lan('salary_setup');
     $data['slname']           = $this->payroll_model->salary_typeName();
     $data['sldname']          = $this->payroll_model->salary_typedName();
     $data['employee']         = $this->payroll_model->employee_list();
     $data['module']           = "Hrm";
     $data['page']             = "payroll/salarysetup_form"; 
     return $this->template->layout($data); 
    }

  

        public function employeebasic(){
        $id    = $this->request->getVar('employee_id');
        $data  = $this->db->table('employee_information')
                             ->where('id', $id)
                             ->get()
                             ->getRow();
        $basic = $data->hrate;
        if($data->rate_type ==1){
            $type = 'Hourly';
        }else{
            $type = 'Salary';   
        }
        $sent = array(
            'rate'      =>  $data->hrate,
            'rate_type' =>  $data->rate_type,
            'stype'     => $type
        );
        echo json_encode($sent);
    }


        public function salarywithtax()
        {
        $tamount = $this->request->getVar('amount');
        $amount  = (int)($tamount*12);
        $taxrate  = $this->db->table('payroll_tax_setup')
                             ->where('start_amount <',$amount)
                             ->get()
                             ->getResultArray();
        $TotalTax = 0;
        $total_diff = 0;
        foreach($taxrate as $row){
                    // "Inside tax calculation";
                if($amount > $row['start_amount'] && $amount > $row['end_amount']){
                   $diff=$row['end_amount']-$row['start_amount'];
                   $total_diff += $diff;
                    }
                     if($amount > $row['start_amount'] && $amount < $row['end_amount']){
                    $diff=$amount-$total_diff;
                    }
                    $tax=(($row['rate']/100)*$diff);
                    $TotalTax += $tax;  
                } 
        $salary = ($TotalTax?$TotalTax:0)/12;
        echo json_encode(number_format($salary,2));
    }



       public function salary_setup_entry()
       {
            $date=date('Y-m-d');
            $check_exist = $this->payroll_model->check_exist_salarysetup($this->request->getVar('employee_id'));
            if($check_exist == 0){
           $amount=$this->request->getVar('amount');
            foreach($amount as $key=>$value)
            {   
            $postData = [
                'employee_id'           => $this->request->getVar('employee_id'),
                'sal_type'              => $this->request->getVar('sal_type'),
                'salary_type_id'        => $key,
                'amount'                => (!empty($value)?$value:0),
                'create_date'           => $date,
                'gross_salary'          => $this->request->getVar('gross_salary'),
            ]; 
            
            $this->payroll_model->salary_setup_create($postData);
                
            }
           $this->session->setFlashdata('message',lan('save_successfully'));
        
          return redirect()->to(site_url('payroll/add_salarysetup'));
     }else{
         $this->session->setFlashdata('exception',lan('already_exist'));
        return redirect()->to(site_url('payroll/add_salarysetup'));
     }
    }


     public function bdtask_0005_salarysetup_list()
    {
     $data['title']            = lan('salary_setup_list');
     $data['module']           = "Hrm";
     $data['page']             = "payroll/salarysetup_list"; 
     return $this->template->layout($data); 
    }


     public function bdtask_salarysetup_listdata()
     {
        $postData = $this->request->getVar();
        $data     = $this->payroll_model->getsalarysetupList($postData);
        echo json_encode($data);
    }


    public function salsetup_upform($id)
    {
    $data['title']       = lan('edit_setup_update');
    $data['data']        = $this->payroll_model->salary_s_updateForm($id);
    $data['samlft']      = $this->payroll_model->salary_amountlft($id);
    $data['amo']         = $this->payroll_model->salary_amount($id);
    $data['employee']    = $this->payroll_model->employee_list();
    $data['EmpRate']     = $this->payroll_model->employee_informationId($id);
    $data['module']      = "Hrm";
    $data['page']        = "payroll/salary_setup_edit"; 
     return $this->template->layout($data);  
    }


      public function salary_setup_update(){
        $amount=$this->request->getVar('amount');
        foreach($amount as $key=>$value){
        $postData = array(
            'employee_id'        => $this->request->getVar('employee_id'),
            'sal_type'           => $this->request->getVar('sal_type'),
            'salary_type_id'     => $key,
            'amount'             => $value,
            'gross_salary'       => $this->request->getVar('gross_salary'),
        );
            $this->payroll_model->update_sal_stup($postData);
                }

             $this->session->setFlashdata('message','Successfully Updated');    
                return redirect()->to(site_url('payroll/salary_setup_list'));
    }
   

        public function delete_salsetup($id = null) { 
        if ($this->payroll_model->emp_salstup_delete($id)) {
            #set success message
            $this->session->setFlashdata('message',lan('successfully_deleted'));
        } else {
            #set error_message message
        $this->session->setFlashdata('exception',lan('please_try_again'));
        }
        return redirect()->to(site_url('payroll/salary_setup_list'));
    }


  public function bdtask_006_salary_generate()
    {
    $data['title']       = lan('salary_generate');
    $data['module']      = "Hrm";
    $data['page']        = "payroll/salary_generate"; 
     return $this->template->layout($data);  
    }


    public function create_salary_generate(){
    $setting_data = $this->payroll_model->setting_data();                       
    date_default_timezone_set($setting_data->timezone); 
    $employee = $this->db->table('employee_salary_setup')
                             ->groupBy('employee_id')
                             ->get()
                             ->getResult();
     list($month,$year) = explode(' ',$this->request->getVar('myDate'));
        $query =$this->db->table('salary_sheet_generate')
                         ->select('*')
                         ->where('gdate',$this->request->getVar('myDate'))
                         ->countAllResults();
                if ($query > 0) {
            $this->session->setFlashdata(array('exception' => lan('the_salary_of').' '.$month.' '. lan('already_generated')));
            return redirect()->to(site_url('payroll/salary_generate'));
        }
           
        switch ($month)
        {
            case "January":
                $month = '1';
                break;
            case "February":
                $month = '2';
                break;
            case "March":
                $month = '3';
                break;
            case "April":
                $month = '4';
                break;
            case "May":
                $month = '5';
                break;
            case "June":
                $month = '6';
                break;
            case "July":
                $month = '7';
                break;
            case "August":
                $month = '8';
                break;
            case "September":
                $month = '9';
                break;
            case "October":
                $month = '10';
                break;
            case "November":
                $month = '11';
                break;
            case "December":
                $month = '12';
                break;
        }
        $fdate   = $year.'-'.$month.'-'.'1';
        $lastday = date('t',strtotime($fdate));
        $edate   = $year.'-'.$month.'-'.$lastday;
        $startd  = $fdate;
        $ab      = $this->request->getVar('myDate');
           
            $postData = [
                'date'                =>  date('Y-m-d'),
                'gdate'               =>  $ab,
                'start_date'          =>  $fdate, 
                'end_date'            =>  $edate, 
                'generate_by'         =>  $this->session->get('id'), 
            ]; 

       $this->payroll_model->bdtask_006_salary_generate($postData);
        $generate_id = $this->db->insertId();
         if (sizeof($employee) > 0)
                foreach($employee as $key=>$value)
                { 
        $aAmount   = $this->db->table('employee_salary_setup')
                             ->select('gross_salary,sal_type,employee_id')
                             ->where('employee_id', $value->employee_id)
                             ->get()
                             ->getRow();

        $Amount    = $aAmount->gross_salary;
        $startd    = $fdate;
        $end       = $edate;
        $tms       = $this->db->table('attendance')
                              ->select('SUM(TIME_TO_SEC(staytime)) AS staytime')
                              ->where('date BETWEEN "'. date('Y-m-d', strtotime($startd)). '" and "'. date('Y-m-d', strtotime($end)).'"')
                              ->where("employee_id" ,$value->employee_id )
                              ->get()
                              ->getRow();
                             
        $times     = $tms->staytime;
        $wormin    = ($times/60);
        $worhour   = $wormin/60;
        if($aAmount->sal_type == 1){
        $dStart    = new \DateTime($startd);
        $dEnd      = new \DateTime($end);
        $dDiff     = $dStart->diff($dEnd);
        $numberofdays =  $dDiff->days+1;
        $totamount = $Amount*$worhour;
        $PYI       = ($totamount/$numberofdays)*365;
        $PossibleYearlyIncome = round($PYI);
        $taxrate = $this->db->table('payroll_tax_setup')
                             ->select('*')
                             ->where("start_amount <",$PossibleYearlyIncome)
                             ->get()
                             ->getResultArray();
        $TotalTax = 0;
        foreach($taxrate as $row){
                   
                if($PossibleYearlyIncome > $row['start_amount'] && $PossibleYearlyIncome > $row['end_amount']){
                   $diff=$row['end_amount']-$row['start_amount'];
                    }
                     if($PossibleYearlyIncome > $row['start_amount'] && $PossibleYearlyIncome < $row['end_amount']){
                    $diff=$PossibleYearlyIncome-$row['start_amount'];
                    }
                    $tax=(($row['rate']/100)*$diff);
                    $TotalTax += $tax;  
                } 
              $TaxAmount = ($TotalTax/365)*$numberofdays;
          
        $netAmount = $totamount-$TaxAmount;
          
        }else if($aAmount->sal_type == 2){
            $netAmount = $Amount;
        }
            $workingper   = $this->db->table('attendance')
                                    ->select('COUNT(date) AS date')
                                    ->where('date BETWEEN "'. date('Y-m-d', strtotime($startd)). '" and "'. date('Y-m-d', strtotime($end)).'"')
                                    ->where("employee_id" ,$value->employee_id )
                                    ->get()
                                    ->getRow()->date;
                                   
            $emp_info     = $this->db->table('employee_information')
                                     ->select('first_name,last_name')
                                    ->where('id',$value->employee_id)
                                    ->get()
                                    ->getRow();
            $headname     = $value->employee_id.'-'.$emp_info->first_name.''.$emp_info->last_name;
            $headcode     = $this->db->table('acc_coa')
                                     ->select('HeadCode')
                                     ->where('HeadName',$headname)
                                     ->get()
                                     ->getRow()->HeadCode;
            $paymentData = array(
                'generate_id'           => $generate_id,
                'employee_id'           => $value->employee_id,
                'total_salary'          => number_format($netAmount, 2, '.', ''),
                'total_working_minutes' => number_format($worhour, 2, '.', ''), 
                'working_period'        => number_format($workingper, 2, '.', ''),
                'salary_month'          => $ab,
            );


              $empsalgen = array(
              'VNo'            =>  $ab,
              'Vtype'          =>  'Salary',
              'VDate'          =>  date('Y-m-d'),
              'COAID'          =>  $headcode,
              'Narration'      =>  'Employee Salary Generate Month of '.$ab,
              'Debit'          =>  0,
              'Credit'         =>  $netAmount,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $this->session->get('id'),
              'CreateDate'     =>  date('Y-m-d H:i:s'),
              'IsAppove'       =>  1
            ); 
             
       
            if(!empty($aAmount->employee_id)){

                 $emp_salary = $this->db->table('employee_salary_payment');
                 $emp_salary->insert($paymentData);
                 $trans = $this->db->table('acc_transaction');
                 $trans->insert($empsalgen);
            }
        }
                $this->session->setFlashdata('message', lan('successfully_generated'));
                 return redirect()->to(site_url('payroll/salary_sheet'));
    }


    public function bdtask_0008_salar_sheet()
    {
     $data['title']            = lan('salary_sheet');
     $data['module']           = "Hrm";
     $data['page']             = "payroll/generate_list"; 
     return $this->template->layout($data); 
    }


     public function bdtask_getSalarygenerate_list()
     {
        $postData = $this->request->getVar();
        $data     = $this->payroll_model->get_salarygenerateList($postData);
        echo json_encode($data);
    }


        public function delete_salgenerate($id = null) { 
        if ($this->payroll_model->sal_generate_delete($id)) {
            #set success message
            $this->session->setFlashdata('message',lan('successfully_deleted'));
        } else {
            #set error_message message
            $this->session->setFlashdata('exception',lan('please_try_again'));
        }
       return redirect()->to(site_url('payroll/salary_sheet'));
    }



    public function bdtask_0009_salary_payment()
    {
     $data['title']            = lan('salary_payment');
     $data['module']           = "Hrm";
     $data['page']             = "payroll/salary_payment"; 
     return $this->template->layout($data); 
    }


     public function bdtask_getSalarypayment_list()
     {
        $postData = $this->request->getVar();
        $data     = $this->payroll_model->get_salarypaymentList($postData);
        echo json_encode($data);
    }



        public function employee_paydata(){
        $sal_id      = $this->request->getVar('sal_id');
        $employee_id = $this->request->getVar('employee_id');
        $emplyeeinfo = $this->db->table('employee_information')
                                ->select('first_name,last_name')
                                ->where('id',$employee_id)
                                ->get()
                                ->getRow();
        $data        = array(
            'employee_id' => $employee_id,
            'Ename'       => $emplyeeinfo->first_name.' '.$emplyeeinfo->last_name,
            'salP_id'     => $sal_id,
        );
        echo json_encode($data);
    }


    public function payconfirm()
    {
          $setting_data = $this->payroll_model->setting_data();                       
    date_default_timezone_set($setting_data->timezone); 
        $postData = [
            'emp_sal_pay_id' => $this->request->getVar('emp_sal_pay_id'),
            'payment_due'    => 'paid',
            'payment_date'   => date('Y-m-d'),
            'paid_by'        => $this->session->get('id'),
        ]; 

        $emp_id = $this->request->getVar('employee_id');
        $c_name = $this->db->table('employee_information')
                           ->select('first_name,last_name')
                           ->where('id',$emp_id)
                           ->get()
                           ->getRow();
        $c_acc  = $emp_id.'-'.$c_name->first_name.''.$c_name->last_name;
        $coatransactionInfo = $this->db->table('acc_coa')
                                       ->select('*')
                                       ->where('HeadName',$c_acc)
                                       ->get()
                                       ->getRow();
       $COAID = $coatransactionInfo->HeadCode;
            
             $cashinhand_credit = array(
      'VNo'         => $this->request->getVar('emp_sal_pay_id'),
      'Vtype'       => 'Salary',
      'VDate'       => date('Y-m-d'),
      'COAID'       => 1020101,
      'Narration'   => 'Cash in hand Credit For Employee Salary for-  '.$c_name->first_name.' '.$c_name->last_name,
      'Debit'       => 0,
      'Credit'      => $this->request->getVar('total_salary'),
      'IsPosted'    => 1,
      'CreateBy'    => $this->session->get('fullname'),
      'CreateDate'  => date('Y-m-d H:i:s'),
      'IsAppove'    => 1
    ); 
                    
    $accpayable = array(
      'VNo'            => $this->request->getVar('emp_sal_pay_id'),
      'Vtype'          => 'Salary',
      'VDate'          => date('Y-m-d'),
      'COAID'          => $COAID,
      'Narration'      => 'Salary paid For- '.$c_name->first_name.' '.$c_name->last_name,
      'Debit'          => $this->request->getVar('total_salary'),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $this->session->get('fullname'),
      'CreateDate'     => date('Y-m-d H:i:s'),
      'IsAppove'       => 1
    ); 
          //company expense for employee salary
    $expense = array(
      'VNo'            => $this->request->getVar('emp_sal_pay_id'),
      'Vtype'          => 'Salary',
      'VDate'          => date('Y-m-d'),
      'COAID'          => 403,
      'Narration'      => 'Salary paid For- '.$c_name->first_name.' '.$c_name->last_name,
      'Debit'          => $this->request->getVar('total_salary'),
      'Credit'         => 0,
      'IsPosted'       => 1,
      'CreateBy'       => $this->session->get('fullname'),
      'CreateDate'     => date('Y-m-d H:i:s'),
      'IsAppove'       => 1
    ); 
      


        if ($this->payroll_model->update_payment($postData)) { 
           $transaction_tbl = $this->db->table('acc_transaction');
           $transaction_tbl->insert($cashinhand_credit);
           $transaction_tbl->insert($expense);
           $transaction_tbl->insert($accpayable);
          $this->session->setFlashdata('message', lan('successfully_paid'));
        } else {
            $this->session->setFlashdata('exception',  lan('please_try_again'));
        }
        
        
         return  redirect()->to(base_url('/payroll/salary_payment/'));

       
    }



        public function payslip($id = null){
        $data['title']         = lan('payslip');
        $data['paymentdata']   = $this->payroll_model->salary_paymentinfo($id);  
        $data['addition']      = $this->payroll_model->salary_addition_fields($data['paymentdata'][0]['employee_id']);
        $data['deduction']     = $this->payroll_model->salary_deduction_fields($data['paymentdata'][0]['employee_id']);
        $data['amountinword']  = $data['paymentdata'][0]['total_salary'];
        $data['module']        = "Hrm";
        $data['page']          = "payroll/payslip"; 
        return $this->template->layout($data);   

}

}
