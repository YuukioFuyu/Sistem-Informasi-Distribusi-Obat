<?php namespace App\Modules\Dashboard\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Template;

class Backup_restore extends BaseController
{
   #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    # Developed by :Isahaq
    #------------------------------------    

    private $savePath = "assets/data/backup/";
    private $fileName = "backup.sql";

 

    public function restore_form(){
    $data['title']        = lan('restore_database');
    $data['module']       = "Dashboard";
    $data['page']         = "restore_form"; 
    return $this->template->layout($data);
    }


    public function restore() {
    $hostname = $this->db->hostname;
    $username = $this->db->username;
    $password = $this->db->password;
    $database = $this->db->database;
     @$mysqli = new \mysqli(
            $hostname,
            $username,
            $password,
            $database
        );
        // Check for errors
        if (mysqli_connect_errno()){
            echo 'fail to connect';
            return false;
       }
        
$file_url = base_url() . "/assets/data/backup/default.sql";
$tables = $this->db->listTables();
foreach ($tables as $table)
{
   $this->db->query("TRUNCATE TABLE ". $table);
}
    $templine = '';
    $lines = file($file_url);
    foreach($lines as $line) {
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;
        $templine.=$line;
        if (substr(trim($line), -1, 1) == ';') {
            $this->db->query($templine);
            $templine = '';
        }
    }
$this->session->setFlashdata('message', 'Successfully Restored');
             
 return  redirect()->to(base_url('/logout'));
    }




    public function download() {

        $db_name = 'backup' . '.sql';
       $this->dbutil =  (new \CodeIgniter\Database\Database())->loadUtils($this->db);
        $prefs = array(
            'format'   => 'sql',
            'filename' => 'backup.sql');
        $b         = $this->dbutil->backup($prefs);
        $save      = 'assets/data/backup/' . $db_name;
        helper(['filesystem','form','url','database','text','download']);
        $username  = $this->db->username;
        $backup    =  $b;
        write_file($save, $backup);
        force_download('./assets/data/backup/' . $db_name, NULL);

    }



   

 
// import form
    public function import_form(){
    $data['title']        = lan('db_import');
    $data['module']       = "Dashboard";
    $data['page']         = "import_db"; 
    return $this->template->layout($data);
  }
  // import database
  public function importdata() {
    $hostname = $this->db->hostname;
    $username = $this->db->username;
    $password = $this->db->password;
    $database = $this->db->database;

     @$mysqli = new \mysqli(
            $hostname,
            $username,
            $password,
            $database
        );

        // Check for errors
        if (mysqli_connect_errno()){
            echo 'fail to connect';
            return false;
       }
       helper(['form','url']); 
   $input = $this->validate([
         'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,sql],'
      ]);

      if (!$input) { // Not valid
        $this->session->setFlashdata(array('exception'=>$this->validator->listErrors()));
      return  redirect()->to(base_url('dashboard/db_import'));
      
      }else{ // Valid

         if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {

               // Get random file name
               $newName = $file->getRandomName();

               // Store file in public/csvfile/ folder
               $file->move('./assets/dbimport', $newName);

               // Reading file
               $file_url = base_url().'/assets/dbimport/'.$newName;
           }
       }
   }

$tables = $this->db->listTables();    
foreach ($tables as $table)
{
   
   $this->db->query("TRUNCATE TABLE ". $table);
}
    $templine = '';
    // Read in entire file
    $lines = file($file_url);
    foreach($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        // Add this line to the current templine we are creating
        $templine.=$line;

        // If it has a semicolon at the end, it's the end of the query so can process this templine
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            $this->db->query($templine);
            // Reset temp variable to empty
            $templine = '';
        }
    }
 $this->session->setFlashdata(array('message' => 'Successfully Imported '));
 echo 'success';exit();
redirect($_SERVER['HTTP_REFERER']);


    }


}
