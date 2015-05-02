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
            <h1 class="modal-header">Catalogue des logements</h1>

            <div class="jumbotron">
                <form class="center-block" method="POST" action="registration.php">

                    <div class="input-daterange input-group" id="datepicker">
                        <span class="input-group-addon">Du</span>
                        <input type="text" class="input-sm form-control" name="start"/>
                        <span class="input-group-addon">au</span>
                        <input type="text" class="input-sm form-control" name="end"/>
                    </div>


                </form>
        </div>
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


<script src="../js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {

        $('.input-daterange').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            clearBtn: true,
            language: "fr",
            forceParse: false,
            daysOfWeekDisabled: "0,1,2,3,4,5",
            autoclose: true,
            todayHighlight: true,
            datesDisabled: ['05/06/2015', '05/21/2015']
        });

    });
</script>
</body>
</html>
