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
                    $img = new Imagem();
                    
                    $descricao = $this->input->post('descricao');
                    
                    // var_dump($descricao);
                    
                    $img->insereMetadados($upload_data,$descricao);

                    $fileName = $upload_data['file_name'];
                
                        
                    //File path at local server
                    $source = 'assets/'.$fileName;
                    
                    $destination = 'uploads/'.$fileName;
                    
                    //Upload file to the remote server
                    $this->ftp->upload($source, $destination, 'auto');
                                        
                }
            }
        }

        public function deletaImage($id)
        {
            $img = new Imagem();
            $fileName = $img->deletaImagem($id);  
            // var_dump($fileName);

            $this->ftp->delete_file("/uploads/$fileName");
            return true;        
        }

        public function atualizaImage($id)
        {

           if(sizeof($_POST) == 0) return false;
            
            $data['nome'] = $this->input->post('nome');
            $data['descricao'] = $this->input->post('descricao');
            $newFile =  $this->input->post('nome');
            
            $img = new Imagem();
            $fileName = $img->atualizaImagem($data,$id);  
            
            $this->ftp->rename("/uploads/$fileName", "/uploads/$newFile");
            
            
        }

        public function listaImage()
        {
            $img = new Imagem();
            return $img->getLista();
        }

    }
?>
