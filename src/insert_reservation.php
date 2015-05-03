<?php
session_start();

include 'BDD_connect.php';


//Cette requete donne tous les logements deja reservés pour la période sélectionnée
$verifdateStatements = $pdo->prepare("SELECT idlogement FROM logement NATURAL JOIN reservation
                          WHERE (datedebut<:mondebut AND datefin>:mafin)
                          OR (datefin>:mondebut AND datefin<:mafin)
                          OR (datedebut<:mondebut AND datedebut>:mafin)");
$verifdateStatements->bindParam(':mondebut', $_POST['start']);
$verifdateStatements->bindParam(':mafin', $_POST['end']);
$verifdateStatements->execute();

//Cette requete donne une liste de tous les logements
$logementStatements = $pdo->prepare("SELECT idlogement FROM logement");
$logementStatements->execute();

