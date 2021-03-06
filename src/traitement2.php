<?php
/**
 * Created by PhpStorm.
 * User: Romain QUINAUD
 * Date: 05/05/2015
 * Time: 01:35
 */
include 'BDD_connect.php';

if ($_POST['info'] == 'camping') {

    $insertcamping = $pdo->prepare("INSERT INTO camping(nomcamping, villecamping, adressecamping, departementcamping)
VALUES(:nomcamping, :villecamping, :adressecamping, :departementcamping)");
    $insertcamping->bindParam(':nomcamping', $_POST['nomcamping']);
    $insertcamping->bindParam(':villecamping', $_POST['villecamping']);
    $insertcamping->bindParam(':adressecamping', $_POST['adressecamping']);
    $insertcamping->bindParam(':departementcamping', $_POST['departementcamping']);
    $error = "";
    try {
        $state = $insertcamping->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Insertion Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Insertion Échouée:" . $error . "") . '');
}

if ($_POST['info'] == 'categorie') {


    $insertcategorie = $pdo->prepare("INSERT INTO categorie(libellecategorie,prixcategorie)
VALUES(:libellecategorie,:prixcategorie)");
    $insertcategorie->bindParam(':libellecategorie', $_POST['libellecategorie']);
    $insertcategorie->bindParam(':prixcategorie', $_POST['prixcategorie']);
    $error = "";
    try {
        $state = $insertcategorie->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Insertion Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Insertion Échouée:" . $error . "") . '');
}


if ($_POST['info'] == 'logement') {
    $insertlogement = $pdo->prepare("INSERT INTO logement(idcategorie,nomlogement,idcamping,image)
VALUES(:idcategorie,:nomlogement,:idcamping,:image)");
    $insertlogement->bindParam(':idcategorie', $_POST['nomcategorie']);
    $insertlogement->bindParam(':nomlogement', $_POST['nomlogement']);
    $insertlogement->bindParam(':idcamping', $_POST['idcamping']);
    $insertlogement->bindParam(':image', $_POST['image']);
    $error = "";
    try {
        $state = $insertlogement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Insertion Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Insertion Échouée:" . $error . "") . '');
}

if ($_POST['info'] == 'prixperiode') {
    $insertprixperiode = $pdo->prepare("INSERT INTO prix_periode(mois,ajout)
VALUES(:mois,:ajout)");
    $insertprixperiode->bindParam(':mois', $_POST['mois']);
    $insertprixperiode->bindParam(':ajout', $_POST['ajout']);
    $error = "";
    try {
        $state = $insertprixperiode->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Insertion Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Insertion Échouée:" . $error . "") . '');
}


if ($_POST['info'] == 'utilisateur') {
    $insertutilisateur = $pdo->prepare("INSERT INTO utilisateur(loginUTILISATEUR,nomUTILISATEUR,prenomUTILISATEUR,telephoneUTILISATEUR,mailUTILISATEUR,departementUTILISATEUR,admin)
VALUES(:loginUTILISATEUR,:nomUTILISATEUR,:prenomUTILISATEUR,:telephoneUTILISATEUR,:mailUTILISATEUR,:departementUTILISATEUR,:admin)");
    $insertutilisateur->bindParam(':loginUTILISATEUR', $_POST['loginutilisateur']);
    $insertutilisateur->bindParam(':nomUTILISATEUR', $_POST['nomutilisateur']);
    $insertutilisateur->bindParam(':prenomUTILISATEUR', $_POST['prenomutilisateur']);
    $insertutilisateur->bindParam(':telephoneUTILISATEUR', $_POST['telephoneutilisateur']);
    $insertutilisateur->bindParam(':mailUTILISATEUR', $_POST['mailutilisateur']);
    $insertutilisateur->bindParam(':departementUTILISATEUR', $_POST['departementutilisateur']);
    $insertutilisateur->bindParam(':admin', $_POST['admin']);
    try {
        $state = $insertutilisateur->execute();

    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

        if ($state)
            header('Location: administration.php?success=' . urlencode("Insertion Réussie") . '');
        else
            header('Location: administration.php?error=' . urlencode("Insertion Échouée:" . $error . "") . '');

    }
}