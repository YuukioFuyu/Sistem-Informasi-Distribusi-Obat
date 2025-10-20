<?php namespace App\Modules\Medicine\Models;
use App\Libraries\Permission;
class MedicineModel
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
    $builder = $this->db->table('product_information');
		$builder->select("*");
         $query   = $builder->get(); 
		return $query->getResult();

      
    }

    public function singledata($id){
        $builder = $this->db->table('product_information')
                             ->where('product_id', $id)
                             ->get()
                             ->getRow(); 
		return $builder;


    }

    public function save_medicine($data=[]){
        $builder = $this->db->table('product_information');
        return $add_medicine = $builder->insert($data);
    }

    public function update_medicine($data=[]){
     $query = $this->db->table('product_information');   
     $query->where('product_id', $data['product_id']);
     return $query->update($data);  

    }

    public function delete_medicine($id){
            $builder = $this->db->table('product_information');
            $builder->where('product_id', $id);
     return $builder->delete();

    }

   


        public function getmedicineList($postData=null){
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
            $searchQuery  = " (a.product_name like '%".$searchValue."%' or a.product_type like '%".$searchValue."%' or a.price like'%".$searchValue."%' or a.manufacturer_price like'%".$searchValue."%' or m.manufacturer_name like'%".$searchValue."%'or c.category_name like'%".$searchValue."%' or a.product_location like'%".$searchValue."%' or a.generic_name like'%".$searchValue."%') ";
         }
         ## Total number of records without filtering
           $builder1 = $this->db->table('product_information a');
           $builder1->select("count(*) as allcount");
           $builder1->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
           $builder1->join('product_category c','c.category_id = a.category_id','left');
               if($searchValue != ''){
                   $builder1->where($searchQuery);
               }
                
                $query1       =  $builder1->get();
                $records      =   $query1->getRow();
                $totalRecords = $records->allcount;

         
         ## Total number of record with filtering
           $builder2 = $this->db->table('product_information a');
           $builder2->select("count(*) as allcount");
           $builder2->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
           $builder2->join('product_category c','c.category_id = a.category_id','left');
               if($searchValue != ''){
                   $builder2->where($searchQuery);
               }
                   $query2      =  $builder2->get();
                   $records     =   $query2->getRow();
         $totalRecordwithFilter = $records->allcount;
        ## Fetch records
          $builder3 = $this->db->table('product_information a');
          $builder3->select("a.*,
          a.product_name,
          a.product_id,
          a.product_type,
          a.image,
          a.manufacturer_price,
          a.manufacturer_id,
          m.manufacturer_name,
          c.category_name,
        ");
          $builder3->join('manufacturer_information m','m.manufacturer_id = a.manufacturer_id','left');
           $builder3->join('product_category c','c.category_id = a.category_id','left');
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
          $img = (!empty($record->image)?$record->image:'/assets/dist/img/products/product.png');
          $jsaction = "return confirm('Are You Sure ?')";
         $image = '<img src="'.$base_url.$img.'" class="img img-responsive" height="50" width="50">';
         if($this->permission->method('medicine_list','update')->access()){  
        $button .=' <a href="'.$base_url.'/medicine/edit_medicine/'.$record->product_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>' ;
      }
    
        $button .=' <a href="'.$base_url.'/medicine/barCode/'.$record->product_id.'" class="btn btn-warning-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Bar-code"><i class="fas fa-barcode" aria-hidden="true"></i></a>';
      

        $button .=' <a href="'.$base_url.'/medicine/qrCode/'.$record->product_id.'" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="QR-Code"><i class="fas fa-qrcode" aria-hidden="true"></i></a>';
      if($this->permission->method('medicine_list','delete')->access()){  
       $button .=' <a onclick="'.$jsaction.'" href="'.$base_url.'/medicine/delete_medicine/'.$record->product_id.'"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>';
      }
            $data[] = array( 
              'sl'                 =>$sl,
                'product_name'     =>$record->product_name,
                'generic_name'     =>$record->generic_name,
                'product_category' =>$record->category_name,
                'manufacturer_name'=>$record->manufacturer_name,
                'product_location' =>$record->product_location,
                'price'            =>$record->price,
                'purchase_p'       =>$record->manufacturer_price,
                'strength'         =>$record->strength,
                'image'            =>$image,
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


public function category_list()
{
        $builder = $this->db->table('product_category');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Category');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->category_id]=$value->category_name;
            }
        }
        return $list;  
}


public function unit_list()
{
        $builder = $this->db->table('unit');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Unit');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->id]=$value->unit_name;
            }
        }
        return $list;  
}


public function type_list()
{
        $builder = $this->db->table('product_type');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Type');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->id]=$value->type_name;
            }
        }
        return $list;  
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

 
 public function tax_fields()
 {
        $builder = $this->db->table('tax_settings');
        $builder->select('tax_name,default_value');
        $query=$builder->get();
        return $data=$query->getResultArray();
 }     



    public function leaf_setting_list()
    {

      $builder = $this->db->table('medicine_leaf_setting');
        $builder->select('*');
        $query=$builder->get();
        $data=$query->getResult();
        
       $list = array('' => 'Select Leaf Pattern');
        if(!empty($data)){
            foreach ($data as $value){
                $list[$value->total_number]=$value->leaf_type.'('.$value->total_number.')';
            }
        }
        return $list;  
  }

}