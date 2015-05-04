Skip to content
This repository
Explore
Gist
Blog
Help
@philippealeixo philippealeixo

Unwatch 2
Star 0
Fork 1RomainQuinaud/WEB
tree: 7a68c74681  WEB/src/catalogue.php
@philippealeixophilippealeixo 8 hours ago Remplissage site
2 contributors @RomainQuinaud @philippealeixo
RawBlameHistory    313 lines (219 sloc)  12.55 kb
<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');
include 'BDD_connect.php';
$sql = "SELECT nomlogement,libellecategorie,prixcategorie,image
                FROM logement NATURAL JOIN categorie";
$catalogueStatements = $pdo->prepare($sql);
// affiche les case problématiques ( en concommittance avec les plages de reservation)
$queryDispo = "SELECT idlogement FROM logement NATURAL JOIN reservation WHERE :mondebut < :mafin and MOD(DATEDIFF(:mafin,:mondebut),7)=0
                                                     AND ((datedebut < :mondebut AND :mondebut < datefin ) OR (datedebut < :mafin AND :mafin < datefin)
                                                        OR (datedebut = :mondebut AND :mafin = datefin) OR (datedebut < :mafin and datedebut> :mondebut) or (datefin > :mondebut and datefin < :mafin))";
if (!empty($_GET['nomLogement']) && !empty($_GET['categorie']) && $_GET['categorie'] != "Tous" && !empty($_GET['startSearch']) && !empty($_GET['endSearch'])) {
    $sql .= " WHERE libellecategorie=:categorie and nomlogement LIKE :nomlogement and idlogement not in (" . $queryDispo . ")";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->execute(array(':categorie' => $_GET['categorie'], ':nomlogement' => '%' . $_GET['nomLogement'] . '%', ':mondebut' => $_GET['startSearch'], ':mafin' => $_GET['endSearch']));
} else if (!empty($_GET['nomLogement']) && !empty($_GET['categorie']) && $_GET['categorie'] != "Tous") {
    $sql .= " WHERE libellecategorie=:categorie and nomlogement LIKE :nomlogement";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->execute(array(':categorie' => $_GET['categorie'], ':nomlogement' => '%' . $_GET['nomLogement'] . '%'));
} else if (!empty($_GET['categorie']) && $_GET['categorie'] != "Tous" && !empty($_GET['startSearch']) && !empty($_GET['endSearch'])) {
    $sql .= " WHERE libellecategorie=:categorie and idlogement not in (" . $queryDispo . ")";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->execute(array(':categorie' => $_GET['categorie'], ':mondebut' => $_GET['startSearch'], ':mafin' => $_GET['endSearch']));
} else if (!empty($_GET['categorie']) && $_GET['categorie'] != "Tous") {
    $sql .= " WHERE libellecategorie=:categorie";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->execute(array(':categorie' => $_GET['categorie']));
} else if (!empty($_GET['nomLogement']) && !empty($_GET['startSearch']) && !empty($_GET['endSearch'])) {
    $sql .= " WHERE nomlogement LIKE :nomlogement and idlogement not in (" . $queryDispo . ")";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->execute(array(':nomlogement' => '%' . $_GET['nomLogement'] . '%', ':mondebut' => $_GET['startSearch'], ':mafin' => $_GET['endSearch']));
} else if (!empty($_GET['nomLogement'])) {
    $sql .= " WHERE nomlogement LIKE :nomlogement and idlogement";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->execute(array(':nomlogement' => '%' . $_GET['nomLogement'] . '%'));
} else if (!empty($_GET['startSearch']) && !empty($_GET['endSearch'])) {
    $sql .= " WHERE idlogement not in (" . $queryDispo . ")";
    $catalogueStatements = $pdo->prepare($sql);
    $catalogueStatements->bindParam(':mondebut', $_GET['startSearch']);
    $catalogueStatements->bindParam(':mafin', $_GET['endSearch']);
    $catalogueStatements->execute();
} else {
    $catalogueStatements->execute();
}
$categorie = $pdo->prepare("
SELECT libellecategorie
FROM categorie");
$categorie->execute();
if (!empty($_GET['startSearch']) && !empty($_GET['endSearch'])) {
    $datedebut = DateTime::createFromFormat("Y-m-d", $_GET['startSearch']);
    $datefin = DateTime::createFromFormat("Y-m-d", $_GET['endSearch']);
}
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

            <form class="form-inline" method="GET" action="catalogue.php">



                <div class="form-group">
                    <input type="text" maxlength="40" class="form-control" id="nomLogement" name="nomLogement"

                           placeholder="Nom du Logement" <?php if (!empty($_GET['nomLogement'])) echo "value=\"" . urldecode($_GET['nomLogement']) . "\""; ?>>

                </div>


                <div class="form-group">

                    <select class="form-control" id="categorie" name="categorie">

                        <option
                            value="Tous" <?php if (!empty($_GET['categorie']) && $_GET['categorie'] == "Tous") echo "selected"; ?> >
                            Tous
                        </option>
                        <?php while ($libelle = $categorie->fetch()) { ?>

                            <option
                                value="<?php echo $libelle[0] ?>" <?php if (!empty($_GET['categorie']) && $_GET['categorie'] == $libelle[0]) echo "selected"; ?> > <?php echo $libelle[0] ?> </option>

                        <?php } ?>

                    </select>
                </div>

                <div class="input-daterange input-group" id="datepicker">
                    <span class="input-group-addon">Du</span>
                    <input type="text" class="input-sm form-control"
                           name="startSearch" <?php if (!empty($_GET['startSearch'])) echo "value=" . $_GET['startSearch'] . ""; ?>>
                    <span class="input-group-addon">Au</span>
                    <input type="text" class="input-sm form-control"
                           name="endSearch" <?php if (!empty($_GET['endSearch'])) echo "value=" . $_GET['endSearch'] . ""; ?>>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Rechercher</button>
                </div>
                <div class="text-muted">Veuillez remplir ces champs pour connaitre la disponibilité des différents
                    logements du camping
                </div>

            </form>


            <div class="row">

                <?php

                if ($catalogueStatements->rowCount() == 0) {
                    ?>
                    <p> Le catalogue est actuellement indisponible. </p>

                <?php
                } else {
                    ?>

                    <div class="center-block">
                        <?php
                        while ($toto = $catalogueStatements->fetch()) { ?>


                            <div class="thumbnail">
                                <img class="imgCatalogue" src=" <?php echo $toto[3] ?> "
                                     alt="Photographie du logement <?php echo $toto[0] ?>">

                                <div class="caption">
                                    <h3><?php echo $toto[0] ?></h3>
                                    <?php
                                    echo $toto[1] . '<br>';

                                    if (!empty($_GET['startSearch']) && !empty($_GET['endSearch'])) {
                                        $i = date("Y-m-d", strtotime($_GET['startSearch']));
                                        $somme = 0;
                                        while ($i < date("Y-m-d", strtotime($_GET['endSearch']))) {
                                            $i = date("Y-m-d", strtotime('+1 days', strtotime($i)));

                                            $prixPeriodeStatements = $pdo->prepare("SELECT ajout FROM prix_periode WHERE mois= :mois");
                                            $month = (string)date("F", strtotime($i));
                                            $prixPeriodeStatements->bindParam(':mois', $month);

                                            $prixPeriodeStatements->execute();
                                            $ajout = $prixPeriodeStatements->fetch();
                                            $somme += $ajout[0];

                                    }
                                        echo ($toto[2] + $somme) . '<br>';
                                    } else
                                        echo 'A partir de ' . $toto[2] . 'Euros <br>';

                                    ?>

                                    <button onClick="reserver('<?php echo $toto[0] ?>')" class="btn btn-default "
                                            type="button" id="appearMenu">
                                        Réserver ce logement

                                    </button>
                                    <div class="hidden" id="resaMenu_<?php echo $toto[0] ?>">
                                        <form class="form-inline" id="date" method="POST"
                                              action="insert_reservation.php">


                                            <div class="form-group">
                                                <input type="text" id="logement" name="logement"
                                                       value="<?php echo $toto[0] ?>" class="hidden" readonly>
                                            </div>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <span class="input-group-addon">Du</span>
                                                <input type="text" class="input-sm form-control" name="start"/>
                                                <span class="input-group-addon">Au</span>
                                                <input type="text" class="input-sm form-control" name="end"/>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Réserver</button>
                                            </div>


                                        </form>
                                    </div>


                                </div>
                            </div>


                        <?php }
                        ?>
                    </div>
                <?php
                }
                ?>

            </div>


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
    function reserver(toto) {
        if (document.getElementById("resaMenu_" + toto).className.match("visible")) {
            document.getElementById("resaMenu_" + toto).className = ("hidden");
            document.getElementById("resaMenu_" + toto).setAttribute("style", "z-index:10;position:absolute;");
        }
        else if (document.getElementById("resaMenu_" + toto).className.match("hidden")) {
            document.getElementById("resaMenu_" + toto).className = ("visible");
            document.getElementById("resaMenu_" + toto).setAttribute("style", "z-index:10;position:absolute;");
        }
    }
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
            todayHighlight: true
        });
    });
</script>


</body>
</html>
Status API Training Shop Blog About
© 2015 GitHub, Inc. Terms Privacy Security Contact
