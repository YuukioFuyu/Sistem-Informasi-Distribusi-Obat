<?php namespace App\Modules\Search\Models;

class Search_model
{
	
	 public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
         helper(['form','url']);
         $this->request = \Config\Services::request();
    }

    public function medicine_search($keyword)
    {
        $data = $this->db->table("product_information a")
		                    ->select("a.*,b.manufacturer_name,((select ifnull(sum(quantity),0) from product_purchase_details where product_id= `a`.`product_id`)-(select ifnull(sum(quantity),0) from invoice_details where product_id= `a`.`product_id`) + (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 1) - (select ifnull(sum(ret_qty),0) from product_return where product_id= `a`.`product_id` AND usablity = 2)) as 'total_stock'")
                            ->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id')
                            ->orLike(array(
                                    'a.product_name'     => $keyword,
                                    'a.strength'         => $keyword,
                                    'a.generic_name'     => $keyword,
                                    'a.product_location' => $keyword,
                                    'a.box_size'         => $keyword,
                                    'b.manufacturer_name'=> $keyword,
                                    ))
                            ->groupBy('a.product_id')
                            ->get()
                            ->getResultArray();
    
		return $data;

      
    }



    public function invoice_search($keyword)
    {
        $data = $this->db->table("invoice a")
                            ->select("a.*,b.customer_name")
                            ->join('customer_information b','b.customer_id = a.customer_id')
                            ->orLike(array(
                                    'a.invoice'          => $keyword,
                                    'a.invoice_id'       => $keyword,
                                    'a.date'             => $keyword,
                                    'b.customer_name'    => $keyword,
                                    ))
                            ->groupBy('a.invoice_id')
                            ->get()
                            ->getResultArray();
    
        return $data;

      
    }


    public function purchase_search($keyword)
    {
        $data = $this->db->table("product_purchase a")
                            ->select("a.*,b.manufacturer_name")
                            ->join('manufacturer_information b','b.manufacturer_id = a.manufacturer_id')
                            ->orLike(array(
                                    'a.chalan_no'        => $keyword,
                                    'a.purchase_id'      => $keyword,
                                    'a.purchase_date'    => $keyword,
                                    'b.manufacturer_name'=> $keyword,
                                    ))
                            ->groupBy('a.purchase_id')
                            ->get()
                            ->getResultArray();
    
        return $data;

      
    }
}