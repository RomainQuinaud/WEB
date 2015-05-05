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


}


if ($_POST['info'] == 'logement') {
    $insertlogement = $pdo->prepare("INSERT INTO logement(nomcategorie,nomlogement,idcamping,image)
VALUES(:nomcategorie,:nomlogement,:idcamping,:image)");
    $insertlogement->bindParam(':nomcategorie', $_POST['nomcategorie']);
    $insertlogement->bindParam(':nomlogement', $_POST['nomlogement']);
    $insertlogement->bindParam(':idcamping', $_POST['idcamping']);
    $insertlogement->bindParam(':image', $_POST['image']);
    $insertlogement->execute();
}

if ($_POST['info'] == 'prixperiode') {
    $insertprixperiode = $pdo->prepare("INSERT INTO prix_periode(mois,ajout)
VALUES(:mois,:ajout)");
    $insertprixperiode->bindParam(':mois', $_POST['mois']);
    $insertprixperiode->bindParam(':ajout', $_POST['ajout']);
    $insertprixperiode->execute();
}


if ($_POST['info'] == 'utilisateur') {
    $insertutilisateur = $pdo->prepare("INSERT INTO utilisateur(loginUTILISATEUR,nomUTILISATEUR,prenomUTILISATEUR,telephoneUTILISATEUR,mailUTILISATEUR,departementUTILISATEUR)
VALUES(:loginUTILISATEUR,:nomUTILISATEUR,:prenomUTILISATEUR,:telephoneUTILISATEUR,:mailUTILISATEUR,:departementUTILISATEUR)");
    $insertutilisateur->bindParam(':loginUTILISATEUR', $_POST['loginutilisateur']);
    $insertutilisateur->bindParam(':nomUTILISATEUR', $_POST['nomutilisateur']);
    $insertutilisateur->bindParam(':prenomUTILISATEUR', $_POST['prenomutilisateur']);
    $insertutilisateur->bindParam(':telephoneUTILISATEUR', $_POST['telephoneutilisateur']);
    $insertutilisateur->bindParam(':mailUTILISATEUR', $_POST['mailutilisateur']);
    $insertutilisateur->bindParam(':departementUTILISATEUR', $_POST['departementutilisateur']);
    $insertutilisateur->execute();
}