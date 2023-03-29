<?php
/*
* Mise à jour d'un annonce
*/
include '../inc/fonctions.php';

(isGetIdValid()) ? $id_annonce = $_GET['id'] : error404();

$titleDb = getAnnonceById($id_annonce)['title'];
$descriptionDb = getAnnonceById($id_annonce)['description'];
$surfaceDb = getAnnonceById($id_annonce)['surface'];
 $typeDb = getAnnonceById($id_annonce)['type'];
 $roomDb = getAnnonceById($id_annonce)['room'];
 $priceDb = getAnnonceById($id_annonce)['price'];



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
    $surface = cleanData($_POST['surface']);
     $type = cleanData($_POST['type']);
    $price = cleanData($_POST['price']);
     $room = cleanData($_POST['room']);



    updateAnnonce($id_annonce, $title, $description, $surface,$type,$price,$room, $image);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminImmo/edit.view.php';
