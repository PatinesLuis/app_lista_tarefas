<?php

    class conexao{

        private $host = 'localhost';
        private $dbname = 'app_lista_tarefas';
        private $user = 'root';
        private $senha = 'root';
        public function conectar(){
            try{
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->senha"
                );

                return $conexao;
            }catch(PDOException $e){
                echo '<p>' . $e->getMessage . '</p>';
            }
        }
    }
?>