<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');


include 'BDD_connect.php';
$reservationStatements = $pdo->prepare("
select nomcamping,villecamping,adressecamping,departementcamping,libellecategorie,prixcategorie,idlogement,nomlogement
from camping natural join categorie natural join logement");
$reservationStatements->bindParam(':login', $_SESSION['login']);
$reservationStatements->execute();
?>
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/camping.ico">
    <title>CampFind</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/starter-template.css" rel="stylesheet">
</head>

<body>

<div id="wrap">
    <?php
    include_once 'menu.php';
    menu("catalogue.php");
    ?>

    <div class="container">

        <div class="text-center">
            <h1 class="modal-header">Catalogue des logements</h1>



