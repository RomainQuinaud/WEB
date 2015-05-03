<?php
session_start();

include 'BDD_connect.php';
$campingTable = $pdo->prepare("SELECT idcamping, nomcamping, villecamping, adressecamping, departementcamping FROM camping");
$campingTable->execute();

$categorieTable = $pdo->prepare("SELECT idcategorie, libellecategorie, prixcategorie FROM categorie");
$categorieTable->execute();

$logementTable = $pdo->prepare("SELECT idlogement, idcategorie, nomlogement, idcamping, image FROM logement");
$logementTable->execute();

$prix_periodeTable = $pdo->prepare("SELECT mois, ajout FROM prix_periode");
$prix_periodeTable->execute();

$reservationTable = $pdo->prepare("SELECT numreservation, idUTILISATEUR, idlogement, datereservation, datedebut, datefin FROM reservation");
$reservationTable->execute();

$utilisateurTable = $pdo->prepare("SELECT idUTILISATEUR, loginUTILISATEUR, nomUTILISATEUR, prenomUTILISATEUR, telephoneUTILISATEUR, mailUTILISATEUR, departementUTILISATEUR, mdpUTILISATEUR FROM utilisateur");
$utilisateurTable->execute();


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
    <link rel="stylesheet" href="../css/datepicker.css">
</head>

<body>
<div id="wrap">
    <?php
    include_once 'menu.php';
    menu("catalogue.php");
    ?>

    <div class="container">

        <div class="text-center">
            <h1 class="modal-header">Base de Données</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>idcamping</th>
                    <th>nomcamping</th>
                    <th>villecamping</th>
                    <th>adressecamping</th>
                    <th>departementcamping</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while ($camping = $campingTable->fetch()) {
                    ?>
                    <tr>
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            ?>
                            <td> <?php echo $camping[$i]; ?> </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <p class="text-muted credit">© Projet Web - DUT Informatique <br> IUT d'Orsay</p>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>