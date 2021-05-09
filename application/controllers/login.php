<?php
    class Login extends CI_Controller {
        public function __construct() {
            parent::__construct();

            $this->load->model('login_model');               //Load model
        }

        public function index () {
            $data['title'] = ucwords('login');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('userEmail', 'Email', 'required');
            $this->form_validation->set_rules('userPass', 'Password', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('login', $data);
                $this->load->view('templates/footer');
            } else {
                $result = $this->login_model->request_login();      //Proses Login

                if ($result) 
                    redirect('testapi');                            //Kembali ke halaman Posts Index
                else
                    redirect('login');                    
            }
        }

        public function logout() {
            $this->session->sess_destroy();

            redirect('login','refresh');            
        }
    }