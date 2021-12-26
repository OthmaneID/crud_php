<?php

   $serverName="localhost";
    $username="root";
    $password="";
 $pdo=new PDO("mysql:host${serverName};port=3306;dbname=products_crud",$username,$password);

 // set the PDO error mode to exception
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


?>