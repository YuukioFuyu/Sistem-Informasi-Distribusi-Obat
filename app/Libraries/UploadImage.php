<?php namespace App\Libraries;

class UploadImage {

    public function __construct()
    {
        $this->session = session();
        $this->db = db_connect();
    }

    public function upload_image($img = null, $savepath = null, $old_image = null, $width = null, $height = null)
    {

    
        $image = \Config\Services::image();
     
        if($img->isValid() && ! $img->hasMoved()){

        $savepath = $savepath.$img->getRandomName();
        $image    = \Config\Services::image('imagick')
                    ->withFile($img->getRealPath())
                    ->resize($width,$height, true, 'height')
                    ->save($savepath);
        } else {

            $savepath = $old_image;                  
        }
        return "/".$savepath;
    }

        public function upload_file($img = null, $savepath = null,$old_image=null)
    {

    
        $image = \Config\Services::image();
     
        if($img->isValid() && ! $img->hasMoved()){

        $savepath = $savepath.$img->getRandomName();
        $image    = \Config\Services::image('imagick')
                    ->withFile($img->getRealPath())
                    ->save($savepath);
        } else {

            $savepath = $old_image;                  
        }
        return "/".$savepath;
    }
}