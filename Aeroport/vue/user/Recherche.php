<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex,nofollow">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/global.css" rel="stylesheet">
    <link href="../../assets/css/index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
    <link href="../../assets/css/css" rel="stylesheet">
    <link href="../../assets/css/css(1)" rel="stylesheet">
    <script src="../../assets/js/jquery-2.1.1.min.js.téléchargement"></script>

    <script src="../../assets/js/bootstrap.min.js.téléchargement"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/Select2.css">

</head>

<body>
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
                            <h1><a href="acceuille.php">ShumanAir</a></h1>
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
                        <a class="navbar-brand" href="acceuille.php">ShumanAir</a>
                    </div>


                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="font_tag active_tag" href="Recherche.php">Rechercher Vol</a></li>
                            <li><a class="font_tag active_tag" href="reserver.php.php">Reservation</a></li>
                            <li><a class="font_tag active_tag" href="modif.php">Mon Compte</a></li>
                            <li><a class="font_tag active_tag" href="../../src/controleur/controleur.php">Deconnexion</a></li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
<form action="Reservation.php" method="post">
<label for="recherche"></label><select name="id" id="recherche">
    <?php
    $vol=new \modele\Vol();
    $matricule=$vol->listDestination();
    echo var_dump($matricule);
    foreach($matricule as $element){
        echo "<a></a><option name='".$element[0]."'>".$element[1]."</option>";
    }
    ?>
</select>
<input type="submit" value="Reserver">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="../../assets/js/Select2.js"></script>
</body>
</html>
