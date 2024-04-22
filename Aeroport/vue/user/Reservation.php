<!DOCTYPE html>
<!-- saved from url=(0080)https://www.templateonweb.com/upload/aedemodir/9872ed9fc22fc182d371c3e9ed316094/ -->
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
                            <li><a class="font_tag active_tag" href="reserver.php">Reservation</a></li>
                            <li><a class="font_tag active_tag" href="annulerReservation.php">Reservation</a></li>
                            <li><a class="font_tag active_tag" href="modif.php">Mon Compte</a></li>
                            <li><a class="font_tag active_tag" href="../../src/controleur/controleur.php">Deconnexion</a></li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
<form method="post" action="../../src/controleur/controleur.php">
    <table>
        <tr>
            <td>Nombre de place reserver</td>
            <td><input type="number" name="nb"></td>
        </tr>
        <tr>

            <td><input type="text" value="<?=$_POST['id']?>" name="id" hidden="hidden">
                <input type="submit" name="reserver" value="Reserver" </td>

        </tr>
    </table>
</form>