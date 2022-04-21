<?php

    function connexionPDO() {
        $login = "root";
        $mdp = "";
        $bd = "soap_cuisine";
        $serveur = "localhost"; 
        try {
            $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e) {
            return "Erreur de connexion PDO ";
            print $e;
            die();
        }
    }
    function selectRecettes() {
        $resultat = array();
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from recettes ");
            $req->execute();
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    ini_set('soap.wsdl_cache_enabled', 0);
    $conn = connexionPDO();
    $serversoap=new SoapServer("http://localhost/php_tp_soap/Soap_API_cuisine/soap.wsdl");

    $serversoap->addFunction("selectRecettes");

    $serversoap->handle();

?>