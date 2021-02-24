<?php
 namespace App\Controllers;
 use CodeIgniter\Controller;
 use App\Models\BlogModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$model = new BlogModel();

        $data['news'] = $model->getPosts();
       echo view('includes/Adminheader',$data);
      //echo view('dashboard/dashboard', $data);
      echo view('dashboard/index', $data);
      echo view('includes/Adminfooter');
	}
	public function profile(){
		$userModel = new \App\Models\UserModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo =  $userModel->find($loggedUserID);
		$data = [
			'title' => 'profile',
			'userInfo' =>$userInfo
		];


        echo view('includes/Adminheader',$data);
		return view('dashboard/profile', $data);
	}

	//--------------------------------------------------------------------

}
