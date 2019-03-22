<?php 
class Cabuser_model extends CI_Model
	{
		public function insert()
			{
				$i=0;
				foreach($_FILES['extraimage']['name'] as $img)
				{
					$eximag[$i]=$img;
					$i++;	
				}
				$path="image/";
				$main_image=implode("/",$eximag);
				$i=0;
				foreach($_FILES['extraimage']['tmp_name'] as $timg)
				{
					move_uploaded_file($timg,$path.$eximag[$i]);
					$i++;	
				}
				$cabusername=$this->input->post('cabusername');
				$officeaddress=$this->input->post('officeaddress');
				$cityname=$this->input->post('cityname');
				$location=$this->input->post('location');
				//$categoryname=$this->input->post('categoryname');
				$ridename=$this->input->post('ridename');
				$seatcapicity=$this->input->post('seatcapicity');
				$rateperhours=$this->input->post('rateperhours');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				
				
				$arr=array(
					'cabusername'=>$cabusername,
					'officeaddress'=>$officeaddress,
					'cityname'=>$cityname,
					'location'=>$location,
					//'categoryname'=>$categoryname,
					'ridename'=>$ridename,
					'seatcapicity'=>$seatcapicity,
					'extraimage'=>$main_image,
					'rateperhours'=>$rateperhours,
					'email'=>$email,
					'password'=>$password
					);
				$this->load->helper(array('form', 'url'));
				$config['upload_path'] = './image/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload');
				$this->upload->initialize($config);
				if(! $this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						return $error;
					}
					else
					{
						$data=$this->upload->data();
						$arr['image']=$data['file_name'];
						$this->db->insert('cabuser',$arr);		
					}
				//echo $this->db->last_query();
			}
		public function select_city()
			{
				$qry=$this->db->get('city');
				$res=$qry->result_array();
				return $res;
			}
		public function select_cate()
			{
				$qry=$this->db->get('category');
				$res=$qry->result_array();
				return $res;
			}
		public function select($id)
			{
				$this->db->where('id',$id);
				$qry=$this->db->get('cabuser');
				$res=$qry->row_array();
				return $res;
			}
		public function view()
			{
				//$this->db->select('*');
				//$this->db->from('cabuser');
				$qry=$this->db->query('select city.cityname as cname,location.locname,cabuser.* from cabuser JOIN city ON city.id=cabuser.cityname JOIN location ON location.id=cabuser.location');
				//echo $this->db->last_query();
				$res=$qry->result_array();
				return $res;
			}
		public function delete($id)
			{
				$this->db->where('id',$id);
				$qry=$this->db->get('cabuser');
				$arr=$qry->row_array();
				$path="./image/".$arr['image'];
				unlink($path);
				$this->db->where('id',$id);
				$this->db->delete('cabuser');
				redirect('admin/cabuser/view');
			}
		public function update($id)
			{
					$this->load->helper(array('form', 'url'));
					$this->load->library('upload');
					$this->db->where('id',$id);
					$qry=$this->db->get('cabuser');
					$arr=$qry->row_array();
					$config['upload_path'] = './image/';
					$config['allowed_types'] = 'gif|jpg|png';
					$this->upload->initialize($config);
					
				
				$cabusername=$this->input->post('cabusername');
				$officeaddress=$this->input->post('officeaddress');
				//$cityname=$this->input->post('cityname');
				//$location=$this->input->post('location');
				//$categoryname=$this->input->post('categoryname');
				$ridename=$this->input->post('ridename');
				$seatcapicity=$this->input->post('seatcapicity');
				$rateperhours=$this->input->post('rateperhours');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$image=$_FILES['image']['name'];
				//echo $image;
			
				$arr=array(
					'cabusername'=>$cabusername,
					'officeaddress'=>$officeaddress,
					//'cityname'=>$cityname,
					//'location'=>$location,
					//'categoryname'=>$categoryname,
					'ridename'=>$ridename,
					'seatcapicity'=>$seatcapicity,
					//'extraimage'=>$main_image,
					'rateperhours'=>$rateperhours,
					'email'=>$email,
					'password'=>$password
					);		
					if($image=='')
					{
						//$error = array('error' => $this->upload->display_errors());
						//return $error;
					}
					else
					{
						if( $this->upload->do_upload('image'))
						{
						$data=$this->upload->data();
						$arr['image']=$data['file_name'];
						$this->db->where('id',$id);
						$this->db->update('cabuser',$arr);
						echo $this->db->last_query();
						redirect('admin/cabuser/view');
						}
					}
			}
	}
?>