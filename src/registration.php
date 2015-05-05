<?php
session_start();

$flag = false;
$valid = false;

include 'BDD_connect.php';

$sql = "INSERT INTO UTILISATEUR (loginUTILISATEUR,nomUTILISATEUR,prenomUTILISATEUR,telephoneUTILISATEUR,mailUTILISATEUR,departementUTILISATEUR,mdpUTILISATEUR)
VALUES (:login,:nom,:prenom,:telephone,:mail,:departement,:mdp)";

$login = $_POST['login'];
$mail = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$departement = $_POST['departement'];
$mdp = $_POST['password'];
$password = password_hash($mdp, PASSWORD_BCRYPT);


if (empty($login)) {
    $err_login = 'Veuillez saisir votre Login';
    $flag = true;
}

if (empty($mail)) {
    $err_mail = 'Veuillez saisir votre Email';
    $flag = true;
}

if (empty($nom)) {
    $err_nom = 'Veuillez saisir votre Nom';
    $flag = true;
}

if (empty($prenom)) {
    $err_prenom = 'Veuillez saisir votre Prénom';
    $flag = true;
}

if (empty($telephone)) {
    $err_telephone = 'Veuillez saisir votre Téléphone';
    $flag = true;
}

if (empty($departement)) {
    $err_dpt = 'Veuillez saisir votre Département';
    $flag = true;
}

if (empty($mdp)) {
    $err_mdp = 'Veuillez saisir votre Mot de passe';
    $flag = true;
}


if (!$flag) {


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
if ($valid) header("location: connexion.php");
else {
    if ($flag) {
        $_SESSION['ERR_LOGIN'] = $err_login;
        $_SESSION['ERR_MAIL'] = $err_mail;
        $_SESSION['ERR_NOM'] = $err_nom;
        $_SESSION['ERR_PRENOM'] = $err_prenom;
        $_SESSION['ERR_TELEPHONE'] = $err_telephone;
        $_SESSION['ERR_DPT'] = $err_dpt;
        $_SESSION['ERR_MDP'] = $err_mdp;


        session_write_close();
        header("location: inscription.php");
        exit();
    }
}
