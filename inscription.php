<?php
date_default_timezone_set('Europe/Paris');
include('includes/connexion.inc.php');
require("tpl/smarty.class.php");
$connecte = false;
$smarty = new Smarty();
$connex='deco';
$smarty->assign('connex',$connex);
$smarty->display("tpl/header.tpl");






$smarty = new Smarty();
$smarty->display("tpl/inscription.tpl");
//formulaire d'inscription qui renvoie a la connexion
?>



<?php include('includes/bas.inc.php'); ?>
