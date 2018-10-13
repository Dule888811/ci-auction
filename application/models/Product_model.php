<?php
/**
 * Created by PhpStorm.
 * User: Dule
 * Date: 10/7/2018
 * Time: 9:02 PM
 */

class Product_model extends CI_Model
{
    public function get_products(){
        $query = $this->db->where("created >" ,"NOW() + INTERVAL 10 DAYS");
        $query = $this->db->get('products');
        return $query->result();
    }
    public function create_product($data){

        $input_data = $this->db->insert('products', $data);
        return $input_data;
    }
    public function get_produts_data($product_id){
        $this->db->where('id', $product_id);
        $product_data = $this->db->get('products');
        return $product_data->row();
    }
    public function delete($product_id){
        $this->db->where('id', $product_id);
        $this->db->where("created >" ,"NOW() + INTERVAL 10 DAYS");
        $this->db->delete('products');
    }
    public function search_products($data){
        $criteria = $data['criteria'];
        $this->db->where('product_name',  $criteria);
        $this->db->where("created >" ,"NOW() + INTERVAL 10 DAYS");
       $this->db->or_where('product_description',  $criteria);
        $products = $this->db->get('products');
            return $products->result();

    }
    public function product_active($product_id){
        $this->db->where('id', $product_id);
        $this->db->where("created >" ,"NOW() + INTERVAL 10 DAYS");
        $result = $this->db->get('products');
        if($result->num_rows() == 1){
            return true;
        }else {
            return false;
        }
    }


}