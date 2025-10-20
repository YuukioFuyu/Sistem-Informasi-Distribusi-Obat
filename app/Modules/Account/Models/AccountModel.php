<?php namespace App\Modules\Account\Models;

class AccountModel
{
	
	 public function __construct()
    {
      $this->db = db_connect();
      $this->session = \Config\Services::session();
      $this->request = \Config\Services::request();
    }

    function get_userlist()
    {

   $query   = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('IsActive', 1)
                     ->orderBy('HeadName','asc')
                     ->get()
                     ->getResult();

                     if($query){
                        return $query;
                     }else{
                        return false;
                     }
}


    

 function get_parenthead()
    {
  
         $query   = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('PHeadName', 'COA')
                     ->orderBy('HeadName','asc')
                     ->get()
                     ->getResult();

                     if($query){
                        return $query;
                     }else{
                        return false;
                     }
    }


    function dfs($HeadName,$HeadCode,$oResult,$visit,$d)
    {
  if($d==0) echo "<li class=\"jstree-open\">$HeadName";
        else if($d==1) echo "<li class=\"jstree-open\"><a href='javascript:' onclick=\"loadCoaData('".$HeadCode."')\">$HeadName</a>";
        else echo "<li><a href='javascript:'  onclick=\"loadCoaData('".$HeadCode."')\">$HeadName</a>";
        $p=0;
        for($i=0;$i< count($oResult);$i++)
        {

            if (!$visit[$i])
            {
                if ($HeadName==$oResult[$i]->PHeadName)
                {
                    $visit[$i]=true;
                    if($p==0) echo "<ul>";
                    $p++;
                    $this->dfs($oResult[$i]->HeadName,$oResult[$i]->HeadCode,$oResult,$visit,$d+1);
                }
            }
        }
        if($p==0)
            echo "</li>";
        else
            echo "</ul>";
    }


    public function treeview_selectform($id){
         $data = $this->db->table('acc_coa')
                     ->select('*')
                     ->where('HeadCode',$id)
                     ->get()
                     ->getRow();
            return $data;

    }

    public function opeing_voucher()
    {
      return  $data = $this->db->table('acc_transaction')
                     ->select('VNo as voucher')
                     ->like('VNo', 'OP-', 'after')
                     ->orderBy('ID','desc')
                     ->get()
                     ->getResultArray();
           
    }


    public function create_opening($data = []){
   
           $acc_transaction    = $this->db->table('acc_transaction');
           $insert = $acc_transaction->insert($data);
           if($insert){
            return true;
           }else{
            return false;
           }
    }


     public function get_manufacturer(){
         $data = $this->db->table('manufacturer_information')
                     ->select('*')
                     ->where('status',1)
                     ->orderBy('manufacturer_name', 'asc')
                     ->get()
                     ->getResult();
            return $data;  
    }
    // Customer list
    public function get_customer(){
         $data = $this->db->table('customer_information')
                     ->select('*')
                     ->where('status',1)
                     ->orderBy('customer_name', 'asc')
                     ->get()
                     ->getResult();
            return $data;  
    }

    public function mpayment_voucher()
    {
             return  $data = $this->db->table('acc_transaction')
                     ->select('VNo as voucher')
                     ->like('VNo', 'PM-', 'after')
                     ->orderBy('ID','desc')
                     ->get()
                     ->getResultArray();
           
    }


  public function bank_list()
  {
        $builder = $this->db->table('bank_information');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Bank');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->bank_id]=$value->bank_name;
            }
        }
        return $list;
  }



         public function manufacturer_payment_insert(){
        $setting_data = $this->setting_data();                       
       date_default_timezone_set($setting_data->timezone);
       $bank_id = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
        if(!empty($bank_id)){
         $bankname   = $this->db->table('bank_information')
                     ->select('*')
                     ->where('status',1)
                     ->get()
                     ->getRow()->bank_name;

   
         $bankcoaid  = $this->db->table('acc_coa')
                     ->select('HeadCode')
                     ->where('HeadName',$bankname)
                     ->get()
                     ->getRow()->HeadCode;
           }else{
            $bankcoaid = '';
           }
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo', FILTER_SANITIZE_STRING)));
            $Vtype     = "PM";
            $cAID      = $this->request->getVar('cmbDebit', FILTER_SANITIZE_STRING);
            $dAID      = $this->request->getVar('txtCode', FILTER_SANITIZE_STRING);
            $Debit     = $this->request->getVar('txtAmount', FILTER_SANITIZE_STRING);
            $Credit    = 0;
            $VDate     = $this->request->getVar('dtpDate', FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks', FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 1;
            $sup_id    = $this->request->getVar('manufacturer_id', FILTER_SANITIZE_STRING);

            $CreateBy  = $this->session->get('id');
            $createdate= date('Y-m-d H:i:s');
            $dbtid     = $dAID;
            $Damnt     = $Debit;
            $manufacturer_id = $this->request->getVar('manufacturer_id', FILTER_SANITIZE_STRING);
            $manufacturer   = $this->db->table('manufacturer_information')
                             ->select('*')
                             ->where('manufacturer_id',$manufacturer_id)
                             ->get()
                             ->getRow();

                    $manufacturerdbt = array(
              'VNo'            =>  $voucher_no,
              'Vtype'          =>  $Vtype,
              'VDate'          =>  $VDate,
              'COAID'          =>  $dbtid,
              'Narration'      =>  $Narration,
              'Debit'          =>  $Damnt,
              'Credit'         =>  0,
              'IsPosted'       => $IsPosted,
              'CreateBy'       => $CreateBy,
              'CreateDate'     => $createdate,
              'IsAppove'       => 1
            ); 
             $cc = array(
              'VNo'            =>  $voucher_no,
              'Vtype'          =>  $Vtype,
              'VDate'          =>  $VDate,
              'COAID'          =>  1020101,
              'Narration'      =>  $Narration,
              'Debit'          =>  0,
              'Credit'         =>  $Damnt,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $CreateBy,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
            ); 
             $bankc = array(
              'VNo'            =>  $voucher_no,
              'Vtype'          =>  $Vtype,
              'VDate'          =>  $VDate,
              'COAID'          =>  $bankcoaid,
              'Narration'      =>  $Narration,
              'Debit'          =>  0,
              'Credit'         =>  $Damnt,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $CreateBy,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
            ); 
              

           
              $acc_transaction    = $this->db->table('acc_transaction');
              $insert = $acc_transaction->insert($manufacturerdbt);

              if($this->request->getVar('paytype') == 2){
                 $acc_transaction    = $this->db->table('acc_transaction');
                $insertb = $acc_transaction->insert($bankc);
              }
                if($this->request->getVar('paytype') == 1){
                    $acc_transaction    = $this->db->table('acc_transaction');
                $insertb = $acc_transaction->insert($cc);
                }

                $info['vno'] = $voucher_no;
                $info['code']= $dbtid;
         return $info;
    
}


  public function company_details(){
    return  $details_info = $this->db->table('setting')
            ->select('*')
            ->get()
            ->getRow();
  }


  public function manufacturer_details($manufacturer_id){
     return $manufacturer   = $this->db->table('manufacturer_information')
                             ->select('*')
                             ->where('manufacturer_id',$manufacturer_id)
                             ->get()
                             ->getResultArray();
  }



  public function manufacturerpaymentinfo($voucher_no,$coaid){
  return $result =   $this->db->table('acc_transaction')
                            ->select('*')
                            ->where('VNo',$voucher_no)
                            ->where('COAID',$coaid)
                            ->get()
                            ->getResultArray();



}

    public function customer_receive_voucher()
    {
      return  $data = $this->db->table('acc_transaction')
                            ->select('VNo as voucher')
                            ->like('VNo', 'CR-', 'after')
                            ->orderBy('ID','desc')
                            ->get()
                            ->getResultArray();
           
    }


    public function customer_receive_insert(){
       $setting_data = $this->setting_data();                       
       date_default_timezone_set($setting_data->timezone);
        $bank_id = $this->request->getVar('bank_id', FILTER_SANITIZE_STRING);
        if(!empty($bank_id)){
         $bankname   = $this->db->table('bank_information')
                     ->select('*')
                     ->where('status',1)
                     ->get()
                     ->getRow()->bank_name;

   
         $bankcoaid  = $this->db->table('acc_coa')
                     ->select('HeadCode')
                     ->where('HeadName',$bankname)
                     ->get()
                     ->getRow()->HeadCode;
           }else{
            $bankcoaid = '';
           }
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo', FILTER_SANITIZE_STRING)));
            $Vtype     = "CR";
            $cAID      = $this->request->getVar('cmbDebit', FILTER_SANITIZE_STRING);
            $dAID      = $this->request->getVar('txtCode', FILTER_SANITIZE_STRING);
            $Debit     = $this->request->getVar('txtAmount', FILTER_SANITIZE_STRING);
            $Credit    = 0;
            $VDate     = $this->request->getVar('dtpDate', FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks', FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 1;
            $CreateBy  = $this->session->get('id');
            $createdate= date('Y-m-d H:i:s');
            $dbtid     = $dAID;
            $Damnt     = $Debit;
            $customer_id = $this->request->getVar('customer_id', FILTER_SANITIZE_STRING);
            $customer   = $this->db->table('customer_information')
                             ->select('*')
                             ->where('customer_id',$customer_id)
                             ->get()
                             ->getRow();

                    $customerdbt = array(
              'VNo'            => $voucher_no,
              'Vtype'          => $Vtype,
              'VDate'          => $VDate,
              'COAID'          => $dbtid,
              'Narration'      => $Narration,
              'Debit'          => 0,
              'Credit'         => $Damnt,
              'IsPosted'       => $IsPosted,
              'CreateBy'       => $CreateBy,
              'CreateDate'     => $createdate,
              'IsAppove'       => 1
            ); 
             $cc = array(
              'VNo'            =>  $voucher_no,
              'Vtype'          =>  $Vtype,
              'VDate'          =>  $VDate,
              'COAID'          =>  1020101,
              'Narration'      =>  'Receive '.$customer->customer_name,
              'Debit'          =>  $Damnt,
              'Credit'         =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $CreateBy,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
            ); 
              $bankc = array(
              'VNo'            =>  $voucher_no,
              'Vtype'          =>  $Vtype,
              'VDate'          =>  $VDate,
              'COAID'          =>  $bankcoaid,
              'Narration'      =>  'customer Receive From '.$customer->customer_name,
              'Debit'          =>  $Damnt,
              'Credit'         =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $CreateBy,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
            ); 
              

           
              $acc_transaction    = $this->db->table('acc_transaction');
              $insert             = $acc_transaction->insert($customerdbt);

              if($this->request->getVar('paytype') == 2){
                $acc_transaction    = $this->db->table('acc_transaction');
                $insertb            = $acc_transaction->insert($bankc);
              }
                if($this->request->getVar('paytype') == 1){
                $acc_transaction    = $this->db->table('acc_transaction');
                $insertb = $acc_transaction->insert($cc);
                }

                $info['vno'] = $voucher_no;
                $info['code']= $dbtid;
         return $info; 
    }


    public function customer_details($customer_id){
         return $manufacturer = $this->db->table('customer_information')
                             ->select('*')
                             ->where('customer_id',$customer_id)
                             ->get()
                             ->getResultArray();
    }


        public function Cashvoucher()
    {
      return  $data = $this->db->table('acc_transaction')
                             ->select('VNo as voucher')
                             ->like('VNo', 'CHV-', 'both')
                             ->orderBy('ID','desc')
                             ->get()
                             ->getResultArray();

           
    }


         //debit update voucher
    public function dbvoucher_updata($id){
      return  $vou_info = $this->db->table('acc_transaction')
                             ->select('*')
                             ->where('VNo',$id)
                             ->where('Credit <',1)
                             ->get()
                             ->getResult();

   
    }

        public function journal_updata($id){
      return  $vou_info = $this->db->table('acc_transaction')
                             ->select('*')
                             ->where('VNo',$id)
                             ->get()
                             ->getResultArray();

  
    }

     //credit voucher update 
    public function crdtvoucher_updata($id){
      return  $vou_info =  $this->db->table('acc_transaction')
                             ->select('*')
                              ->where('VNo',$id)
                              ->where('Debit <',1)
                             ->get()
                             ->getResult();

      

    }
    //Debit voucher inof

    public function debitvoucher_updata($id){
      return $cr_info = $this->db->table('acc_transaction')
                              ->select('*')
                              ->where('VNo',$id)
                              ->where('Credit<',1)
                              ->get()
                              ->getResultArray();

     

    }
     // debit update voucher credit info
    public function crvoucher_updata($id){
       return $v_info = $this->db->table('acc_transaction')
                              ->select('*')
                              ->where('VNo',$id)
                              ->where('Debit<',1)
                              ->get()
                              ->getResultArray();

   
    }




      public function cash_adjustment_insert(){
            $setting_data = $this->setting_data();                       
           date_default_timezone_set($setting_data->timezone);
            $voucher_no = addslashes(trim($this->request->getVar('txtVNo', FILTER_SANITIZE_STRING)));
            $Vtype     = "AD";
            $cAID      = $this->request->getVar('cmbDebit', FILTER_SANITIZE_STRING);
            $dAID      = $this->request->getVar('txtCode', FILTER_SANITIZE_STRING);
            $amount     = $this->request->getVar('txtAmount', FILTER_SANITIZE_STRING);
            $Credit    = 0;
            $VDate     = $this->request->getVar('dtpDate', FILTER_SANITIZE_STRING);
            $type      = $this->request->getVar('type',FILTER_SANITIZE_STRING);
            if($type == 1){
              $debit  = $amount;
              $credit = 0;
            }
            if($type == 2){
              $debit  = 0;
              $credit = $amount;
            }
            $Narration = addslashes(trim($this->request->getVar('txtRemarks', FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 1;
            $CreateBy  = $this->session->get('id');
            $createdate= date('Y-m-d H:i:s');

             $cc = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  1020101,
      'Narration'      =>  $Narration,
      'Debit'          =>  $debit,
      'Credit'         =>  $credit,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
            
         
           
              $acc_transaction    = $this->db->table('acc_transaction');
              $insert             = $acc_transaction->insert($cc);
              if($insert){
                return true;
            }else{
                return false;
            }
          
    }


       public function Transacc()
    {
      return  $data = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('IsTransaction', 1)  
                             ->where('IsActive', 1)
                             ->orderBy('HeadName','asc')
                             ->get()
                             ->getResult();


    }


    public function voNO()
    {
      return  $data = $this->db->table('acc_transaction')
                             ->select('VNo as voucher')
                             ->like('VNo', 'DV-', 'after')
                             ->orderBy('ID','desc')
                             ->limit(1)
                             ->get()
                             ->getResultArray();


          
    }

    public function crVno()
    {
      return  $data = $this->db->table('acc_transaction')
            ->select("VNo as voucher") 
            ->like('VNo', 'CV-', 'after')
            ->orderBy('ID','desc')
            ->limit(1)
            ->get()
            ->getResultArray();
          
    }

      public function Cracc()
    {
      return  $data =  $this->db->table('acc_coa')
                             ->select('*')
                             ->like('HeadCode',1020102, 'after')
                             ->where('IsTransaction', 1) 
                             ->orderBy('HeadName','asc')
                             ->get()
                             ->getResult();

    
    }


        public function insert_debitvoucher(){
           $setting_data = $this->setting_data();                       
           date_default_timezone_set($setting_data->timezone);
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
            $Vtype     = "DV";
            $cAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $dAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $Debit     = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $Credit    = $this->request->getVar('grand_total',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
           $createdate = date('Y-m-d H:i:s');
           
            for ($i=0; $i < count($dAID); $i++) {
                $dbtid=$dAID[$i];
                $Damnt=$Debit[$i];

     $debitheadinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$dbtid) 
                             ->get()
                             ->getRow();
     
                $debitinsert = array(
          'VNo'            => $voucher_no,
          'Vtype'          => $Vtype,
          'VDate'          => $VDate,
          'COAID'          => $dbtid,
          'Narration'      => $Narration,
          'Debit'          => $Damnt,
          'Credit'         => 0,
          'IsPosted'       => $IsPosted,
          'CreateBy'       => $CreateBy,
          'CreateDate'     => $createdate,
          'IsAppove'       => 0
        ); 
           
             $acc_transaction    = $this->db->table('acc_transaction');
             $insert             = $acc_transaction->insert($debitinsert);

              $headinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$cAID) 
                             ->get()
                             ->getRow();
              
          $cinsert = array(
            'VNo'            => $voucher_no,
            'Vtype'          => $Vtype,
            'VDate'          => $VDate,
            'COAID'          => $cAID,
            'Narration'      => $Narration,
            'Debit'          => 0,
            'Credit'         => $Damnt,
            'IsPosted'       => $IsPosted,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
          ); 
        
         $acc_transaction    = $this->db->table('acc_transaction');
             $insert         = $acc_transaction->insert($cinsert);
            

    }
    return true;
}



   public function insert_creditvoucher(){
           $setting_data = $this->setting_data();                       
           date_default_timezone_set($setting_data->timezone);
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
            $Vtype     = "CV";
            $dAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $cAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $Credit    = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $debit     = $this->request->getVar('grand_total',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
           $createdate = date('Y-m-d H:i:s');

            
            for ($i=0; $i < count($cAID); $i++) {
                $crtid = $cAID[$i];
                $Cramnt= $Credit[$i];

        $debitheadinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$crtid) 
                             ->get()
                             ->getRow();
           
            $debitinsert = array(
      'VNo'            => $voucher_no,
      'Vtype'          => $Vtype,
      'VDate'          => $VDate,
      'COAID'          => $crtid,
      'Narration'      => $Narration,
      'Debit'          => 0,
      'Credit'         => $Cramnt,
      'IsPosted'       => $IsPosted,
      'CreateBy'       => $CreateBy,
      'CreateDate'     => $createdate,
      'IsAppove'       => 0
    ); 
          
             $acc_transaction  = $this->db->table('acc_transaction');
             $insert           = $acc_transaction->insert($debitinsert);

       $headinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$dAID) 
                             ->get()
                             ->getRow();
    
      $cinsert = array(
      'VNo'            => $voucher_no,
      'Vtype'          => $Vtype,
      'VDate'          => $VDate,
      'COAID'          => $dAID,
      'Narration'      => 'Credit Vourcher from '.$headinfo->HeadName,
      'Debit'          => $Cramnt,
      'Credit'         =>  0,
      'IsPosted'       => $IsPosted,
      'CreateBy'       => $CreateBy,
      'CreateDate'     => $createdate,
      'IsAppove'       => 0
    ); 

       

       $acc_transaction    = $this->db->table('acc_transaction');
             $insert       = $acc_transaction->insert($cinsert);


    }
    return true;
}


  
    public function contra()
    {
      return  $data =  $this->db->table('acc_transaction')
                             ->select('VNo as voucher')
                             ->like('VNo', 'Contra-', 'after')
                             ->orderBy('ID','desc')
                             ->get()
                             ->getResultArray();

 
           
    }



        public function insert_contravoucher(){
            $setting_data = $this->setting_data();                       
            date_default_timezone_set($setting_data->timezone);
            $voucher_no= addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
            $Vtype     = "Contra";
            $dAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $cAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $debit     = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $credit    = $this->request->getVar('txtAmountcr',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
            $createdate= date('Y-m-d H:i:s');

            for ($i=0; $i < count($cAID); $i++) {
                $crtid = $cAID[$i];
                $Cramnt= $credit[$i];
                $debits= $debit[$i]; 
           
                $contrainsert = array(
          'VNo'            => $voucher_no,
          'Vtype'          => $Vtype,
          'VDate'          => $VDate,
          'COAID'          => $crtid,
          'Narration'      => $Narration,
          'Debit'          => $debits,
          'Credit'         => $Cramnt,
          'IsPosted'       => $IsPosted,
          'CreateBy'       => $CreateBy,
          'CreateDate'     => $createdate,
          'IsAppove'       => 0
        ); 
          
            $acc_transaction    = $this->db->table('acc_transaction');
            $insert             = $acc_transaction->insert($contrainsert);

    }
    return true;
}


 // journal voucher no
public function journal()
    {
      return  $data = $this->db->table('acc_transaction')
                             ->select('VNo as voucher')
                             ->like('VNo', 'Journal-', 'after')
                             ->orderBy('ID','desc')
                             ->get()
                             ->getResultArray();
           
    }


        public function insert_journalvoucher(){
          $setting_data = $this->setting_data();                       
          date_default_timezone_set($setting_data->timezone);
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
            $Vtype     = "JV";
            $dAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $cAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $debit     = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $credit    = $this->request->getVar('txtAmountcr',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
           $createdate = date('Y-m-d H:i:s');

            for ($i=0; $i < count($cAID); $i++) {
                $crtid = $cAID[$i];
                $Cramnt= $credit[$i];
                $debits= $debit[$i]; 
           
                $contrainsert = array(
          'VNo'            => $voucher_no,
          'Vtype'          => $Vtype,
          'VDate'          => $VDate,
          'COAID'          => $crtid,
          'Narration'      => $Narration,
          'Debit'          => $debits,
          'Credit'         => $Cramnt,
          'IsPosted'       => $IsPosted,
          'CreateBy'       => $CreateBy,
          'CreateDate'     => $createdate,
          'IsAppove'       => 0
        ); 
           
              
            $acc_transaction    = $this->db->table('acc_transaction');
            $insert             = $acc_transaction->insert($contrainsert);

    }
    return true;
}



      // voucher Aprove 
    public function approve_voucher(){
        $values = array("DV", "CV", "JV","Contra");
       return $approveinfo = $this->db->table('acc_transaction')
                             ->select('*,sum(Credit) as Credit,sum(Debit) as Debit')
                             ->whereIn('Vtype',$values)
                             ->where('IsAppove',0)
                             ->groupBy('VNo')
                             ->get()
                             ->getResult();

    }
//approved
        public function approved($data = [])
    {
        return $this->db->where('VNo',$data['VNo'])
            ->update('acc_transaction',$data); 
    } 






 public function update_debitvoucher(){
           $setting_data = $this->setting_data();                       
           date_default_timezone_set($setting_data->timezone);
           $voucher_no = $this->request->getVar('txtVNo',FILTER_SANITIZE_STRING);
            $Vtype     = "DV";
            $cAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $dAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $Debit     = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $Credit    = $this->request->getVar('grand_total',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
           $createdate = date('Y-m-d H:i:s');

            
            

             $dlt_transaction     = $this->db->table('acc_transaction');
             $dlt_transaction->where('VNo',$voucher_no);
             $previous_transaction =  $dlt_transaction->delete();

            for ($i=0; $i < count($dAID); $i++) {
                $dbtid=$dAID[$i];
                $Damnt=$Debit[$i];

            $debitheadinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$dbtid) 
                             ->get()
                             ->getRow();         
                 
                  $debitinsert = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $dbtid,
            'Narration'      =>  $Narration,
            'Debit'          =>  $Damnt,
            'Credit'         =>  0,
            'IsPosted'       => $IsPosted,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
          ); 
         
             
               $acc_transaction    = $this->db->table('acc_transaction');
               $insert             = $acc_transaction->insert($debitinsert);

               $headinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$cAID) 
                             ->get()
                             ->getRow();

       
          $cinsert = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $cAID,
            'Narration'      =>  $Narration,
            'Debit'          =>  0,
            'Credit'         =>  $Damnt,
            'IsPosted'       => $IsPosted,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
          ); 
        
         
              $acc_transaction    = $this->db->table('acc_transaction');
              $insert             = $acc_transaction->insert($cinsert);

    }
    return true;
}


 
  public function update_journalvoucher(){
      $setting_data = $this->setting_data();                       
      date_default_timezone_set($setting_data->timezone);   
     $voucher_no = addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
      $Vtype     = "JV";
      $dAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
      $cAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
      $debit     = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
      $credit    = $this->request->getVar('txtAmountcr',FILTER_SANITIZE_STRING);
      $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
      $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
      $IsPosted  = 1;
      $IsAppove  = 0;
      $CreateBy  = $this->session->get('id');
      $createdate= date('Y-m-d H:i:s');
      $dlt_transaction     = $this->db->table('acc_transaction');
      $dlt_transaction->where('VNo',$voucher_no);
      $previous_transaction =  $dlt_transaction->delete();

            for ($i=0; $i < count($cAID); $i++) {
                $crtid = $cAID[$i];
                $Cramnt= $credit[$i];
                $debits= $debit[$i]; 
               
                $contrainsert = array(
          'VNo'            =>  $voucher_no,
          'Vtype'          =>  $Vtype,
          'VDate'          =>  $VDate,
          'COAID'          =>  $crtid,
          'Narration'      =>  $Narration,
          'Debit'          =>  $debits,
          'Credit'         =>  $Cramnt,
          'IsPosted'       => $IsPosted,
          'CreateBy'       => $CreateBy,
          'CreateDate'     => $createdate,
          'IsAppove'       => 0
        ); 
           
             
              $acc_transaction    = $this->db->table('acc_transaction');
              $insert             = $acc_transaction->insert($contrainsert);

    }
     
    return true;
}


      // update Credit voucher
     public function update_creditvoucher(){
           $setting_data = $this->setting_data();                       
           date_default_timezone_set($setting_data->timezone);
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
            $Vtype     = "CV";
            $dAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $cAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $Credit    = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $debit     = $this->request->getVar('grand_total',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
           $createdate = date('Y-m-d H:i:s');

             
                $dlt_transaction     = $this->db->table('acc_transaction');
                $dlt_transaction->where('VNo',$voucher_no);
                $previous_transaction =  $dlt_transaction->delete();        
      
            for ($i=0; $i < count($cAID); $i++) {
                $crtid =$cAID[$i];
                $Cramnt=$Credit[$i];
           
            $debitheadinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$crtid) 
                             ->get()
                             ->getRow();

          
               
                $debitinsert = array(
          'VNo'            =>  $voucher_no,
          'Vtype'          =>  $Vtype,
          'VDate'          =>  $VDate,
          'COAID'          =>  $crtid,
          'Narration'      =>  $Narration,
          'Debit'          =>  0,
          'Credit'         =>  $Cramnt,
          'IsPosted'       => $IsPosted,
          'CreateBy'       => $CreateBy,
          'CreateDate'     => $createdate,
          'IsAppove'       => 0
        ); 
         
        
       $acc_transaction    = $this->db->table('acc_transaction');
       $insert             = $acc_transaction->insert($debitinsert);

        $headinfo = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$dAID) 
                             ->get()
                             ->getRow();

   
    
      $cinsert = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $dAID,
      'Narration'      =>  'Credit Vourcher from '.$headinfo->HeadName,
      'Debit'          =>  $Cramnt,
      'Credit'         =>  0,
      'IsPosted'       => $IsPosted,
      'CreateBy'       => $CreateBy,
      'CreateDate'     => $createdate,
      'IsAppove'       => 0
    ); 

     
     $acc_transaction    = $this->db->table('acc_transaction');
     $insert             = $acc_transaction->insert($cinsert);

    

            }
    
    return true;
}


  public function update_contravoucher(){
          $setting_data = $this->setting_data();                       
          date_default_timezone_set($setting_data->timezone);
           $voucher_no = addslashes(trim($this->request->getVar('txtVNo',FILTER_SANITIZE_STRING)));
            $Vtype     = "Contra";
            $dAID      = $this->request->getVar('cmbDebit',FILTER_SANITIZE_STRING);
            $cAID      = $this->request->getVar('txtCode',FILTER_SANITIZE_STRING);
            $debit     = $this->request->getVar('txtAmount',FILTER_SANITIZE_STRING);
            $credit    = $this->request->getVar('txtAmountcr',FILTER_SANITIZE_STRING);
            $VDate     = $this->request->getVar('dtpDate',FILTER_SANITIZE_STRING);
            $Narration = addslashes(trim($this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted  = 1;
            $IsAppove  = 0;
            $CreateBy  = $this->session->get('id');
           $createdate = date('Y-m-d H:i:s');
                $dlt_transaction     = $this->db->table('acc_transaction');
                $dlt_transaction->where('VNo',$voucher_no);
                $previous_transaction =  $dlt_transaction->delete(); 

            for ($i=0; $i < count($cAID); $i++) {
                $crtid = $cAID[$i];
                $Cramnt= $credit[$i];
                $debits= $debit[$i]; 
           
                $contrainsert = array(
          'VNo'            =>  $voucher_no,
          'Vtype'          =>  $Vtype,
          'VDate'          =>  $VDate,
          'COAID'          =>  $crtid,
          'Narration'      =>  $Narration,
          'Debit'          =>  $debits,
          'Credit'         =>  $Cramnt,
          'IsPosted'       => $IsPosted,
          'CreateBy'       => $CreateBy,
          'CreateDate'     => $createdate,
          'IsAppove'       => 0
        ); 
            
                $acc_transaction    = $this->db->table('acc_transaction');
                $insert             = $acc_transaction->insert($contrainsert);

    }
    return true;
}


     public function delete_voucher($voucher){
        $dlt_transaction     = $this->db->table('acc_transaction');
        $dlt_transaction->where('VNo',$voucher);
        $dlt_transaction->delete();         
      if ($this->db->affectedRows()) {
      return true;
    } else {
      return false;
    }
    }


        public function cashbook_firstqury($FromDate,$HeadCode)
        {
               return $result = $this->db->table('acc_transaction')
                             ->select('IsAppove, COAID,sum(Credit) as Credit,sum(Debit) as Debit')
                             ->where('VDate <',$FromDate)
                             ->like('COAID',$HeadCode,'after')
                             ->where('IsAppove',1)
                             ->get()
                             ->getResultArray();
}


public function cashbook_secondqury($FromDate,$HeadCode,$ToDate)
{
          return $result = $this->db->table('acc_transaction a')
                             ->select('a.ID,a.VNo, a.Vtype, a.VDate, a.Debit, a.Credit, a.IsAppove, a.COAID, a.Narration,(sum(a.Debit)-sum(a.Credit)) as balance')
                              ->join('acc_coa b','a.COAID = b.HeadCode')
                             ->where('a.VDate >=',$FromDate)
                             ->where('a.VDate <=',$ToDate)
                             ->where('COAID',$HeadCode)
                              ->having('balance <>',0)
                             ->where('a.IsAppove',1)
                             ->orderBy('a.VDate')
                             ->orderBy('a.VNo')
                             ->groupBy('a.ID')
                             ->get()
                             ->getResultArray();
}


 public function bank_head()
 {
  $HeadCode =1020102;
    return $result = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('IsTransaction',1)
                             ->like('HeadCode',$HeadCode,'after')
                             ->orderBy('HeadName','asc')
                             ->get()
                             ->getResultArray();
 }

    public function bankbook_firstqury($FromDate,$HeadCode)
    {

    return $result = $this->db->table('acc_transaction')
                             ->select('IsAppove, COAID,sum(Credit) as Credit,sum(Debit) as Debit')
                             ->where('VDate <',$FromDate)
                             ->like('COAID',$HeadCode,'after')
                             ->where('IsAppove',1)
                             ->groupBy('IsAppove')
                             ->groupBy('COAID')
                             ->get()
                             ->getResultArray();
 

}

public function bankbook_secondqury($FromDate,$HeadCode,$ToDate)
{
       return   $result = $this->db->table('acc_transaction a')
                             ->select('a.ID,a.VNo, a.Vtype, a.VDate, a.Debit, a.Credit, a.IsAppove, a.COAID, a.Narration,(sum(a.Debit)-sum(a.Credit)) as balance')
                             ->join('acc_coa b','a.COAID = b.HeadCode')
                             ->where('a.VDate >=',$FromDate)
                             ->where('a.VDate <=',$ToDate)
                             ->where('COAID',$HeadCode)
                             ->where('a.IsAppove',1)
                             ->orderBy('a.VDate')
                             ->get()
                             ->getResultArray();

}


 public  function get_general_ledger()
 {

                 return  $result =   $this->db->table('acc_coa')
                             ->select('*')
                             ->where('IsGL',1)
                             ->orderBy('HeadName','asc') 
                             ->get()
                             ->getResult();


    }

       public function general_led_get($Headid)
       {

        $rs= $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$Headid) 
                             ->get()
                             ->getRow();


        $result = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('IsTransaction',1)
                             ->where('PHeadName',$rs->HeadName)
                             ->orderBy('HeadName','asc') 
                             ->get()
                             ->getResult();
        return $result;
    }


      public function general_led_report_headname($cmbGLCode)
      {
      return $result = $this->db->table('acc_coa')
                           ->select('*')
                           ->where('HeadCode',$cmbGLCode)
                           ->get()
                           ->getResultArray();
    }





    public function general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction)
    {

            if($chkIsTransction){
               $result = $this->db->table('acc_transaction')
                           ->select('acc_transaction.VNo,acc_transaction.VDate, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Narration, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID,acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType')
                           ->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left')
                           ->where('acc_transaction.IsAppove',1)
                           ->where('VDate BETWEEN "'.$dtpFromDate. '" and "'.$dtpToDate.'"')
                           ->where('acc_transaction.COAID',$cmbCode)
                           ->get()
                           ->getResult();

                           return $result;

            }
            else{

                 $result = $this->db->table('acc_transaction')
                           ->select('acc_transaction.COAID,acc_transaction.VDate,acc_transaction.Debit, acc_transaction.Credit,acc_coa.HeadName,acc_transaction.IsAppove, acc_coa.PHeadName, acc_coa.HeadType')
                           ->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left')
                           ->where('acc_transaction.IsAppove',1)
                           ->where('VDate BETWEEN "'.$dtpFromDate. '" and "'.$dtpToDate.'"')
                           ->where('acc_transaction.COAID',$cmbCode)
                           ->get()
                           ->getResult();

                           return $result;
            }

    }

        // prebalance calculation
      public function general_led_report_prebalance($cmbCode,$dtpFromDate)
      {
          
                $query = $this->db->table('acc_transaction')
                           ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                           ->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left')
                           ->where('acc_transaction.IsAppove',1)
                           ->where('VDate < ',$dtpFromDate)
                           ->where('acc_transaction.COAID',$cmbCode)
                           ->get()
                           ->getRow();
         
                return $balance=$query->predebit - $query->precredit;

    }



public function inventoryledger_firstqury($FromDate,$HeadCode)
{
    return $result = $this->db->table('acc_transaction')
                             ->select('IsAppove, COAID,sum(Credit) as Credit,sum(Debit) as Debit')
                             ->where('VDate <',$FromDate)
                             ->where('COAID',$HeadCode)
                             ->where('IsAppove',1)
                             ->groupBy('COAID')
                             ->get()
                             ->getResultArray();           
}


public function inventoryledger_secondqury($FromDate,$HeadCode,$ToDate)
{
    return $result = $this->db->table('acc_transaction a')
                             ->select('a.ID,a.VNo, a.Vtype, a.VDate, a.Debit, a.Credit, a.IsAppove, a.COAID, a.Narration,(sum(a.Debit)-sum(a.Credit)) as balance')
                              ->join('acc_coa b','a.COAID = b.HeadCode')
                             ->where('a.VDate >=',$FromDate)
                             ->where('a.VDate <=',$ToDate)
                             ->where('COAID',$HeadCode)
                             ->where('a.IsAppove',1)
                             ->orderBy('a.VDate')
                             ->orderBy('a.VNo')
                             ->groupBy('a.ID')
                             ->get()
                             ->getResultArray();       
}




    public function trial_balance_report($FromDate,$ToDate,$WithOpening)
    {

        $values1 = array("A", "L");
        $values2 = array("I", "E");
        if($WithOpening)
            $WithOpening=true;
        else
            $WithOpening=false;

        $oResultTr = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('IsGL',1)
                             ->whereIn('HeadType',$values1)
                             ->where('IsActive',1)
                             ->orderBy('HeadCode')
                             ->get()
                             ->getResultArray();

        $oResultInEx =  $this->db->table('acc_coa')
                             ->select('*')
                             ->where('IsGL',1)
                             ->whereIn('HeadType',$values2)
                             ->where('IsActive',1)
                             ->orderBy('HeadCode')
                             ->get()
                             ->getResultArray();

        $data = array(
            'oResultTr'   => $oResultTr,
            'oResultInEx' => $oResultInEx,
            'WithOpening' => $WithOpening
        );

        return $data;
    }




       public function profit_loss_serach(){
       

        $sql1 =$this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadType','I')
                             ->get()
                             ->getResult();

        $sql2 = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadType','E')
                             ->get()
                             ->getResult();
        
        $data = array(
          'oResultAsset'     => $sql1,
          'oResultLiability' => $sql2,
        );
        return $data;
    } 
    public function profit_loss_serach_date($dtpFromDate,$dtpToDate){

                return  $query = $this->db->table('acc_transaction')
                             ->select('acc_transaction.VDate, acc_transaction.COAID, acc_coa.HeadName')
                             ->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode')
                             ->where('acc_transaction.VDate >=',$dtpFromDate)
                             ->where('acc_transaction.VDate <=',$dtpToDate)
                             ->like('acc_transaction.COAID','301','after')
                             ->where('IsAppove',1)
                             ->orderBy('HeadCode')
                             ->get()
                             ->getResult();
    }



public function profitloss_firstquery($dtpFromDate,$dtpToDate,$COAID){

   $sql ="SELECT SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID LIKE '$COAID%' ORDER BY acc_coa.HeadCode ASC";
  


    return $sql;
}

public function profitloss_secondquery($dtpFromDate,$dtpToDate,$COAID){
  $sql = "SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID LIKE '$COAID%' ORDER BY acc_coa.HeadCode ASC";
  
   return $sql;
}


public function cashflow_firstquery(){
   $sql = "SELECT * FROM acc_coa WHERE acc_coa.IsTransaction=1 AND acc_coa.HeadType='A' AND acc_coa.IsActive=1 AND acc_coa.HeadCode LIKE '1020101%'";
  
   return $sql;

}

public function cashflow_secondquery($dtpFromDate,$dtpToDate,$COAID){
    $sql = "SELECT SUM(acc_transaction.Debit)- SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%'";
  
   return $sql;
}

public function cashflow_thirdquery(){
    $sql = "SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '102%' AND IsActive=1 AND HeadCode NOT LIKE '1020101%' AND HeadCode!='102' ";
  
   return $sql;
}

public function cashflow_forthquery($dtpFromDate,$dtpToDate,$COAID){
   $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";
  
   return $sql;
}


public function cashflow_fifthquery($dtpFromDate,$dtpToDate,$COAID){
   $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '4%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";
  
   return $sql;
}


public function cashflow_sixthquery(){
   $sql = "SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '3%' AND IsActive=1 ";
   return $sql;
}

public function cashflow_seventhquery($dtpFromDate,$dtpToDate,$COAID){
     $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";
   return $sql;
}


public function coa_balance($head,$HeadName){
      $head_info = $this->db->table('acc_coa')
                             ->select('*')
                             ->where('HeadCode',$head)
                             ->get()
                             ->getRow();

      
      $balance = 0;
      $total_customer_rcv = 0;
      $total_loan_rcv = 0;
      $single_balance = 0;
       /*all head single(common) balance*/
       
                $query      =  $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$head)
                             ->get()
                             ->getRow();
                $single_bal = $query->predebit - $query->precredit;
                $single_balance += (!empty($single_bal)?$single_bal:0);
                $balance = $single_balance;

       /*single customer receivable balance*/
      if($head_info->PHeadName == 'Customer Receivable'){
   
                $query    =  $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$head)
                             ->get()
                             ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $customer_balance += (!empty($cust_bal)?$cust_bal:0);
       

        $balance = $customer_balance;
      }

         /*single loan receivable balance*/
          if($head_info->PHeadName == 'Loan Receivable'){
           
                $query   = $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$head)
                             ->get()
                             ->getRow();
                $lnp_bal = $query->predebit - $query->precredit;
                $loanrcv_balance += (!empty($lnp_bal)?$lnp_bal:0);
       

        $balance = $loanrcv_balance;
      }

           /*total customer receivable balance*/
            if($HeadName == 'Customer Receivable'){
               $coa =  $this->db->table('acc_coa')
                             ->select('HeadCode')
                             ->where('PHeadName','Customer Receivable')
                             ->get()
                             ->getResultArray();
               $asset_balance = 0;
              foreach($coa as $assetcoa){
   
                $query   = $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                             ->get()
                             ->getRow();
                $ass_bal = $query->predebit - $query->precredit;
                $asset_balance += (!empty($ass_bal)?$ass_bal:0);
        }


        $balance = $asset_balance;
       

      }

        /*total Loan receivable balance*/
         if($HeadName == 'Loan Receivable'){
              $coa =  $this->db->table('acc_coa')
                             ->select('HeadCode')
                             ->where('PHeadName','Loan Receivable')
                             ->get()
                             ->getResultArray();
              $asset_balance = 0;
              foreach($coa as $assetcoa){
             
                $query   = $$this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                             ->get()
                             ->getRow();
                $ass_bal = $query->predebit - $query->precredit;
                $asset_balance += (!empty($ass_bal)?$ass_bal:0);
        }


        $balance = $asset_balance;
        $total_loan_rcv = $balance;

      }

         /*total cash at bank balance*/
            if($HeadName == 'Cash At Bank'){
                $coa = $this->db->table('acc_coa')
                             ->select('HeadCode')
                             ->where('PHeadName','Cash At Bank')
                             ->get()
                             ->getResultArray();
                $asset_balance = 0;
              foreach($coa as $assetcoa){
      
                $query   = $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                             ->get()
                             ->getRow();
                $ass_bal = $query->predebit - $query->precredit;
                $asset_balance += (!empty($ass_bal)?$ass_bal:0);
        }


        $balance = $asset_balance;

      }

             /*single bank balance*/
              if($head_info->PHeadName == 'Cash At Bank'){
            
                $query    = $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$head)
                             ->get()
                             ->getRow();
                $bank_bal = $query->predebit - $query->precredit;
                $bank_balance += (!empty($bank_bal)?$bank_bal:0);
                $balance = $bank_balance;

      }

   /*total account receivable*/
       if($HeadName == 'Account Receivable'){
           $coa =  $this->db->table('acc_coa')
                             ->select('HeadCode')
                             ->where('PHeadName','Customer Receivable')
                             ->get()
                             ->getResultArray();
              $asset_balance = 0;
              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                             ->get()
                             ->getRow();
                $ass_bal = $query->predebit - $query->precredit;
                $asset_balance += (!empty($ass_bal)?$ass_bal:0);
        }

         $lncoa = $this->db->table('acc_coa')
                             ->select('HeadCode')
                             ->where('PHeadName','Loan Receivable')
                             ->get()
                             ->getResultArray();
              foreach($lncoa as $lnassetcoa){
                $lnquery   = $this->db->table('acc_transaction')
                             ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                             ->where('acc_transaction.IsAppove',1)
                             ->where('acc_transaction.COAID',$lnassetcoa['HeadCode'])
                             ->get()
                             ->getRow();
                $ln_bal    = $lnquery->predebit - $lnquery->precredit;
                $loan_balance += (!empty($ln_bal)?$ln_bal:0);
        }

                $single_acc_rcv =  $this->db->table('acc_coa')
                                        ->select('HeadCode')
                                        ->where('PHeadName','Account Receivable')
                                        ->get()
                                        ->getResultArray();

              foreach($single_acc_rcv as $singl_rcv){
                $rcvquery     = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$singl_rcv['HeadCode'])
                                     ->get()
                                     ->getRow();
                $sreceive_bal = $rcvquery->predebit - $rcvquery->precredit;
                $single_balance += (!empty($sreceive_bal)?$sreceive_bal:0);
        }



        $balance = $asset_balance + $loan_balance + $single_balance;

       }

        if($HeadName == 'Cash & Cash Equivalent'){
              $bank_balance = 0;
              $cash_balance = 0;
              $coa =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Cash At Bank')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $bank_bal = $query->predebit - $query->precredit;
                $bank_balance += (!empty($bank_bal)?$bank_bal:0);
        }

                $cash_other = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Cash & Cash Equivalent')
                              ->get()
                              ->getResultArray();

          foreach($cash_other as $cashother){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$cashother['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cash_bal = $query->predebit - $query->precredit;
                $cash_balance += (!empty($cash_bal)?$cash_bal:0);
        }

        $balance = $bank_balance + $cash_balance;

        }

        if($HeadName == 'Current Asset'){

          $balance = $this->total_current_asset_balance();

        }

         if($HeadName == 'Non Current Assets'){

          $balance = $this->total_non_current_asset_balance();

        }
        if($HeadName == 'Assets'){
          $cur_balance      = $this->total_current_asset_balance();
          $non_cure_balance = $this->total_non_current_asset_balance();
          $balance          = $cur_balance + $non_cure_balance;

        }

         if($HeadName == 'Equity'){
          $balance = $this->total_equity_balance();
         }

          if($HeadName == 'Expence'){
          $balance = $this->total_expense_balance();
           }

          if($HeadName == 'Income'){
           $balance = $this->total_income_balance();
           }
           if($HeadName == 'Account Payable'){
           $balance = $this->total_acc_payable_balance();
           }
            if($HeadName == 'Employee Ledger'){
           $balance = $this->total_acc_employee_balance();
           }
           if($HeadName == 'Current Liabilities'){
            $balance_ac_payable = $this->total_acc_payable_balance();
            $emp_payable        = $this->total_acc_employee_balance();
            $rootcur_liablities = $this->total_acc_cruliabilities_balance();
            $balance            = $balance_ac_payable + $emp_payable + $rootcur_liablities;
           }

            if($HeadName == 'Non Current Liabilities'){
           $balance = $this->total_acc_no_curliability_balance();
           }

            if($HeadName == 'Liabilities'){
           $non_cur_balance    = $this->total_acc_no_curliability_balance();
           $balance_ac_payable = $this->total_acc_payable_balance();
           $emp_payable        = $this->total_acc_employee_balance();
           $rootcur_liablities = $this->total_acc_cruliabilities_balance();
           $balance            = $balance_ac_payable + $emp_payable + $rootcur_liablities + $non_cur_balance;
           }
          
          return (!empty($balance)?number_format($balance,2):number_format(0,2));
    }

    public function total_current_asset_balance(){
              $asset_balance = $loan_balance = $single_balance = 0;
              $coa           =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Customer Receivable')
                              ->get()
                              ->getResultArray();
              $asset_balance = 0;
              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $ass_bal = $query->predebit - $query->precredit;
                $asset_balance += (!empty($ass_bal)?$ass_bal:0);
        }

               $lncoa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Loan Receivable')
                              ->get()
                              ->getResultArray();
              foreach($lncoa as $lnassetcoa){
                $lnquery   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$lnassetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $ln_bal    = $lnquery->predebit - $lnquery->precredit;
                $loan_balance += (!empty($ln_bal)?$ln_bal:0);
        }

              $single_acc_rcv = $this->db->table('acc_coa')
                                    ->select('HeadCode')
                                    ->where('PHeadName','Account Receivable')
                                    ->get()
                                    ->getResultArray();

              foreach($single_acc_rcv as $singl_rcv){
                $rcvquery     = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$singl_rcv['HeadCode'])
                                     ->get()
                                     ->getRow();
                $sreceive_bal = $rcvquery->predebit - $rcvquery->precredit;
                $single_balance += (!empty($sreceive_bal)?$sreceive_bal:0);
        }



              $bank_balance = 0;
              $cash_balance = 0;
              $coa =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Cash At Bank')
                              ->get()
                              ->getResultArray();
              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $bank_bal = $query->predebit - $query->precredit;
                $bank_balance += (!empty($bank_bal)?$bank_bal:0);
        }

                $cash_other = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Cash & Cash Equivalent')
                              ->get()
                              ->getResultArray();
          foreach($cash_other as $cashother){
              
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$cashother['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cash_bal = $query->predebit - $query->precredit;
                $cash_balance += (!empty($cash_bal)?$cash_bal:0);
        }

               $balance = $bank_balance + $cash_balance;
               return $balance = $asset_balance + $loan_balance + $single_balance + $bank_balance + $cash_balance;

       

    }

    public function total_non_current_asset_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Non Current Assets')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
    }

    public function total_equity_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Equity')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
    }

     public function total_expense_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Expence')
                              ->get()
                              ->getResultArray();
              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
     }

     public function total_income_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Income')
                              ->get()
                              ->getResultArray();
              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
     }

     public function total_acc_payable_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Account Payable')
                              ->get()
                              ->getResultArray();
              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
     }

     public function total_acc_employee_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Employee Ledger')
                              ->get()
                              ->getResultArray();
              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
     }

     public function total_acc_cruliabilities_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Current Liabilities')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
     }

        public function total_acc_no_curliability_balance(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Non Current Liabilities')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $balance = $query->predebit - $query->precredit;
                $total += (!empty($balance)?$balance:0);
        }
        return $total;
        }

    public function opening_coa_balance($head,$HeadName){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$head)
                                     ->get()
                                     ->getRow();
                $ass_bal = $query->predebit - $query->precredit;
                $balance = $ass_bal;
                if($HeadName == 'Customer Receivable'){
                $balance = $this->customer_rec_opening();
                 }
                 if($HeadName == 'Loan Receivable'){
                $balance          = $this->loan_rec_opening();
                 }
                if($HeadName == 'Account Receivable'){
                $root_balance     = $this->account_rec_opening();
                $customer_balance = $this->customer_rec_opening();
                $loan_balance     = $this->loan_rec_opening();
                $balance          = $root_balance + $customer_balance + $loan_balance;
                 }
                 if($HeadName == 'Cash At Bank'){
                $balance = $this->bank_opening();
                 }
                if($HeadName == 'Cash & Cash Equivalent'){
                 $balance = $this->cash_equivalent_opening();
                 }
                 if($HeadName == 'Current Asset'){
                 $cash_equivalent_balance = $this->cash_equivalent_opening();
                 $root_balance            = $this->account_rec_opening();
                 $customer_balance        = $this->customer_rec_opening();
                 $loan_balance            = $this->loan_rec_opening();
                 $balance                 = $root_balance + $customer_balance + $loan_balance + $cash_equivalent_balance;
                 }

                  if($HeadName == 'Non Current Assets'){
                  $balance = $this->non_current_ass_opening();
                  }
                  if($HeadName == 'Assets'){
                  $non_curopen = $this->non_current_ass_opening();
                  $cash_equivalent_balance = $this->cash_equivalent_opening();
                  $root_balance            = $this->account_rec_opening();
                  $customer_balance        = $this->customer_rec_opening();
                  $loan_balance            = $this->loan_rec_opening();
                  $balance                 = $root_balance + $customer_balance + $loan_balance + $cash_equivalent_balance + $non_curopen;
                  }

                  if($HeadName == 'Equity'){
                  $balance = $this->equity_opening();
                  }

                  if($HeadName == 'Expence'){
                  $balance = $this->expense_opening();
                  }

                  if($HeadName == 'Income'){
                  $balance = $this->income_opening();
                  }
                  if($HeadName == 'Account Payable'){
                  $balance = $this->acc_payable_opening();
                  }

                  if($HeadName == 'Employee Ledger'){
                  $balance = $this->acc_employeeledger_opening();
                  }

                  if($HeadName == 'Current Liabilities'){
                  $cur_balance     = $this->acc_curliabilities_opening();
                  $paya_balance    = $this->acc_payable_opening();
                  $employe_balance = $this->acc_employeeledger_opening();
                  $balance         = $cur_balance + $paya_balance + $employe_balance;
                  }

                  if($HeadName == 'Non Current Liabilities'){
                  $balance = $this->acc_non_curliabilities_opening();
                  }

                  if($HeadName == 'Liabilities'){
                  $non_balance     = $this->acc_non_curliabilities_opening();
                  $cur_balance     = $this->acc_curliabilities_opening();
                  $paya_balance    = $this->acc_payable_opening();
                  $employe_balance = $this->acc_employeeledger_opening();
                  $balance         = $cur_balance + $paya_balance + $employe_balance + $non_balance;
                  }

                  

                return (!empty($balance)?number_format($balance,2):number_format(0,2));
    }

    public function customer_rec_opening(){
              $total = 0;
              $coa =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Loan Receivable')
                              ->get()
                              ->getResultArray();
              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
    }

    public function loan_rec_opening(){
              $total = 0;
              $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Customer Receivable')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
    }
     public function account_rec_opening(){
              $total = 0;
              $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Account Receivable')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
     }

     public function bank_opening(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Cash At Bank')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
     }

      public function cash_equivalent_opening(){
              $total = 0;
              $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Cash & Cash Equivalent')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
            
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
      }

      public function non_current_ass_opening(){
                $total = 0;
                $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Non Current Assets')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
      }

       public function equity_opening(){
               $total = 0;
               $coa = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Equity')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
       }

       public function expense_opening(){
                $total = 0;
                $coa   =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Expence')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
       }

       public function income_opening(){
               $total = 0;
               $coa   =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Income')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
       }
         public function acc_payable_opening(){
               $total = 0;
               $coa   =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Account Payable')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
       }

       public function acc_employeeledger_opening(){
               $total = 0;
               $coa  =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Employee Ledger')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query   = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
       }

        public function acc_curliabilities_opening(){
               $total = 0;
               $coa   = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Current Liabilities')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
       }
       
      public function acc_non_curliabilities_opening(){
               $total = 0;
               $coa   =  $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Non Current Liabilities')
                              ->get()
                              ->getResultArray();

              foreach($coa as $assetcoa){
                $query    = $this->db->table('acc_transaction')
                                     ->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit')
                                     ->where('acc_transaction.IsAppove',1)
                                     ->where('acc_transaction.is_opening',1)
                                     ->where('acc_transaction.COAID',$assetcoa['HeadCode'])
                                     ->get()
                                     ->getRow();
                $cust_bal = $query->predebit - $query->precredit;
                $total += $cust_bal;
              }
              return $total;
      }



      public function fixed_assets()
      {
         return $result = $this->db->table('acc_coa')
                              ->select('HeadCode')
                              ->where('PHeadName','Assets')
                              ->get()
                              ->getResultArray();
      }



      public function liabilities_data()
      {
        return $result = $this->db->table('acc_coa')
                    ->select('*')
                    ->where('PHeadName','Liabilities')
                    ->get()
                    ->getResultArray();
      }


   public function income_fields()
   {
          return $result = $this->db->table('acc_coa')
            ->select('*')
            ->where('PHeadName','Income')
            ->get()
            ->getResultArray();
     }

     public function expense_fields()
     {
         return $result = $this->db->table('acc_coa')
            ->select('*')
            ->where('PHeadName','Expence')
            ->get()
            ->getResultArray();
     }


     public function liabilities_info($head_name)
     {
       return $result = $this->db->table('acc_coa')
            ->select('*')
            ->where('PHeadName',$head_name)
            ->get()
            ->getResultArray();   

    }


    public function liabilities_balance($head_code,$from_date,$to_date){
     return  $result = $this->db->table('acc_transaction')
              ->select('(sum(Credit)-sum(Debit)) as balance,COAID')
              ->where('COAID',$head_code)
              ->where('VDate >=',$from_date)
              ->where('VDate <=',$to_date)
              ->where('IsAppove',1)
              ->get()
              ->getResultArray();
}


  public function income_balance($head_code,$from_date,$to_date){
       return $result = $this->db->table('acc_transaction')
                           ->select("(sum(Debit)-sum(Credit)) as balance,COAID")
                           ->where('COAID',$head_code)
                           ->where('VDate >=',$from_date)
                           ->where('VDate <=',$to_date)
                           ->where('IsAppove',1)
                           ->get()
                           ->getResultArray();
      
}



public function liabilities_info_tax($head_name){
        $records = $this->db->table('acc_coa')
                  ->select("*")
                  ->where('HeadName',$head_name)
                  ->get()
                  ->getResultArray();
       return  $records ;   

}


    public function setting_data()
    {
          $setting = $this->db->table('setting')
                             ->get()
                             ->getRow();  
                             return $setting;
    }
}