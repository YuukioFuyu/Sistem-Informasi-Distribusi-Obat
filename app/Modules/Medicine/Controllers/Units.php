<?php namespace App\Modules\Medicine\Controllers;
class Units extends BaseController
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

	    $data['title']         = 'Unit List';
        $data['module']        = "Medicine";
        $data['unit_list']     = $this->unitModel->findAll();
        $data['page']          = "unit_list"; 
		return $this->template->layout($data);

	}


        public function bdtask_0001_unit_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('id'));
        $data = [];
           $data['unit'] = (object)$userLevelData = array(
            'id'         => ($this->request->getVar('id')?$this->request->getVar('id'):null),
            'unit_name'  => $this->request->getVar('unit_name', FILTER_SANITIZE_STRING),
            'status'     => $this->request->getVar('status', FILTER_SANITIZE_STRING),
        );

        if ($this->request->getMethod() == 'post') {
          
            $rules = [
                'unit_name'   => ['label' => lan('unit_name'),'rules' => 'required'],

                'status'      => ['label' => lan('status'),'rules'    => 'required|min_length[1]|max_length[3]'], 
            ];
      

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $this->unitModel->save_unit($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/medicine/unit_list/'));
               
            }else{
             $this->unitModel->update_unit($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/medicine/unit_list/'));
               
            }

            }
        }

        $data['module']      = "Medicine";
        if(!empty($id)){
        $data['unit']        = $this->unitModel->singledata($id); }
        $data['title']       = 'Unit';
        $data['page']        = "unit_form"; 
        return $this->template->layout($data);
    }

    public function delete_unit($id = null)
    { 
        if ($this->unitModel->delete_unit($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('medicine/unit_list');
    }

}
