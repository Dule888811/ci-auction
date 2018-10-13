<?php
/**
 * Created by PhpStorm.
 * User: Dule
 * Date: 10/7/2018
 * Time: 9:09 PM
 */

class Offer_model extends CI_Model
{
    public function create_offer($data){
        $input_data = $this->db->insert('offers', $data);
        return $input_data;
    }
    public function offer_check($data){
      //  $query = $this->db->query('SELECT * FROM my_table');
        $user_id = $data['user_id'];
        $user_id = intval($user_id);
        $product_id = $data['product_id'];
        $product_id = intval($product_id);
       // var_dump($user_id);
      //  var_dump($product_id);
        $this->db->where('user_id',  $user_id);
        $this->db->where('product_id', $product_id);
        $this->db->where('offer_active', 1);
        $offers = $this->db->get('offers');
       // var_dump($offers->num_rows());
      //  var_dump($offers->num_rows());
        if($offers->num_rows() > 0){
            echo "you alredy gave you offer,you can teka in bas and then give onother!";
            echo "<a href=' " .    base_url()  . "index.php/Offers/passive/" .  $data['product_id'] . "/" . $data['user_id'] . "'>remove offer</a> ";
        }else {
            return true;
        }

    }
    public function passive_offer($data){
        $user_id = $data['user_id'];
        $product_id = $data['product_id'];
        $this->db->set('offer_active', 0);
        $this->db->where('user_id',  $user_id);
        $this->db->where('product_id', $product_id);
        $this->db->update('offers');
    }


}