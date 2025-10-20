<?php namespace App\Modules\Search\Controllers;
class Search extends BaseController
{
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

        public function bdtask_0001_medicine_search_form()
        {
        
        $serch = $this->request->getVar('search_query');
        $search_data ='';
        if ($this->request->getMethod() == 'post') {
       
            $rules = [
                'search_query'   => ['label' => lan('search'),'rules' => 'required|max_length[150]'],
            ];

            if (! $this->validate($rules)) {
                  $this->session->setFlashdata('exception', $this->validator->listErrors());
                return  redirect()->to(base_url('/search/medicine_search/'));
            }else{
            $search_data = $this->search_model->medicine_search($serch);
            }

        }

        $data['module']      = "Search";
        $data['title']       = 'Medicine Search';
        $data['search_data'] = ($search_data?$search_data:'');
        $data['page']        = "medicine_search"; 
        return $this->template->layout($data);
    }



    public function bdtask_0002_invoice_search_form()
        {
        
        $serch = $this->request->getVar('search_query');
        $search_data ='';
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'search_query' => ['label' => lan('search'),'rules' => 'required|max_length[150]'],
            ];

            if (! $this->validate($rules)) {
                  $this->session->setFlashdata('exception', $this->validator->listErrors());
                return  redirect()->to(base_url('/search/invoice_search/'));
            }else{
            $search_data = $this->search_model->invoice_search($serch);
            }

        }

        $data['module']      = "Search";
        $data['title']       = 'Invoice Search';
        $data['search_data'] = ($search_data?$search_data:'');
        $data['page']        = "invoice_search"; 
        return $this->template->layout($data);
    }


     public function bdtask_0003_purchase_search_form()
        {
        
        $serch = $this->request->getVar('search_query');
        $search_data ='';
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'search_query' => ['label' => lan('search'),'rules' => 'required|max_length[150]'],
            ];

            if (! $this->validate($rules)) {
                  $this->session->setFlashdata('exception', $this->validator->listErrors());
                return  redirect()->to(base_url('/search/purchase_search/'));
            }else{
            $search_data = $this->search_model->purchase_search($serch);
            }

        }

        $data['module']      = "Search";
        $data['title']       = 'Purchase Search';
        $data['search_data'] = ($search_data?$search_data:'');
        $data['page']        = "purchase_search"; 
        return $this->template->layout($data);
    }

  

}
