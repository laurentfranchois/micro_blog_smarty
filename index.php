

<?php
//MrClay et minify pour minification JS CSS
date_default_timezone_set('Europe/Paris');
include('includes/connexion.inc.php');
require("tpl/smarty.class.php");

if($connecte==true){
  $connex="co";
}
else{
  $connex="deco";
}
$lienHashtag="";
$smarty = new Smarty();
$tab=array();
$id = 0;
$rep = "";
//Nombre de messages postes par page
$npp = 5;
$variable= new Smarty();


//Barre de recherche

//permet de calculer le nombre total de messages
$query = "select count(*) as total from messages ";
$prep = $pdo->query($query);
$data = $prep->fetch();
$nb_msg = $data['total'];

$nb_pages = ($nb_msg) ? ceil($nb_msg / $npp) : 1;
//si l'utilisateur se situe au dela de la premiere page
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$nb_pages++;


//taille de l'index
$index = ($page - 1) * $npp;


if(isset($_GET['lienHashtag'])){
    $lienHashtag=$_GET['lienHashtag'];
    $lienHashtag2="%".$_GET['lienHashtag']."%";

    $query='SELECT * , messages.id as message_id FROM messages INNER JOIN utilisateurs ON
     messages.user_id = utilisateurs.id where  messages.contenu like ?  order by message_id asc LIMIT ? , ?  ';

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(1,$lienHashtag2);
    $stmt->bindValue(2, $index , PDO::PARAM_INT);
    $stmt->bindValue(3,$npp, PDO::PARAM_INT);
}
//s'il y a sollicitation de la fonction de recherche
else if (isset($_POST['recherche']) && !empty($_POST['recherche'])) {
    $variable = $_POST['recherche'];
    //requete de recherche
    $query = 'SELECT *, messages.id as message_id FROM
          messages INNER JOIN utilisateurs on messages.user_id =  utilisateurs.id where messages.contenu LIKE "%' . $variable . '%" ';
          $stmt=$pdo->prepare($query);
} //recuperation de tous les messages suivant la limite de messages par page
else {
    $query = 'SELECT *, messages.id as message_id FROM
          messages INNER JOIN utilisateurs on messages.user_id =  utilisateurs.id  LIMIT ' . $index . ',' . $npp . '';
          $stmt=$pdo->prepare($query);

}

$stmt->execute();

foreach($stmt as $message){
  // verification de la presence de # et mise et mise en place de l interactivite
  if( preg_match_all("/#([A-Za-z0-9]+)/",$message['contenu'],$matchs,PREG_SET_ORDER)){
    foreach ($matchs as $donnee) {
       $hashtag = "<a href='?lienHashtag=".$donnee[1]."'>".$donnee[0]."</a>";
      $message['contenu'] = preg_replace("/".$donnee[0]."/", $hashtag,$message['contenu']);
    }
}
else if(preg_match_all("/(?:http|https):\/\/((?:[\w-]+)(?:\.[\w-]+)+)(?:[\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/",$message['contenu'], $matchs, PREG_SET_ORDER)){
     $url = "<a href='".$matchs[0][0]."'>".$matchs[0][0]."</a>";
     $message['contenu']=preg_replace("`".$matchs[0][0]."`", $url, $message['contenu']);
}
else if(preg_match_all("/[a-z0-9\-\.]+@[a-z0-9\-\.]+\.[a-z]+/", $message['contenu'], $matchs,PREG_SET_ORDER)){
     $email="<a href='mailto:".$matchs[0][0]."'>".$matchs[0][0]."</a>";
     $message['contenu']= preg_replace("/".$matchs[0][0]."/",$email,$message['contenu']);
}
array_push($tab, array('message_id'=>$message['message_id'],
'contenu' =>$message['contenu'],'pseudo'=>$message['pseudo'],
'nbLike' =>$message['nbLike'],
'DateC' =>$message['DateC'],'DateM' => $message['DateM']));


}


//recuperation du message quand l'utilisateur souhaite le modifier
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from messages where id='" . $id . "'";
    $prep = $pdo->query($query);
    if ($data = $prep->fetch()) {
        $rep = $data['contenu'];
    }
}

//$tab=$stmt->fetchAll();
//int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] );
//$smarty -> assign("data2",$data2);
$smarty->assign("tab",$tab);
$smarty->assign("rep",$rep);
$smarty->assign("id",$id);
$smarty->assign("connex",$connex);
$smarty->assign("page",$page);
$smarty->assign("nb_pages",$nb_pages);
$smarty->assign("lienHashtag",$lienHashtag);
$smarty->display("tpl/index.tpl");






    //affichage des messages
    ?>


<?php
include('includes/bas.inc.php'); ?>
