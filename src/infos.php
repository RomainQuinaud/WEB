<?php
session_start();
if(!isset($_SESSION['login']))
    header('Location: connexion.php');
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
    menu("infos.php");
    ?>

    <div class="container">

        <div class="text-center">
            <h1 class="modal-header">Bienvenue sur CampFind</h1>

            <div class="row">

                <h2></h2>

                <div class="pageGauche col-xs-12 col-sm-6 col-md-6 col-lg-5 col-lg-offset-1">
                    <h2> D'où vient l'idée ? </h2>

                    <p> L'idée de réaliser un projet sur la réservation d'un camping est venue d'un constat: Les sites
                        de réservations de camping sont parfois un peu complexe et nous voulions en faire un simple, où
                        n'importe quelle personne peut réserver un logement simplement </p>
                </div>
                <div class="pageDroite col-xs-12 col-sm-6 col-md-6 col-lg-4 col-lg-offset-1">
                    <h2> Le but pédagogique </h2>

                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus magna, sit amet
                        viverra lorem. Integer eget diam ut urna placerat blandit. Vivamus vitae metus accumsan,
                        venenatis ante in, luctus arcu. Sed et neque eget enim dictum pellentesque eu ac augue. In vitae
                        massa in eros pretium auctor ut quis purus. Phasellus sed enim sit amet dui gravida fringilla ac
                        vitae tortor. Fusce aliquam orci lacus, at lacinia nisl interdum sed. Pellentesque velit elit,
                        placerat sed elementum eget, semper at odio. </p>
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