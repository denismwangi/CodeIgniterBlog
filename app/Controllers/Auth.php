<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends BaseController
{
	public function __construct(){

		helper(['url', 'form']);
	}
	public function index()
	{
		 

	}
	public function login()
	{
		 
         echo view('includes/header');
         echo view('Auth/login.php');
         echo view('includes/footer');

	}
	public function register()
	{
		 
         echo view('includes/header');
         echo view('Auth/register.php');
         echo view('includes/footer');

	}
	public function register_user(){

		//validate request inputs

		$validation = $this->validate([
			'name' => 'required',
			'email' => 'required|valid_email|is_unique[users.email]',
			'password' => 'required|min_length[5]|max_length[20]',
			'cpassword' => 'required|min_length[5]|max_length[20]|matches[password]',

		]);

		if (!$validation) {
			# code...
			echo view('includes/header');
			return view('auth/register', ['validation' =>$this->validator]);
		}else{

			//insert user details to database
			$name = $this->request->getPost('name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$values = [
				'name'=>$name,
				'email' =>$email,
				'password' =>Hash::make($password),

			];
			$userModel = new \App\Models\UserModel();
			$query = $userModel->insert($values);
			if (!$query) {
				return redirect()->back()->with('fail',  'something went wrong' );
				# code...
			}else{


				//return redirect()->to('register')->with('success','successfully registered');
				$last_id = $userModel->insertID(); //get last id
				session()->set('loggedUser', $last_id);
				return redirect()->to('/dashboard');
			}

			
		}
	}

	public function login_user(){
		//validate request inputs

		$validation = $this->validate([

			'email'=>[
				'rules' =>'required|valid_email|is_not_unique[users.email]',
				'errors' =>[
					'required' =>'email is required',
					'valid_email' => 'enter valid email address',
					'is_not_unique' => 'email and this password not found'
				]
			],
			'password'=>[
				'rules' =>'required|min_length[5]|max_length[20]',
				'errors' =>[
					'required' =>'password is required',
					'min_length' => 'password must contain atleast 5 characters',
					'max_length' => 'password must not be more than 20 haracter '
				]
			]


		]);

		if (!$validation) {
			
			echo view('includes/header');
			return view('auth/login', ['validation' =>$this->validator]);
		}else{

			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$userModel = new \App\Models\UserModel();
			$user_info = $userModel->where('email', $email)->first();
			$check_password = Hash::check($password, $user_info['password']);

			//if (!$check_password) {
			//	session()->setFlashdata('fail', 'incorrect password');
			//	return redirect()->to('/auth/login');
				
			//}else{
				$user_id = $user_info['id'];
				session()->set('loggedUser', $user_id);

				echo view('includes/Adminheader');
				return redirect()->to('/dashboard');
			//}
		}
	}

	public function logout(){
		if (session()->has('loggedUser')) {
			session()->remove('loggedUser');
			return redirect()->to('/auth/login')->with('fail', 'you are logged out');
			# code...
		}

	}

 

	//--------------------------------------------------------------------

}
