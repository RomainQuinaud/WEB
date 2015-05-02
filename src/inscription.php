<?php

session_start();
if(isset($_SESSION['login']))
    header('Location: index.php');
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
    <link href="../css/signin-template.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/datepicker.css">


</head>

<body>


<div class="container">

    <div class="starter-template">
        <h1>CampFind</h1>

        <p class="lead"> Les vacances en quelques clics
            <br><br> Merci de remplir le formulaire suivant pour vous inscrire et accéder à la réservation en ligne du
            CampFind</p>


        <form class="center-block" method="POST" action="registration.php">

            <div class="form-group">
                <img id="img-justice" class="profile-img-card" src="../img/camping.png"/>
            </div>


            <div class="form-group">
                <input type="text" maxlength="40" class="form-control" id="login" name="login" placeholder="Login">
                <?php
                if (isset($_SESSION['ERR_LOGIN']) && is_string($_SESSION['ERR_LOGIN'])) {
                    echo '<span class="text-danger">' . $_SESSION['ERR_LOGIN'] . '</span>';
                    unset($_SESSION['ERR_LOGIN']);
                } ?>
            </div>


            <div class="form-group">
                <input type="email" maxlength="40" class="form-control" id="email" name="email" placeholder="Email">
                <?php
                if (isset($_SESSION['ERR_MAIL']) && is_string($_SESSION['ERR_MAIL'])) {

                    echo '<span class="text-danger">' . $_SESSION['ERR_MAIL'] . '</span>';
                    unset($_SESSION['ERR_MAIL']);
                } ?>
            </div>


            <div class="form-group">
                <input type="text" maxlength="60" class="form-control" id="nom" name="nom" placeholder="Nom">
                <?php
                if (isset($_SESSION['ERR_NOM']) && is_string($_SESSION['ERR_NOM'])) {
                    echo '<span class="text-danger">' . $_SESSION['ERR_NOM'] . '</span>';
                    unset($_SESSION['ERR_NOM']);
                } ?>
            </div>

            <div class="form-group">
                <input type="text" maxlength="60" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                <?php
                if (isset($_SESSION['ERR_PRENOM']) && is_string($_SESSION['ERR_PRENOM'])) {
                    echo '<span class="text-danger">' . $_SESSION['ERR_PRENOM'] . '</span>';
                    unset($_SESSION['ERR_PRENOM']);
                } ?>
            </div>

            <div class="form-group">
                <input type="tel"
                       pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"
                       class="form-control" maxlength="20" id="telephone" name="telephone" placeholder="Téléphone">
                <?php
                if (isset($_SESSION['ERR_TELEPHONE']) && is_string($_SESSION['ERR_TELEPHONE'])) {
                    echo '<span class="text-danger">' . $_SESSION['ERR_TELEPHONE'] . '</span>';
                    unset($_SESSION['ERR_TELEPHONE']);
                } ?>
            </div>

            <div class="form-group">
                <input type="text" maxlength="3" class="form-control" id="departement" name="departement"
                       placeholder="Département">
                <?php
                if (isset($_SESSION['ERR_DPT']) && is_string($_SESSION['ERR_DPT'])) {
                    echo '<span class="text-danger">' . $_SESSION['ERR_DPT'] . '</span>';
                    unset($_SESSION['ERR_DPT']);
                } ?>
            </div>

            <div class="form-group">
                <input type="password" maxlength="100" class="form-control" id="password" name="password"
                       placeholder="Mot de Passe">
                <?php
                if (isset($_SESSION['ERR_MDP']) && is_string($_SESSION['ERR_MDP'])) {
                    echo '<span class="text-danger">' . $_SESSION['ERR_MDP'] . '</span>';
                    unset($_SESSION['ERR_MDP']);
                } ?>
            </div>

            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control" name="start"/>
                <span class="input-group-addon">to</span>
                <input type="text" class="input-sm form-control" name="end"/>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-default">Inscription</button>
            </div>

            <div class="form-group">
                Vous possédez déjà un compte? <a href="connexion.php"> Connectez-vous</a>
            </div>

        </form>


    </div>


    <footer class="footer">

        <p>
            © Projet Web - DUT Informatique <br> IUT d'Orsay
        </p>

    </footer>


</div><!-- /.container -->

<!-- Bootstrap core JavaScript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../../../../../Users/Romain%20QUINAUD/Desktop/save/Projet/bootstrap/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="../js/jquery-1.9.1.min.js"></script>
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