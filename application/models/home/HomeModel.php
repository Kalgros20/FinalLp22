<?php
        defined('BASEPATH') OR exit('No direct script access allowed');

    include APPPATH.'libraries/imagem/Imagem.php';
   
    class HomeModel extends CI_Model
    {
        public function insereImage()
        {
            if($this->input->post('submit'))
            {
                if($this->upload->do_upload('file'))
                {
                    //Get uploaded file information
                    $upload_data = $this->upload->data();
                    $fileName = $upload_data['file_name'];
                    
                    //File path at local server
                    $source = 'assets/'.$fileName;
                    
                    // var_dump($source);
                    $destination = 'uploads/'.$fileName;
                    // var_dump($destination);
                    //Upload file to the remote server
                    $this->ftp->upload($source, $destination, 'auto');
                                        
                }
            }
        }


        public function deletaImage($fileName){
             $this->ftp->delete_file('./'.$fileName);
        }

        public function alteraImage(){
            
        }
        public function listaImage(){
            $img = new Imagem();

            $list = $this->ftp->list_files('uploads');
            var_dump($list);

            return $img->listaImagem($list);
        }

    }
?>
