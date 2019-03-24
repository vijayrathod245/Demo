<?php 
class admin extends CI_Controller{
    public function Index(){
        if($this->input->post('submit')){
            $this->load->model('admin/admin_model');
            $this->admin_model->insert();
        }
        $this->load->view('admin/add_admin');
    }
    public function view(){
        $this->load->model('admin/admin_model');
	    $arr['data']=$this->admin_model->view();
        $this->load->view('admin/view_admin', $arr);
    }
	public function delete($id){
		$this->load->model('admin/admin_model');
		$this->admin_model->delete($id);
	}
	public function select($id){
		if($this->input->post()){
				$this->load->model('admin/admin_model');
				$this->admin_model->update($id);	
			}
		$this->load->model('admin/admin_model');
		$arr['data']=$this->admin_model->select($id);
		$this->load->view('admin/add_admin', $arr);
	}
}