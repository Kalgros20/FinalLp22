<?php
    Class Imagem{
       
        private $nome;
        private $tamanho;
        private $fetp;
       
        public function listaImagem($list)
        {                         
            $edit = '<a href="'.base_url('Upload/editar/').'">editar</a>';
            $delete = '<a href="'.base_url('Upload/remover/').'">Deletar</a>/ ';
    
            foreach($list as $img)
            {
                
                echo '
                <li>
                <img src='.base_url().$img.' width="200px" height="200px">.'.$delete.$edit.'
                </li>';
            }            
        }
        
        public function deletaImagem()
        {
                        
        }
        public function alteraImagem()
        {
                        
        }
    }
?>