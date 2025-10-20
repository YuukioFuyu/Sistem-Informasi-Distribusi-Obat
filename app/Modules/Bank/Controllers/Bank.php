<?php namespace App\Modules\Bank\Controllers;
class Bank extends BaseController
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

	    $data['title']      = 'bank List';
        $data['module']     = "Bank";
        $data['page']       = "bank_list"; 
		return $this->template->layout($data);

	}

     public function bdtask_CheckbankList()
     {
        $postData = $this->request->getVar();
        $data     = $this->bankModel->getbankList($postData);
        echo json_encode($data);
    } 

        public function bdtask_0001_bank_form($id = null)
        {
        helper(['form','url']);
        $id = (!empty($id)?$id:$this->request->getVar('bank_id', FILTER_SANITIZE_STRING));
        $this->validation =  \Config\Services::validation();
        if(!empty($this->request->getFile('image'))){
            $this->validation->setRule('image', lan('image'), 'ext_in[image,png,jpg,jpeg,gif,ico]|is_image[image]');
        }

        if($this->validation->withRequest($this->request)->run() && $this->request->getFile('image')){

            $image_path = $this->imageupload->upload_image($this->request->getFile('image'), 'assets/dist/img/bank/', $this->request->getVar('image'), 60, 70);
        } else {
            $image_path = "";
        }

        $old_image  = $this->request->getVar('old_image');
        $data = [];
           $data['bank'] = (object)$userLevelData = array(
            'bank_id'          => $this->request->getVar('bank_id', FILTER_SANITIZE_STRING),
            'bank_name'        => $this->request->getVar('bank_name', FILTER_SANITIZE_STRING),
            'ac_name'          => $this->request->getVar('ac_name', FILTER_SANITIZE_STRING),
            'ac_number'        => $this->request->getVar('ac_number', FILTER_SANITIZE_STRING),
            'branch'           => $this->request->getVar('branch', FILTER_SANITIZE_STRING),
            'signature_pic'    => (($image_path !='/')?$image_path:$old_image),
            'status'           => $this->request->getVar('status', FILTER_SANITIZE_STRING)
        );

        if ($this->request->getMethod() == 'post') {
            if(empty($id)){
            $rules = [
                'bank_name'   => ['label' => lan('bank_name'),'rules' => 'required|min_length[3]|max_length[150]|is_unique[bank_information.bank_name]'],
                'ac_number'   => ['label' => lan('ac_number'),'rules' => 'required|min_length[6]|max_length[20]|is_unique[bank_information.ac_number]'],
                'ac_name'     => ['label' => lan('ac_name'),'rules'   => 'required|min_length[6]|max_length[20]'], 
            ];
        }else{
             $rules = [
                'bank_name' => ['label' => lan('bank_name'),'rules' => 'required|min_length[3]|max_length[20]'],
                'ac_number' => ['label' => lan('ac_number'),'rules' => 'required|min_length[6]|max_length[20]'],
                 'ac_name'  => ['label' => lan('ac_name'),'rules'   => 'required|min_length[6]|max_length[20]'], 
                 
            ];
        }

            if (! $this->validate($rules)) {
                $this->session->setFlashdata(array('exception'=>$this->validator->listErrors()));
                  return  redirect()->to(base_url('bank/add_bank'));
            }else{
               if(empty($id)){
                $this->bankModel->save_bank($userLevelData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return  redirect()->to(base_url('/bank/bank_list/'));
               
            }else{
             $this->bankModel->update_bank($userLevelData);
             $this->session->setFlashdata('message', lan('successfully_updated'));
             
              return  redirect()->to(base_url('/bank/bank_list/'));
               
            }

            }
        }

        $data['module']      = "Bank";
        if(!empty($id)){
        $data['bank']        = $this->bankModel->singledata($id); }
        $data['title']       = 'Bank';
        $data['page']        = "bank_form"; 
        return $this->template->layout($data);
    }

    public function delete_bank($id = null)
    { 
        if ($this->bankModel->delete_bank($id)) {
            $this->session->setFlashdata('message', lan('successfully_deleted'));
        } else {
            $this->session->setFlashdata('exception', lan('please_try_again'));
        }

        return redirect()->route('bank/bank_list');
    }

}
