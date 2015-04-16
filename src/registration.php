<?php
session_start();

$errflag = false;
$valid=false;

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
    $errmsg_login = 'Veuillez saisir votre Login';
    $errflag = true;
}


if(empty($mail)) {
    $errmsg_mail = 'Veuillez saisir votre Email';
    $errflag = true;
}
if(empty($nom)) {
    $errmsg_nom = 'Veuillez saisir votre Nom';
    $errflag = true;
}
if(empty($prenom)) {
    $errmsg_prenom = 'Veuillez saisir votre Prénom';
    $errflag = true;
}
if(empty($telephone)) {
    $errmsg_telephone= 'Veuillez saisir votre Téléphone';
    $errflag = true;
}

if(empty($departement)) {
    $errmsg_dpt = 'Veuillez saisir votre Département';
    $errflag = true;
}
if(empty($mdp)) {
    $errmsg_mdp= 'Veuillez saisir votre Mot de passe';
    $errflag = true;
}

if(!$errflag) {


// query
    $req = $pdo->prepare($sql);
    $req->bindParam(':login', $login);
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':telephone', $telephone);
    $req->bindParam(':mail', $mail);
    $req->bindParam(':departement', $departement);
    $req->bindParam(':mdp', $password);
    $valid = $req->execute();
}
if($valid) header("location: connexion.php");
else {
    if ($errflag) {
        $_SESSION['ERRMSG_LOGIN'] = $errmsg_login;
        $_SESSION['ERRMSG_MAIL'] = $errmsg_mail;
        $_SESSION['ERRMSG_NOM'] = $errmsg_nom;
        $_SESSION['ERRMSG_PRENOM'] = $errmsg_prenom;
        $_SESSION['ERRMSG_TELEPHONE'] = $errmsg_telephone;
        $_SESSION['ERRMSG_DPT'] = $errmsg_dpt;
        $_SESSION['ERRMSG_MDP'] = $errmsg_mdp;
        session_write_close();
        header("location: inscription.php");
        exit();
    }
}

?>