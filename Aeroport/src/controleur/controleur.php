<?php

use Cassandra\Date;
use modele\Repos;
use modele\User;
include "../bdd/Bdd.php";
include "../modele/User.php";
include "../modele/Repos.php";
if(array_key_exist("inscription")){
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
}elseif (array_key_exists("connection")){
    $user=new User([
       'email'=>$_POST['email'],
       'mdp'=>$_POST['mdp']
    ]);
    $user->connexion();
}elseif (array_key_exists("repos")){
    $date=new Date();
    $date->format('Y-m-d');
    $date->toDateTime($_POST['date_fin']);
    $nb=0;
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
