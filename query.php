<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro_blog', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//met à jour le nombre de like en fonction de l'id
if(isset($_GET['nbLike']) && isset($_GET['id'])){
  $query = 'UPDATE messages SET nbLike = ? where id= ?';
  $prep = $pdo->prepare($query);
  $prep->bindValue(1, $_GET['nbLike']);
  $prep->bindValue(2, $_GET['id']);
  $prep->execute();
}


 ?>
