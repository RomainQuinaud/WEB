<!DOCTYPE html>

<html lang="fr">

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">

  <meta name="author" content="">

  <link rel="icon" href="../img/photo-justice.ico">

  <title>Camping Paradis</title>

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

                <li><a href="index.php">Accueil</a></li>

                <li class="active"><a href="reservation.php">Réservation</a></li>

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
menu("reservation.php");
?>

  <div class="container">

    <div class="starter-template">
      <h1>Recherche</h1>
      <p>
        <label>Que désirez-vous recherchez?</label>
      </br>
      <input type="radio" name="type_recherche" value="loi" id="loi" /> <!--checked="checked"--> <label for="oui">Une Loi</label></br>
      <input type="radio" name="type_recherche" value="cabinet" id="cabinet" /> <label for="non">Un Cabinet</label>
    </p>
    </div>
    <div class="starter-template">
      <label>Recherche par Thématique : </label>
      <select name="thématique">
        <option value="enfance" >Droit de l'enfance</option>
        <option value="travail" >Droit du travail</option>
        <option value="prostitution" >Droit lié à la prostitution</option>
      </select>
      <label>Recherche par Date de Publication</label>
      <select name="mois">
        <option value="janvier" >Janvier</option>
        <option value="fevrier" >Février</option>
        <option value="mars" >Mars</option>
        <option value="avril">Avril</option>
        <option value="mai">Mai</option>
        <option value="juin">Juin</option>
        <option value="juillet">Juillet</option>
        <option value="août">Août</option>
        <option value="septembre">Septembre</option>
        <option value="octobre">Octobre</option>
        <option value="novembre">Novembre</option>
        <option value="décembre">Décembre</option>
      </select>
      <select name="annee">
        <?php 
        for($i=1980;$i<2016;$i++) {
          echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
      </select>
      <div class="col-lg-12">
        <form>
          <div class="form-group">
            <label for="Departement">Rechercher par département</label>
            <select name="Departement" >
              <?php 
              for($i=1;$i<=19;$i++)
              { 
                echo '<OPTION value="'.$i.'"">'.$i.'</OPTION>';
              }
              ?>

              <option> 2A </option>
              <option>2B</option>

              <?php 
              for($i=21;$i<=95;$i++)
              { 
                echo '<OPTION value="'.$i.'"">'.$i.'</OPTION>';
              }
              ?>

              <?php 
              for($i=971;$i<=976;$i++)
              { 
                echo '<OPTION value="'.$i.'"">'.$i.'</OPTION>';
              }
              ?>
            </select>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>