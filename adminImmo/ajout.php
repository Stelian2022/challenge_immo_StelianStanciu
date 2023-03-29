<?php
/*
* Ajout d'un article
*/
session_start();
include '../inc/fonctions.php';


$title = $description = $type = $price = $surface = $room = $image = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $imageName = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($imageName);

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $title = cleanData($_POST['title']);
    $image = "./uploads/" . $imageName;
    $description = cleanData($_POST['description']);
    $type = cleanData($_POST['type']);
    $room = cleanData($_POST['room']);
    $surface = cleanData($_POST['surface']);
    $price = cleanData($_POST['price']);

    insertAnnonce($title, $description, $type, $price, $surface, $room, $image, $_SESSION['id_user']);

    if ($_SESSION['login'] === 'redacteur') :
        redirectUrl();
    else :
        //dd($_SESSION);
        redirectUrl('./adminImmo/');
    endif;
endif;









require '../view/adminImmo/ajout.view.php';
