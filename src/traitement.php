<?php
/**
 * Created by PhpStorm.
 * User: Romain QUINAUD
 * Date: 04/05/2015
 * Time: 22:17
 */

if ($_GET['action'] == 'delete' and $_GET['idlogement']) {
    $sql = "DELETE FROM logement WHERE idlogement=:idlogement";
    $statement = $pdo->prepare($sq);
    $statement->bindParam(':idlogement', $_GET['idlogement']);
    $statement->execute();
}