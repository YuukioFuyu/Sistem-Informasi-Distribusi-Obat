<?php namespace App\Modules\Dashboard\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Template;

class Currency extends BaseController
{

   #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    


    public function index()
    {
         if (!$this->session->get('isLogIn')){
        return redirect()->route('login');
    }

        $data['title']         = 'Currency List';
        $data['module']        = "Dashboard";
        $data['currency_list'] = $this->currency_model->findAll();
        $data['page']          = "currency/currency_list"; 
        return $this->template->layout($data);

    }


        public function bdtask_0001_currency_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('id'));
        $data = [];
           $data['currency'] = (object)$userLevelData = array(
            'id'             => ($this->request->getVar('id')?$this->request->getVar('id'):null),
            'currency_name'  => $this->request->getVar('currency_name', FILTER_SANITIZE_STRING),
            'icon'           => $this->request->getVar('icon', FILTER_SANITIZE_STRING),
        );

        if ($this->request->getMethod() == 'post') {
          
            $rules = [
                'currency_name'   => ['label' => lan('currency_name'),'rules' => 'required'],
                'icon'            => ['label' => lan('icon'),'rules'    => 'required'], 
            ];
      

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $this->currency_model->save_currency($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/currency/currency_list/'));
               
            }else{
             $this->currency_model->update_currency($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/currency/currency_list/'));
               
            }

            }
        }

        $data['module']      = "Dashboard";
        if(!empty($id)){
        $data['currency']    = $this->currency_model->singledata($id); }
        $data['title']       = 'Currency';
        $data['page']        = "currency/currency_form"; 
        return $this->template->layout($data);
    }

    public function delete_currency($id = null)
    { 
        if ($this->currency_model->delete_currency($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

       return  redirect()->to(base_url('/currency/currency_list/'));
    }


}