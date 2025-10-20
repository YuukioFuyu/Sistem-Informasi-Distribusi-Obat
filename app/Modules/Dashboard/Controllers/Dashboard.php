<?php namespace App\Modules\Dashboard\Controllers;


use CodeIgniter\Controller;
use App\Libraries\Template;

class Dashboard extends BaseController
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
        $today = date('Y-m-d');
        $best_sales_product =  $this->dashboard_model->best_sales_products();
        $chart_label = $chart_data = '';
        if (!empty($best_sales_product))
            for ($i = 0; $i < 12; $i++) {
                $chart_label .= (!empty($best_sales_product[$i]) ?  $best_sales_product[$i]->product_name . ', ' : null);
                $chart_data .= (!empty($best_sales_product[$i]) ? $best_sales_product[$i]->quantity . ', ' : null);
            }
         
  
           $tlvmonth      = '';
           $days_sale     = '';
           $days_purchase = '';
           $days = $this->dashboard_model->allday_of_yearmonth();
        foreach($days as $dta){
            $tlvmonth.=  $dta.',';
            $sold = $this->dashboard_model->datewise_total_sale($dta);
            $purchase = $this->dashboard_model->datewise_total_purchase($dta);
            if (!empty($sold)) {
                         $days_sale.=$sold.",";
                          }else{
                        $days_sale.=",";
                    }
            
             if (!empty($purchase)) {
                         $days_purchase.=$purchase.",";
                          }else{
                         $days_purchase.=",";
                    }

          }

      
	    $data['title']                = 'home';
        $data['module']               = "Dashboard";
        $data['total_customer']       = $this->dashboard_model->total_customer(); 
        $data['total_medicine']       = $this->dashboard_model->total_medicine();
        $data['out_of_stock']         = $this->dashboard_model->out_of_stock_count();
        $data['stockout_medicine_list']=$this->dashboard_model->out_of_stocklist();
        $data['expired_medicine_list']= $this->dashboard_model->out_of_datemedicine_list();
        $data['expired']              = $this->dashboard_model->out_of_date_count();
        $data['best_sale_data']       = $chart_data;
        $data['best_sale_label']      = $chart_label;
        $data['monthly_progress_lable']= $tlvmonth;
        $data['progress_saledata']    = $days_sale;
        $data['progress_purchaedata'] = $days_purchase;
        $data['total_sales']          = $this->dashboard_model->pie_total_saleamount();
        $data['total_purchase']       = $this->dashboard_model->pie_total_purchaseamount();
        $data['total_service']        = $this->dashboard_model->pie_total_serviceamount();
        $data['total_salary']         = $this->dashboard_model->pie_total_salaryamount();
        $data['total_expense']        = $this->dashboard_model->pie_total_expenseamount();
        $data['monthly_reportdata']   = $this->dashboard_model->allday_of_yearmonth();
        $data['todays_totalsale']     = $this->dashboard_model->datewise_total_sale($today);
        $data['todays_totalpurchase'] = $this->dashboard_model->datewise_total_purchase($today);
        $data['todays_cashreceive']   = $this->dashboard_model->datewise_total_cashreceive($today);
        $data['todays_bankreceive']   = $this->dashboard_model->total_bank_receive($today);
        $data['todays_total_service'] = $this->dashboard_model->todays_total_service_amount($today);
        $data['page']                 = "dashboard"; 
        return $this->template->layout($data);

	}


    public function setting()
    {
         if (!$this->session->get('isLogIn')){
        return redirect()->route('login');
    }
    $this->check_setting();
        $data['languageList'] = $this->settingmodel->languageList();
        $data['setting']      = $this->settingmodel->settings_data();
        $data['currency_list']= $this->settingmodel->currency_list();
        $data['timezones']    = $this->timelist();  
        $data['title']        = 'setting';
        $data['module']       = "Dashboard";
        $data['page']         = "setting"; 
        return $this->template->layout($data);

    }

    public function update_setting(){
        helper(['form','url']);
        $this->validation =  \Config\Services::validation();
        if(!empty($this->request->getFile('logo'))){
            $this->validation->setRule('logo', lan('logo'), 'ext_in[logo,png,jpg,gif,jpeg,ico]|is_image[logo]');
        }

        if($this->validation->withRequest($this->request)->run() && $this->request->getFile('logo')){

            $logo_path = $this->imageupload->upload_image($this->request->getFile('logo'), 'assets/dist/img/logo/', $this->request->getVar('logo'), 250, 100);
        } else {
            $logo_path = "";
        }

           if(!empty($this->request->getFile('login_background'))){
            $this->validation->setRule('login_background', lan('login_background_image'), 'ext_in[login_background,png,jpg,jpeg]|is_image[login_background]');
        }

        if($this->validation->withRequest($this->request)->run() && $this->request->getFile('login_background')){

            $loginbackground_path = $this->imageupload->upload_image($this->request->getFile('login_background'), 'assets/dist/img/logo/', $this->request->getVar('login_background'), 1280, 853);
        } else {
            $loginbackground_path = "";
        }

  
            if(!empty($this->request->getFile('favicon'))){
            $this->validation->setRule('favicon', lan('favicon'), 'ext_in[favicon,png,jpg,gif,jpeg,ico]|is_image[favicon]');
        }

        if($this->validation->withRequest($this->request)->run() && $this->request->getFile('favicon')){

            $favicon_path = $this->imageupload->upload_image($this->request->getFile('favicon'), 'assets/dist/img/favicon/', $this->request->getVar('favicon'), 60, 70);
        } else {
            $favicon_path = "";
        }

            $old_logo        = $this->request->getVar('old_logo'); 
            $old_loginback   = $this->request->getVar('old_login_background'); 
            $old_favicon     = $this->request->getVar('old_favicon'); 
            $data['setting'] = (object)$postData = [
            'id'           => $this->request->getVar('id'),
            'title'        => $this->request->getVar('title', FILTER_SANITIZE_STRING),
            'menu_title'   => $this->request->getVar('menu_title', FILTER_SANITIZE_STRING),
            'address'      => $this->request->getVar('address', FILTER_SANITIZE_STRING),
            'email'        => $this->request->getVar('email', FILTER_SANITIZE_STRING),
            'phone'        => $this->request->getVar('phone', FILTER_SANITIZE_STRING),
            'logo'         => (($logo_path !='/')?$logo_path:$old_logo),
            'login_background' => (($loginbackground_path !='/')?$loginbackground_path:$old_loginback),
            'favicon'      => (($favicon_path !='/')?$favicon_path:$old_favicon),
            'language'     => $this->request->getVar('language'),
            'currency'     => $this->request->getVar('currency'),
            'discount_type'=> $this->request->getVar('discount_type'),
            'timezone'     => $this->request->getVar('timezone'),
            'rtl'          => $this->request->getVar('rtl'),  
            'footer_text'  => $this->request->getVar('footer_text', FILTER_SANITIZE_STRING) ,
            
        ]; 
            if ($this->request->getMethod() == 'post') {
       
            $rules = [
                'address'      => 'required|max_length[250]',
                'phone'        => 'required',
                'title'        => 'required',
                'rtl'          => 'required',
                'discount_type'=> 'required',
                'email'        => 'required|min_length[6]|max_length[50]|valid_email',
                'language'     => 'required',
                 
                
            ];
       

            if (! $this->validate($rules)) {
                 $this->session->setFlashdata(array('exception'=>$this->validator->listErrors()));
                  return  redirect()->to(base_url('dashboard/setting'));
            }else{
               if(empty($postData['id'])){
                $this->settingmodel->save_setting($postData);
                $this->session->setFlashdata('message', lan('save_successfully'));
                return redirect()->route('dashboard/setting');
               
            }else{
             $this->settingmodel->update_setting($postData);
             $this->session->setFlashdata('message',lan('successfully_updated'));
             return redirect()->route('dashboard/setting');
               
            }

            }
             }
        }
    

        public function check_setting()
    {
          $this->db = db_connect();
            $counts = $this->db->table('setting')
                             ->get();
                              

        if (count($counts->getResult()) == 0) {
            $data = array(
                'title'       => 'Dynamic Admin Panel',
                'menu_title'  => 'Pharmacare',
                'address'     => '123/A, Street, State-12345, Demo',
                'footer_text' => '2020&copy;Copyright',
            );
             
              $settingsdata = $this->db->table('setting');
          $settingsdata->insert($data);   
            
        }
    }


    public function date_expired_medicine()
    {
         
        $data['title']        = 'Expired Medicines';
        $data['module']       = "Dashboard";
        $data['page']         = "expired_medicine"; 
        return $this->template->layout($data);

    }

      public function bdtask_checkexpired_medicine()
     {
        $postData = $this->request->getVar();
        $data     = $this->dashboard_model->getexpiredMedicineList($postData);
        echo json_encode($data);
    } 


    public function stockout_medicine()
    {
        
        $data['title']        = 'Stock Out Medicines';
        $data['module']       = "Dashboard";
        $data['page']         = "stockout_medicine"; 
        return $this->template->layout($data);

    }

         public function bdtask_checkstockout_medicine()
     {
        $postData = $this->request->getVar();
        $data     = $this->dashboard_model->getstockoutMedicineList($postData);
        echo json_encode($data);
    } 


    public function my_profile()
    {
        
        $data['title']        = 'My Profile';
        $data['module']       = "Dashboard";
        $data['page']         = "my_profile"; 
        return $this->template->layout($data);

    }

    public function modaldisplay()
    {
         $is_modal_shown =  $_POST['is_modal_shown'];
         $this->session->set('is_modal_shown',1);
        return true;
    }


    public function timelist()
    {

        $timezones = array(
        'Africa/Casablanca'   => 'Africa/Casablanca',
        'Africa/Lagos'        => 'Africa/Lagos',
        'Africa/Cairo'        => 'Africa/Cairo',
        'Africa/Harare'       => 'Africa/Harare',
        'Africa/Johannesburg' => 'Africa/Johannesburg',
        'Africa/Monrovia'     => 'Africa/Monrovia',
        'America/Anchorage'   => 'America/Anchorage',
        'America/Los_Angeles' => 'America/Los_Angeles',
        'America/Tijuana'     => 'America/Tijuana',
        'America/Chihuahua'   => 'America/Chihuahua',
        'America/Mazatlan'    => 'America/Mazatlan',
        'America/Denver'      => 'America/Denver',
        'America/Managua'     => 'America/Managua',
        'America/Chicago'     => 'America/Chicago',
        'America/Mexico_City' => 'America/Mexico_City',
        'America/Monterrey'   => 'America/Monterrey',
        'America/New_York'    => 'America/New_York',
        'America/Lima'        => 'America/Lima',
        'America/Bogota'      => 'America/Bogota',
        'America/Caracas'     => 'America/Caracas',
        'America/La_Paz'      => 'America/La_Paz',
        'America/Santiago'    => 'America/Santiago',
        'America/St_Johns'    => 'America/St_Johns',
        'America/Sao_Paulo'   => 'America/Sao_Paulo',
        'America/Argentina'   => 'America/Argentina',
        'America/Godthab'     => 'America/Godthab',
        'America/Noronha'     => 'America/Noronha',
        'Asia/Jerusalem'      => 'Asia/Jerusalem',
        'Asia/Baghdad'        => 'Asia/Baghdad',
        'Asia/Kuwait'         => 'Asia/Kuwait',
        'Africa/Nairobi'      => 'Africa/Nairobi',
        'Asia/Riyadh'         => 'Asia/Riyadh',
        'Asia/Tehran'         => 'Asia/Tehran',
        'Asia/Baku'           => 'Asia/Baku',
        'Asia/Muscat'         => 'Asia/Muscat',
        'Asia/Tbilisi'        => 'Asia/Tbilisi',
        'Asia/Yerevan'        => 'Asia/Yerevan',
        'Asia/Kabul'          => 'Asia/Kabul',
        'Asia/Karachi'        => 'Asia/Karachi',
        'Asia/Tashkent'       => 'Asia/Tashkent',
        'Asia/Kolkata'        => 'Asia/Kolkata',
        'Asia/Katmandu'       => 'Asia/Katmandu',
        'Asia/Almaty'         => 'Asia/Almaty',
        'Asia/Dhaka'          => 'Asia/Dhaka',
        'Asia/Yekaterinburg'  => 'Asia/Yekaterinburg',
        'Asia/Rangoon'        => 'Asia/Rangoon',
        'Asia/Bangkok'        => 'Asia/Bangkok',
        'Asia/Jakarta'        => 'Asia/Jakarta',
        'Asia/Hong_Kong'      => 'Asia/Hong_Kong',
        'Asia/Chongqing'      => 'Asia/Chongqing',
        'Asia/Krasnoyarsk'    => 'Asia/Krasnoyarsk',
        'Asia/Kuala_Lumpur'   => 'Asia/Kuala_Lumpur',
        'Australia/Perth'     => 'Australia/Perth',
        'Asia/Singapore'      => 'Asia/Singapore',
        'Asia/Taipei'         => 'Asia/Taipei', 
        'Asia/Ulan_Bator'     => 'Asia/Ulan_Bator',
        'Asia/Urumqi'         => 'Asia/Urumqi',
        'Asia/Irkutsk'        => 'Asia/Irkutsk',
        'Asia/Tokyo'          => 'Asia/Tokyo',
        'Asia/Seoul'          => 'Asia/Seoul',
        'Asia/Yakutsk'        => 'Asia/Yakutsk',
        'Asia/Vladivostok'    => 'Asia/Vladivostok',
        'Asia/Kamchatka'      => 'Asia/Kamchatka',
        'Asia/Magadan'        => 'Asia/Magadan',
        'Atlantic/Azores'     => 'Atlantic/Azores',
        'Atlantic/Cape_Verde' => 'Atlantic/Cape_Verde',
        'Australia/Adelaide'  => 'Australia/Adelaide',
        'Australia/Darwin'    => 'Australia/Darwin',
        'Australia/Brisbane'  => 'Australia/Brisbane',
        'Australia/Canberra'  => 'Australia/Canberra',
        'Australia/Sydney'    => 'Australia/Sydney',
        'Australia/Hobart'    => 'Australia/Hobart',
        'Australia/Melbourne' => 'Australia/Melbourne',
        'Canada/Atlantic'     => 'Canada/Atlantic',
        'Europe/Helsinki'     => 'Europe/Helsinki',
        'Europe/London'       => 'Europe/London',
        'Europe/Dublin'       => 'Europe/Dublin',
        'Europe/Lisbon'       => 'Europe/Lisbon',
        'Europe/Belgrade'     => 'Europe/Belgrade',
        'Europe/Berlin'       => 'Europe/Berlin',
        'Europe/Bratislava'   => 'Europe/Bratislava',
        'Europe/Brussels'     => 'Europe/Brussels',
        'Europe/Budapest'     => 'Europe/Budapest',
        'Europe/Copenhagen'   => 'Europe/Copenhagen',
        'Europe/Ljubljana'    => 'Europe/Ljubljana',
        'Europe/Madrid'       => 'Europe/Madrid',
        'Europe/Paris'        => 'Europe/Paris',
        'Europe/Prague'       => 'Europe/Prague', 
        'Europe/Sarajevo'     => 'Europe/Sarajevo',
        'Europe/Skopje'       => 'Europe/Skopje',
        'Europe/Stockholm'    => 'Europe/Stockholm',
        'Europe/Vienna'       => 'Europe/Vienna',
        'Europe/Warsaw'       => 'Europe/Warsaw',
        'Europe/Zagreb'       => 'Europe/Zagreb',
        'Europe/Athens'       => 'Europe/Athens',
        'Europe/Bucharest'    => 'Europe/Bucharest',
        'Europe/Riga'         => 'Europe/Riga',
        'Europe/Sofia'        => 'Europe/Sofia',
        'Europe/Tallinn'      => 'Europe/Tallinn',
        'Europe/Vilnius'      => 'Europe/Vilnius',
        'Europe/Minsk'        => 'Europe/Minsk',
        'Europe/Istanbul'     => 'Europe/Istanbul',
        'Europe/Moscow'       => 'Europe/Moscow',
        'Pacific/Port_Moresby'=> 'Pacific/Port_Moresby',
        'Pacific/Fiji'        => 'Pacific/Fiji',
        'Pacific/Kwajalein'   => 'Pacific/Kwajalein',
        'Pacific/Midway'      => 'Pacific/Midway',
        'Pacific/Samoa'       => 'Pacific/Samoa',
        'Pacific/Honolulu'    => 'Pacific/Honolulu',
        'Pacific/Auckland'    => 'Pacific/Auckland',
        'Pacific/Tongatapu'   => 'Pacific/Tongatapu',
        'Pacific/Guam'        => 'Pacific/Guam',
                    );

return $timezones;
    }

}
