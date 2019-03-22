<?php 
class Login_model extends CI_Model
	{
		public function select()
			{
				$id=$this->session->userdata('admin');
				$logtype=$this->session->userdata('logtype');
				//echo $logtype;
				//exit;
					if($logtype=='admin')
						{
							$this->db->where('id',$id);
							$qry_sel=$this->db->get('admin');
							$arr=$qry_sel->row_array();
							
						}
						else
						{
						$this->db->where('id',$id);
						$qry_sel=$this->db->get('cabuser');
						$arr=$qry_sel->row_array();
						}
						return $arr;
			}
		public function insert()
			{
				$logtype=$this->input->post('logtype');
				if($logtype=='admin')
					{
						$name=$this->input->post('name');
						$password=$this->input->post('password');
						$this->db->where('name',$name);
						$this->db->where('password',$password);
						$qry=$this->db->get('admin');
					}
					else
					{
						$name=$this->input->post('name');
						$password=$this->input->post('password');
						$this->db->where('email',$name);
						$this->db->where('password',$password);
						$qry=$this->db->get('cabuser');
					}
				$num=$qry->num_rows();
				if($num==1)
					{
						$arr=$qry->row_array();
						$this->session->set_userdata('logtype',$logtype);
						$this->session->set_userdata('admin',$arr['id']);
						redirect('admin/dashboard');
					}
					else
					{
						echo "invalid";
					}
			}
	}
?>