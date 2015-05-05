utilisateur<?php
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
            <h1 class="modal-header">Utilisateur</h1>
        </div>

        <div class="row">

            <form class="center-block"
                  method="POST" <?php if ($_GET['action'] == 'insert') echo 'action="traitement2.php"'; else if ($_GET['action'] == 'update') echo 'action="traitement1.php"'; ?>>

                <div class="form-group">
                    <label class="control-label"> Nom </label>
                    <input type="text" class="form-control" id="nomutilisateur" name="nomutilisateur"
                           value="<?php if (!empty($_GET['nomutilisateur'])) echo $_GET['nomutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Prénom</label>
                    <input type="text" class="form-control" id="prenomutilisateur" name="prenomutilisateur"
                           value="<?php if (!empty($_GET['prenomutilisateur'])) echo $_GET['prenomutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Téléphone</label>
                    <input type="text" class="form-control" id="telephoneutilisateur" name="telephoneutilisateur"
                           value="<?php if (!empty($_GET['telephoneutilisateur'])) echo $_GET['telephoneutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Mail</label>
                    <input type="text" class="form-control" id="mailutilisateur" name="mailutilisateur"
                           value="<?php if (!empty($_GET['mailutilisateur'])) echo $_GET['mailutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Département</label>
                    <input type="text" class="form-control" id="departementutilisateur" name="departementutilisateur"
                           value="<?php if (!empty($_GET['departementutilisateur'])) echo $_GET['departementutilisateur']; ?>"
                        >
                </div>

                <input type="text" id="info" name="info" value="utilisateur" hidden>

                <?php if ($_GET['action'] == 'insert') { ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Insertion</button>
                    </div>
                <?php
                } else if ($_GET['action'] == 'update') { ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Mise à jour</button>
                    </div>
                <?php
                }
                ?>
            </form>

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
</div>
</body>

</html>