<?php
    function getEndereco($cep){
        //remove caracteres
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";
        
        $xml = simplexml_load_file($url);
        return $xml;
    }

    $endereco1 = (getEndereco("07942300"));
    echo "Rua: $endereco1->logradouro";
    echo "<br>Bairro: $endereco1->bairro";
    echo "<br>CEP: $endereco1->cep";
    
    $endereco2 = (getEndereco("07936000"));
    echo "<br><br>Rua: $endereco2->logradouro";
    echo "<br>Bairro: $endereco2->bairro";
    echo "<br>CEP: $endereco2->cep";
?>