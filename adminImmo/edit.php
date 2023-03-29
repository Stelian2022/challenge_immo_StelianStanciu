<?php
/*
* Mise à jour d'un article
*/
include '../inc/fonctions.php';

(isGetIdValid()) ? $id = $_GET['id'] : error404();

$titleDb = getAnnonceById($id)['title'];
$descriptionDb = getAnnonceById($id)['description'];
$typeDb = getAnnonceById($id)['type'];
$priceDb = getAnnonceById($id)['price'];
$surfaceDb = getAnnonceById($id)['surface'];
$roomDb = getAnnonceById($id)['room'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $imageName = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($imageName);

  

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



    updateAnnonce($id_annonce, $type, $title, $description, $room, $surface, $price, $image);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminImmo/edit.view.php';
