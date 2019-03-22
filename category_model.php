<?php 
class Category_model extends CI_Model
	{
		public function insert()
			{
				$categoryname = $this->input->post('categoryname');
				$arr=array('categoryname'=>$categoryname);
				$this->db->insert('category',$arr);
				//echo $this->db->last_query();
			}
		public function view()
			{
				$qry=$this->db->get('category');
				$res=$qry->result_array();
				return $res;
			}
		public function delete($id)
			{
				$this->db->where('id',$id);
				$this->db->delete('category');
				redirect('admin/category/view');
			}
		public function select($id)
			{
				$this->db->where('id',$id);
				$qry_sel=$this->db->get('category');
				$arr=$qry_sel->row_array();
				return $arr;
			}
		public function update($id)
			{
				$categoryname = $this->input->post('categoryname');
				$arr=array('categoryname'=>$categoryname);
				$this->db->where('id',$id);
				$this->db->update('category',$arr);
				redirect('admin/category/view');
			}
	}
?>