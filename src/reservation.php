<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');


include 'BDD_connect.php';
$reservationStatements = $pdo->prepare("
                SELECT datedebut,datefin,nomlogement,libellecategorie,nomcamping, villecamping,adressecamping,departementcamping
                from utilisateur natural join reservation natural join logement natural join categorie natural join camping where loginUtilisateur=:login ");
$reservationStatements->bindParam(':login', $_SESSION['login']);
$reservationStatements->execute();
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
    <title>Camping Paradis</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/starter-template.css" rel="stylesheet">
</head>

<body>

<?php
include_once 'menu.php';
menu("reservation.php");
?>

<div class="container">

    <div class="starter-template">
        <h1 class="modal-header">Réservation en ligne</h1>

        <h2 class="text-center">Vos Réservations</h2>



        <?php if ($reservationStatements->rowCount() == 0) {
            ?> <p> Pas de réservations en cours</p>
        <?php
        } else {
            ?>
            <div class="left">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Nom du logement</th>
                        <th>Type de logement</th>
                        <th>Nom du Camping</th>
                        <th>Ville</th>
                        <th>Adresse</th>
                        <th>Département</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($reservation = $reservationStatements->fetch()) {
                        ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 8; $i++)
                                echo '<td>' . $reservation[$i] . '</td>';
                            /*foreach ($reservation as &$liste) {
                                echo '<td>' . $liste . '</td>';
                            }*/
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>

                </table>

            </div>
        <?php
        }
        ?>






    </div>
</div>
</body>
</html>