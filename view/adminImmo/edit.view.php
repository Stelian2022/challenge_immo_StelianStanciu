
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
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?= $titleDb ?>">
            </div>
            <div>
                <label for="description">Description annonce</label>
                <textarea name="description" id="description"><?= $descriptionDb ?></textarea>
            </div>
            <div>
                <label for="type">Type d'annonce :</label>
                <select name="type" id="type" value="<?= $typeDb ?>">
                    <option value="vente">Vente</option>
                    <option value="location">Location</option>
                </select>
            </div><br><br>
            <div>
                <label for="price">Prix :</label>
                <input type="text" name="price" id="price" value="<?= $priceDb ?>">
            </div><br><br>
            <div>
                <label for="room">Nombre de pièces :</label>
                <select name="room" id="room" value="<?= $roomDb ?>">
                    <option value="1">1 pièce</option>
                    <option value="2">2 pièces</option>
                    <option value="3">3 pièces</option>
                    <option value="4">4 pièces</option>
                    <option value="5">5 pièces</option>
                </select>
            </div><br>
            <div>
                <label for="surface">Surface :</label>
                <input type="text" name="surface" id="surface" value="<?= $surfaceDb ?>">
            </div><br><br>

            <div>
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
