<!DOCTYPE html>
<html>

<head>
  <meta name="robots" content="noindex,nofollow">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscription</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/global.css" rel="stylesheet">
  <link href="../assets/css/index.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
  <link href="../assets/css/css" rel="stylesheet">
  <link href="../assets/css/css(1)" rel="stylesheet">
  <script src="../assets/js/jquery-2.1.1.min.js.téléchargement"></script>

  <script src="../assets/js/bootstrap.min.js.téléchargement"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th,td{
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th{
            background-color: #f2f2f2;
        }
    </style>
    <?php

    use modele\Vol;

    include "../src/modele/Vol.php";
    include "../src/bdd/Bdd.php";
    $vol = new Vol([]);
    $liste=$vol->getVol();
    ?>
</head>

<body onload="startTime()">
<section id="top">
  <div class="container">
    <div class="row">
      <div class="top_main clearfix">
        <div class="top_1 text-right clearfix">
        </div>
        <div class="top_2 clearfix">
          <div class="col-sm-3">
            <div class="top_2_left">
              <h1><a href="Siteweb_Client.php.php">ShumanAir</a></h1>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="top_2_right text-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="header" class="clearfix cd-secondary-nav">
  <div class="container">
    <div class="row">
      <div class="header_main clearfix">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Siteweb_Client.php">ShumanAir</a>
          </div>


          <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a class="font_tag active_tag" href="acceuillePillot.php">Vol</a></li>
              <li><a class="font_tag active_tag" href="">Repos</a></li>
              <li><a class="font_tag active_tag" href="">Mon Compte</a></li>
              <li><a class="font_tag active_tag" href="user.php">Deconnexion</a></li>
            </ul>

          </div>
        </nav>
      </div>
    </div>
  </div>
</section>

<table id="datatable">
    <thead>
    <tr>
        <th>Destination</th>
        <th>Aéroport de départ</th>
        <th>Aéroport de destination</th>
        <th>Heure de départ</th>
        <th>Heure d'arriver</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($liste as $element){
    ?>
    <tr>
        <td><?= $element['ville_arriver'] ?></td>
        <td><?= $element['ville_depart'] ?></td>
        <td><?= $element['destination'] ?></td>
        <td><?= $element['heure_depart'] ?></td>
        <td><?= $element['heure_arriver'] ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#datatable').DataTable();
    });
</script>
'</body>
</html>