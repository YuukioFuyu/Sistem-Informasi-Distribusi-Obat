<?php namespace App\Modules\Hrm\Models;
use App\Libraries\Permission;
class Personalloan_model
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
        helper(['form','url']);
        $this->permission = new Permission();
        $this->request = \Config\Services::request();
    }



    public function singledata($id){
        $builder = $this->db->table('person_information')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_person_information($data=[]){
        $builder = $this->db->table('person_information');
         $add_person_information = $builder->insert($data);

          $id = $this->db->insertID();
           $coa = $this->headcode();
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="102030200001";
            }
    $c_acc=$data['person_name'].'-'.$id;
    $createby=$this->session->get('id');
    $createdate=date('Y-m-d H:i:s');
    $person_coa = [
             'HeadCode'         => $headcode,
             'HeadName'         => $c_acc,
             'PHeadName'        => 'Loan Receivable',
             'HeadLevel'        => '4',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'A',
             'IsBudget'         => '0',
             'person_id'        => $id, 
             'IsDepreciation'   => '0',
             'DepreciationRate' => '0',
             'CreateBy'         => $createby,
             'CreateDate'       => $createdate,
        ];
       
        if($add_person_information){
           $coa = $this->db->table('acc_coa');
         $coa->insert($person_coa); 
           return true;
        }else{
            return false;
        }
    }
 

    public function headcode()
    {
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030200%'");
        return $query->getRow();

    }

    public function check_exist($data=[]){
         $exitstdata = $this->db->table('person_information')
                             ->where('employee_id', $data['employee_id'])
                             ->where('date', $data['date'])
                             ->countAllResults(); 
                            
               if($exitstdata > 0){
                return true;
               }else{
                return false;
               }              
    }

   

    public function update_person_information($data=[]){
     $query = $this->db->table('person_information');   
     $query->where('id', $data['id']);
     return $query->update($data);  

    }

    public function delete_person_information($id){
            $coa = $this->db->table('acc_coa');
            $coa->where('person_id', $id);
            $coa->delete();

            $builder = $this->db->table('person_information');
            $builder->where('id', $id);
            $builder->delete();

       
      if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }

    }

   


        public function getperson_informationList($postData=null){
         $response        = array();
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.person_name like '%".$searchValue."%' or a.person_phone like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('person_information a');
           $builder1->join('acc_coa b', 'a.id = b.person_id');
           $builder1->select("count(*) as allcount");
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('person_information a');
           $builder2->join('acc_coa b', 'a.id = b.person_id');
           $builder2->select("count(*) as allcount");
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('person_information a');
          $builder3->select("a.*,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
          $builder3->join('acc_coa b', 'a.id = b.person_id');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }     
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();
         
          $jsaction = "return confirm('Are You Sure ?')";
          if($this->permission->method('person_list','update')->access()){  
        $button .=' <a href="'.$base_url.'/loan/edit_person/'.$record->id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
          }
          if($this->permission->method('person_list','delete')->access()){ 
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/loan/delete_person/'.$record->id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     }
       
            $data[] = array( 
                'sl'               =>$sl,
                'person_name'      =>$record->person_name,
                'person_phone'     =>$record->person_phone,
                'person_address'   =>$record->person_address,
                'balance'          =>$record->balance,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData"               => $data
         );

         return $response; 
    }


public function person_list()
{
        $builder = $this->db->table('person_information a');
        $builder->select('a.*,b.HeadCode');
        $builder->join('acc_coa b','b.person_id = a.id','left');
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Person');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->HeadCode]=$value->person_name;
            }
        }
        return $list;  
}


   public function save_loan()
   {
            $voucher_no   =  date('Ymdhis');
            $Vtype        =  "Loan Payment";
            $pay_type     =  $this->request->getVar('paytype');
            $cAID         =  $this->request->getVar('cmbDebit');
            $Credit       =  $this->request->getVar('amount');
            $VDate        =  $this->request->getVar('dtpDate');
            $Narration    =  addslashes(trim( $this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted   = 1;
            $IsAppove   = 1;
            $CreateBy   = $this->session->get('id');
            $createdate = date('Y-m-d H:i:s');
            $coid = $this->request->getVar('person_id');
                            
           $bank_id =  $this->request->getVar('bank_id');
           if($bank_id){

          $bankname = $this->db->table('bank_information')
                              ->select('bank_name')
                               ->where('bank_id',$bank_id)
                               ->get()
                               ->getRow()->bank_name;
                               
         $coaid = $this->db->table('acc_coa')
                           ->select('HeadCode')
                           ->where('bank_id',$bank_id)
                           ->get()
                           ->getRow()->HeadCode;
  
            }else{
              $coaid = '';
              $bankname ='';
            }
 
        
     $loandata = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $coid,
      'Narration'      =>  $Narration,
      'Debit'          =>  $Credit,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
     // bank credit
      $bankloan = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $coaid,
      'Narration'      =>  $Narration,
      'Debit'          =>  0,
      'Credit'         =>  $Credit,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
      // cash in hand credit
           $cashinhand = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  1020101,
      'Narration'      => $Narration,
      'Debit'          =>  0,
      'Credit'         =>  $Credit,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

   
       $transactiontbl = $this->db->table('acc_transaction');
            $transactiontbl->insert($loandata);
     
        if($pay_type == 1){
        
         $transactiontbl->insert($cashinhand);  
      }else{
        $transactiontbl->insert($bankloan);  
      }
               


    return true;
   }



       public function getloan_informationList($postData=null){
          $response = array();
          $fromdate = $this->request->getVar('fromdate');
          $todate   = $this->request->getVar('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.VDate BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.VDate like '%".$searchValue."%' or b.HeadName like'%".$searchValue."%' or p.person_name like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('acc_transaction a');
           $builder1->select("count(*) as allcount");
           $builder1->join('acc_coa b', 'a.COAID = b.HeadCode','left');
           $builder1->join('person_information p', 'b.person_id = p.id');
           $builder1->where('b.PHeadName', 'Loan Receivable');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
               if(!empty($fromdate) && !empty($todate)){
             $builder1->where($datbetween);
             }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('acc_transaction a');
           $builder2->select("count(*) as allcount");
           $builder2->join('acc_coa b', 'a.COAID = b.HeadCode','left');
           $builder2->join('person_information p', 'b.person_id = p.id');
           $builder2->where('b.PHeadName', 'Loan Receivable');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
               if(!empty($fromdate) && !empty($todate)){
             $builder2->where($datbetween);
             }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('acc_transaction a');
          $builder3->select("a.*,b.HeadName,b.person_id,p.person_name");
          $builder3->join('acc_coa b', 'a.COAID = b.HeadCode','left');
          $builder3->join('person_information p', 'b.person_id = p.id');
          $builder3->where('b.PHeadName', 'Loan Receivable');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
        if(!empty($fromdate) && !empty($todate)){
             $builder3->where($datbetween);
             }     
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();
         
          $jsaction = "return confirm('Are You Sure ?')";
        
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/loan/delete_loan/'.$record->VNo.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
            $data[] = array( 
                'sl'               =>$sl,
                'person_name'      =>$record->person_name,
                'VDate'            =>$record->VDate,
                'narration'        =>$record->Narration,
                'amount'           =>$record->Debit,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData"               => $data
         );

         return $response; 
    }


       public function delete_loan_information($id){
            $builder = $this->db->table('acc_transaction');
            $builder->where('VNo', $id);
            $builder->delete();

      if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }

    }



     public function getpersonledger_informationList($postData=null){
          $response  = array();
          $fromdate  = $this->request->getVar('fromdate');
          $todate    = $this->request->getVar('todate');
          $person_id = $this->request->getVar('person_id');
         if(!empty($fromdate)){
            $datbetween = "(a.VDate BETWEEN '$fromdate' AND '$todate' AND a.COAID = '$person_id')";
         }else{
            $datbetween = "";
         }
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (a.VDate like '%".$searchValue."%' or b.HeadName like'%".$searchValue."%' or p.person_name like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('acc_transaction a');
           $builder1->select("count(*) as allcount");
           $builder1->join('acc_coa b', 'a.COAID = b.HeadCode');
           $builder1->where('b.PHeadName', 'Loan Receivable');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
               if(!empty($fromdate) && !empty($todate)){
             $builder1->where($datbetween);
             }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('acc_transaction a');
           $builder2->select("count(*) as allcount");
           $builder2->join('acc_coa b', 'a.COAID = b.HeadCode');
           $builder2->where('b.PHeadName', 'Loan Receivable');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
               if(!empty($fromdate) && !empty($todate)){
             $builder2->where($datbetween);
             }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('acc_transaction a');
          $builder3->select("a.*,b.HeadName,b.person_id,p.person_name");
          $builder3->join('acc_coa b', 'a.COAID = b.HeadCode','left');
          $builder3->join('person_information p', 'b.person_id = p.id');
          $builder3->where('b.PHeadName', 'Loan Receivable');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
        if(!empty($fromdate) && !empty($todate)){
             $builder3->where($datbetween);
             }     
         $builder3->orderBy($columnName, $columnSortOrder);
         $builder3->limit($rowperpage, $start);
         $query3   =  $builder3->get();
         $records  =   $query3->getResult();
         $data     = array();
         $sl       = 1;
        $balance = 0;
        $debit = 0;
        $credit = 0;
         foreach($records as $record ){ 
                 $button = '';
          $base_url = base_url();
         
          $jsaction = "return confirm('Are You Sure ?')";
        
        $debit  += $record->Debit;
        $credit -= $record->Credit;
        $balance = $debit + $credit;
            $data[] = array( 
                'sl'               =>$sl,
                'person_name'      =>$record->person_name,
                'VDate'            =>$record->VDate,
                'narration'        =>$record->Narration,
                'debit'            =>$record->Debit,
                'credit'           =>$record->Credit,
                'balance'           =>$balance,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData"               => $data
         );

         return $response; 
    }


       public function save_payment()
   {
            $voucher_no   =  date('Ymdhis');
            $Vtype        =  "Loan Payment";
            $pay_type     =  $this->request->getVar('paytype');
            $cAID         =  $this->request->getVar('cmbDebit');
            $Credit       =  $this->request->getVar('amount');
            $VDate        =  $this->request->getVar('dtpDate');
            $Narration    =  addslashes(trim( $this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted   = 1;
            $IsAppove   = 1;
            $CreateBy   = $this->session->get('id');
            $createdate = date('Y-m-d H:i:s');
            $coid = $this->request->getVar('person_id');
                            
           $bank_id =  $this->request->getVar('bank_id');
           if($bank_id){

          $bankname = $this->db->table('bank_information')
                              ->select('bank_name')
                               ->where('bank_id',$bank_id)
                               ->get()
                               ->getRow()->bank_name;
                               
         $coaid = $this->db->table('acc_coa')
                           ->select('HeadCode')
                           ->where('bank_id',$bank_id)
                           ->get()
                           ->getRow()->HeadCode;
  
            }else{
              $coaid = '';
              $bankname ='';
            }
 
        
     $loandata = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $coid,
      'Narration'      =>  $Narration,
      'Debit'          =>  0,
      'Credit'         =>  $Credit,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
     // bank credit
      $bankloan = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $coaid,
      'Narration'      =>  $Narration,
      'Debit'          =>  $Credit,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
      // cash in hand credit
           $cashinhand = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  1020101,
      'Narration'      => $Narration,
      'Debit'          =>  $Credit,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

   
       $transactiontbl = $this->db->table('acc_transaction');
            $transactiontbl->insert($loandata);
     
        if($pay_type == 1){
        
         $transactiontbl->insert($cashinhand);  
      }else{
        $transactiontbl->insert($bankloan);  
      }
               


    return true;
   }

}