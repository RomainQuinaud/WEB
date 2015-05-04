<?php
session_start();
if (!isset($_SESSION['login']))
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
            <h1 class="modal-header">Insert Camping</h1>
        </div>

        <div class="row">

            <form class="center-block" method="POST" action=" ">

                <div class="form-group">
                    <label class="control-label"> Nom du Camping</label>
                    <input type="" class="form-control" id="idlogement" name="" placeholder="">
                </div>

                <div class="form-group">
                    <label class="control-label">Ville du Camping</label>
                    <input type="" class="form-control" id="idlogement" name="" placeholder="">
                </div>

                <div class="form-group">
                    <label class="control-label"> Adresse du Camping</label>
                    <input type="" class="form-control" id="idlogement" name="" placeholder="">
                </div>

                <div class="form-group">
                    <label class="control-label"> Departement du Camping</label>
                    <input type="" class="form-control" id="idlogement" name="" placeholder="">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <p class="text-muted credit"> © Projet Web - DUT Informatique < br> IUT d'Orsay</p>
    </div>
</div>
<!-- Bootstrap core JavaScript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</div>
</body>

</html>