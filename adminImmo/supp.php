<?php
/*
* Suppression d'un film
*/
include '../inc/fonctions.php';
$id = $_GET['id'];

if (suppAnnonceById($id)) :
   header('Location: ./index.php');
   exit();
else :
   exit('Erreur s\'est produite !');
endif;
