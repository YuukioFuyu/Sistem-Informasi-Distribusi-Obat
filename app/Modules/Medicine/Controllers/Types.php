<?php namespace App\Modules\Medicine\Controllers;
class Types extends BaseController
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

	    $data['title']         = 'Type List';
        $data['module']        = "Medicine";
        $data['type_list']     = $this->typeModel->findAll();
        $data['page']          = "type_list"; 
		return $this->template->layout($data);

	}


        public function bdtask_0001_type_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('id'));
        $data = [];
           $data['type'] = (object)$userLevelData = array(
            'id'         => ($this->request->getVar('id')?$this->request->getVar('id'):null),
            'type_name'  => $this->request->getVar('type_name', FILTER_SANITIZE_STRING),
            'status'     => $this->request->getVar('status', FILTER_SANITIZE_STRING),
        );

        if ($this->request->getMethod() == 'post') {
          
            $rules = [
                'type_name'   => ['label' => lan('type_name'),'rules' => 'required'],

                'status'      => ['label' => lan('status'),'rules'    => 'required|min_length[1]|max_length[3]'], 
            ];
      

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $this->typeModel->save_type($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/medicine/type_list/'));
               
            }else{
             $this->typeModel->update_type($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/medicine/type_list/'));
               
            }

            }
        }

        $data['module']      = "Medicine";
        if(!empty($id)){
        $data['type']        = $this->typeModel->singledata($id); }
        $data['title']       = 'Medicine Type';
        $data['page']        = "type_form"; 
        return $this->template->layout($data);
    }

    public function delete_type($id = null)
    { 
        if ($this->typeModel->delete_type($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('medicine/type_list');
    }

}
