<?php 

class Admin_model extends CI_Model{
    public function insert(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $arr = array('name'=>$name, 'email'=>$email, 'password'=>$password);

        $this->load->library('upload');
	    $this->load->helper(array('form', 'url'));
		$config['upload_path'] = './image/';
		$config['allowed_types'] = 'gif|jpg|jpeg';
		$config['max_size'] = '10';
		//$this->load->library('upload');
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
            $this->db->insert('admin',$arr);		
       }
       echo $this->db->last_query();
        
    }
    public function view()
		{
			$qry=$this->db->get('admin');
			$res=$qry->result_array();
			return $res;
		}
	public function delete($id){
		$this->db->where('id',$id);
		$qry=$this->db->get('admin');
		$arr=$qry->row_array();
		$path="./image/".$arr['image'];
		unlink($path);
		$this->db->where('id',$id);
		$this->db->delete('admin');
		redirect('admin/admin/view');
	}
	public function select($id){
		$this->db->where('id',$id);
		$qry_sel=$this->db->get('admin');
		$res=$qry_sel->row_array();
		return $res;
	}
	public function update($id)
			{
					$this->load->helper(array('form', 'url'));
					$this->load->library('upload');
					$this->db->where('id',$id);
					$qry=$this->db->get('admin');
					$arr=$qry->row_array();
					$config['upload_path'] = './image/';
					$config['allowed_types'] = 'gif|jpg|png';
					$this->upload->initialize($config);
				
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$image=$_FILES['image']['name'];
				$arr=array('name'=>$name,'email'=>$email,'password'=>$password);
				//$image=$_FILES['image']['name'];
				if($image=='')
					{
						$error = array('error' => $this->upload->display_errors());
						return $error;
					}
					else
					{
						if( $this->upload->do_upload('image'))
						{
							$data=$this->upload->data();
							$arr['image']=$data['file_name'];
							$this->db->where('id',$id);
							$this->db->update('admin',$arr);
							redirect('admin/admin/view');
						}
					}
			}
}