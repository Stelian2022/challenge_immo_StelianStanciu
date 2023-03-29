<?php
/*
* Mise à jour d'un article
*/
include '../inc/fonctions.php';
(isAdminLogin()) ?: redirectUrl('view/404.php');
(isGetIdValid()) ? $id = $_GET['id'] : error404();

$titleDb = getAnnonceById($id)['title'];
$contenuDb = getAnnonceById($id)['description'];

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
    $titre = cleanData($_POST['titre']);
    $image = "./uploads/" . $imageName;
    $contenu = cleanData($_POST['contenu']);



    updateAnnonce($id_annonce, $type, $title, $description, $room, $surface, $price, $image);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminBlog/edit.view.php';
