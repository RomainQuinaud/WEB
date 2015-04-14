<?php
session_start();
$errmsg_arr = array();
$errflag = false;


include 'BDD_connect.php';

$sql="INSERT INTO UTILISATEUR (loginUTILISATEUR,nomUTILISATEUR,prenomUTILISATEUR,telephoneUTILISATEUR,mailUTILISATEUR,departementUTILISATEUR,mdpUTILISATEUR)
VALUES (:login,:nom,:prenom,:telephone,:mail,:departement,:mdp)";

$login=$_POST['login'];
$mail=$_POST['email'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$telephone=$_POST['telephone'];
$departement=$_POST['departement'];
$mdp=$_POST['password'];
$password=password_hash($mdp,PASSWORD_BCRYPT);


if(empty($login)) {
    $errmsg_arr[] = 'Veuillez saisir votre Login';
    $errflag = true;
}

if(empty($mail)) {
    $errmsg_arr[] = 'Veuillez saisir votre Email';
    $errflag = true;
}
if(empty($nom)) {
    $errmsg_arr[] = 'Veuillez saisir votre Nom';
    $errflag = true;
}
if(empty($prenom)) {
    $errmsg_arr[] = 'Veuillez saisir votre Prénom';
    $errflag = true;
}
if(empty($telephone)) {
    $errmsg_arr[] = 'Veuillez saisir votre Téléphone';
    $errflag = true;
}

if(empty($departement)) {
    $errmsg_arr[] = 'Veuillez saisir votre Département';
    $errflag = true;
}
if(empty($mdp)) {
    $errmsg_arr[] = 'Veuillez saisir votre Mot de passe';
    $errflag = true;
}






// query
$req = $pdo->prepare($sql);
$req->bindParam(':login', $login);
$req->bindParam(':nom', $nom);
$req->bindParam(':prenom', $prenom);
$req->bindParam(':telephone', $telephone);
$req->bindParam(':mail', $mail);
$req->bindParam(':departement', $departement);
$req->bindParam(':mdp', $password);
$valid=$req->execute();

if($valid) header("location: connexion.php");

if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: inscription.php");
    exit();
}
