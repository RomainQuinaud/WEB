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



//Cette requete donne tous les logements deja reservés pour la période sélectionnée
$verifdateStatements = $pdo->prepare("SELECT nomlogement FROM logement NATURAL JOIN reservation
                          WHERE nomlogement=:logement AND ((datedebut<:mondebut AND datefin>:mafin)
                          OR (datefin>:mondebut AND datefin<:mafin)
                          OR (datedebut<:mondebut AND datedebut>:mafin))");
$verifdateStatements->bindParam(':mondebut', $_POST['start']);
$verifdateStatements->bindParam(':mafin', $_POST['end']);
$verifdateStatements->bindParam(':logement', $_POST['logement']);
$verifdateStatements->execute();
if ($verifdateStatements->rowCOunt() > 0)
    echo 'Non Disponible';
else echo 'Disponible';




