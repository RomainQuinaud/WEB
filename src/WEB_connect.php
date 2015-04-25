<?php
session_start();
$errmsg_arr = array();
$errflag = false;
$sql = "SELECT mailUTILISATEUR,mdpUTILISATEUR,loginUTILISATEUR
    FROM utilisateur ";
include 'BDD_connect.php';

// new data

$user = $_POST['email'];
$password = $_POST['password'];

if(empty($user)) {
    $errmsg_arr[] = 'Veuillez saisir votre adresse email';
    $errflag = true;
}
if(empty($password)) {
    $errmsg_arr[] = 'Veuillez saisir votre mot de passe';
    $errflag = true;
}


// query
$result = $pdo->prepare($sql."WHERE mailUTILISATEUR= :mail");
$result->bindParam(':mail', $user);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0 && password_verify($password,$rows[1])) {

    $_SESSION['login'] = $rows[2];
    header("Location: index.php");

}
else {
    if (!empty($user) && !empty($password)) {
        $errmsg_arr[] = 'Mauvais couple login/mot de passe';
        $errflag = true;
    }
    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();

        header("location: connexion.php");
        exit();
    }
}
