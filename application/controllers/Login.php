<?php
defined('BASEPATH') or exit('No direct script access allowed');
 

class Login extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
	}

	public function index()

	{
		
		if($this->_islogin())
		{
			redirect(site_url(''));
			die();
		}
		$loginMsg = '';
		if(isset($_POST['user_email']))
		{
			
			$email = $_POST['user_email'];
			$pass = $_POST['pass'];
			
			//$results = $this->api_model->fetch_single_user($username);
			$loginInfo = $this->User_model->login($email, md5($pass));
			if(!empty($loginInfo))
			{
				$user_id = $loginInfo['uid'];
				$user_email = $loginInfo['email'];
				$user_role = $loginInfo['role'];
				

				// set session luu login
				$this->session->set_userdata('uid', $user_id);
				$this->session->set_userdata('email', $user_email);
				$this->session->set_userdata('role', $user_role);
				
				redirect(site_url(''));
				die();
			}
			else
			{
				$loginMsg = 'Invalid email or password';
			}
		}

		$data = [];
		$data['login'] = $this->_islogin();
		$data['loginMsg'] = $loginMsg;
		$data['css'] = "assets/css/login.css";
		$data['title'] = "Login";
		$this->load->view('login/login_view', $data);
	}
	
}
