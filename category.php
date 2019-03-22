<?php 
class Category extends CI_Controller
	{
		public function Index()
			{
				if($this->input->post('submit'))
					{
						$this->load->model('admin/category_model');
						$this->category_model->insert();
						
					}
				$this->load->view('admin/addcatogory');
			}
		public function view()
			{
				$this->load->model('admin/category_model');
				$arr['data']=$this->category_model->view();
				$this->load->view('admin/categoryview',$arr);
			}
		public function delete($id)
			{
				$this->load->model('admin/category_model');
				$this->category_model->delete($id);
			}
		public function select($id)
			{
				if($this->input->post())
				{
					$this->load->model('admin/category_model');
					$this->category_model->update($id);
				}
				$this->load->model('admin/category_model');
				$arr['data']=$this->category_model->select($id);
				$this->load->view('admin/addcatogory',$arr);
			}
	}
?>