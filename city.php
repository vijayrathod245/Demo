<?php 
class City extends CI_Controller
	{
		public function Index()
			{
				if($this->input->post('submit'))
				{
					$this->load->model('admin/city_model');
					$this->city_model->insert();
				}
				$this->load->view('admin/addcity');
			}
		public function view()
			{
				$this->load->model('admin/city_model');
				$arr['data']=$this->city_model->view();
				$this->load->view('admin/cityview',$arr);
			}
		public function delete($id)
			{
				$this->load->model('admin/city_model');
				$this->city_model->delete($id);
			}
		public function select($id)
			{
				if($this->input->post())
					{
						$this->load->model('admin/city_model');
						$this->city_model->update($id);
					}
				$this->load->model('admin/city_model');
				$arr['data']=$this->city_model->select($id);
				$this->load->view('admin/addcity',$arr);
			}
	}

?>