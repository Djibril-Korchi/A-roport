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
                            <h1><a href="Siteweb_Client.php">Schuman<span>Air</span></a></h1>
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
<form action="../src/controleur/controleur.php" method="post">

    <h3> <table>
        <tr>
            <td>Votre Nom :</td>
            <td><input type="text" name="nom"></td>
            <td> |  | </td>
        
            <td>Votre Prénom</td>
            <td><input type="text" name="prenom"></td>
            <td> |  | </td>
            
            <td>Votre rue:</td>
            <td><input type="text" name="rue"></td>
        </tr>
        <tr><td><br></td><td></td><td> |  | </td></tr>
        <tr>
            <td>Votre Code Postal:</td>
            <td><input type="text" name="cp"></td>
        </tr>
        <tr><td><br></td><td></td><td> |  | </td></tr>
        <tr>
            <td>Votre email:</td>
            <td><input type="text" name="email"></td>
            <td> |  | </td>
            <td>Votre Ville</td>
            <td><input type="text" name="ville"></td>
        </tr>
        <tr><td><br></td><td></td><td> |  | </td></tr>
        <tr>
            <td>Votre date de Naissance</td>
            <td><input type="text" name="daten"></td>
            <td> |  | </td>
        
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><button type="reset" class="btn btn-outline-primary">Réinitialiser</button> </td>
            <td><input type="submit" class="btn btn-outline-primary" name="inscription" value="Inscription"></td>
        </tr>
    </table></h3>
</form>
</body></html>


<form method="post" action="Modifier_client.php">
    <table>

        <?php
        
        
        $bdd = new PDO('mysql:host=localhost;dbname=dki_aeroport;charset=utf8', 'root', '');
        $reponse = $bdd->prepare('SELECT * FROM user WHERE id_user = 1');
        $reponse->execute(array('email' => $email));

        $donne = $reponse->fetchAll();

        foreach ($donne as $element) {
            echo "
        
                <tr><td>Votre Nom :</td><td><input type='text' name='nom' value=" . $element['nom'] ."></td></tr>
                <tr><td>Votre Prenom :</td><td><input type='text' name='prenom' value=" . $element['prenom'] . "></td></tr>
                <tr><td>Votre rue</td><td><input type='text' name='rue' value=" . $element['rue'] . "></td></tr>
                <tr><td>Votre code postalle</td><td><input type='text' name='cp' value=" . $element['cp'] . "></td></tr>
                <tr><td>Votre email</td><td><input type='text' name='email' value=" . $element['email'] . "></td></tr>
                <tr><td>Votre datedenaissance</td><td><input type='text' name='daten' value=" . $element['daten'] . "></td></tr>
                
                
                <tr><td><input type='submit' value='Valider'></td></tr>
            ";
        }
        ?>
 

    </table>
</form>