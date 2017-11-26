<?php

class Upload extends CI_Controller {

        public function index()
        { 
                $this->load->view('static/cabecalho');
                $this->load->view('static/header');
                $this->ftp->connect();
                $data['action'] = 'index.php/Upload/insere';
                $this->load->model('Home/HomeModel','model');
                $data['lista'] = $this->model->listaImage();
                $this->load->view('form/form',$data);
                $this->ftp->close();
                $this->load->view('static/scripts');
        }

        public function insere()
        {
                $this->ftp->connect();
                $this->load->model('Home/HomeModel','model');
                $this->model->insereImage();
                redirect('Upload','refresh');
                $this->ftp->close();
        }

        public function deletar($id = 0)
        {
                $this->ftp->connect();
                $this->load->model('Home/HomeModel','model');
                $this->model->deletaImage($id);
                $this->ftp->close();
                redirect('upload');
                
        }

        public function editar($id = 0){
                $this->load->view('static/cabecalho');
                $this->load->view('static/header');
             
                $this->ftp->connect();
                $this->load->model('Home/HomeModel', 'model');
                $this->model->atualizaImage($id);

                
                $data['id'] = $id;
                $data['action'] = "/index.php/Upload/editar/$id";
                $this->load->view('form/formEditar', $data);
                $this->load->view('static/scripts');
                $this->ftp->close();
        }
}
?>