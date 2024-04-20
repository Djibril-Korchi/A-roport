<?php

use modele\User;
include "../bdd/Bdd.php";
include "../modele/User.php";
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
}
