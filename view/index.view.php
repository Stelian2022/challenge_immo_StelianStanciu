<?php
/*
 * Vue listant tous les immobilliers
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>IMMOBELLIER</title>
</head>

<body>
    <main class="container">
        <header class="header">
            <h1>IMMOBELLIER</h1>
            <p>
                <?php if (isUserLogin()) : ?>
            <a href="./adminImmo" role="button">Admin</a>
            <a href="./adminImmo/ajout.php" role="button">Ajouter un annonce</a> 
            <a href="./login/deconnexion.php" role="button">Se déconnecter</a>
        <?php else : ?>
            <a href="./login/" role="button">Se connecter</a>
            <a href="./register/" role="button">S'enregistrer</a>
        <?php endif ?>
        </p>
        </header>
        <section>
            <?php
            if (count(getAnnonceLimit($limit, $offset)) != 0) :
                foreach (getAnnonceLimit($limit, $offset) as $article) : ?>
                    <article>
                        <h4><?= $article['title'] ?></h4>
                        <?php if ($article['image'] != null) : ?>
                            <p><img src="<?= $article['image'] ?>"></p>
                        <?php endif; ?>
                        <p><?= $article['description'] ?></p>
                        <p><?= $article['surface']  ?></p>
                        <p><?= $article['room']  ?></p>
                       
                     
                    </article>
            <?php
                endforeach;
            else :
                echo 'Aucun article de disponible.';
            endif;
            ?>
        </section>
    </main>
</body>

</html>