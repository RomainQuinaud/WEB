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
            <h1 class="modal-header">Utilisateur</h1>
        </div>

        <div class="row">

            <form class="center-block"
                  method="POST" <?php if ($_GET['action'] == 'insert') echo 'action="traitement2.php"'; else if ($_GET['action'] == 'update') echo 'action="traitement1.php"'; ?>>


                <div class="form-group">
                    <label class="control-label"> Login </label>
                    <input type="text" maxlength="40" class="form-control" id="loginutilisateur" name="loginutilisateur"
                           value="<?php if (!empty($_GET['loginutilisateur'])) echo $_GET['loginutilisateur']; ?>"
                        >
                </div>
                <div class="form-group">
                    <label class="control-label"> Nom </label>
                    <input type="text" maxlength="60" class="form-control" id="nomutilisateur" name="nomutilisateur"
                           value="<?php if (!empty($_GET['nomutilisateur'])) echo $_GET['nomutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Prénom</label>
                    <input type="text" maxlength="60" class="form-control" id="prenomutilisateur"
                           name="prenomutilisateur"
                           value="<?php if (!empty($_GET['prenomutilisateur'])) echo $_GET['prenomutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Téléphone</label>
                    <input type="tel"
                           pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"
                           maxlength="20" class="form-control" id="telephoneutilisateur" name="telephoneutilisateur"
                           value="<?php if (!empty($_GET['telephoneutilisateur'])) echo $_GET['telephoneutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Mail</label>
                    <input type="email" maxlength="40" class="form-control" id="mailutilisateur" name="mailutilisateur"
                           value="<?php if (!empty($_GET['mailutilisateur'])) echo $_GET['mailutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Département</label>
                    <input type="text" maxlength="3" class="form-control" id="departementutilisateur"
                           name="departementutilisateur"
                           value="<?php if (!empty($_GET['departementutilisateur'])) echo $_GET['departementutilisateur']; ?>"
                        >
                </div>

                <div class="form-group">
                    <label class="control-label">Administrateur</label>
                    <select class="form-control" id="admin" name="admin">

                        <option
                            value="1">
                            Vrai
                        </option>
                        <option
                            value="0">
                            False
                        </option>

                    </select>
                </div>

                <input type="text" id="info" name="info" value="utilisateur" hidden>

                <input type="text" id="idutilisateur" name="idutilisateur"
                       value="<?php if (!empty($_GET['idutilisateur'])) echo $_GET['idutilisateur']; ?>" hidden>

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