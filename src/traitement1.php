<?php
include 'BDD_connect.php';

$updatecamping = $pdo->prepare("    UPDATE camping
SET nomcamping=:nomcamping, villecamping=:villecamping, adressecamping=:adressecamping, departementcamping=:departementcamping
WHERE idcamping=:idcamping
");
$updatecamping->bindParam(':idcamping', $_POST['idcamping']);
$updatecamping->bindParam(':nomcamping', $_POST['nomcamping']);
$updatecamping->bindParam(':villecamping', $_POST['villecamping']);
$updatecamping->bindParam(':adressecamping', $_POST['adressecamping']);
$updatecamping->bindParam(':departementcamping', $_POST['departementcamping']);
$updatecamping->prepare();


if ($_POST['info'] == 'camping') {

    if (empty($_POST['nomcamping']))
        $_POST['nomcamping'] = 'null';
    else {
        if (empty($_POST['villecamping']))
            $_POST['villecamping'] = 'null';
        else {
            if (empty($_POST['adressecamping']))
                $_POST['adressecamping'] = 'null';
            else {
                if (empty($_POST['departementcamping']))
                    $_POST['departementcamping'] = 'null';
            }
        }
    }
}

$updatecamping->execute();