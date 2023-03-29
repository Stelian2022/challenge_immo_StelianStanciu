<?php
/*
* Fonctions utiles au fonctionnnent du projet
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');

function dbug($valeur)
{
   echo "<pre style='background-color:black;color:white;padding: 15px;overflow: auto;'>";
   var_dump($valeur);
   echo "</pre>";
}

function dd($valeur)
{
   echo "<pre style='background-color:black;color:white;padding: 15px;overflow: auto;height: 500px;'>";
   var_dump($valeur);
   // print_r($valeur);
   echo "</pre>";
   die();
}

function cleanData($valeur)
{
   if (!empty($valeur) && isset($valeur)) :
      $valeur = strip_tags(trim($valeur));
      return $valeur;
   else :
      return false;
   endif;
}

function textData($valeur)
{
   $valeur = preg_match('/^[a-z-A-Z]*$/', $valeur);
   return $valeur;
}

function isGetIdValid(): bool
{
   if (isset($_GET['id']) && is_numeric($_GET['id'])) :
      return true;
   else :
      return false;
   endif;
}

function getAnnonceLimit(int $limit, int $offset): array
{

   require 'pdo.php';
   $sqlRequest = "SELECT a.*, u.*
  FROM annonce AS a
  INNER JOIN user AS u ON a.user_id = u.id_user
  ORDER BY a.user_id ASC
  LIMIT :limit OFFSET :offset";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':limit', $limit, PDO::PARAM_INT);
   $resultat->bindValue(':offset', $offset, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetchAll();
}

function getAnnonceById(int $idAnnonce): array
{
   require 'pdo.php';
   $sqlRequest = "SELECT * FROM annone WHERE id_annone = :idAnnonce";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idAnnonce', $idAnnonce, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetch();
}

function suppAnnonceById(int $idAnnonce): bool
{
   require 'pdo.php';
   $sqlRequest = "DELETE FROM annonce WHERE id_annonce = :idAnnonce";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idAnnonce', $idAnnonce, PDO::PARAM_INT);
   return $resultat->execute();
}

function insertAnnonce(string $title, string $description, string $type, string $price, string $surface, string $room, string $image, int $user_id): int
{
   require 'pdo.php';
   $requete = 'INSERT INTO annonce (title,description,type,price,surface,room,image,user_id) VALUES (:title, :description, :type, :price, :surface, :room, :image, :user_id)';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':title', $title, PDO::PARAM_STR);
   $resultat->bindValue(':description', $description, PDO::PARAM_STR);
   $resultat->bindValue(':type', $type, PDO::PARAM_STR);
   $resultat->bindValue(':price', $price, PDO::PARAM_STR);
   $resultat->bindValue(':surface', $surface, PDO::PARAM_STR);
   $resultat->bindValue(':room', $room, PDO::PARAM_STR);
   $resultat->bindValue(':image', $image, PDO::PARAM_STR);
   $resultat->bindValue(':user_id', $user_id, PDO::PARAM_STR);
   $resultat->execute();
   return $conn->lastInsertId();
}

function updateAnnonce(int $id_annonce, string $title, string $description, string $type, int $price, int $surface, int $room, string $image): bool
{
   require 'pdo.php';

   if ($image) :
      $requete = 'UPDATE annonce SET title = :title, type = :type,price = :price, surface= :surface, room = :room, image = :image WHERE id_annonce = :id_annonce';
   else :
      $requete = 'UPDATE annonce SET title = :title, description = :decription WHERE id_annonce = :id_annonce';
   endif;

   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':id_annonce', $id_annonce, PDO::PARAM_INT);
   $resultat->bindValue(':title', $title, PDO::PARAM_STR);
   $resultat->bindValue(':description', $description, PDO::PARAM_STR);

   if ($image) :
      $resultat->bindValue(':image', $image, PDO::PARAM_STR);
   endif;

   $resultat->execute();
   return $resultat->execute();
}

function isUserLogin(): bool
{
   if (isset($_SESSION['login']) && $_SESSION['login'] == true) :
      return true;
   else :
      return false;
   endif;
}

function findEmail(string $email): array|bool
{
   require 'pdo.php';

   $requete = 'SELECT * FROM user where email = :email';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':email', $email, PDO::PARAM_STR);
   $resultat->execute();
   return $resultat->fetch();
}

function insertUser(string $first_name, string $last_name, string $email, string $password, string $adress, string $town, string $postal_code, string $phone, string $role): int
{
   require 'pdo.php';
   $passwordHashe = password_hash($password, PASSWORD_DEFAULT);

   $requete = 'INSERT INTO user (first_name,last_name,email,password,adress,town,postal_code,phone,role) VALUES (:first_name, :last_name, :email, :password, :adress, :town, :postal_code, :phone, :role)';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':first_name', $first_name, PDO::PARAM_STR);
   $resultat->bindValue(':last-name', $last_name, PDO::PARAM_STR);
   $resultat->bindValue(':email', $email, PDO::PARAM_STR);
   $resultat->bindValue(':password', $passwordHashe, PDO::PARAM_STR);
   $resultat->bindValue(':adress', $adress, PDO::PARAM_STR);
   $resultat->bindValue(':town', $town, PDO::PARAM_STR);
   $resultat->bindValue(':postal_code', $postal_code, PDO::PARAM_STR);
   $resultat->bindValue(':phone', $phone, PDO::PARAM_STR);
   $resultat->bindValue(':role', $role, PDO::PARAM_STR);
   $resultat->execute();
   return $conn->lastInsertId();
}

function getUtilisateurAll(): array
{
   require 'pdo.php';
   $sqlRequest = "SELECT * FROM user";

   $resultat = $conn->prepare($sqlRequest);
   $resultat->execute();
   return $resultat->fetchAll();
}

function error404(): void
{
   http_response_code(404);
   include('../view/404.php');
   die();
}

function redirectUrl(string $path = ''): void
{
   $homeUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/challenge_immo_StelianStanciu';
   $homeUrl .= '/' . $path;
   header("Location: {$homeUrl}");
   exit();
}

function isAdminLogin(): bool
{
   if (isset($_SESSION['login']) && $_SESSION['login'] == "admin") :
      return true;
   else :
      return false;
   endif;
}
