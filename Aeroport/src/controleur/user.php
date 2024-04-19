<?php

use modele\User;
$Random_str = uniqid();
echo "Random String:", $Random_str, "\n";
include "../bdd/Bdd.php";
include "../modele/User.php";
$user=new User();
