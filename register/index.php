<?php
/*
* Formulaire d'enregistrement d'un nouvel utilisateur
*/
session_start();

require '../inc/fonctions.php';

$first_name = $last_name = $email = $password = $town = $adress = $postal_code  = $phone  = $errors = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    $first_name = cleanData($_POST['first_name']);
    $last_name = cleanData($_POST['last_name']);
    $email = cleanData($_POST['email']);
    $password = cleanData($_POST['password']);
    $town = cleanData($_POST['town']);
    $adress = cleanData($_POST['adress']);
    $postal_code = cleanData($_POST['postal_code']);
    $phone = cleanData($_POST['phone']);
    $role = cleanData($_POST['role']);

    if ($email && $password) :
        if (findEmail($email)) :
            $errors = 'Veuiller choisir une autre adreese email !';
        else :
            $lastIdUtilisateur = insertUser($first_name, $last_name, $email, $password, $town, $postal_code, $adress, $phone, $role);
            $_SESSION['login'] = findEmail($email)['role'];

            $_SESSION['id_user'] = $lastIdUtilisateur;
            if ($role === 'admin') :
                redirectUrl('./adminImmo/');
            else :
                redirectUrl();
            endif;
        endif;
    else :
        $errors = 'Votre email ou mot de passe sont incorrect !';
    endif;
endif;

require '../view/register/index.view.php';
