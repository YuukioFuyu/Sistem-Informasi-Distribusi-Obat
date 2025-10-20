<?php namespace App\Modules\Medicine\Controllers;
class Category extends BaseController
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

	    $data['title']         = 'Category List';
        $data['module']        = "Medicine";
        $data['category_list'] = $this->categoryModel->findAll();
        $data['page']          = "category_list"; 
		return $this->template->layout($data);

	}


        public function bdtask_0001_category_form($id = null)
        {
        if (!$this->session->get('isLogIn')){
        return redirect()->route('login');}
        $id = (!empty($id)?$id:$this->request->getVar('category_id'));
        $data = [];
           $data['category'] = (object)$userLevelData = array(
            'category_id'    => ($this->request->getVar('category_id')?$this->request->getVar('category_id'):null),
            'category_name'  => $this->request->getVar('category_name', FILTER_SANITIZE_STRING),
            'status'         => $this->request->getVar('status', FILTER_SANITIZE_STRING),
        );

        if ($this->request->getMethod() == 'post') {
          
            $rules = [
                'category_name'   => ['label' => lan('category_name'),'rules' => 'required'],

                'status'          => ['label' => lan('status'),'rules'        => 'required|min_length[1]|max_length[3]'], 
            ];
      

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
               if(empty($id)){
                $this->categoryModel->save_category($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/medicine/category_list/'));
               
            }else{
             $this->categoryModel->update_category($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/medicine/category_list/'));
               
            }

            }
        }

        $data['module']      = "Medicine";
        if(!empty($id)){
        $data['category']    = $this->categoryModel->singledata($id); }
        $data['title']       = 'Category';
        $data['page']        = "category_form"; 
        return $this->template->layout($data);
    }

    public function delete_category($id = null)
    { 
        if ($this->categoryModel->delete_category($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('medicine/category_list');
    }

}
