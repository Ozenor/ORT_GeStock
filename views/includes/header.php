<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" /> <!-- pour les icones -->
  <!-- Jquery-->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/component/css/style.css">
  <!-- Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Questrial&display=swap" />
  <link rel="shortcut icon" href="/component/img/favicon.png" type="image/x-icon">
  <!-- JS depuis bootstrap-->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpasth.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

  <!-- Datatable -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


  <title>Projet Gestion</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i>
        <img src="/component/img/logo.png" width="45%" class="d-inline-block align-top" alt="logo">
      </a>
      <span class="text-white">
        <?php
        if ($connected == true) {
          echo Controllers::writingHello($_SESSION["prenomUser"] . " " . $_SESSION["nomUser"]);
        } else {
          echo Controllers::writingHello("invité");
        }
        ?>
      </span>
    </nav>
  </header>