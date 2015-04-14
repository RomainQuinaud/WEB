<?php
session_start();
$errmsg_arr = array();
$errflag = false;
$sql = "SELECT mailUTILISATEUR,mdpUTILISATEUR
    FROM utilisateur ";
include 'connect.php';

// new data

$user = $_POST['email'];
$password = $_POST['password'];

if($user == '') {
    $errmsg_arr[] = 'You must enter your Username';
    $errflag = true;
}
if($password == '') {
    $errmsg_arr[] = 'You must enter your Password';
    $errflag = true;
}


// query
$result = $pdo->prepare($sql."WHERE mailUTILISATEUR= :log AND mdpUTILISATEUR= :pass");
$result->bindParam(':log', $user);
$result->bindParam(':pass', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
    $_SESSION['login']=$user;
    header("location: index.php");
}
else{
    $errmsg_arr[] = 'blablabma';
    $errflag = true;
}
if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: connexion.php");
    exit();
}

?>