<?php
    Class Controller{
        public function setEnderecoAPI(){
            $cep = Controller::getFormCEP();
            if(!@$url = file_get_contents("https://api.postmon.com.br/v1/cep/$cep")){
                return "CEP invalido ou falha na comunicação com a API!";
            }else{
                $url = file_get_contents("https://api.postmon.com.br/v1/cep/$cep");
                $json = json_decode($url, true);
                return $json;
            }
        }

        private function getFormCEP(){
            $formCEP = $_POST['cep'];
            $formCEP = preg_replace("/[^0-9]/", "", $formCEP);
            return $formCEP;
        }
    }
//campo de testes
    $endereco = new Controller();
    $arrayEnd = $endereco::setEnderecoAPI();
    if(is_array($arrayEnd)){
        echo "Rua: " . $arrayEnd["logradouro"] . "<br>";
        echo "Bairro: " . $arrayEnd["bairro"] . "<br>";
        echo "Cidade: " . $arrayEnd["cidade"] . "<br>";
        echo "Estado: " . $arrayEnd["estado"] . "<br>";
        echo "CEP: " . $arrayEnd["cep"] . "<br>";

    }else{
        echo $arrayEnd;
    }
?>