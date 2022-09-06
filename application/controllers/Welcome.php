<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model_login');
	}

	public function index()
	{
		$this->session->unset_userdata('access_token');
		$this->session->sess_destroy();
	
		$data['title'] = "หน้าแรก";
        $data['description'] = "หน้าแรก";  
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['banner'] = "";
		
		$this->load->view('user/layout/HeaderUser.php',$data);
		$this->load->view('user/layout/NavbarUser.php');
		$this->load->view('user/layout/SidebarUser.php');
        $this->load->view('user/PageWelcome.php');
		$this->load->view('user/layout/FooterUser.php');
	}

	public function LoginMenager(){
		include_once APPPATH . "libraries/vendor/autoload.php";
		$google_client = new Google_Client();

		$redirect_uri = base_url('LoginMenager_callback');

		$google_client->setClientId('29638025169-aeobhq04v0lvimcjd27osmhlpua380gl.apps.googleusercontent.com');
		$google_client->setClientSecret('RSANANTRl84lnYm54Hi0icGa');
		$google_client->setRedirectUri($redirect_uri);
		$google_client->addScope('email');
		$google_client->addScope('profile');
	
		header('Location: '.$google_client->createAuthUrl());
			 	
	}

	

	public function LoginStudent()
	{
		$this->load->view('login/loginMain.php');
	}

	public function ClosePage()
	{
		$this->load->view('errors/ClosePage.php');
	}
}