<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$db = db_connect();
		/*single query*/
		//return view('welcome_message');
		// $result = $db->query('SELECT * FROM invoice');
		// $builder = $db->table('invoice');
  //       $query   = $builder->get(); 
		//print_r($query->getResult());

		/*another single query*/
		//  $builder = $db->table('invoice');
		// $builder->select('*');
		// $builder->from('invoice_details');
		// $query = $builder->get(); 
		// print_r($query->getResult());
		
		/*join query*/
		$builder = $db->table('invoice');
		$builder->select('*');
		$builder->join('invoice_details', 'invoice.invoice_id = invoice_details.invoice_id');
		$query = $builder->get();
		echo '<pre>';
		print_r($query->getResult());



       
	}

	//--------------------------------------------------------------------

}
