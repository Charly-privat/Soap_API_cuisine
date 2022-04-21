<?php
    error_reporting(1);
    ini_set('soap.wsdl_cache_enabled', 0);
    $service=new SoapClient("http://localhost/php_tp_soap/Soap_API_cuisine/soap.wsdl");

    $result=$service->selectRecettes();
    echo $result;

    foreach ($result as $row) {
        echo $row['id']." ".$row['nom']." ".$row['description']."<br />\n";
    }

?>