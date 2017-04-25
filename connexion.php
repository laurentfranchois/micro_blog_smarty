<?php
include('includes/connexion.inc.php');
require("tpl/smarty.class.php");


$smarty = new Smarty();
$connex='deco';
$smarty->assign('connex',$connex);
$smarty->display("tpl/header.tpl");


//verification du remplissage de tous les champs
if (isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo'])) {
    $sid = $email . time();
    $sid = md5($sid);
    //insertion dans la base de donnees du nouvel utilisateur
    $query = 'INSERT INTO utilisateurs(nom,prenom,mdp,mail,pseudo,sid) values(?,?,?,?,?,?)';
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $_POST['nom']);
    $prep->bindValue(2, $_POST['prenom']);
    $prep->bindValue(3, $_POST['pwd']);
    $prep->bindValue(4, $_POST['email']);
    $prep->bindValue(5, $_POST['pseudo']);
    $prep->bindValue(6, $sid);
    $prep->execute();
}


if (isset($_POST['email']) && isset($_POST['pwd'])) {
    //requete afin de se connecter
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    $query = "SELECT * FROM utilisateurs WHERE mail=? and mdp=?";
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $email);
    $prep->bindValue(2, $pwd);
    $prep->execute();


    if ($prep->fetch()) {
        //generation du sid a l'aide d'une fonction md5
        $sid = $email . time();
        $sid = md5($sid);
        setcookie("sid", $sid, time() + 300, null, null, false, true);
        $query = "UPDATE utilisateurs SET sid=? where mail=?";
        $prep = $pdo->prepare($query);
        $prep->bindValue(1, $sid);
        $prep->bindValue(2, $email);
        $prep->execute();
        header("Location:index.php");
    }
}

$smarty->display("tpl/connexion.tpl");

?>


<!--
Script non execute

<script>
  alert("erreur");
  $(function()){

    $('#form').submit(function()){
      var email=$("#email").val();
      var pwd=$("#pwd").val();

      if((id=="") || (pwd=="")){


      }
    });
  });
</script>
 –-/>
<?php include('includes/bas.inc.php'); ?>
