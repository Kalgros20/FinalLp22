<?php
    Class Imagem
    {
        private $db;
        private $nome;
        private $extensao;
        private $tamanho;
        
        function __construct()
        {
            $ci = & get_instance();
            $this->db = $ci->db;
        }

        public function getLista(){
            $sql = "SELECT * FROM imagem";
            $rs = $this->db->query($sql);
            $m = $rs->result();
    
            $html = '';
            foreach($m AS $img){
                $html .= $this->listaLinha($img);
            }
            return $html;
        }

        public function listaLinha($obj)
        {
            $edit = '<a href="'.base_url('index.php/Upload/editar/'.$obj->Id_img).'"><i class="fa pull-right fa-pencil-square-o" aria-hidden="true"></i></a>';
            $delete = '<a href="'.base_url('index.php/Upload/deletar/'.$obj->Id_img).'"><i class="fa pull-right fa-times" aria-hidden="true"></i></a>';
    
            $html = '<div class="media mb-1">
                        <a class="media-left waves-light">
                        <img class="img-responsive" src='.base_url().'uploads/'.$obj->Nome.' alt="Generic placeholder image" style="
                        width: 200px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">'.$obj->descricao.$delete.$edit.'</h4>
                        </div>
                    </div>';
                    return $html;
        }
        public function insereMetadados($upload_data,$descricao)
        {
            $fileName = $upload_data['file_name'];
            $data = array('Nome' => $fileName,"descricao" => $descricao );

            return $this->db->insert('imagem', $data);
        }
        
        public function deletaImagem($id)
        {
            $sql  = "Select Nome from imagem where Id_img = '$id'";
            $rs = $this->db->query($sql);
            
            foreach($rs->result() as $row){
                $imgName =  $row->Nome;
            }          
            $this->db->delete('imagem', array('Id_img' => $id));
            return $imgName;
        }
        
        public function atualizaImagem($data,$id)
        {   
            $sql  = "Select Nome from imagem where Id_img = '$id'";
            $rs = $this->db->query($sql);
            foreach($rs->result() as $row)
            {
                $imgName =  $row->Nome;
            }      
           
            $this->db->update('imagem', $data, array('Id_img' => $id));        
            return $imgName;
        }


        public function getImage($id)
        {
            $rs = $this->db->get_where('imagem', array('Id_img' => $id));
            return $rs->row();
        }
    }
?>