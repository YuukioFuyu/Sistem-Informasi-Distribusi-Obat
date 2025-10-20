<?php namespace App\Modules\Hrm\Models;
class Expense_model
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
        helper(['form','url']);
        $this->request = \Config\Services::request();
    }

    public function findAll_item()
    {
    $builder = $this->db->table('expense_item');
		$builder->select("*");
        $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('expense_item')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_item($data=[]){
          $builder = $this->db->table('expense_item');
           $add_item = $builder->insert($data);

           $expense_type =$data['expense_item_name'];

            $CreateBy=$this->session->get('id');
            $createdate=date('Y-m-d H:i:s');
            $coa = $this->headcode();
        
           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
           }else{
                $headcode="4000001";
            }
            $expense = array(
      'expense_item_name' =>  $expense_type,
    ); 
        // coa head create   
     $expense_coa = [
             'HeadCode'         => $headcode,
             'HeadName'         => $expense_type,
             'PHeadName'        => 'Expence',
             'HeadLevel'        => '1',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'E',
             'IsBudget'         => '1',
             'IsDepreciation'   => '1',
             'DepreciationRate' => '1',
             'CreateBy'         => $CreateBy,
             'CreateDate'       => $createdate,
        ];
       
        if($add_item){
           $acc_coa = $this->db->table('acc_coa');
               $acc_coa->insert($expense_coa);
           return true;
        }else{
            return false;
        }
    }

    public function check_exist($data=[]){
         $exitstdata = $this->db->table('acc_coa')
                             ->where('HeadName', $data['expense_item_name'])
                             ->countAllResults(); 
                            
               if($exitstdata > 0){
               
                return true;
               }else{
                return false;
               }              
    }

   

    public function update_expense_item($data=[]){
      $oldname = $this->request->getVar('old_name');
      $updata = array(
        'HeadName' =>  $data['expense_item_name'],
      );
     $query = $this->db->table('expense_item');   
     $query->where('id', $data['id']);
      $mainup =  $query->update($data);
      if($mainup) {
      $coa = $this->db->table('acc_coa');   
      $coa->where('HeadName', $oldname);
      $coa->update($updata);
      return true;
      } else{
        return false;
      }

    }

    public function delete_expense_item($id){
      $itemdata = $this->db->table('expense_item')
                             ->where('id', $id)
                             ->get()
                             ->getRow(); 

            $coadlt = $this->db->table('acc_coa');
            $coadlt->where('HeadName', $itemdata->expense_item_name);
           $coadlt->delete();

            $itemdlt = $this->db->table('expense_item');
            $itemdlt->where('id', $id);
            $itemdlt->delete();

         if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }

    }


     public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='1' And HeadCode LIKE '4000%' ORDER BY CreateDate DESC");
        return $query->getRow();

    }

   



public function employee_list()
{
        $builder = $this->db->table('employee_information');
        $builder->select('*');
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Employee');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->id]=$value->first_name.' '.$value->last_name;
            }
        }
        return $list;  
}




  public function datewise_report($employee_id,$from_date,$to_date)
  {
     $data = $this->db->table('attendance a')
                             ->select('a.*,b.first_name,b.last_name')
                             ->join('employee_information b','a.employee_id=b.id')
                             ->where('a.date >=', $from_date)
                             ->where('a.date <=', $to_date)
                             ->where('a.employee_id', $employee_id)
                             ->get()
                             ->getResultArray(); 
        return $data;

  }


   public function expense_item_list(){
        return $list =  $this->db->table('expense_item')
                        ->select('*')
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


          public function save_expense(){
            $voucher_no   =  date('Ymdhis');
            $Vtype        =  "Expense";
            $expense_type =  $this->request->getVar('expense_type');
            $pay_type     =  $this->request->getVar('paytype');
            $cAID         =  $this->request->getVar('cmbDebit');
            $Credit       =  $this->request->getVar('amount');
            $VDate        =  $this->request->getVar('dtpDate');
            $Narration    =  addslashes(trim( $this->request->getVar('txtRemarks',FILTER_SANITIZE_STRING)));
            $IsPosted   = 1;
            $IsAppove   = 1;
            $CreateBy   = $this->session->get('id');
            $createdate = date('Y-m-d H:i:s');
            $coid = $this->db->table('acc_coa')
                             ->select('HeadCode')
                             ->where('HeadName',$expense_type)
                             ->get()
                             ->getRow()->HeadCode;
                            
           $bank_id =  $this->request->getVar('bank_id');
           if($bank_id){

          $bankname = $this->db->table('bank_information')
                              ->select('bank_name')
                               ->where('bank_id',$bank_id)
                               ->get()
                               ->getRow()->bank_name;
                               
         $coaid = $this->db->table('acc_coa')
                           ->select('HeadCode')
                           ->where('HeadName',$bankname)
                           ->get()
                           ->getRow()->HeadCode;
  
            }else{
              $coaid = '';
              $bankname ='';
            }
 
         // expense type credit  
     $expense_acc = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $coid,
      'Narration'      =>  $expense_type.' Expense ',
      'Debit'          =>  $Credit,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
     // bank credit
      $bankexpense = array(
      'VNo'            =>  $voucher_no,
      'Vtype'          =>  $Vtype,
      'VDate'          =>  $VDate,
      'COAID'          =>  $coaid,
      'Narration'      =>  $bankname.' Expense ',
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
      'Narration'      => $expense_type.' Expense',
      'Debit'          =>  0,
      'Credit'         =>  $Credit,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $CreateBy,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

   
       $transactiontbl = $this->db->table('acc_transaction');
            $transactiontbl->insert($expense_acc);
     
        if($pay_type == 1){
        
         $transactiontbl->insert($cashinhand);  
      }else{
        $transactiontbl->insert($bankexpense);  
      }
               


    return true;
   }


   public function getexpenseList($postData=null){
         $response        = array();
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
            $searchQuery  = " (b.HeadName like '%".$searchValue."%' or a.VDate like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('acc_transaction a');
           $builder1->select("count(*) as allcount");
           $builder1->join('acc_coa b','b.HeadCode = a.COAID','left');
           $builder1->where('b.PHeadName','Expence');
           if(!empty($fromdate) && !empty($todate)){
             $builder1->where($datbetween);
             }
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('acc_transaction a');
           $builder2->select("count(*) as allcount");
           $builder2->join('acc_coa b','b.HeadCode = a.COAID','left');
           $builder2->where('b.PHeadName','Expence');
             if(!empty($fromdate) && !empty($todate)){
             $builder2->where($datbetween);
             }
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('acc_transaction a');
          $builder3->select("a.*,b.HeadName");
           $builder3->join('acc_coa b','b.HeadCode = a.COAID','left');
           $builder3->where('b.PHeadName','Expence');
           if(!empty($fromdate) && !empty($todate)){
             $builder3->where($datbetween);
             }
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
        
      
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/expense/delete_expense/'.$record->ID.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
     
            $data[] = array( 
                'sl'              =>$sl,
                'date'            =>$record->VDate,
                'HeadName'        =>$record->HeadName,
                'debit'           =>$record->Debit,
                'credit'          =>$record->Credit,
                'narration'       =>$record->Narration,
                'button'          =>$button,
                
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


    public function expense_infos($id)
    {
      return  $data = $this->db->table('acc_transaction a')
                              ->select('a.*,b.HeadName')
                              ->join('acc_coa b','b.HeadCode = a.COAID')
                               ->where('a.ID',$id)
                               ->get()
                               ->getRow();
    }


        public function delete_expense($id){
      $trans = $this->db->table('acc_transaction')
                             ->where('ID', $id)
                             ->get()
                             ->getRow(); 

            $trandlt = $this->db->table('acc_transaction');
            $trandlt->where('VNo', $trans->VNo);
            $trandlt->delete();

         if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }

    }

    public function expense_searchdata($item,$from_date,$to_date)
    {
        $trdata = $this->db->table('acc_transaction a');
        $trdata->select('a.*,b.HeadName');
        $trdata->join('acc_coa b','b.HeadCode = a.COAID');
        if($item){
        $trdata->where('b.HeadName',$item);
         }
        $trdata->where('a.VDate >=',$from_date);
        $trdata->where('a.VDate <=',$to_date);
        $trdata->where('b.PHeadName','Expence');
        $query=$trdata->get();
        return $data=$query->getResult();
    }

}