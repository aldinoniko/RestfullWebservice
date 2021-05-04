<?php
    class Post_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_posts($slug = FALSE) {
            if($slug === FALSE){
                $query = $this->db->get('posts');

                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug' => $slug));

            return $query->row_array();
    }

        public function create_post() {
        //Menyiapkan Record baru ke dalam sebuah array
        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'slug' => str_replace(' ', '', $this->input->post('title')). '-' . mdate('%Y%m%d%H%i%s', time())    //membuat Slug Key dengan menambahkan tanggal dan waktu saat ini ke Title
        );

        return $this->db->insert('posts', $data);           //Insert postingan baru ke DB table Posts
    }

    public function delete_post($slug) {
        echo "delete post -> " . $slug;

        $this->db->where('slug', $slug);

        return $this->db->delete('posts');
    }

    public function update_post() {
        $slug = $this->input->post('slug');

        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'slug' => $slug
        );

        print_r($data);
        $this->db->where('slug', $slug);
        return $this->db->update('posts', $data);
    }
}