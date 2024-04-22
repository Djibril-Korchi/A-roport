<?php

use modele\User;

include "../bdd/Bdd.php";
include "../modele/Perssone.php";
include "../modele/User.php";
$user=new \modele\User(['email'=>$_POST['email']]);
$res=$user->status();
User::setIdUser($res[0]);
if ($res[1]=="Pillot"){
    $pillot=new \modele\Pillot([
        'email'=>$_POST['email'],
        'mdp'=>$_POST['mdp']
    ]);
    $pillot->connexion();
}elseif ($res[1]=="Compagnie"){
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
    $user->connexion();
}