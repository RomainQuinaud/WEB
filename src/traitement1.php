<?php
include 'BDD_connect.php';

if ($_POST['info'] == 'camping') {

    $updatecamping = $pdo->prepare("UPDATE camping SET nomcamping=:nomcamping, villecamping=:villecamping, adressecamping=:adressecamping, departementcamping=:departementcamping
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
    $statement->bindParam(':numreservation', $_GET['numreservation']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Mise à jour Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Mise à jour Échouée:" . $error . "") . '');
}
if ($_POST['info'] == 'prixperiode') {
    $updateprixperiode = $pdo->prepare("UPDATE prix_periode SET ajout=:ajout WHERE mois=:mois ");
    $updateprixperiode->bindParam(':mois', $_POST['mois']);
    $updateprixperiode->bindParam(':ajout', $_POST['ajout']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Mise à jour Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Mise à jour Échouée:" . $error . "") . '');
}

if ($_POST['info'] == 'logement') {
    $updatelogement = $pdo->prepare("   UPDATE logement
                                        SET idcategorie=:idcategorie,nomlogement=:nomlogement,idcamping=:idcamping,image=:image
                                        WHERE idlogement=:idlogement");
    $updatelogement->bindParam(':idlogement', $_POST['idlogement']);
    $updatelogement->bindParam(':idcategorie', $_POST['idcategorie']);
    $updatelogement->bindParam(':nomlogement', $_POST['nomlogement']);
    $updatelogement->bindParam(':idcamping', $_POST['idcamping']);
    $updatelogement->bindParam(':image', $_POST['image']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Mise à jour Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Mise à jour Échouée:" . $error . "") . '');
}

if ($_POST['info'] == 'utilisateur') {
    $updateutilisateur = $pdo->prepare("  update utilisateur
                                        set loginutilisateur=:loginutilisateur,nomutilisateur=:nomutilisateur,prenomutilisateur=:prenomutilisateur,telephoneutilisateur=:telephoneutilisateur,mailutilisateur=:mailutilisateur,departementutilisateur=:departementutilisateur, admin=:admin
                                        where idutilisateur=:idutilisateur");
    $updateutilisateur->bindparam(':loginutilisateur', $_POST['loginutilisateur']);
    $updateutilisateur->bindParam(':idutilisateur', $_POST['idutilisateur']);
    $updateutilisateur->bindParam(':nomutilisateur', $_POST['nomutilisateur']);
    $updateutilisateur->bindParam(':prenomutilisateur', $_POST['prenomutilisateur']);
    $updateutilisateur->bindParam(':telephoneutilisateur', $_POST['telephoneutilisateur']);
    $updateutilisateur->bindParam(':mailutilisateur', $_POST['mailutilisateur']);
    $updateutilisateur->bindParam(':departementutilisateur', $_POST['departementutilisateur']);
    $updateutilisateur->bindParam(':admin', $_POST['admin']);
    $error = "";
    try {
        $state = $statement->execute();
    } catch (PDOException $Exception) {

        $error = '<br>' . $Exception->getMessage();

    }
    if ($state)
        header('Location: administration.php?success=' . urlencode("Mise à jour Réussie") . '');
    else
        header('Location: administration.php?error=' . urlencode("Mise à jour Échouée:" . $error . "") . '');
}