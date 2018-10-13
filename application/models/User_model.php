<?php
/**
 * Created by PhpStorm.
 * User: Dule
 * Date: 10/5/2018
 * Time: 11:32 PM
 */

class User_model extends CI_Model
{
    public function login_user($email, $password){
        $this->db->where('email', $email);
      //  $this->db->where('password', $password);
        $result = $this->db->get('users');
        $db_password = $result->row(4)->password;
     //   if($result->num_rows() == 1){
       //     return $result->row(0)->id;
     //   }else{
       //     return false;
     //   }
        if(password_verify($password,  $db_password)){
            return $result->row();
        }else{
         return false;
       }
    }
    public function create_user(){
        $options = ['const' => 8];
        $encrited_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        $data = array(
            'f_name' => $this->input->post('f_name'),
            'l_name' => $this->input->post('l_name'),
            'password' => $encrited_pass,
            'email' => $this->input->post('e-mail')
        );
        $input_data = $this->db->insert('users', $data);
        return $input_data;
    }
    public function edit( $data){
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
        return true;
    }
    public function getUsersInfo($user_id){
        $this->db->where('id', $user_id);
        $get_data = $this->db->get('users');
        return $get_data->row();
    }
    public  function getUserFinishedSels($user_id){
     $this->db->select('
            users.*,
            products.*,
            offers.*
            ');
      //  $this->db->select('*');
        $this->db->from('users');
        $this->db->join('products', 'user_id = users.id');
        $this->db->join('offers', 'product_id = products.id');
        $this->db->where('products.created <' , 'NOW() + INTERVAL 10 DAYS');
        $this->db->where('offers.offer_active' , 1);
        $this->db->where('products.user_id' , $user_id);
        $this->db->order_by('offers.money', 'DESC');
        $this->db->limit(1);
      $results =  $this->db->get();
      if($results->num_rows() >0) {
          return $results->result();
      }else {
          return false;
      }
    }
    public  function getWinnerBuys($user_id){

    //    $this->db->select('
    //        users.*,
     //       products.*,
   //         offers.*
    //        ');
        $this->db->select('
            users.f_name,
            products.product_name,
            offers.money
            ');
        $this->db->from('users');
        $this->db->join('products', 'user_id = users.id');
        $this->db->join('offers', 'product_id = products.id');
        $this->db->where('products.created <' , 'NOW() + INTERVAL 10 DAYS');
        $this->db->where('offers.user_id' ,  $user_id);
        $this->db->order_by('offers.money', 'DESC');
        $this->db->limit(1);
        $results = $this->db->get();
        if($results->num_rows() > 0) {
            return $results->result();
        }else{
            return false;
        }
    }
}