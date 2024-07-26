<?php 

    $dsn="mysql:dbname=sistema_login;host=localhost";
    $dbuser="root";
    $dbpass="";
    
    try{
        $pdo = new PDO($dsn,$dbuser,$dbpass);
    }
    catch(PDOExcpction $e){
        echo("ERRO: ".$e->getMessage());
    }
    


?>