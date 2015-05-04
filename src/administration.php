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
    menu("administration.php");
    ?>

    <div class="container">

        <div class="text-center">
            <h1 class="modal-header">Base de Données</h1>
        </div>
        <?php if (!empty($_GET['success'])) echo '
        <div class="alert alert-success">
            ' . $_GET['success'] . '
        </div>

        ';

        ?>
        <?php if (!empty($_GET['error'])) echo '
        <div class="alert alert-danger">
            ' . $_GET['error'] . '
        </div>

        ';

        ?>
        <div class="row">
            <h3>Table Camping</h3>

            <div class="container-fluid col-md-7">
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
                            <td class="table_icon">
                                <a href="#">
                                    <button class="btn btn-default" title="Editer le camping" type="button">
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td class="table_icon">
                                <a href="traitement.php?action=delete&table=camping&idcamping=<?php echo $camping[0] ?>">
                                    <button class="btn btn-default" title="Supprimer le camping" type="button">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <div class="table_icon">
                    <a href="#">
                        <button class="btn btn-default" title="Insérer un camping" type="button">
                                        <span class="glyphicon glyphicon-plus">
                                        </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <h3>Table Categorie</h3>

            <div class="container-fluid col-md-1">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>idcateorie</th>
                        <th>libellecategorie</th>
                        <th>prixcategorie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($categorie = $categorieTable->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                                ?>
                                <td> <?php echo $categorie[$i]; ?> </td>
                            <?php
                            }
                            ?>
                            <td class="table_icon">
                                <a href="#">
                                    <button class="btn btn-default" title="Editer la categorie" type="button">
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td class="table_icon">
                                <a href="traitement.php?action=delete&table=categorie&idcategorie=<?php echo $categorie[0] ?>">
                                    <button class="btn btn-default" title="Supprimer la categorie" type="button">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>

                </table>
                <div class="table_icon">
                    <a href="#">
                        <button class="btn btn-default" title="Insérer une categorie" type="button">
                                        <span class="glyphicon glyphicon-plus">
                                        </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Table Logement</h3>

            <div class="container-fluid col-md-1">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>idlogement</th>
                        <th>nomcategorie</th>
                        <th>nomlogement</th>
                        <th>idcamping</th>
                        <th>image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($logement = $logementTable->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 5; $i++) {
                                ?>
                                <td> <?php echo $logement[$i]; ?> </td>
                            <?php
                            }
                            ?>
                            <td class="table_icon">
                                <a href="#">
                                    <button class="btn btn-default" title="Editer le logement" type="button">
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td class="table_icon">
                                <a href="traitement.php?action=delete&table=logement&idlogement=<?php echo $logement[0] ?>">
                                    <button class="btn btn-default" title="Supprimer le logement" type="button">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>

                </table>
                <div class="table_icon">
                    <a href="#">
                        <button class="btn btn-default" title="Insérer un logement" type="button">
                                        <span class="glyphicon glyphicon-plus">
                                        </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <h3>Table Prix_Periode</h3>

            <div class="container-fluid col-md-1">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>mois</th>
                        <th>ajout</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($prix_periode = $prix_periodeTable->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 2; $i++) {
                                ?>
                                <td> <?php echo $prix_periode[$i]; ?> </td>
                            <?php
                            }
                            ?>
                            <td class="table_icon">
                                <a href="#">
                                    <button class="btn btn-default" title="Editer le prix par période" type="button">
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td class="table_icon">
                                <a href="traitement.php?action=delete&table=prixperiode&mois=<?php echo $prix_periode[0] ?>">
                                    <button class="btn btn-default" title="Supprimer le prix par période" type="button">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>

                </table>
                <div class="table_icon">
                    <a href="#">
                        <button class="btn btn-default" title="Insérer un prix par période" type="button">
                                        <span class="glyphicon glyphicon-plus">
                                        </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <h3>Table Réservation</h3>

            <div class="container-fluid col-md-1">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>numreservation</th>
                        <th>idUTILISATEUR</th>
                        <th>idlogement</th>
                        <th>datereservation</th>
                        <th>datedebut</th>
                        <th>datefin</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($reservation = $reservationTable->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 6; $i++) {
                                ?>
                                <td> <?php echo $reservation[$i]; ?> </td>
                            <?php
                            }
                            ?>
                            <td class="table_icon">
                                <a href="#">
                                    <button class="btn btn-default" title="Editer la reservation" type="button">
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td class="table_icon">
                                <a href="traitement.php?action=delete&table=reservation&numreservation=<?php echo $reservation[0] ?>">
                                    <button class="btn btn-default" title="Supprimer la reservation" type="button">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>

                </table>
                <div class="table_icon">
                    <a href="#">
                        <button class="btn btn-default" title="Insérer une réservation" type="button">
                                        <span class="glyphicon glyphicon-plus">
                                        </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Table Utilisateur</h3>

            <div class="container-fluid col-md-1">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>idUTILISATEUR</th>
                        <th>loginUTILISATEUR</th>
                        <th>nomUTILISATEUR</th>
                        <th>prenomUTILISATEUR</th>
                        <th>telephoneUTILISATEUR</th>
                        <th>mailUTILISATEUR</th>
                        <th>departementUTILISATEUR</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($utilisateur = $utilisateurTable->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 7; $i++) {
                                ?>
                                <td> <?php echo $utilisateur[$i]; ?> </td>
                            <?php
                            }
                            ?>
                            <td class="table_icon">
                                <a href="#">
                                    <button class="btn btn-default" title="Editer l'utilisateur" type="button">
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </td>
                            <td class="table_icon">
                                <a href="traitement.php?action=delete&table=utilisateur&idutilisateur=<?php echo $utilisateur[0] ?>">
                                    <button class="btn btn-default" title="Supprimer l'utilisateur" type="button">
                                        <span class="glyphicon glyphicon-remove">
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>

                </table>
                <div class="table_icon">
                    <a href="#">
                        <button class="btn btn-default" title="Insérer un utilisateur" type="button">
                                        <span class="glyphicon glyphicon-plus">
                                        </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

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