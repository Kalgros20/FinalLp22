<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->library('ftp');
                
                $config['hostname'] = '127.0.0.1';
                $config['username'] = 'localftp';
                $config['password'] = '210596ca';
                $config['port']     = 21;
                $config['passive']  = FALSE;
                $config['debug']    = TRUE;
                
                $this->ftp->connect($config);

                $list = $this->ftp->list_files('.');
                print_r($list);
                $this->ftp->close();
                
                foreach($list as $img){
                        echo '<img src='.base_url('uploads').'/'.$img.' width="500px" height="500px">';
                }

                
        }

        public function do_upload()
        {
               $data = array ();
                if ($handle = opendir('./uploads')) {
                  while (false !== ($file = readdir($handle))) {
                         if ($file != "." && $file != "..") {
                           $data['thelist'] .= '<li><a href="'.$file.'">'.$file.'</a></li>';
                         }
                      }
                 closedir($handle);
                 }
               
               
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {

                        $this->load->view('upload_success', $data);
                }

                
               
        }
}
?>