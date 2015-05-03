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
$verifdateStatements = $pdo->prepare("SELECT nomlogement FROM logement NATURAL JOIN reservation
                          WHERE nomlogement=:logement AND :mondebut<:mafin
                                                      AND ((:mondebut<=datedebut AND :mafin<=datedebut)
                                                      OR (:mondebut>=datedebut AND :mafin>=datefin))");
$verifdateStatements->bindParam(':mondebut', $_POST['start']);
$verifdateStatements->bindParam(':mafin', $_POST['end']);
$verifdateStatements->bindParam(':logement', $_POST['logement']);
$verifdateStatements->execute();
if ($verifdateStatements->rowCOunt() > 0)
    echo 'Disponible';
else echo 'Non Disponible';




