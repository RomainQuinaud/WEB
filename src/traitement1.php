<?php

$updatecamping = $pdo->prepare("    UPDATE camping
SET nomcamping=:nomcamping, villecamping=:villecamping, adressecamping=:adressecamping, departementcamping=:departementcamping
WHERE idcamping=:idcamping
");
$updatecamping->bindParam(':idcamping', $_POST['idcamping']);
$updatecamping->bindParam(':nomcamping', $_POST['nomcamping']);
$updatecamping->bindParam(':villecamping', $_POST['villecamping']);
$updatecamping->bindParam(':adressecamping', $_POST['adressecamping']);
$updatecamping->bindParam(':departementcamping', $_POST['departementcamping']);
$updatecamping->execute();

if ()

