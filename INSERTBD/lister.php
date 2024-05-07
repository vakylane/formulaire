<?php
$root="root";
$password="";
//ouverture d'une connexion a la bd
$dbname="mysql:host=localhost;dbname=info_user";
 try{
    $connexion=new PDO($dbname,$root,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
 } catch(PDOException $e){
    echo"erreur lors de la connection a la bd:".$e->getMessage();
    exit();
 }
  yy
?>