<?php
session_start();

include 'BDD_connect.php';


//Cette requetedonne tous les logements deja reservés pour cette période
$verifdate = $pdo->prepare("SELECT idlogement FROM logement NATURAL JOIN reservation
                          WHERE (datedebut<:mondebut AND datefin>:mafin)
                          OR (datefin>:mondebut AND datefin<:mafin)
                          OR (datedebut<:mondebut AND datedebut>:mafin)");
$verifdate->bindParam(':mondebut', $_POST['start']);
$verifdate->bindParam(':mafin', $_POST['end']);
$verifdate->execute();

