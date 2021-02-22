<?php namespace App\Controllers;
use App\Models\BlogModel;

class Pages extends BaseController
{
	public function index()
	{

    $model = new BlogModel();

    $data['news'] = $model->getPosts();


    echo view('includes/header', $data);
      echo view('pages/Home');
    echo view('/includes/footer');


	}

  public function about($page ='about'){

    echo view('includes/header');
      echo view('pages/'.$page);
    echo view('/includes/footer');

  }



}
