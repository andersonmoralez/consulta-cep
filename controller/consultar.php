<?php
    function getEndereco($cep){
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
    }
    $cep = $_POST['cep'];
    $endereco1 = getEndereco($cep);
    echo "Rua: $endereco1->logradouro";
    echo "<br>Bairro: $endereco1->bairro";
    echo "<br>CEP: $endereco1->cep";
?>