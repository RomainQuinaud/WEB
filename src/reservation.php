<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../img/camping.ico">
  <title>Camping Paradis</title>
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../css/starter-template.css" rel="stylesheet">
</head>

<body>

<?php
include_once 'menu.php';
menu("reservation.php");
?>

  <div class="container">

    <div class="starter-template">
        <h1 class="modal-header">Réservation en ligne</h1>

        <h2>Vos Réservations</h2>

        <?php include 'BDD_connect.php';
            $result = $pdo->prepare("SELECT ");
            $result->bindParam(':mail', $user);
            $result->execute();
            $rows = $result->fetch(PDO::FETCH_NUM);


    </div>
  </div>
</body>
</html>