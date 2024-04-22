<!DOCTYPE html>
<html>

<head>
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

    include "../../src/modele/Vol.php";
    include "../../src/bdd/Bdd.php";
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
                            <h1><a href="AcceuilAdmin.php">ShumanAir</a></h1>
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
                        <a class="navbar-brand" href="AcceuilAdmin.php">ShumanAir</a>
                    </div>


                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="font_tag active_tag" href="Inscription.html">Nouvelle Compagnie</a></li>
                            <li><a class="font_tag active_tag" href="InscriptionAeroport.html">Nouvelle Aeroport</a></li>
                            <li><a class="font_tag active_tag" href="lier.php">Lier Aeroport et Compagnie</a></li>
                            <li><a class="font_tag active_tag" href="modif.php">Mon Compte</a></li>
                            <li><a class="font_tag active_tag" href="../../src/controleur/controleur.php">Deconnexion</a></li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<form action="../../src/controleur/controleur.php" method="post">

    <h3> <table>

            <?php
            $user = new \modele\User([]);
            $donne=$user->user();
            var_dump($_SESSION);
            foreach ($donne as $element) {
                echo '
                <tr>
            <td>Votre Nom :</td>
            <td><input type='."text".' name='."nom".' value='.$element['nom'].'></td>
            <td> |  | </td>
        
            <td>Votre Prénom</td>
            <td><input type='."text".' name='."prenom".' value='.$element['prenom'].'></td>
            <td> |  | </td>
            
            <td>Votre rue:</td>
            <td><input type='."text".' name='."rue".' value='.$element['rue'].'></td>
        </tr>
        <tr><td><br></td><td></td><td> |  | </td></tr>
        <tr>
            <td>Votre Code Postal:</td>
            <td><input type='."text".' name='."cp".' value='.$element['cp'].'></td>
        </tr>
        <tr><td><br></td><td></td><td> |  | </td></tr>
        <tr>
            <td>Votre email:</td>
            <td><input type='."text".' name='."email".' value='.$element['email'].'></td>
            <td> |  | </td>
            <td>Votre Ville</td>
            <td><input type='."text".' name='."ville".' value='.$element['ville'].'></td>
        </tr>
        <tr><td><br></td><td></td><td> |  | </td></tr>
        <tr>
            <td>Votre date de Naissance</td>
            <td><input type='."text".' name='."daten".' value='.$element['daten'].'></td>
            
            <td> |  | </td>
            <td>Votre Mot de Passe</td>
            <td><input type='."text".' name='."daten".' value='.$element['mdp'].'></td>
            ';
            }
            ?>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><button type='reset' class='btn btn-outline-primary'>Réinitialiser</button> </td>
            <td><input type='submit' class='btn btn-outline-primary' name='edit' value='Modifier'></td>
        </tr>

    </table></h3>
</form>
</body></html>


<form method="post" action="Modifier_client.php">
    <table>


 

    </table>
</form>
