<?php
class User_model extends CI_Model{
    public function insert(){
        $fullname = $this->input->post('fullname');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $city = $this->input->post('city');

        $arr = array('fullname'=>$fullname, 'address'=>$address, 'email'=>$email, 'password'=>$password, 'gender'=>$gender, 'phone'=>$phone, 'country'=>$country, 'state'=>$state, 'city'=>$city);
        $this->db->insert('user', $arr);
        //echo $this->db->last_query();
    }
}