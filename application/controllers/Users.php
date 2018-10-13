<?php
/**
 * Created by PhpStorm.
 * User: Dule
 * Date: 10/6/2018
 * Time: 2:06 AM
 */
class Users extends CI_Controller
{
    public function login(){
        $this->form_validation->set_rules('email','E-mail','trim|required|min_length[2]');
        $this->form_validation->set_rules('password','Password','trim|required|required|min_length[2]');
        if($this->form_validation->run() == FALSE){
            $data = array(
               'errors' => validation_errors(),
            );
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
          $user_data = $this->User_model->login_user($email, $password);
          $user_id = $user_data->id;
          $user_f_name = $user_data->f_name;
          $user_l_name = $user_data->l_name;
          if($user_id){
                $user_data = array(
                    'user_id' => $user_id,
                    'email' => $email,
                    'logged_in' => true,
                    'f_name' => $user_f_name,
                    'l_name'    => $user_l_name
                    );
                $this->session->set_userdata($user_data);
              redirect($_SERVER['HTTP_REFERER']);
          }else {
                $this->session->set_flashdata('false', 'Wrong data');
                redirect($_SERVER['HTTP_REFERER']);
          }
        }
    }
    public function logout(){
            $this->session->sess_destroy();
            redirect($_SERVER['HTTP_REFERER']);
    }
    public function register()
    {
        $this->form_validation->set_rules('e-mail', 'E-mail', 'trim|valid_email|required|min_length[2]|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('f_name', 'First name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('l_name', 'Last name', 'trim|required|min_length[2]');
        if ($this->form_validation->run() == false) {
            $this->load->view("users/register");
        } else {
            if ($this->User_model->create_user()) {
                $this->session->set_flashdata('user_registered', 'User has been registered');

                redirect($_SERVER['HTTP_REFERER']);
            } else {

            }
        }
    }

        public function edit(){
            if($this->input->post('e-mail') != $this->session->userdata('email')) {
                $this->form_validation->set_rules('e-mail', 'E-mail', 'trim|min_length[2]|is_unique[users.email]|valid_email');
            }
                $this->form_validation->set_rules('password', 'Password', 'trim|min_length[2]');


           $this->form_validation->set_rules('f_name', 'First name', 'trim|min_length[2]');
            $this->form_validation->set_rules('l_name', 'Last name', 'trim|min_length[2]');
            if ($this->form_validation->run() == false) {
                $user_id = $this->session->userdata('user_id');

               $data['users_data'] = $this->User_model->getUsersInfo($user_id);
                $data['main'] = "users/edit";
                $this->load->view('layouts/main', $data);
            } else {

               if($this->input->post('e-mail') != $this->session->userdata('email') ) {
                   $data = array(
                       'id' => $this->session->userdata('user_id'),
                        'l_name' => $this->input->post('l_name'),
                        'f_name' => $this->input->post('f_name'),
                        'email' => $this->input->post('email'),
                   //    'password' =>$encrited_pass
                    );
                }else{
                    $data = array(
                        'id' => $this->session->userdata('user_id'),
                        'l_name' => $this->input->post('l_name'),
                        'f_name' => $this->input->post('f_name'),
                        'email' => $this->session->userdata('email'),
                      //  'password' =>$encrited_pass
                    );
                    if($this->input->post('password')){
                        $encrited_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                        $data['password'] = $encrited_pass;
                    }
                }

                if ($this->User_model->edit($data)) {


                    redirect('/');
                } else {

                }
            }
        }
        public function user_seals(){
            $user_id = $this->session->userdata('user_id');
            $data['results'] = $this->User_model->getUserFinishedSels($user_id);
            $this->load->view('users/seals', $data);
        }
        public function users_buys(){
            $user_id = $this->session->userdata('user_id');
            $data['results'] = $this->User_model->getWinnerBuys($user_id);
            $this->load->view('users/buys', $data);
        }

}