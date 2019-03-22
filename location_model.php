<?php 
class Location_model extends CI_Model
	{
		public function insert()
			{	
				$cityid= $this->input->post('cityname');
				$locname = $this->input->post('locname');
				$arr=array('cityid'=>$cityid,'locname'=>$locname);
				$this->db->insert('location',$arr);
				echo $this->db->last_query();
			}
		public function select()
			{
				$qry=$this->db->get('city');
				$res=$qry->result_array();
				return $res;
			}
		public function view()
			{
				$this->db->select('*');
				//$this->db->from('location');
				$this->db->join('city','city.id=location.cityid');
				//$this->db->join('location','location=cabuser.location');
				$qry=$this->db->get('location');
				//echo $this->db->last_query();
				$res=$qry->result_array();
				return $res;
			}
		public function delete($id)
			{
				$this->db->where('id',$id);
				$this->db->delete('city');
				redirect('admin/location/view');
			}
		
	}
?>