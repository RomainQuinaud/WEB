<?php

session_start();
if(isset($_SESSION['login']))
    header('Location: index.php');
?>


<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/camping.ico">

    <title>Hellaw's</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/signin-template.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-
    <!--[warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media
    <!-- queries -->
    <!--[if lt IE 9]>
      <script
      <src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script
      <src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="starter-template">
        <h1>Camping Paradis</h1>
        <p class="lead"> Les vacances en quelques clics
        <br><br> Connectez vous pour accéder à la réservation en ligne du Camping Paradis</p>



        <form class="center-block" method="POST" action="WEB_connect.php">
          
          <div class="form-group">
              <img id="img-justice" class="profile-img-card" src="../img/camping.png" />
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>

          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
          </div>

            <?php
            if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                echo '<div class="text-danger">';
                foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                    echo $msg.'<br>';
                }
                echo '</div><br/>';
                unset($_SESSION['ERRMSG_ARR']);
            }

            ?>

          <div class="form-group">
            <button type="submit" class="btn btn-default">Connexion</button>
          </div>

          <div class="form-group">
            Vous n'êtes toujours pas inscrit ? <a href="inscription.php"> Inscrivez-vous</a>
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




  </body>

</html>