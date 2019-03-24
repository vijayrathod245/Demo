<?php 
class Login_model extends CI_Model{
		public function select()
			{
				$id=$this->session->userdata('admin');
				$logtype=$this->session->userdata('logtype');
				
				if($logtype=='admin')
					{
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('admin');
						$arr=$qry_sel->row_array();
					}
					else
					{
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('user');
						$arr=$qry_sel->row_array();
					}
					return $arr;
				
			}
		public function insert()
			{
				//$id=$this->session->userdata('admin');
				$logtype=$this->input->post('logtype');
				if($logtype=='admin')
				{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$this->db->where('email',$email);
				$this->db->where('password',$password);
				$qry=$this->db->get('admin');
				//echo $this->db->last_query();
				echo "admin";
				}
				else
				{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$this->db->where('email',$email);
				$this->db->where('password',$password);
				$qry=$this->db->get('user');
				//echo "user";
				}
				$num=$qry->num_rows();
				if($num)
					{
						$arr=$qry->row_array();
						$this->session->set_userdata('logtype',$logtype);
						$this->session->set_userdata('admin',$arr['id']);
						
						redirect('admin/dashboard');
					}
					else
					{
						echo "Invalid email?";
					}
			}
	}

?>