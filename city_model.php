<?php 
class City_model extends CI_Model
	{
		public function insert()
			{
						$cityname = $this->input->post('cityname');
						$arr=array('cityname'=>$cityname);
						$this->db->insert('city',$arr);
						//echo $this->db->last_query();
			}
		public function view()
			{
				$qry=$this->db->get('city');
				$res=$qry->result_array();
				return $res;
			}
		public function delete($id)
			{
				$this->db->where('id',$id);
				$this->db->delete('city');
				redirect('admin/city/view');
			}
		public function select($id)
			{
				$this->db->where('id',$id);
				$qry_sel=$this->db->get('city');
				$arr=$qry_sel->row_array();
				return $arr;	
			}
		public function update($id)
			{
				$cityname = $this->input->post('cityname');
				$arr=array('cityname'=>$cityname);
				$this->db->where('id',$id);
				$this->db->update('city',$arr);
				redirect('admin/city/view');
			}		
	}
?>