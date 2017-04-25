<?php
include('includes/connexion.inc.php');




if (isset($_POST['message']) && !empty($_POST['message'])) {
    //modification du message apres clic de l'utilisateur sur le bouton modifier
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $query = 'UPDATE messages SET contenu = ?,DateM=UNIX_TIMESTAMP() WHERE id = ?';
        $prep = $pdo->prepare($query);
        $prep->bindValue(1, $_POST['message']);
        $prep->bindValue(2, $_POST['id']);
    } //insertion du message apres clic de l'utilisateur sur le bouton envoyer
    else {
        $query = 'INSERT INTO messages (contenu, dateC,user_id,DateM,nbLike) VALUES (?,UNIX_TIMESTAMP(),?,0,0)';
        $prep = $pdo->prepare($query);
        $prep->bindValue(1, $_POST['message']);
        $prep->bindValue(2, $user_id);
    }
    $prep->execute();

}



header("Location:index.php");
exit();
?>
