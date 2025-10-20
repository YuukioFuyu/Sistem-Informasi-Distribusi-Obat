<?php if(!defined('APPPATH')) exit('No direct script access allowed');
 if(!function_exists('lan')) {
     

    function lan($text = null)
    {
        $CI = db_connect();
        $table         = 'language';
        $phrase        = 'phrase';
        $setting_table = 'setting';
        $default_lang  = 'english';

        //set language  
        $data = $CI->table($setting_table)
                            ->select('*')
                            ->get()
                            ->getRow();
        if (!empty($data->language)) {
            $language = $data->language; 
        } else {
            $language = $default_lang; 
        } 
 
        if (!empty($text)) {

            if ($CI->tableExists($table)) { 

                if ($CI->fieldExists($phrase, $table)) { 

                    if ($CI->fieldExists($language, $table)) {

                        $row = $CI->table($table)
                              ->select($language)
                              ->where($phrase, $text)
                             ->get()
                             ->getRow();

                        if (!empty($row->$language)) {
                            return $row->$language;
                        } else {
                            return false;
                        }

                    } else {
                        return false;
                    }

                } else {
                    return false;
                }

            } else {
                return false;
            }            
        } else {
            return false;
        }  

    }
 
}

