<?php
    Class Controller{
        public $cep;

        public function ConsultaViaCEP(){
            $cep = Controller::setFormCEP();
            $cep = preg_replace("/[^0-9]/", "", $cep);
            $url = file_get_contents("http://viacep.com.br/ws/$cep/json/");
            $json = json_decode($url, true);
            return $json;
        }

        private function setFormCEP(){
            $formCEP = $_POST['cep'];
            return $formCEP;
        }

        public function getCEP(){
            return Controller::ConsultaViaCEP()['cep'];
        }

        public function getLogradouro(){
            return Controller::ConsultaViaCEP()['logradouro'];
        }

         public function getComplemento(){
            return Controller::ConsultaViaCEP()['complemento'];
        }

        public function getBairro(){
            return Controller::ConsultaViaCEP()['bairro'];
        }

        public function getLocalidade(){
            return Controller::ConsultaViaCEP()['localidade'];
        }

        public function getUF(){
            return Controller::ConsultaViaCEP()['uf'];
        }
    }

    echo Controller::getCEP()."<br>";
    echo Controller::getLogradouro()."<br>";
    echo Controller::getComplemento()."<br>";
    echo Controller::getBairro()."<br>";
    echo Controller::getLocalidade()."<br>";
    echo Controller::getUF()."<br>";
?>