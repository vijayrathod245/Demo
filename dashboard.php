<?php 
class Dashboard extends  CI_Controller
	{
		function __construct() {
			parent::__construct();
			if($this->session->userdata('admin')=='')
			{
				redirect('admin/login');
			}
		}
		public function Index()
			{
				//$this->load->model('admin/login_model');
				//$arr['data']=$this->login_model->select();
				
				//$this->session->userdata('logtype');
				//$this->session->userdata('admin');
				$this->load->view('admin/dashboard');
			}
		
	}
?>