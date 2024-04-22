<?php

use Cassandra\Date;
use modele\Repos;
use modele\User;
include "../bdd/Bdd.php";
include "../modele/Perssone.php";
include "../modele/User.php";
include "../modele/Pillot.php";
include "../modele/Compagnie.php";
include "../modele/Repos.php";


if(isset($_POST['inscription'])){
    $user=new User([
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'email'=>$_POST['email'],
        'daten'=>$_POST['daten'],
        'adresse'=>$_POST['rue'],
        'ville'=>$_POST['ville'],
        'cp'=>$_POST['cp'],
        'status'=>$_POST['status']
    ]);
    $user->inscription();
}elseif ($_POST['connection']=="Connection"){

    $bdd=new Bdd();
    $req=$bdd->getBdd()->prepare('SELECT status FROM user where email=:email');
    $req->execute(array('email'=>$_POST['email']));
    $res=$req->fetchAll();
    echo $res[0][0];
    if ($res[0][0] == "Client" || $res[0][0] == "Vol" || $res[0][0] == "Admin") {
        echo "salut";
        $user=new User([
            'email'=>$_POST['email'],
            'mdp'=>$_POST['mdp']
        ]);
        $user->connexion();
    }elseif ($res[0]=="Pillot"){
        $pillot=new \modele\Pillot([
            'email'=>$_POST['email'],
            'mdp'=>$_POST['mdp']
        ]);
        $pillot->connexion();
    }elseif ($res[0]=="Compagnie"){
        $compagnie= new \modele\Compagnie([
            'email'=>$_POST['email'],
            'mdp'=>$_POST['mdp']
        ]);
        $compagnie->connexion();
    }else{
        $user=new User([
            'email'=>$_POST['email'],
            'mdp'=>$_POST['mdp']
        ]);
    }
}elseif (isset($_POST['mdp'])){
    $user=new User([
        'mdp_provisoire'=>$_POST['mdp_p'],
        'mdp'=>$_POST['newmdp']
    ]);
}elseif (isset($_POST['reserver'])){
    $reserver=new \modele\Reservation([
        'nb_place'=>$_POST['nb'],
        'ref_vol'=>$_POST['id']
    ]);
    $reserver->newReservation();
}elseif (isset($_POST['annuler'])){
    $reserver=new \modele\Reservation([
        'id_reservation'=>$_POST['id1'],
        'ref_vol'=>$_POST['id']
    ]);
    $reserver->removeReservation();
}elseif (isset($_POST['editer'])){
    $user = new User(['nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'email'=>$_POST['email'],
        'daten'=>$_POST['daten'],
        'adresse'=>$_POST['rue'],
        'ville'=>$_POST['ville'],
        'cp'=>$_POST['cp'],
        'status'=>$_POST['status']]);
    $user->editer();
    header("Location : ../../vue/user/acceuille.php");
}
elseif(isset($_POST['repos'])){
    $nb=0;
    $date = new DateTime($_POST['date_fin']);
    $date->sub(new DateInterval('P1D'));
    echo $date->format('Y-m-d');
    while ($date!=$_POST['date_debut']){
        $date->modify('-1 day');
        $nb++;
    }
    $repos= new Repos([
        'date_debut'=>$_POST['date_debut'],
        'date-fin'=>$_POST['date_fin'],
        'nb_repos'=>$nb
    ]);
}
