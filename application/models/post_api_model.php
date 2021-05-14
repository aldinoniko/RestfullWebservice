<?php
    class Post_Api_Model extends CI_Model{
        public function get_posts($slug = FALSE) {
            $api_url = ('http://localhost:8888/posts/all/');

            if ($slug) $api_url = ('http://localhost:8888/posts/get/' . $slug);

            $svcGet = curl_init($api_url);
            curl_setopt($svcGet, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($svcGet);
            curl_close($svcGet);
        
            $result = json_decode($response);

            return $result;
        }
            public function create_post() {
                //Menyiapkan Record baru ke dalam sebuah array
                $api_url="http://localhost:8888/posts/create/";
                $data = json_encode(array(
                    
                    'title' => $this->input->post('title'),
                    'body' => $this->input->post('body'),
                    'slug' => $this->input->post('title'). '-' . mdate('%Y%m%d%H%i%s', time()),  //membuat Slug Key dengan menambahkan tanggal dan waktu saat ini ke Title
                    // 'created_at' => $this->input->post('created_at'),
                    'userid' => $this->input->post('userid', true)
                ));
                // print_r($data);
                $curl = curl_init();
    
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $api_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $data,
                    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
                ));
    
                $response= json_decode(curl_exec($curl));
    
                curl_close($curl);
                // var_dump($response);
                // die();
                if ($response->status == 200) {
                    $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                    return true;
                }
                else {
                    $this->session->set_flashdata('success', "Respond Status: $response->status; Message: $response->message");
                    return false;       
                }
        }
           
            public function get_posts_userid($userid = false){
            $api_url =("http://localhost:8888/posts/get_userid/$userid");

            $svcGet = curl_init($api_url);
            curl_setopt($svcGet, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($svcGet);
            curl_close($svcGet);
        
            $result = json_decode($response);
        // var_dump($result);
        //         die();
            return $result;
            
    }
        
        public function delete_post($slug) {
            $api_url="http://localhost:8888/posts/delete_slug/$slug";
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $api_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'DELETE',
            ));
            
            $result = json_decode(curl_exec($curl));
            
           curl_close($curl);
        //    var_dump($result);
        //     die();
            if ($result->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $result->status; Message: $result->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $result->status; Message: $result->message");
                return false;   
        }
        return $result;

    }

            public function update_post() {
            $id = $this->input->post('id');
            $api_url = "http://localhost:8888/posts/edit/$id";

            $data = json_encode(array(
                'id' => (int)$this->input->post('id'),
                'slug' => $this->input->post('slug'),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'created_at' => $this->input->post('created_at'),
                'userid' => $this->input->post('userid', true)
            ));
            // die($api_url);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $result = json_decode(curl_exec($curl));

            curl_close($curl);

            if ($result->status == 200) {
                $this->session->set_flashdata('success', "Respond Status: $result->status; Message: $result->message");
                return true;
            }
            else {
                $this->session->set_flashdata('error', "Respond Status: $result->status; Message: $result->message");
                return false;   

        }

    }
}