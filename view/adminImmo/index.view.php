<?php
/*
 * Vue Gestion des article
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Admin Immobellier</title>
   <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
   <main class="container">
      <header class="header">
         <h1>Gestion des annonces</h1>
         <p><a href="../" role="button">Voir Annonces</a></p>

         <p><a href="./ajout.php" role="button">Ajouter un annonce</a></p>
         <p><a href="../login/deconnexion.php" role="button">Deconnexion</a></p>
      </header>
      <?php if (count(getAnnonceLimit($limit, $offset)) != 0) : ?>
         <table>
            <thead>
               <tr>

                  <th>Title</th>
                  <th>Description</th>
                  <th>Surface</th>
                  <th>Pieces</th>
                  <th>Prix</th>
                  <th>Actions</th>

               </tr>
            </thead>
            <tbody>
               <?php //dd(getArticleLimit($limit, $offset)) 
               ?>
               <?php foreach (getAnnonceLimit($limit, $offset) as $key => $value) : ?>
                  <tr>
                     <!-- <td><? //= $value['id_annonce'] 
                              ?></td> -->
                     <td><?= $value['title'] ?><br></td>

                     <td class="desc"><?= $value['description'] ?></td>
                     <td><?= $value['surface'] ?> m²</td>
                     <td><?= $value['room'] ?> pièces</td>
                     <td><?= $value['price'] ?> $</td>
                     <td>
                        <a href="./edit.php?id=<?= $value['id_annonce'] ?>" role="button">Edit</a>
                        <a href="./supp.php?id=<?= $value['id_annonce'] ?>" role="button" onclick="return confirm('Confirmer la suppression de cet annonce ?');">Supprimer</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      <?php else : ?>
         <p>Aucun annonce !</p>
      <?php endif; ?>
   </main>
</body>

</html>