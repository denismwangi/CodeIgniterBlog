<?php namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Controller;

class Blog extends Controller
{
  public function __construct(){

    helper(['url', 'form']);
  }

  public function index()
{
  $bloModel = new BlogModel();


  echo view('includes/header');
  echo view('blog/createnew');
  echo view('includes/footer');
}


    public function create(){
      

      $blogModel = new BlogModel();

      $validation = $this->validate([
        'title' => 'required|min_length[3]|max_length[255]',
        'body' => 'required'

      ]);
      if (!$validation) {
      # code...
      echo view('includes/Adminheader');
      return view('/blog/createnew', ['validation' =>$this->validator]);
    }else{

        //insert user details to database
      $title = $this->request->getPost('title');
      $body = $this->request->getPost('body');
    

      $values = [
        'title'=>$title,
        'body' =>$body,
        
      ];

      $blogModel = new \App\Models\BlogModel();

      $query = $blogModel->insert($values);
      if (!$query) {
        return redirect()->back()->with('fail',  'something went wrong' );
        
      
      }else{


      return redirect()->to('/dashboard')->with('success','successfully registered');
        
      }



    }
  }

  public function delete($id){
    $blogModel = new BlogModel();

    $blogModel->delete($id);
    return redirect()->to('/dashboard')->with('success','successfully deleted');

  }

  public function edit($id){
     $blogModel = new BlogModel();
    
     $data['news'] = $blogModel->find();

  echo view('includes/Adminheader');
  return view('blog/update', $data);
  


  }

}
