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
    $insertcamping->execute();
}

if ($_POST['info'] == 'categorie') {


    $insertcategorie = $pdo->prepare("INSERT INTO categorie(libellecategorie,prixcategorie)
VALUES(:libellecategorie,:prixcategorie)");
    $insertcategorie->bindParam(':libellecategorie', $_POST['libellecategorie']);
    $insertcategorie->bindParam(':prixcategorie', $_POST['prixcategorie']);
    $insertcategorie->execute();

    $insertlogement = $pdo->prepare("INSERT INTO logement(nomcategorie,nomlogement,idcamping,image)
VALUES(:nomcategorie,:nomlogement,:idcamping,:image)");
}


if ($_POST['info'] == 'logement') {
    $insertlogement->bindParam(':nomcategorie', $_POST['nomcategorie']);
    $insertlogement->bindParam(':nomlogement', $_POST['nomlogement']);
    $insertlogement->bindParam(':idcamping', $_POST['idcamping']);
    $insertlogement->bindParam(':image', $_POST['image']);
    $insertlogement->execute();

    $insertprixperiode = $pdo->prepare("INSERT INTO prix_periode(mois,ajout)
VALUES(:mois,:ajout");
    $insertprixperiode->bindParam(':mois', $_POST['mois']);
    $insertprixperiode->bindParam(':ajout', $_POST['ajout']);
    $insertprixperiode->execute();
}

if ($_POST['info'] == 'reservation') {
    $insertreservation = $pdo->prepare("INSERT INTO reservation(idUTILISATEUR,idlogement,datereservation,datedebut,datefin)
VALUES(:idUTILISATEUR,:idlogement,:datereservation,:datedebut,:datefin");
    $insertreservation->bindParam(':idUTILISATEUR', $_POST['idUTILISATEUR']);
    $insertreservation->bindParam(':idlogement', $_POST['idlogement']);
    $insertreservation->bindParam(':datereservation', $_POST['datereservation']);
    $insertreservation->bindParam(':datedebut', $_POST['datedebut']);
    $insertreservation->bindParam(':datefin', $_POST['datefin']);
    $insertreservation->execute();
}

if ($_POST['info'] == 'utilisateur') {
    $insertutilisateur = $pdo->prepare("INSERT INTO utilisateur(loginUTILISATEUR,nomUTILISATEUR,prenomUTILISATEUR,telephoneUTILISATEUR,mailUTILISATEUR,departementUTILISATEUR)
VALUES(:loginUTILISATEUR,:nomUTILISATEUR,:prenomUTILISATEUR,:telephoneUTILISATEUR,:mailUTILISATEUR,:departementUTILISATEUR");
    $insertutilisateur->bindParam(':loginUTILISATEUR', $_POST['loginUTILISATEUR']);
    $insertutilisateur->bindParam(':nomUTILISATEUR', $_POST['nomUTILISATEUR']);
    $insertutilisateur->bindParam(':prenomUTILISATEUR', $_POST['prenomUTILISATEUR']);
    $insertutilisateur->bindParam(':telephoneUTILISATEUR', $_POST['telephoneUTILISATEUR']);
    $insertutilisateur->bindParam(':mailUTILISATEUR', $_POST['mailUTILISATEUR']);
    $insertutilisateur->bindParam(':departementUTILISATEUR', $_POST['departementUTILISATEUR']);
    $insertutilisateur->execute();
}