<?php namespace App\Modules\Dashboard\Models;
use CodeIgniter\Model;
class Phrase_model extends Model
{

    protected $table = 'language';
    protected $primaryKey = 'id';
    protected $allowedFields = ['phrase'];
   
}
?>