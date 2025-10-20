<?php namespace App\Modules\Dashboard\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Template;

class Panel_setting extends BaseController
{

   #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    


    public function panel_color_setting(){
        $data['setting']      =  $this->db->table('theme_color_setup')->select('*')->get()->getRow();
        $data['title']        = 'panel setting';
        $data['module']       = "Dashboard";
        $data['page']         = "__color_setting"; 
        return $this->template->layout($data);

    }


    public function update_color_setting(){
        $color_code         = $this->request->getVar('color_code');
        $active_status      = $this->request->getVar('active_status');
        $font_one           = $this->request->getVar('fontone');
        $font_two           = $this->request->getVar('fonttwo');
        $body_font_size     = $this->request->getVar('body_font_size');
        $body_line_hight    = $this->request->getVar('body_line_hight');
        $menu_font_size     = $this->request->getVar('menu_font_size');
        $menu_line_hight    = $this->request->getVar('menu_line_hight');
        $menubg_color       = $this->request->getVar('menubg_color');
        $menu_hover_color   = $this->request->getVar('menu_hover_color');
        $menu_font_color    = $this->request->getVar('menu_font_color');
        $active_menu_color  = $this->request->getVar('active_menu_color');
        $active_menu_bgcolor= $this->request->getVar('active_menu_bgcolor');
        $content_text_color = $this->request->getVar('content_text_color');
        $logo_text_color    = $this->request->getVar('logo_text_color');
        $id                 = ($this->request->getVar('id')?$this->request->getVar('id'):'');

        $data = array(
            'id'                 => $id,
            'color_code'         => $color_code,
            'font_one'           => $font_one,
            'font_two'           => $font_two,
            'body_font_size'     => $body_font_size,
            'body_line_hight'    => $body_line_hight,
            'menu_font_size'     => $menu_font_size,
            'menu_line_hight'    => $menu_line_hight,
            'menubg_color'       => $menubg_color,
            'menu_hover_color'   => $menu_hover_color,
            'menu_font_color'    => $menu_font_color,
            'active_menu_color'  => $active_menu_color,
            'active_menu_bgcolor'=> $active_menu_bgcolor,
            'content_text_color' => $content_text_color,
            'logo_text_color'    => $logo_text_color,
            'active_status'      => $active_status
        );
      
        $check  = $this->db->table('theme_color_setup')->select('*')->countAllResults();
        
        if($check > 0){
        $udata = $this->db->table('theme_color_setup');   
        $udata->where('id', $id);
        $udata->update($data);
        }else{
            
            $add_setting = $this->db->table('theme_color_setup');
            $add_setting->insert($data);
        }

        $this->session->setFlashdata('message',lan('successfully_updated'));
        return  redirect()->to(base_url('dashboard/panel_setting'));
    }


}