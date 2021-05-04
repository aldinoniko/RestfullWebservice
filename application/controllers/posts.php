<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Posts extends CI_Controller {
        public function index () {
            $data['title'] = ucfirst('latest posts');

            $this->load->model('post_model');
            $data['posts'] = $this->post_model->get_posts();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $this->load->model('post_model');
            $data['posts'] = $this->post_model->get_posts($slug);

            if (empty($data['posts'])) {
                show_404();
            }

            $data['title'] = $data['posts']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function create() {
            $data['title'] = ucfirst('create post');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->model('post_model');       //Load model
                $this->post_model->create_post();       //Proses postingan baru
                redirect('posts');                      //Kembali ke halaman Posts Index
            }
        }

        public function delete($slug){
            $this->load->model('post_model');
            $this->post_model->delete_post($slug);
        }

        public function edit($slug) {
            $data['title'] = ucfirst('edit post');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->model('post_model');
                $data['posts'] = $this->post_model->get_posts($slug);

                if (empty($data['posts'])) {
                    show_404();
                }

                $this->load->view('templates/header');
                $this->load->view('posts/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->model('post_model');           //Load model
                $result = $this->post_model->update_post(); //Proses update postingan

                if ($result)            //Update sukses
                    redirect('posts');
                else
                    show_error('Update GAGAL');
            }

        }
    }  
