<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class TestApi extends CI_Controller {
        
        public function __construct() {
            parent::__construct();

            $this->load->model('post_api_model');
        }

        public function index () {
            $data['title'] = ucfirst('latest posts');

            $data['posts'] = $this->post_api_model->get_posts();

            $this->load->view('templates/header');
            ($data['posts']) ? $this->load->view('testapi/index', $data) : show_404();
            $this->load->view('templates/footer');
        }
        public function delete($slug){
            $this->load->model('post_api_model');
            
            $result = $this->post_api_model->delete_post($slug);
                
                // if($result  == true){
                    redirect('testapi');
                }             

        public function view($slug = false){
            if(!$slug){
                show_404();
            }

            $this->load->view('templates/header');
            $data['posts'] = $this->post_api_model->get_posts($slug);
            if ($data['posts']) {
                $data['title'] = $data['posts']->title;
                $this->load->view('testapi/view', $data);
            }
            $this->load->view('templates/footer');
        }

        public function create() {
            $data['title'] = ucfirst('create post');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');


            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('testapi/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->post_api_model->create_post();       //Proses postingan baru
                redirect('testapi');                      //Kembali ke halaman Posts Index
            }

        }

        public function edit($slug = false) {
            $data['title'] = ucfirst('edit post');
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if ($this->form_validation->run() === FALSE){
                $data['posts'] = $this->post_api_model->get_posts($slug);

                if (empty($data['posts'])) {
                    show_404();
                }

                $this->load->view('templates/header');
                $this->load->view('testapi/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $result = $this->post_api_model->update_post(); //Proses update postingan

                // if ($result)
                    redirect('testapi');                        //Update sukses
                // else
                //     show_error('Update GAGAL');
            }

        }
    }  
