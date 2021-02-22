<?php  namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model{

  protected $table = 'post';
  protected $primaryKey = 'id';
  protected $allowedFields = ['title', 'body'];


  function getPosts($slug = null){

    if(!$slug){
      
      return $this->findAll();
    }

    return $this->asArray()
                ->where(['slug' => $slug])
                ->first();

  }
}


 ?>
