<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');

include 'BDD_connect.php';
$reservationStatements = $pdo->prepare("
                SELECT datedebut,datefin,nomlogement,libellecategorie,nomcamping, villecamping,adressecamping,departementcamping
                from utilisateur natural join reservation natural join logement natural join categorie natural join camping where loginUtilisateur=:login ");
$reservationStatements->bindParam(':login', $_SESSION['login']);
$reservationStatements->execute();

$catalogueStatements = $pdo->prepare("
                SELECT idlogement
                FROM logement");
$catalogueStatements->bindParam(':login', $_SESSION['login']);
$catalogueStatements->execute();

$randomId1 = rand(1, $catalogueStatements->rowCount());
$randomId2 = rand(1, $catalogueStatements->rowCount());
$randomId3 = rand(1, $catalogueStatements->rowCount());



$propositionStatements = $pdo->prepare("
                SELECT image,nomcamping,nomlogement,libellecategorie,prixcategorie
                FROM utilisateur NATURAL JOIN logement NATURAL JOIN categorie NATURAL JOIN camping WHERE loginUtilisateur=:login AND (idlogement=:random1 OR idlogement=:random2)");
$propositionStatements->bindParam(':login', $_SESSION['login']);
$propositionStatements->bindParam(':random1', $randomId1);
$propositionStatements->bindParam(':random2', $randomId2);
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

            <p class="lead">La réservation d'un logement n'a jamais été aussi simple<br></p>

            <div class="row">
                <div class="col-sm-9 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-titre">Proposition</h2>

                        <?php if ($propositionStatements->rowCount() == 0) {
                            ?> <p> Il n'y a aucune proposition à afficher</p>
                        <?php
                        } else {
                            ?>
                            <div class="center-block">
                                <?php
                            while ($proposition = $propositionStatements->fetch()) { ?>



                                <div class="thumbnail">


                                    <a href="catalogue.php?nomLogement=<?php echo urlencode($proposition[2]) ?>&categorie=Tous&startSearch=&endSearch=">


                                        <img class="imgCatalogue" src=" <?php echo $proposition[0] ?> "
                                         alt="Photographie du logement <?php echo $proposition[2] ?>">

                                    <div class="caption">
                                        <h3><?php echo $proposition[2] ?></h3>
                                        <?php
                                        for ($i = 3; $i < 4; $i++)
                                            echo $proposition[$i] . '<br>';
                                        ?>
                                    </div>

                                    </a>
                                </div>



                            <?php
                            }
                                ?> </div> <?php
                        }
                        ?>


                    </div>

                </div>
                <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <div class="sidebar-module">
                            <h2>Notifications</h2>

                            <p>Vous avez <a href=reservation.php> <?php echo $reservationStatements->rowCount() ?> </a>
                                réservation(s) en cours.</p>
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
<!-- Bootstrap core JavaScript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>