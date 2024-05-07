<?php
//creation de la base de donnees
$dbname="mysql:host=localhost";
$root="root";
$password="";
 try{
    $connexion=new PDO($dbname,$root,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS info_user";
    $connexion->exec($sql);
    //echo'<center><p style="color:green; font-size:25px; font-family=algerian"> bd creer avec succes</p></center>';
 } catch(PDOException $e){
    echo"erreur lors de la connection a la bd:".$e->getMessage();
    exit();
 }

 //connection a la bd
 $dbname="mysql:host=localhost;dbname=info_user";
 try{
    $connexion=new PDO($dbname,$root,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
 } catch(PDOException $e){
    echo"erreur lors de la connection a la bd:".$e->getMessage();
    exit();
 }

//creation des table et champ
 $sql="CREATE TABLE IF NOT EXISTS societe(
    id int(2) PRIMARY KEY AUTO_INCREMENT,
     nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    tel INT(20),
    mail VARCHAR(200) NOT NULL
 )";
 try{
    $connexion->exec($sql);
    //echo'<center><p style="color:green; font-size:25px;font-family=algerian">la table a ete creer avec succes.</p></center>';
     
 } catch(PDOException $e){
    echo"erreur lors de la creation de la table:".$e->getMessage();
    
 }
 

//recuperation des donnees du formulaire
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$submit=$_POST['envoyer'];

//condition sur les colonnes a remplir
if(empty($nom) && empty($prenom) && empty($mail) && empty($tel)){
   echo"veuillez remplir les champs";
  }
  elseif(empty($prenom)){
   echo"veuillez remplir votre prenom";
}
elseif(empty($nom)){
   echo"veuillez remplir votre nom";
}
elseif(empty($mail)){
   echo"veuillez entrer votre e-mail";
}
elseif(empty($tel)){
   echo"veuillez entrer votre numero telephone";
}

 elseif((isset($nom) && isset($prenom) && isset($mail) && isset($tel)&& isset($submit))){
    //insertion des valeur dans la bd
    $requete="INSERT INTO societe(nom,prenom,mail,tel) VALUES(:nom,:prenom,:mail,:tel)";
    try {
        $statement=$connexion->prepare($requete);
        //attribution des valeurs aux parametres
       $statement->bindParam(':nom', $nom);
       $statement->bindParam(':prenom', $prenom);
       $statement->bindParam(':mail', $mail);
       $statement->bindParam(':tel', $tel);
       $statement->execute();
      // echo'<center><p style="color:green; font-size:25px;font-family=algerian"> donnees inserer avec succes</p></center>';
    } catch (PDOException $e) {
        echo"erreur lors de l'insertion des donnees:".$e->getMessage();
        
    }
}
   ?>