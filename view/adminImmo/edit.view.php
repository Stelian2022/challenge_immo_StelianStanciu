
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Edition annnonce</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h1>Mise à jour d'un annonce</h1>
        <form method="POST" class="form" enctype="multipart/form-data">
            <div>
                <label for="title">title</label>
                <input type="text" name="title" id="title" value="<?= $titleDb ?>">
            </div>
            <div>
                <label for="description">Contenu article</label>
                <textarea name="description" id="description"><?= $descriptionDb ?></textarea>
            </div>
            <div>
            <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div>
                <input type="submit" value="Valider">
                <a href="./"><button type="button">Annuler</button></a>
            </div>
        </form>
    </main>
</body>

</html>
