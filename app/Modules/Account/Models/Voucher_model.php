<?php namespace App\Modules\Account\Models;
use CodeIgniter\Model;
class Voucher_model extends Model
{
	 public function __construct()
    {
        $this->db = db_connect();
     
    }

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



         public function getVoucherList($postData=null){
         $values = array("DV", "CV", "JV","Contra");	
         $response = array();
         $draw            = $postData['draw'];
         $start           = $postData['start'];
         $rowperpage      = $postData['length']; // Rows display per page
         $columnIndex     = $postData['order'][0]['column']; // Column index
         $columnName      = $postData['columns'][$columnIndex]['data']; // 
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue     = $postData['search']['value']; // Search value
         $searchQuery     = "";
         if($searchValue != ''){
            $searchQuery  = " (VNo like '%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('acc_transaction');
           $builder1->select("count(*) as allcount");
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                  $builder1->whereIn('Vtype',$values);
                  $builder1->groupBy('VNo');
                   $query1   =  $builder1->get();
                   $records =   $query1->getResult();
                $totalRecords = count($records);

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('acc_transaction');
           $builder2->select("count(*) as allcount");
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }  
                   $builder2->whereIn('Vtype',$values);
                   $builder2->groupBy('VNo');
                   $query2      =  $builder2->get();
                   $records     =   $query2->getResult();
         $totalRecordwithFilter = count($records);
        ## Fetch records
          $builder3 = $this->db->table('acc_transaction');
          $builder3->select('*,sum(Credit) as Credit,sum(Debit) as Debit');
        if($searchValue != ''){
           $builder3->where($searchQuery);
               }
         $builder3->whereIn('Vtype',$values);   
         $builder3->groupBy('VNo');  
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
         $isapprove = $record->IsAppove;
         if($isapprove == 0){
         $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/account/is_approve/'.$record->VNo.'/active'.'" class="btn btn-warning rounded-pill w-100p mb-2 mr-1" data-toggle="tooltip" data-placement="left" title="Approve">'.lan('approve').'</a>';
         }else{
         	$button .='<a href="javascript:void(0)" class="btn btn-success rounded-pill w-100p mb-2 mr-1">Approved</a>';
         }

        $button .=' <a  href="'.$base_url.'/account/edit_voucher/'.$record->VNo.'"  class="btn btn-info-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Edit "><i class="fas fa-edit" aria-hidden="true"></i></a>';

        $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/account/delete_voucher/'.$record->VNo.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';   
                            
                              
                            
                           
                               
            $data[] = array( 
               'sl'                =>$sl,
                'VNo'              =>$record->VNo,
                'VDate'            =>$record->VDate,
                'Narration'        =>$record->Narration,
                'Debit'            =>$record->Debit,
                'Credit'           =>$record->Credit,
                'IsAppove'         =>$record->IsAppove,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }


    public function approved($data = [])
    {
    
     $query = $this->db->table('acc_transaction');   
     $query->where('VNo',$data['VNo']);
     $approve_up =  $query->update($data); 
     if($approve_up){
     	return true;
     }else{
     	return false;
     } 
    } 
}
?>