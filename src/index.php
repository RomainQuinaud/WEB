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

    <title>Camp'Find</title>

    <!-- Bootstrap core CSS -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="../css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>
<!--
  <div class="navbar navbar-inverse navbar-fixed-top">

      <div class="container">

          <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                  <span class="sr-only">Toggle navigation</span>

                  <span class="icon-bar"></span>

                  <span class="icon-bar"></span>

                  <span class="icon-bar"></span>

              </button>

              <a class="navbar-brand" href="infos.php">Camping Paradis</a>

          </div>


          <div id="navbar" class="collapse navbar-collapse">

              <ul class="nav navbar-nav">

                  <li class="active"><a href="index.php">Accueil</a></li>

                  <li><a href="reservation.php">Réservation</a></li>

              </ul>

              <ul class="nav navbar-nav navbar-right">

                  <li><a href="deco.php">Déconnexion</a></li>

              </ul>

          </div><!--/.nav-collapse -->
<!--
      </div>

  </div>
-->
<?php
include_once 'menu.php';
menu("index.php");
?>
    
    <div class="container">

      <div class="starter-template">

        <h1>I Camp' Find !</h1>

        <h1>Bienvenue au Camping Paradis</h1>

        <p class="lead">La réservation d'un logement n'a jamais été aussi simple<br><a href="inscription.php">Inscrivez-vous</a> ou <a href="connexion.php">connectez-vous</a> pour réserver un logement</p>

  <div class="row">
        <div class="col-sm-9 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-titre">Proposition</h2>
                <p>Exemple random de logment. Fichier image avec prix.</p>
        </div>
        <div class="blog-post">
          <h2>Devenu Inutile de faire 2 paragraphes?</h2>
                <p>Le mieux c'est de se faire une liste d'image renvoyant aux annnoces non?<br>BLA... BLA...<br>BLA... BLA...</p>
          </div>
      </div>
        <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
              <div class="sidebar-module">
                  <h2>Notifications</h2>
                    <p>Emplacement du futur emplacement des notifications lié réservation.</p>
              </div>
          </div>
      </div>




    <footer class="row">
        <div class="col-lg-12">
          Pied de page
        </div>
    </footer> 



  </div></div>

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