<?php 
class Location extends CI_Controller
	{
		public function index()
			{
				if($this->input->post('submit'))
					{
						$this->load->model('admin/location_model');
						$this->location_model->insert();
					}
						$this->load->model('admin/location_model');
						$arr['city']=$this->location_model->select();
						$this->load->view('admin/addlocation',$arr);
			}
		public function view()
			{
				$this->load->model('admin/location_model');
				$arr['data']=$this->location_model->view();
				$this->load->view('admin/locationview',$arr);
			}
		public function delete($id)
			{
				$this->load->model('admin/location_model');
				$this->location_model->delete($id);
			}
		
	}
?>