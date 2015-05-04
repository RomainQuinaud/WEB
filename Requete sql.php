<td class="table_icon">

    <a href="#">
        <button class="btn btn-default" title="Editer le camping" type="button">
            <span class="glyphicon glyphicon-eye-open">
            </span>
        </button>
    </a>

</td>

<?php
$insertcamping=$pdo->prepare("INSERT INTO camping(nomcamping, villecamping, adressecamping, departementcamping)
VALUES(:nomcamping, :villecamping, :adressecamping, :departementcamping)");
$insertcamping->bindParam(':nomcamping', $_GET['nomcamping']);
$insertcamping->bindParam(':villecamping', $_GET['villecamping']);
$insertcamping->bindParam(':adressecamping', $_GET['adressecamping']);
$insertcamping->bindParam(':departementcamping', $_GET['departementcamping']);
$insertcamping->execute();

$insertcategorie=$pdo->prepare("INSERT INTO categorie(libellecategorie,prixcategorie)
VALUES(:libellecategorie,:prixcategorie)");
$insertcategorie->bindParam(':libellecategorie', $_GET['libellecategorie']);
$insertcategorie->bindParam(':prixcategorie', $_GET['prixcategorie']);
$insertcategorie->execute();

$insertlogement=$pdo->prepare("INSERT INTO logement(nomcategorie,nomlogement,idcamping,image)
VALUES(:nomcategorie,:nomlogement,:idcamping,:image)");


$insertlogement->bindParam(':nomcategorie', $_GET['nomcategorie']);
$insertlogement->bindParam(':nomlogement', $_GET['nomlogement']);
$insertlogement->bindParam(':idcamping', $_GET['idcamping']);
$insertlogement->bindParam(':image', $_GET['image']);
$insertlogement->execute();

$insertprixperiode=$pdo->prepare("INSERT INTO prix_periode(mois,ajout)
VALUES(:mois,:ajout");
$insertprixperiode->bindParam(':mois', $_GET['mois']);
$insertprixperiode->bindParam(':ajout', $_GET['ajout']);
$insertprixperiode->execute();

$insertreservation=$pdo->prepare("INSERT INTO reservation(idUTILISATEUR,idlogement,datereservation,datedebut,datefin)
VALUES(:idUTILISATEUR,:idlogement,:datereservation,:datedebut,:datefin");
$insertreservation->bindParam(':idUTILISATEUR', $_GET['idUTILISATEUR']);
$insertreservation->bindParam(':idlogement', $_GET['idlogement']);
$insertreservation->bindParam(':datereservation', $_GET['datereservation']);
$insertreservation->bindParam(':datedebut', $_GET['datedebut']);
$insertreservation->bindParam(':datefin', $_GET['datefin']);
$insertreservation->execute();

$insertutilisateur=$pdo->prepare("INSERT INTO utilisateur(loginUTILISATEUR,nomUTILISATEUR,prenomUTILISATEUR,telephoneUTILISATEUR,mailUTILISATEUR,departementUTILISATEUR)
VALUES(:loginUTILISATEUR,:nomUTILISATEUR,:prenomUTILISATEUR,:telephoneUTILISATEUR,:mailUTILISATEUR,:departementUTILISATEUR");
$insertutilisateur->bindParam(':loginUTILISATEUR', $_GET['loginUTILISATEUR']);
$insertutilisateur->bindParam(':nomUTILISATEUR', $_GET['nomUTILISATEUR']);
$insertutilisateur->bindParam(':prenomUTILISATEUR', $_GET['prenomUTILISATEUR']);
$insertutilisateur->bindParam(':telephoneUTILISATEUR', $_GET['telephoneUTILISATEUR']);
$insertutilisateur->bindParam(':mailUTILISATEUR', $_GET['mailUTILISATEUR']);
$insertutilisateur->bindParam(':departementUTILISATEUR', $_GET['departementUTILISATEUR']);
$insertutilisateur->execute();

************************************************************************************************************************************************************************
************************************************************************************************************************************************************************

$updatecamping = $pdo->prepare("    UPDATE camping
SET nomcamping=:nomcamping, villecamping=:villecamping, adressecamping=:adressecamping, departementcamping=:departementcamping
WHERE idcamping=:idcamping
");
$updatecamping->bindParam(':idcamping', $_GET['idcamping']);
$updatecamping->bindParam(':nomcamping', $_GET['nomcamping']);
$updatecamping->bindParam(':villecamping', $_GET['villecamping']);
$updatecamping->bindParam(':adressecamping', $_GET['adressecamping']);
$updatecamping->bindParam(':departementcamping', $_GET['departementcamping']);
$updatecamping->execute();

$updatecategorie = $pdo->prepare("    UPDATE categorie
SET libellecategorie=:libellecategorie, prixcategorie=:prixcategorie
WHERE idcategorie=:idcategorie
");
$updatecategorie->bindParam(':idcategorie', $_GET['idcategorie']);
$updatecategorie->bindParam(':libellecategorie', $_GET['libellecategorie']);
$updatecategorie->bindParam(':prixcategorie', $_GET['prixcategorie']);
$updatecategorie->execute();

$updatelogement = $pdo->prepare("    UPDATE logement
SET nomcategorie=:nomcategorie,nomlogement=:nomlogement,idcamping=:idcamping,image=:image
WHERE idlogement=:idlogement
");
$updatelogement->bindParam(':idlogement', $_GET['idlogement']);
$updatelogement->bindParam(':nomcategorie', $_GET['nomcategorie']);
$updatelogement->bindParam(':nomlogement', $_GET['nomlogement']);
$updatelogement->bindParam(':idcamping', $_GET['idcamping']);
$updatelogement->bindParam(':image', $_GET['image']);
$updatelogement->execute();

$updateprixperiode = $pdo->prepare("    UPDATE prix_periode
SET ajout=:ajout
WHERE mois=:mois
");
$updateprixperiode->bindParam(':mois', $_GET[':mois']);
$updateprixperiode->bindParam(':ajout', $_GET[':ajout']);
$updateprixperiode->execute();

$updatereservation = $pdo->prepare("    UPDATE reservation
SET idlogement=:idlogement,datereservation=:datereservation,datedebut=:datedebut=:,datefin=:datefin
WHERE idUTILISATEUR=:idUTILISATEUR
");
$updatereservation->bindParam(':idUTILISATEUR', $_GET['idUTILISATEUR']);
$updatereservation->bindParam(':idlogement', $_GET['idlogement']);
$updatereservation->bindParam(':datereservation', $_GET['datereservation']);
$updatereservation->bindParam(':datedebut', $_GET['datedebut']);
$updatereservation->bindParam(':datefin', $_GET['datefin']);
$updatereservation->execute();

$updateutilisateur=$pdo->prepare(" UPDATE utilisateur SET loginUTILISATEUR=:loginUTILISATEUR,nomUTILISATEUR=:nomUTILISATEUR,prenomUTILISATEUR=:prenomUTILISATEUR,telephoneUTILISATEUR=:telephoneUTILISATEUR,mailUTILISATEUR=:mailUTILISATEUR,departementUTILISATEUR=:departementUTILISATEUR
");
$updateutilisateur->bindParam(':loginUTILISATEUR', $_GET['loginUTILISATEUR']);
$updateutilisateur->bindParam(':nomUTILISATEUR', $_GET['nomUTILISATEUR']);
$updateutilisateur->bindParam(':prenomUTILISATEUR', $_GET['prenomUTILISATEUR']);
$updateutilisateur->bindParam(':telephoneUTILISATEUR', $_GET['telephoneUTILISATEUR']);
$updateutilisateur->bindParam(':mailUTILISATEUR', $_GET['mailUTILISATEUR']);
$updateutilisateur->bindParam(':departementUTILISATEUR', $_GET['departementUTILISATEUR']);
$updateutilisateur->execute();

***********************************************************************************************************************************************************************
***********************************************************************************************************************************************************************

$sql="DELETE FROM UTILISATEUR WHERE idutilisateur=:idutilisateur";
$statement=$pdo->prepare($sq);
$statement->bindParam(':idutilisateur', $_GET['idutilisateur']);
$statement->execute();

$sql="DELETE FROM RESERVATION WHERE numreservation=:numreservation";

$statement=$pdo->prepare($sq);
$statement->bindParam(':numreservation', $_GET['numreservation']);
$statement->execute();

$sql="DELETE FROM PRIX_PERIODE WHERE mois=:mois";

$statement=$pdo->prepare($sq);
$statement->bindParam(':mois', $_GET['mois']);
$statement->execute();

$sql="DELETE FROM pourcent_reduc WHERE idutilisateur=:idutilisateur";

$statement=$pdo->prepare($sq);
$statement->bindParam(':idutilisateur', $_GET['idutilisateur']);
$statement->execute();

$sql="DELETE FROM logement WHERE idlogement=:idlogement";

$statement=$pdo->prepare($sq);
$statement->bindParam(':idlogement', $_GET['idlogement']);
$statement->execute();

$sql="DELETE FROM categorie WHERE idcategorie=:idcategorie";

$statement=$pdo->prepare($sq);
$statement->bindParam(':idcategorie', $_GET['idcategorie']);
$statement->execute();

$sql="DELETE FROM camping WHERE idcamping=:idcamping";

$statement=$pdo->prepare($sq);
$statement->bindParam(':idcamping', $_GET['idcamping']);
$statement->execute();