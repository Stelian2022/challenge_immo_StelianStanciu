<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Ajout annonce</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h1>Ajout d'un annonce</h1>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="title">Titre annonce</label>
                <input type="text" name="title" id="title" value="<?= $title ?>">
            </div>
            <div>
                <label for="type">Type d'annonce :</label>
                <select name="type" id="type" value="<?= $type ?>">
                    <option value="vente">Vente</option>
                    <option value="location">Location</option>
                </select>
            </div><br><br>
            <div>
                <label for="price">Prix :</label>
                <input type="text" name="price" id="price" value="<?= $price ?>">
            </div><br><br>
            <div>
                <label for="surface">Surface :</label>
                <input type="text" name="surface" id="surface" value="<?= $surface ?>">
            </div><br><br>

            <div>
                <label for="room">Nombre de pièces :</label>
                <select name="room" id="room" value="<?= $room ?>">
                    <option value="1">1 pièce</option>
                    <option value="2">2 pièces</option>
                    <option value="3">3 pièces</option>
                    <option value="4">4 pièces</option>
                    <option value="5">5 pièces</option>
                </select>
            </div><br>
            <div>
                <label for="description">Contenu annonce</label>
                <textarea name="description" id="description"><?= $description ?></textarea>
            </div>
            <label for="image">Télécharger une image du bien immobilier :</label>
            <input type="file" name="image" id="image"><br>
            <div>
                <input type="submit" value="Ajouter">
                <a href="./"><button type="button">Annuler</button></a>
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul class="errors">
                        <li><?= $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </main>
</body>

</html>