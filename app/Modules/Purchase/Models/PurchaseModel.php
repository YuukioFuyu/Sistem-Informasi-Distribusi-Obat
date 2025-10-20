<?php namespace App\Modules\Purchase\Models;
use App\Libraries\Permission;
class PurchaseModel
{
  
   public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->permission = new Permission();
         $this->request = \Config\Services::request();
    }

    public function findAll()
    {
        $builder = $this->db->table('manufacturer_information');
        $builder->select("*");
        $query   = $builder->get(); 
    return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('product_purchase a')
                            ->select('a.*,b.*')
                            ->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id')
                            ->where('a.purchase_id', $id)
                            ->get()
                            ->getRow(); 
    return $builder;
    }

     public function detailsdata($id){
        $builder = $this->db->table('product_purchase_details a')
                             ->select('a.*,b.product_name,b.strength,b.box_size')
                             ->join('product_information b','b.product_id = a.product_id')
                             ->where('a.purchase_id', $id)
                             ->where('a.quantity >',0)
                             ->get()
                             ->getResultArray(); 
    return $builder;


    }

    public function save_purchase($data=[]){
     $setting_data = $this->setting_data();                       
      date_default_timezone_set($setting_data->timezone);
     
       $builder      = $this->db->table('product_purchase');
       $add_purchase = $builder->insert($data);
      $receive_by   = $this->session->get('id');
      $createdate   = date('Y-m-d H:i:s');;
      $purchase_id  = $data['purchase_id'];
      $paid_amount  = $data['paid_amount'];
      $payment_type = $data['payment_type'];
      $details      = $data['purchase_details'];
      $supinfo      = $this->db->table('manufacturer_information')
                            ->select("*")
                            ->where('manufacturer_id',$data['manufacturer_id'])
                            ->get()
                            ->getRow();

        $sup_coa = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('manufacturer_id',$data['manufacturer_id'])
                            ->get()
                            ->getRow();
         $manufacturer = $supinfo->manufacturer_name;

          $bank_id     = $data['bank_id'];
        if(!empty($bank_id)){
       $bankinfo = $this->db->table('bank_information')
                            ->select("*")
                            ->where('bank_id',$bank_id)
                            ->get()
                            ->getRow();
      $bank_coa_i = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('bank_id', $bank_id)
                            ->get()
                            ->getRow();
    
       $bankcoaid = $bank_coa_i->HeadCode;
   }else{
       $bankcoaid = '';
   }     

     $suppliercredit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  $details,
          'Debit'          =>  0,
          'Credit'         =>  $this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        );


          ///Inventory Debit
       $inventory = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->request->getVar('date', FILTER_SANITIZE_STRING),
      'COAID'          => 10107,
      'Narration'      => $details,
      'Debit'          => $this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

 

             $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
      'COAID'          =>  1020101,
      'Narration'      =>  $details,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

     $supplierdebit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  $details,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 


             
      // bank ledger
     $bankc = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
          'COAID'          =>  $bankcoaid,
          'Narration'      =>  $details,
          'Debit'          =>  0,
          'Credit'         =>  $paid_amount,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 





        if($add_purchase){
               $acc_coatbl = $this->db->table('acc_transaction');
               $acc_coatbl->insert($inventory);
               $acc_coatbl->insert($suppliercredit);
               if($paid_amount > 0){
                $acc_coatbl->insert($supplierdebit);
                if($payment_type == 1){
                $acc_coatbl->insert($cashinhand);  
                }
                if($payment_type == 2){
                $acc_coatbl->insert($bankc);  
                }
               }

        $p_id     = $this->request->getVar('product_id');
        $rate     = $this->request->getVar('product_rate', FILTER_SANITIZE_STRING);
        $quantity = $this->request->getVar('product_quantity', FILTER_SANITIZE_STRING);
        $t_price  = $this->request->getVar('total_price', FILTER_SANITIZE_STRING);
        $batch    = $this->request->getVar('batch_id');
        $expire   = $this->request->getVar('expeire_date', FILTER_SANITIZE_STRING);
        $box_qty  = $this->request->getVar('box_quantity', FILTER_SANITIZE_STRING);
        $bmrp     = $this->request->getVar('mrp', FILTER_SANITIZE_STRING);
        $leaf     = $this->request->getVar('leaf_type', FILTER_SANITIZE_STRING);
        $sub_total = $this->request->getVar('sub_total');
        $vat       = $this->request->getVar('vat', FILTER_SANITIZE_STRING);
        $discount  = $this->request->getVar('discount', FILTER_SANITIZE_STRING);
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate     = $rate[$i];
            $product_id       = $p_id[$i];
            $total_price      = $t_price[$i];
            $mrp              = $bmrp[$i];
            $batch_id         = $batch[$i];
            $expiry_date      = $expire[$i];
            $box_quantity     = $box_qty[$i];
            $box              = $box_qty[$i];
            $disc             = 0;
            $unit_price       = $total_price/$product_quantity;
            $single_price     = ($box*$product_rate)/$product_quantity;
            $single_sale_price= ($box*$mrp)/$product_quantity;
            $leaf_qty         = $leaf[$i];

            $vat_amount       = (($vat?$vat:1)*($total_price?$total_price:1))/(($sub_total?$sub_total:1)*($box?$box:1));
            $vat_allbox       = (($vat?$vat:1)*($total_price?$total_price:1))/($sub_total?$sub_total:1);
            $tp_with_vat      = ($total_price?$total_price:0)+($vat_allbox?$vat_allbox:0); 
            $dis_cal_amount   = ($sub_total?$sub_total:0) + ($vat?$vat:0);
            $dicount_amount   = (($discount?$discount:1)*($tp_with_vat?$tp_with_vat:1))/ ($dis_cal_amount*$box);
            $box_manufacturer_price =  $product_rate + $vat_amount - $dicount_amount;  
            $single_price     = ($box_manufacturer_price)/$leaf_qty;
            $single_price     = $this->rounder($single_price);
            $vat_amount       = $this->rounder($vat_amount);
            $dicount_amount   = $this->rounder($dicount_amount);
            $details = array(
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => ($box_manufacturer_price?$this->rounder($box_manufacturer_price):0),
                'old_mprice'         => ($product_rate?$product_rate:0),
                'mrp'                => ($mrp?$mrp:0),
                'box_qty'            => ($box_quantity?$box_quantity:0),
                'unit_rate'          => ($single_price?$single_price:0),
                'total_amount'       => ($total_price?$total_price:0),
                'batch_id'           => $batch_id,
                'expeire_date'       => $expiry_date,
                'discount'           => ($dicount_amount?$dicount_amount:0),
                'single_vat'         => ($vat_amount?$vat_amount:0),
                'status'             => 1
            );


            $product_info = array(
             'price'              => ($single_sale_price?$single_sale_price:0),
             'b_price'            => ($mrp?$mrp:0),
             'm_b_price'          => ($box_manufacturer_price?$this->rounder($box_manufacturer_price):0),
             'manufacturer_price' => ($single_price?$single_price:0),
             'box_size'           => ($leaf_qty?$leaf_qty:0),
              );
          

            if (!empty($product_quantity)) {
              $purchase_details = $this->db->table('product_purchase_details');
               $purchase_details->insert($details);

              $mupdate = $this->db->table('product_information');   
              $mupdate->where('product_id', $product_id);
              $mupdate->update($product_info); 
            }
        }


        return true;
        }else{
          return false;
        }
    
    }

    public function update_purchase($data=[]){
      $setting_data = $this->setting_data();                       
     date_default_timezone_set($setting_data->timezone);
      $builder      = $this->db->table('product_purchase');
      $builder->where('purchase_id', $data['purchase_id']);
      $add_purchase =  $builder->update($data); 
      $receive_by   = $this->session->get('id');
      $createdate   = date('Y-m-d H:i:s');;
      $purchase_id  = $data['purchase_id'];
      $paid_amount  = $data['paid_amount'];
      $payment_type = $data['payment_type'];
      $details      = $data['purchase_details'];
      $supinfo      = $this->db->table('manufacturer_information')
                            ->select("*")
                            ->where('manufacturer_id',$data['manufacturer_id'])
                            ->get()
                            ->getRow();

        $sup_coa = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('manufacturer_id',$data['manufacturer_id'])
                            ->get()
                            ->getRow();
        $manufacturer = $supinfo->manufacturer_name;

          $bank_id     = $data['bank_id'];
        if(!empty($bank_id)){
        $bankinfo = $this->db->table('bank_information')
                            ->select("*")
                            ->where('bank_id',$bank_id)
                            ->get()
                            ->getRow();
        $bank_coa_i = $this->db->table('acc_coa')
                            ->select("*")
                            ->where('bank_id', $bank_id)
                            ->get()
                            ->getRow();
    
       $bankcoaid = $bank_coa_i->HeadCode;
   }else{
       $bankcoaid = '';
   }     

     $suppliercredit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  $details,
          'Debit'          =>  0,
          'Credit'         =>  $this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        );


          ///Inventory Debit
       $inventory = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->request->getVar('date', FILTER_SANITIZE_STRING),
      'COAID'          => 10107,
      'Narration'      => $details,
      'Debit'          => $this->request->getVar('grand_total_price', FILTER_SANITIZE_STRING),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

 

             $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
      'COAID'          =>  1020101,
      'Narration'      =>  $details,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

     $supplierdebit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  $details,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 


             
      // bank ledger
     $bankc = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->request->getVar('date', FILTER_SANITIZE_STRING),
          'COAID'          =>  $bankcoaid,
          'Narration'      =>  $details,
          'Debit'          =>  0,
          'Credit'         =>  $paid_amount,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        ); 




        if($add_purchase){

               $acc_coatbl = $this->db->table('acc_transaction');
               $acc_coatbl->where('VNo', $purchase_id);
               $acc_coatbl->delete();

               $purchase_details = $this->db->table('product_purchase_details');
               $purchase_details->where('purchase_id', $purchase_id);
               $purchase_details->delete();

               $acc_coatbl->insert($inventory);
               $acc_coatbl->insert($suppliercredit);
               if($paid_amount > 0){
                $acc_coatbl->insert($supplierdebit);
                if($payment_type == 1){
                $acc_coatbl->insert($cashinhand);  
                }
                if($payment_type == 2){
                $acc_coatbl->insert($bankc);  
                }
               }

        $p_id      = $this->request->getVar('product_id');
        $rate      = $this->request->getVar('product_rate', FILTER_SANITIZE_STRING);
        $quantity  = $this->request->getVar('product_quantity', FILTER_SANITIZE_STRING);
        $t_price   = $this->request->getVar('total_price', FILTER_SANITIZE_STRING);
        $batch     = $this->request->getVar('batch_id', FILTER_SANITIZE_STRING);
        $expire    = $this->request->getVar('expeire_date', FILTER_SANITIZE_STRING);
        $box_qty   = $this->request->getVar('box_quantity', FILTER_SANITIZE_STRING);
        $bmrp      = $this->request->getVar('mrp', FILTER_SANITIZE_STRING);
        $leaf      = $this->request->getVar('leaf_type');
        $sub_total = $this->request->getVar('sub_total');
        $vat       = $this->request->getVar('vat', FILTER_SANITIZE_STRING);
        $discount  = $this->request->getVar('discount', FILTER_SANITIZE_STRING);
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate     = $rate[$i];
            $product_id       = $p_id[$i];
            $total_price      = $t_price[$i];
            $mrp              = $bmrp[$i];
            $batch_id         = $batch[$i];
            $expiry_date      = $expire[$i];
            $box_quantity     = $box_qty[$i];
            $box              = $box_qty[$i];
            $leaf_qty         = $leaf[$i];
            $single_sale_price= ($box*$mrp)/$product_quantity;
            $vat_amount       = (($vat?$vat:1)*($total_price?$total_price:1))/(($sub_total?$sub_total:1)*($box?$box:1));
            $vat_allbox       = (($vat?$vat:1)*($total_price?$total_price:1))/($sub_total?$sub_total:1);
            $tp_with_vat      = ($total_price?$total_price:0)+($vat_allbox?$vat_allbox:0); 
            $dis_cal_amount   = ($sub_total?$sub_total:0) + ($vat?$vat:0);
            $dicount_amount   = (($discount?$discount:1)*($tp_with_vat?$tp_with_vat:1))/ ($dis_cal_amount*$box);
            $box_manufacturer_price =  $product_rate + $vat_amount - $dicount_amount;  
            $single_price     = ($box_manufacturer_price)/$leaf_qty;
            $single_price     = $this->rounder($single_price);
            $vat_amount       = $this->rounder($vat_amount);
            $dicount_amount   = $this->rounder($dicount_amount);
            $details = array(
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => ($box_manufacturer_price?$box_manufacturer_price:0),
                'old_mprice'         => ($product_rate?$product_rate:0),
                'mrp'                => ($mrp?$mrp:0),
                'box_qty'            => ($box_quantity?$box_quantity:0),
                'unit_rate'          => ($single_price?$single_price:0),
                'total_amount'       => ($total_price?$total_price:0),
                'batch_id'           => $batch_id,
                'expeire_date'       => $expiry_date,
                'discount'           => ($dicount_amount?$dicount_amount:0),
                'single_vat'         => ($vat_amount?$vat_amount:0),
                'status'             => 1
            );

            $product_info = array(
             'price'              => ($single_sale_price?$single_sale_price:0),
             'b_price'            => ($mrp?$mrp:0),
             'm_b_price'          => ($product_rate?$product_rate:0),
             'manufacturer_price' => ($single_price?$single_price:0),
             'box_size'           => ($leaf_qty?$leaf_qty:0),
              );

            if (!empty($product_quantity)) {
              $purchase_details = $this->db->table('product_purchase_details');
               $purchase_details->insert($details);

              $mupdate = $this->db->table('product_information');   
              $mupdate->where('product_id', $product_id);
              $mupdate->update($product_info); 
            }
        }


        return true;
        }else{
          return false;
        }
    }

    public function delete_purchase($purchase_id){
               $acc_coatbl = $this->db->table('acc_transaction');
               $acc_coatbl->where('VNo', $purchase_id);
               $acc_coatbl->delete();
               $purchase_details = $this->db->table('product_purchase_details');
               $purchase_details->where('purchase_id', $purchase_id);
               $purchase_details->delete();
               $purchase = $this->db->table('product_purchase');
               $purchase->where('purchase_id', $purchase_id);
               $purchase->delete();
               if ($this->db->affectedRows()) {
            return true;
        } else {
            return false;
        }
    }

   


        public function getpurchaseList($postData=null){
          $response = array();
          $fromdate = $this->request->getVar('fromdate');
          $todate   = $this->request->getVar('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.purchase_date BETWEEN '$fromdate' AND '$todate')";
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
            $searchQuery  = " (b.manufacturer_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_purchase a');
           $builder1->select("count(*) as allcount");
           $builder1->join('manufacturer_information b', 'b.manufacturer_id = a.manufacturer_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                if(!empty($fromdate) && !empty($todate)){
             $builder1->where($datbetween);
             }
                
                $query1       =  $builder1->get();
                $records      =  $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_purchase a');
           $builder2->select("count(*) as allcount");
           $builder2->join('manufacturer_information b', 'b.manufacturer_id = a.manufacturer_id','left');
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
          $builder3 = $this->db->table('product_purchase a');
          $builder3->select("a.*,b.manufacturer_name");
          $builder3->join('manufacturer_information b', 'b.manufacturer_id = a.manufacturer_id','left');
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


          $button .=' <a href="'.$base_url.'/purchase/purchase_details/'.$record->purchase_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>';
      
       if($this->permission->method('purchase_list','update')->access()){  
          $button .=' <a href="'.$base_url.'/purchase/purchase_edit/'.$record->purchase_id.'" class="btn btn-primary-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>';
             }
              if($this->permission->method('purchase_list','delete')->access()){  
          $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/purchase/delete_purchase/'.$record->purchase_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
        }
            $data[] = array( 
                'sl'               =>$sl,
                'chalan_no'        =>$record->chalan_no,
                'purchase_id'      =>$record->purchase_id,
                'manufacturer_name'=>$record->manufacturer_name,
                'purchase_id'      =>$record->purchase_id,
                'purchase_date'    =>$record->purchase_date,
                'total_amount'     =>$record->grand_total_amount,
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




  public function manufacturer_list()
{
        $builder = $this->db->table('manufacturer_information');
        $builder->select('*');
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Manufacturer');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->manufacturer_id]=$value->manufacturer_name;
            }
        }
        return $list;  
}


  public function get_total_product($product_id,$manufacturer_id)
  {
    
   $total_purchase = $this->db->table('product_purchase_details')
                            ->select("SUM(quantity) as total_purchase")
                            ->where('product_id',$product_id)
                            ->get()
                            ->getRow();

   $total_sale  = $this->db->table('invoice_details')
                            ->select("SUM(quantity) as total_sale")
                            ->where('product_id',$product_id)
                            ->get()
                            ->getRow();

  $salesreturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_sales_return")
                            ->where('product_id',$product_id)
                            ->where('usablity',1)
                            ->get()
                            ->getRow();
          
  $purchasereturn = $this->db->table('product_return')
                            ->select("SUM(ret_qty) as total_purchase_return")
                            ->where('product_id',$product_id)
                            ->where('usablity',2)
                            ->get()
                            ->getRow();  


   $product_information  = $this->db->table('product_information')
                            ->select("*")
                            ->where('product_id',$product_id)
                            ->where('manufacturer_id',$manufacturer_id)
                            ->get()
                            ->getRow();
    $available_quantity = (($total_purchase->total_purchase?$total_purchase->total_purchase:0) - ($total_sale->total_sale?$total_sale->total_sale:0) + ($salesreturn->total_sales_return?$salesreturn->total_sales_return:0) - ($purchasereturn->total_purchase_return?$purchasereturn->total_purchase_return:0));
    $data2 = array(
      'total_product'      => (!empty($available_quantity)?$available_quantity:0)/($product_information->box_size?$product_information->box_size:1), 
      'manufacturer_price' => $product_information->m_b_price,
      'mrp'                => $product_information->b_price,
      'price'              => $product_information->price, 
      'manufacturer_id'    => $product_information->manufacturer_id,
      'unit'               => $product_information->unit,
      'box_qty'            => $product_information->box_size,

      );

    return $data2;
  }


    public function product_search_item($manufacturer_id,$product_name)
    {

 $product_information  = $this->db->table('product_information')
                              ->select("*")
                              ->where('manufacturer_id',$manufacturer_id)
                              ->like('product_name',$product_name,'both')
                              ->orderBy('product_name','asc')
                              ->limit(15)
                              ->get()
                              ->getResultArray();                     
return $product_information;  
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


    public function leaf_setting_list()
    {

    $b_pattern  = $this->db->table('medicine_leaf_setting')
                              ->select("*")
                              ->get()
                              ->getResultArray();                     
return $b_pattern;  
  }


   public function rounder($num){
    $fln= $num-floor($num);
  if($fln > 0 and $fln < 0.5 ){
      number_format($num, 2, '.', '');
    }else{
       return number_format(round($num), 2, '.', '');
    }
    }


    public function setting_data()
    {
          $setting = $this->db->table('setting')
                             ->get()
                             ->getRow();  
                             return $setting;
    }


  public function product_manufacturer_check($product_id,$manufacturer_id)
  {
 

   $query = $this->db->table('product_information')
                              ->select("*")
                              ->where('manufacturer_id',$manufacturer_id)
                              ->where('product_id',$product_id);

    if ($query->countAllResults() > 0) {
      return true;  
    }
    return 0;
  }
}