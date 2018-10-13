<?php
/**
 * Created by PhpStorm.
 * User: Dule
 * Date: 10/7/2018
 * Time: 9:02 PM
 */

class Offers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('no_asccess','You have to be logged in ti visit this page');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index($product_id)
    {
        $this->form_validation->set_rules('money', 'money', 'trim|required|integer');
        if ($this->form_validation->run() == false) {
            $this->load->view("offers/index");
        } else {


            $money = $this->input->post('money');
            $start_p = $this->Product_model->get_produts_data($product_id);
            $start_price = $start_p ->start_price;
            if($money < $start_price){
                echo "You cant offer price less then stat_price";
            }else{
                $user_id = $this->session->userdata('user_id');
                $data = array(
                    'user_id' =>  $user_id,
                    'product_id' => $product_id,
                    'money' =>   $money
                );
                if($this->Offer_model->offer_check($data)) {
                    if($this->Product_model->product_active($product_id)) {
                        $this->Offer_model->create_offer($data);
                    }else {
                        echo "time for auction is over.";
                    }
                }else {
                    echo "take back your offer to give onother.";
                }
            }

        }
    }
    public function passive($product_id, $user_id){
        $data = array(
            'user_id' =>  $user_id,
            'product_id' => $product_id
        );
        $this->Offer_model->passive_offer($data);
    }
}