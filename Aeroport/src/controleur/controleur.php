<?php


use modele\Repos;
use modele\User;
include "../bdd/Bdd.php";
include "../modele/Perssone.php";
include "../modele/User.php";
include "../modele/Pillot.php";
include "../modele/Compagnie.php";
include "../modele/Repos.php";
include "../modele/Vol.php";
include "../modele/Reservation.php";


if(isset($_POST['inscription'])) {
    $user = new User([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'daten' => $_POST['daten'],
        'adresse' => $_POST['rue'],
        'ville' => $_POST['ville'],
        'cp' => $_POST['cp']
    ]);

    $user->inscription();

}elseif(isset($_POST['inscriptionAvion'])) {
    $avion=new \modele\Avion([
        'matricule'=>$_POST['matricule'],
        'nb_place'=>$_POST['nb']
    ]);
    $avion->newAvion();
}elseif(isset($_POST['inscriptionAvion'])) {
    $aeroport=new \modele\Aeroport([
        'libelle'=>$_POST['nom'],
    ]);
    $aeroport->ajouterAeroport();
}elseif(isset($_POST['inscriptionPillot'])){
    $user=new \modele\Pillot([
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'email'=>$_POST['email'],
        'daten'=>$_POST['daten'],
        'adresse'=>$_POST['rue'],
        'ville'=>$_POST['ville'],
        'cp'=>$_POST['cp']
    ]);
    $user->inscription();

}elseif(isset($_POST['inscriptionC'])){
    $user=new \modele\Pillot([
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'email'=>$_POST['email'],
        'daten'=>$_POST['daten'],
        'adresse'=>$_POST['rue'],
        'ville'=>$_POST['ville'],
        'cp'=>$_POST['cp'],
        'libelle'=>$_POST['name']
    ]);
    $user->inscription();

}elseif (isset($_POST['mdp'])){
    var_dump($_POST);
    $user=new User([
        'email'=>$_POST['email'],
        'mdp'=>$_POST['newmdp']
    ]);
    $user->setNewMdp();
}elseif (isset($_POST['reserver'])){
    var_dump($_POST);
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
        'cp'=>$_POST['cp']
    ]);
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
}elseif (isset($_POST['newVol'])){
    $vol = new \modele\Vol([
        'destination'=> $_POST['arriver'],
        'ville_arriver'=>$_POST['ville'],
        'ville_depart'=>$_POST['depart'],
        'heure_depart'=>$_POST['dated'],
        'heure_arriver'=>$_POST['datea'],
        'prix'=>$_POST['prix'],
        'ref_avion'=>$_POST['avion'],
        'ref_pillot'=>$_POST['']
    ]);
    $vol->newVol();
}elseif (isset($_POST['lier'])){
    $lier =new \modele\Lier([
        'ref_aeroport'=>$_POST['ref_a'],
        'ref_compagnie'=>$_POST['ref_c']
    ]);
    $lier->lier();
}
else{
    session_start();
    session_destroy();
    header("Location : ../../vue/aceuille.php");
}
