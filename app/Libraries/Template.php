<?php namespace App\Libraries;
use App\Libraries\Permission;
define('UPDATE_INFO_URL','https://update.bdtask.com/pharmacare/autoupdate/update_info');
class Template {
      public function __construct()
    {
        $this->session = session();
        $this->permission = new Permission();
        $this->db = db_connect();
         
           
    }
  public function layout($data){
      if ( @fopen("https://update.bdtask.com", "r") ) 
      {
         $max_version = file_get_contents(UPDATE_INFO_URL);
      } 
      else 
      {
       $max_version = $this->current_version();
      } 
        $uri                     = current_url(true);
        $wihouturl               =  str_replace(base_url().'/',"",base_url(uri_string()));
        $uri_links               = (explode("/",$wihouturl));
        $total_segment           = $uri->getTotalSegments();
        $data['segment_2']       = ($uri_links[0]?$uri_links[0]:'');
        $data['segment_3']       = ($uri_links[1]?$uri_links[1]:'');
        $data['expired_medicine']= $this->out_of_date_count();
        $data['stock_out_medicine'] = $this->out_of_stock_count();
        $data['max_version']     = $max_version;
        $data['current_version'] = $this->current_version();
        $data['permission']      = $this->permission;
        $data['dynamic_color']   = $this->dynamic_color();
        $data['settings_info']   = $this->setting_data();
        return view('template/layout', $data);
    
  }

  public function setting_data(){
    $builder = $this->db->table('setting')
                             ->get()
                             ->getRow(); 
    return $builder;
  }

   public function out_of_date_count()
     {
         $date=date('Y-m-d');
         $data = $this->db->table('product_information a')
                  ->select("b.*,a.product_name,a.strength,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`)) as 'stock'")
                  ->join('product_purchase_details b','b.product_id=a.product_id','left')
                  ->where('b.expeire_date <=', $date)
                  ->having('stock > 0')
                  ->groupBy('b.batch_id')
                  ->groupBy('a.product_id')
                  ->countAllResults();
        return $data;


    }


    public function out_of_stock_count()
    {
     $data = $this->db->table('product_information a')
            ->select("a.product_name,a.generic_name,a.strength,b.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`)) as 'stock'")
            ->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id')
            ->having('stock < 10')
            ->groupBy('a.product_id')
            ->countAllResults();
         return $data;


    }

    public function dynamic_color()
    {
        $builder = $this->db->table('theme_color_setup')
                             ->get()
                             ->getRow(); 
    return $builder;
    }

    private function current_version(){

        //Current Version
        $product_version = '';
        $path = FCPATH.'system/Security/lic.php'; 
        if (file_exists($path)) {
            
            // Open the file
            $whitefile = file_get_contents($path);

            $file = fopen($path, "r");
            $i    = 0;
            $product_version_tmp = array();
            $product_key_tmp = array();
            while (!feof($file)) {
                $line_of_text = fgets($file);

                if (strstr($line_of_text, 'product_version')  && $i==0) {
                    $product_version_tmp = explode('=', strstr($line_of_text, 'product_version'));
                    $i++;
                }                
            }
            fclose($file);

            $product_version = trim(@$product_version_tmp[1]);
            $product_version = ltrim(@$product_version, '\'');
            $product_version = rtrim(@$product_version, '\';');

            return @$product_version;
            
        } else {
            //file is not exists
            return false;
        }
        
    }

}
