<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');


include 'BDD_connect.php';
$catalogueStatements = $pdo->prepare("
                SELECT nomlogement,libellecategorie,prixcategorie
                FROM logement NATURAL JOIN categorie");
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

            <div class="jumbotron">
                <p>

                    Pandente itaque viam fatorum sorte tristissima, qua praestitutum erat eum vita et imperio spoliari,
                    itineribus interiectis permutatione iumentorum emensis venit Petobionem oppidum Noricorum, ubi
                    reseratae sunt insidiarum latebrae omnes, et Barbatio repente apparuit comes, qui sub eo domesticis
                    praefuit, cum Apodemio agente in rebus milites ducens, quos beneficiis suis oppigneratos elegerat
                    imperator certus nec praemiis nec miseratione ulla posse deflecti.
                </p>
            <div class="row">

                <h2></h2>

                <div class="pageGauche col-xs-12 col-sm-6 col-md-6 col-lg-5 col-lg-offset-1">
                    <p> IMAGE </p>
                </div>
                <div class="pageDroite col-xs-12 col-sm-6 col-md-6 col-lg-4 col-lg-offset-1">
                    <?php if ($catalogueStatements->rowCount() == 0) {
                        ?>
                        <p> Le catalogue est actuellement indisponible. </p>
                    <?php
                    } else {
                        while ($catalogue = $catalogueStatements->fetch()) {
                            for ($i = 0; $i < 3; $i++)
                                echo $catalogue[$i] . '<br>';

                            echo '<br>';
                        }
                    }
                    ?>
                </div>

            </div>

        </div>
                </thead>
                <tbody>
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
