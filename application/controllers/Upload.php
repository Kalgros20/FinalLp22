<?php

class Upload extends CI_Controller {

        public function index()
        {
                $this->ftp->connect();
                $data['action'] = 'insere';
                $this->load->model('Home/HomeModel','model');
                $this->model->listaImage();
                $this->load->view('form/form',$data);
                $this->ftp->close();
        }

        public function insere()
        {
                $this->ftp->connect();
                $this->load->model('Home/HomeModel','model');
                $this->model->insereImage();
                redirect('Upload/Index','refresh');
                $this->ftp->close();
        }

        public function remove()
        {
                $this->ftp->connect();
                $this->load->model('Home/HomeModel','model');
                $this->model->deletaImage();
                $this->ftp->close();
        }

        public function edita()
        {
                $this->ftp->connect();
                $this->ftp->close();
        }
}
?>