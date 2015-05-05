<?php
include 'BDD_connect.php';

if ($_POST['info'] == 'camping') {

    $updatecamping = $pdo->prepare("    UPDATE camping
                                        SET nomcamping=:nomcamping, villecamping=:villecamping, adressecamping=:adressecamping, departementcamping=:departementcamping
                                        WHERE idcamping=:idcamping ");
    $updatecamping->bindParam(':idcamping', $_POST['idcamping']);
    $updatecamping->bindParam(':nomcamping', $_POST['nomcamping']);
    $updatecamping->bindParam(':villecamping', $_POST['villecamping']);
    $updatecamping->bindParam(':adressecamping', $_POST['adressecamping']);
    $updatecamping->bindParam(':departementcamping', $_POST['departementcamping']);
    $updatecamping->execute();
}

if ($_POST['info'] == 'categorie') {


    $updatecategorie = $pdo->prepare("  UPDATE categorie
                                        SET libellecategorie=:libellecategorie, prixcategorie=:prixcategorie
                                        WHERE idcategorie=:idcategorie");
    $updatecategorie->bindParam(':idcategorie', $_POST['idcategorie']);
    $updatecategorie->bindParam(':libellecategorie', $_POST['libellecategorie']);
    $updatecategorie->bindParam(':prixcategorie', $_POST['prixcategorie']);
    $updatecategorie->execute();
}


if ($_POST['info'] == 'logement') {
    $updatelogement = $pdo->prepare("   UPDATE logement
                                        SET nomcategorie=:nomcategorie,nomlogement=:nomlogement,idcamping=:idcamping,image=:image
                                        WHERE idlogement=:idlogement");
    $updatelogement->bindParam(':idlogement', $_POST['idlogement']);
    $updatelogement->bindParam(':nomcategorie', $_POST['nomcategorie']);
    $updatelogement->bindParam(':nomlogement', $_POST['nomlogement']);
    $updatelogement->bindParam(':idcamping', $_POST['idcamping']);
    $updatelogement->bindParam(':image', $_POST['image']);
    $updatelogement->execute();
}

if ($_POST['info'] == 'utilisateur') {
    $updateutilisateur = $pdo->prepare("  UPDATE utilisateur
                                        SET loginUTILISATEUR=:loginUTILISATEUR,nomUTILISATEUR=:nomUTILISATEUR,prenomUTILISATEUR=:prenomUTILISATEUR,telephoneUTILISATEUR=:telephoneUTILISATEUR,mailUTILISATEUR=:mailUTILISATEUR,departementUTILISATEUR=:departementUTILISATEUR");
    $updateutilisateur->bindParam(':loginUTILISATEUR', $_GET['loginUTILISATEUR']);
    $updateutilisateur->bindParam(':nomUTILISATEUR', $_GET['nomUTILISATEUR']);
    $updateutilisateur->bindParam(':prenomUTILISATEUR', $_GET['prenomUTILISATEUR']);
    $updateutilisateur->bindParam(':telephoneUTILISATEUR', $_GET['telephoneUTILISATEUR']);
    $updateutilisateur->bindParam(':mailUTILISATEUR', $_GET['mailUTILISATEUR']);
    $updateutilisateur->bindParam(':departementUTILISATEUR', $_GET['departementUTILISATEUR']);
    $updateutilisateur->execute();
}