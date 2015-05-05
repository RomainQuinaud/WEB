<?php
/**
 * Created by PhpStorm.
 * User: Romain QUINAUD
 * Date: 04/05/2015
 * Time: 22:17
 */
include 'BDD_connect.php';

if ($_GET['action'] == 'delete' and $_GET['table'] == 'camping') {

    $sql = "DELETE FROM camping WHERE idcamping=:idcamping";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':idcamping', $_GET['idcamping']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Suppression Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Suppression Échouée:" . $error . "") . '');
}

if ($_GET['action'] == 'delete' and $_GET['table'] == 'categorie') {

    $sql = "DELETE FROM categorie WHERE idcategorie=:idcategorie";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':idcategorie', $_GET['idcategorie']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Suppression Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Suppression Échouée:" . $error . "") . '');
}


if ($_GET['action'] == 'delete' and $_GET['table'] == 'logement') {

    $sql = "DELETE FROM logement WHERE idlogement=:idlogement";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':idlogement', $_GET['idlogement']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Suppression Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Suppression Échouée:" . $error . "") . '');
}


if ($_GET['action'] == 'delete' and $_GET['table'] == 'prixperiode') {

    $sql = "DELETE FROM PRIX_PERIODE WHERE mois=:mois";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':mois', $_GET['mois']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Suppression Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Suppression Échouée:" . $error . "") . '');
}
if ($_GET['action'] == 'delete' and $_GET['table'] == 'reservation') {

    $sql = "DELETE FROM reservation WHERE numreservation=:numreservation";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':numreservation', $_GET['numreservation']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Suppression Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Suppression Échouée:" . $error . "") . '');
}
if ($_GET['action'] == 'delete' and $_GET['table'] == 'utilisateur') {

    $sql = "DELETE FROM utilisateur WHERE idUTILISATEUR=:idutilisateur";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':idutilisateur', $_GET['idutilisateur']);
    $error = "";
    try {
        if ($_GET['admin'] == 0)
        $state = $statement->execute();
        else {
            $error = " impossible de supprimer l'administrateur";
            $state = false;
        }
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Suppression Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Suppression Échouée:" . $error . "") . '');


}





