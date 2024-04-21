<!DOCTYPE html>
<!-- saved from url=(0080)https://www.templateonweb.com/upload/aedemodir/9872ed9fc22fc182d371c3e9ed316094/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
    <?php
    include "../src/bdd/Bdd.php";
    include "../src/modele/Perssone.php";
    include "../src/modele/Pillot.php";
    include "../src/modele/Avion.php";

    ?>
</head>

<body>

<section id="top">
    <div class="container">
        <div class="row">
            <div class="top_main clearfix">
                <div class="top_1 text-right clearfix">
                </div>
                <div class="top_2 clearfix">
                    <div class="col-sm-3">
                        <div class="top_2_left">
                            <h1><a href="Siteweb_Client.php">CINEMA ZONE <span>BOOKING</span></a></h1>
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
                        <a class="navbar-brand" href="https://www.templateonweb.com/upload/aedemodir/9872ed9fc22fc182d371c3e9ed316094/#">CINEMA ZONE <span>BOOKING</span></a>
                    </div>


                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="font_tag active_tag" href="Connexion.html">Connexion</a></li>
                            <li><a class="font_tag active_tag" href="Inscription.html">Inscription</a></li>

                        </ul>

                    </div><!-- /.nav-collapse -->
                </nav>
            </div>
        </div>
    </div>
</section>
<form action="user.php" method="post">
    <table>
        <tr>
            <td>Ville d'arriver</td>
            <td><input type="text" name="ville" </td>
        </tr>
        <tr>
            <td>Aéroport départ</td>
            <td><select name="depart">
                    <?php
                    $aeroport=new \modele\Aeroport();
                    $libelle=$aeroport->listDestination();
                    foreach ($libelle as $element){
                        echo "<a></a><optiont name='".$element['libelle']."'>".$element['libelle']." </optiont>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Aéroport arriver</td>
            <td><select name="arriver">
                    <?php
                    $aeroport=new \modele\Aeroport();
                    $libelle=$aeroport->listDestination();
                    foreach ($libelle as $element){
                        echo "<a></a><optiont name='".$element['libelle']."'>".$element['libelle']." </optiont>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Aéroport arriver</td>
            <td><select name="arriver">
                    <?php
                    foreach ($libelle as $element){
                        echo "<a></a><optiont name='".$element['libelle']."'>".$element['libelle']." </optiont>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Date et heure de arriver</td>
            <td><input type="datetime-local" name="datea"></td>
        </tr>
        <tr>
            <td>Date et heure de départ</td>
            <td><input type="datetime-local" name="dated"></td>
        </tr>
        <tr>
            <td>Avion</td>
            <td><select name="avion">
                    <?php
                    $avion=new \modele\Avion();
                    $id=$avion->avion();
                    foreach ($libelle as $element){
                        echo "<a></a><optiont name='".$element['matricule']."'>".$element['matricule']." </optiont>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Prix</td>
            <td><input type="number" name="prix">€</td>
        </tr>

    </table>
</form>