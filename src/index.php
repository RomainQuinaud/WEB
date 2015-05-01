<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');


include 'BDD_connect.php';
$propositionStatements = $pdo->prepare("
SELECT nomcamping,nomlogement,libellecategorie,prixcategorie
FROM utilisateur NATURAL JOIN logement NATURAL JOIN categorie NATURAL JOIN camping WHERE loginUtilisateur=:login ");
$propositionStatements->bindParam(':login', $_SESSION['login']);
$propositionStatements->execute();
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
    menu("index.php");
    ?>

    <div class="container">

        <div class="text-center">

            <h1 class="modal-header">CampFind</h1>

            <h1>Bienvenue sur CampFind</h1>

            <p class="lead">La réservation d'un logement n'a jamais été aussi simple<br>

            <div class="row">
                <div class="col-sm-9 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-titre">Proposition</h2>
                        <?php if ($propositionStatements->rowCount() == 0) {
                            ?> <p> Il n'y a aucune proposition à afficher</p>
                        <?php
                        } else {
                            ?>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom du Camping</th>
                                    <th>Nom du Logement</th>
                                    <th>Type de Logemment</th>
                                    <th>À partir de: (Prix par nuit)</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                while ($proposition = $propositionStatements->fetch()) {
                                    ?>
                                    <tr>
                                        <?php
                                        for ($i = 0; $i < 4; $i++)
                                            echo '<td>' . $proposition[$i] . '</td>';

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
                        <p>Exemple de logement. Affichage IMAGE correspondante</p>
                    </div>
                </div>
                <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <div class="sidebar-module">
                            <h2>Notifications</h2>

                            <p>Futur emplacement des notifications liées aux réservations.</p>

                            <p>Peut être un rappel des différentes réservations de la personne connectée</p>
                        </div>
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
<!-- /.container -->

<!-- Bootstrap core JavaScript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="../js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body>

</html>