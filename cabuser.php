<?php 
class Cabuser extends CI_Controller
	{
		public function Index()
			{
				if($this->input->post('submit'))
					{
						$this->load->model('admin/cabuser_model');
						$this->cabuser_model->insert();
					}
				$this->load->model('admin/cabuser_model');
				$arr['city']=$this->cabuser_model->select_city();
				$arr['category']=$this->cabuser_model->select_cate();
				$this->load->view('admin/addcabuser',$arr);
			}
		
		public function view()
			{
				$this->load->model('admin/cabuser_model');
				$arr['data']=$this->cabuser_model->view();
				$this->load->view('admin/cabuserview',$arr);
			}
		public function ajax_location()
			{
				$city=$this->input->post('city');	
				$this->db->where('cityid',$city);
				$qry=$this->db->get('location');
				$data['arr']=$qry->result_array();
				$this->load->view('admin/ajax_location',$data);
			}
		public function delete($id)
			{
				$this->load->model('admin/cabuser_model');
				$this->cabuser_model->delete($id);
			}
		public function select($id)
			{
				if($this->input->post())
					{
						$this->load->model('admin/cabuser_model');
						$this->cabuser_model->update($id);
					}
				//$this->load->view('admin/addcabuser');
				$this->load->model('admin/cabuser_model');
				$arr['data']=$this->cabuser_model->select($id);
				$this->load->view('admin/addcabuser',$arr);
			}
	}
?>