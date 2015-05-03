<?php
session_start();

include 'BDD_connect.php';
/*
//Cette requete donne une liste de tous les logements
$logementStatements = $pdo->prepare("SELECT idlogement FROM logement where nomlogement=:logement");
$verifdateStatements->bindParam(':logement', $_POST['logement']);
$logementStatements->execute();
$idlogement=$logementStatements->fetch();
*/


//Cette requete donne tous les logements non reserve
$verifdateStatements = $pdo->prepare("SELECT * FROM logement NATURAL JOIN reservation WHERE nomlogement = :logement AND :mondebut < :mafin and MOD(DATEDIFF(:mafin,:mondebut),7)=0
                                                     AND ((datedebut < :mondebut AND :mondebut < datefin ) OR (datedebut < :mafin AND :mafin < datefin)
                                                        OR (datedebut = :mondebut AND :mafin = datefin))");
$verifdateStatements->bindParam(':mondebut', $_POST['start']);
$verifdateStatements->bindParam(':mafin', $_POST['end']);
$verifdateStatements->bindParam(':logement', $_POST['logement']);
$verifdateStatements->execute();

echo $verifdateStatements->rowCount();
if ($verifdateStatements->rowCount() == 0) {
    echo 'Disponible';
    $insert = $pdo->prepare("
            INSERT INTO reservation(idutilisateur,idlogement,datereservation,datedebut,datefin)
            VALUES (  (SELECT idutilisateur FROM utilisateur WHERE loginutilisateur=:login),
                      (SELECT idlogement FROM logement WHERE nomlogement=:logement),
                      CURRENT_TIMESTAMP,
                      :mondebut,
                      :mafin
                    )");
    $insert->bindParam(':login', $_SESSION['login']);
    $insert->bindParam(':mondebut', $_POST['start']);
    $insert->bindParam(':mafin', $_POST['end']);
    $insert->bindParam(':logement', $_POST['logement']);
    $insert->execute();
} else {
    header('Location: index.php');
}







