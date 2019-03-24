<?php
class User extends CI_Controller{
    public function index(){
        if($this->input->post('submit')){
            $this->load->model('admin/user_model');
            $this->user_model->insert();
        }
        $this->load->view('admin/add_user');
    }
}