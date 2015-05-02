<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');


include 'BDD_connect.php';
$catalogueStatements = $pdo->prepare("
                SELECT nomlogment,libellecategorie,prixcategorie
                FROM logement NATURAL JOIN categorie");
$catalogueStatements->bindParam(':login', $_SESSION['login']);
$catalogueStatements->execute();
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

            <?php if ($catalogueStatements->rowCount() == 0) {
                ?> <p> Le catalogue est indisponible actuellement. </p>
                ?> <p> Le catalogue est indisponible actuellement.</p>
            <?php
            } else {
                ?>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nom du Logement</th>
                    </tr>


                    </thead>
                    <tbody>
                    /*
                    <?php

                    while ($reservation = $reservationStatements->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 8; $i++)
                                echo '<td>' . $reservation[$i] . '</td>';

                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>

                </table>
            <?php
            }
            ?>

            */
