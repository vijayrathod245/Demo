<?php 

class Login extends CI_Controller{
	public function Index(){
		if($this->session->userdata('admin')!='')
		{
			redirect('admin/dashboard');
		}
		if($this->input->post('submit')){
			$this->load->model('admin/login_model');
			$this->login_model->insert();
		}
		$this->load->view('admin/login');
	}
	public function logout()
			{
				$this->session->sess_destroy();
				redirect('admin/login');	
			}
}