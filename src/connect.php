<?php
/**
 * Created by PhpStorm.
 * User: Romain QUINAUD
 * Date: 12/04/2015
 * Time: 17:55
 */




$dbName = 'camping';
$dbUser = 'inscrit';
$dbPassword = 'as20142015';

/*
 * La connexion à PDO passe par trois paramètres:
 *      - le DSN, Data Source Name, qui permet de spécifier l'hôte (le serveur) MySQL et la base de données à utiliser ;
 *      - le nom d'utilisateur
 *      - le mot de passe
 *
 * La deuxième ligne avec le setAttribute est tout simplement un équivalent de "SET serveroutput ON": cela permet
 * d'afficher les erreurs clairement sans les ignorer (en production, il est généralement mieux de les ignorer pour
 * aviter de déranger les utilisateurs).
 */
$pdo = new PDO('mysql:dbname=' . $dbName . ';host=localhost', $dbUser, $dbPassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
