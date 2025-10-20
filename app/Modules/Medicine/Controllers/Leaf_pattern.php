<?php namespace App\Modules\Medicine\Controllers;
class Leaf_pattern extends BaseController
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

	    $data['title']         = 'Leaf Pattern';
        $data['module']        = "Medicine";
        $data['leaf_list']     = $this->leafModel->findAll();
        $data['page']          = "leaf_list"; 
		return $this->template->layout($data);

	}


        public function bdtask_0001_leaf_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('id'));
        $data = [];
           $data['leaf'] = (object)$userLevelData = array(
            'id'               => ($this->request->getVar('id')?$this->request->getVar('id'):null),
            'leaf_type'        => $this->request->getVar('leaf_type', FILTER_SANITIZE_STRING),
            'total_number'     => $this->request->getVar('total_number', FILTER_SANITIZE_STRING),
        );

        if ($this->request->getMethod() == 'post') {
          
            $rules = [
                'leaf_type'    => ['label' => lan('leaf_type'),'rules' => 'required'],

                'total_number' => ['label' => lan('total_number'),'rules'    => 'required|min_length[1]|max_length[3]'], 
            ];
      

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $this->leafModel->save_leaf($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/medicine/leaf_setting/'));
               
            }else{
             $this->leafModel->update_leaf($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/medicine/leaf_setting/'));
               
            }

            }
        }

        $data['module']      = "Medicine";
        if(!empty($id)){
        $data['leaf']        = $this->leafModel->singledata($id); }
        $data['title']       = 'leaf';
        $data['page']        = "leaf_form"; 
        return $this->template->layout($data);
    }

    public function delete_leaf($id = null)
    { 
        if ($this->leafModel->delete_leaf($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('medicine/leaf_setting');
    }

}
