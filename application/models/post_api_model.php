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
                    'slug' => $this->input->post('title')    //membuat Slug Key dengan menambahkan tanggal dan waktu saat ini ke Title
                ));
                print_r($data);
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
                return ($response->status==200) ? true:false;
        }
        
        
        public function delete_post($slug) {
            $api_url="http://localhost:8888/posts/delete_slug/$slug";
            $data = json_encode(array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'slug' => $this->input->post('title') 
            ));
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $api_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);

            return($api_url); 
        }

            public function update_post() {
            $id = $this->input->post('id');
            $api_url = "http://localhost:8888/posts/edit/$id";

            $data = json_encode(array(
                'id' => (int)$this->input->post('id'),
                'created_at' =>(int) $this->input->post('created_at'),
                'slug' => $this->input->post('slug'),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body')
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
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            ));

            $response= json_decode(curl_exec($curl));

            curl_close($curl);
            // var_dump($response);
            // die();
            return ($response->status == 200) ? true:false;
        }
    }
   