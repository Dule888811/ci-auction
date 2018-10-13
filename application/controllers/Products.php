<?php


class Products extends CI_Controller
{
    public function index()
    {
        $data['products'] = $this->Product_model->get_products();
        $data['main'] = "products/index";
        $this->load->view('layouts/main', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('product_name', 'product_name', 'required|trim|min_length[2]');
        $this->form_validation->set_rules('product_description', 'product_description', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('start_price', 'start_price', 'integer|required|trim|min_length[2]');
        $this->form_validation->set_rules('product_delivery', 'product_delivery', 'required|trim|min_length[2]');

        if ($this->form_validation->run() == false) {
            $data['main'] = "products/insert";
            $this->load->view('layouts/main', $data);
        } else {
            if (isset($_FILES['imgfile']) && $_FILES['imgfile']['size'] > 0) {
                if ($_FILES['imgfile']['type'] == 'image/jpeg' || $_FILES['imgfile']['type'] == 'image/png') {
                    $listaExt = array('png', 'jpg', 'jpeg');
                    $ext = $_FILES['imgfile']['name'];
                    $ext = explode(".", $ext);
                    $ext = array_pop($ext);
                    if (in_array($ext, $listaExt)) {
                        $img = file_get_contents($_FILES['imgfile']['tmp_name']);
                      //  move_uploaded_file($_FILES['imgfile']['tmp_name'], "images/" .$_FILES['imgfile']['name'] );
                        $img = base64_encode($img);
                        $date = date("d/m/Y - H:i:s", strtotime("+10 days +4 minutes"));
                        $data = array(
                            'product_name' => $this->input->post('product_name'),
                            'product_description' => $this->input->post('product_description'),
                            'product_delivery' => $this->input->post('product_delivery'),
                            'start_price' => $this->input->post('start_price'),
                            'product_image' => $img,
                            'exspire' =>  $date,
                            'user_id' => $this->session->userdata('user_id')
                        );
                        if ($this->Product_model->create_product($data)) {
                            $this->session->set_flashdata('user_registered', 'User has been registered');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        echo "You cant use that extension! :( ";
                        $date = date("d/m/Y - H:i:s", strtotime("+10 days +4 minutes"));
                        $data = array(
                            'product_name' => $this->input->post('product_name'),
                            'start_price' => $this->input->post('start_price'),
                            'product_description' => $this->input->post('product_description'),
                            'product_delivery' => $this->input->post('product_delivery'),
                            'exspire' =>  $date,
                            'user_id' => $this->session->userdata('user_id')
                        );
                        if ($this->Product_model->create_product($data)) {
                            $this->session->set_flashdata('user_registered', 'User has been registered');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                } else {
                    echo "You can't use that format of image.";
                    $date = date("d/m/Y - H:i:s", strtotime("+10 days +4 minutes"));
                    $data = array(
                        'product_name' => $this->input->post('product_name'),
                        'start_price' => $this->input->post('start_price'),
                        'product_description' => $this->input->post('product_description'),
                        'product_delivery' => $this->input->post('product_delivery'),
                        'exspire' => $date ,
                        'user_id' => $this->session->userdata('user_id')
                    );
                    if ($this->Product_model->create_product($data)) {
                        $this->session->set_flashdata('user_registered', 'User has been registered');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                }
            }else{
                     $date = date("d/m/Y - H:i:s", strtotime("+10 days +4 minutes"));

                    $data = array(
                        'product_name' => $this->input->post('product_name'),
                        'start_price' => $this->input->post('start_price'),
                        'product_description' => $this->input->post('product_description'),
                        'product_delivery' => $this->input->post('product_delivery'),
                        'exspire' => $date ,
                        'user_id' => $this->session->userdata('user_id')
                    );
                 if ($this->Product_model->create_product($data)) {
                    $this->session->set_flashdata('user_registered', 'User has been registered');
                    redirect($_SERVER['HTTP_REFERER']);
                 }
                }


                }
    }
    public function delete($product_id){
        $this->Product_model->delete($product_id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function search(){
        $this->load->view('products/search');
   //    if($this->input->get('criteria')) {
       //    $this->form_validation->set_rules('criteria', 'criteria', 'required|trim');
       //     if ($this->form_validation->run() == false) {
         //       $this->load->view('products/search');
        //    } else {

            $data = array(
                'criteria' => $this->input->get('criteria')
            );
            $data['products'] = $this->Product_model->search_products($data);
            $data['main'] = "products/display";
             $this->load->view('layouts/main', $data);
          //  $this->load->view('products/display', $data);

        //    }
      //  }
    }






}