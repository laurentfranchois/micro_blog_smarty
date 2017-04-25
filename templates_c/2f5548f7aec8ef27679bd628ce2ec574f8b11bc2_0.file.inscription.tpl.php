<?php
/* Smarty version 3.1.31, created on 2017-03-29 16:49:47
  from "C:\UwAmp\www\micro_blog\tpl\inscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58dbc98b9f68b2_62443913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f5548f7aec8ef27679bd628ce2ec574f8b11bc2' => 
    array (
      0 => 'C:\\UwAmp\\www\\micro_blog\\tpl\\inscription.tpl',
      1 => 1488296792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dbc98b9f68b2_62443913 (Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="connexion.php" method="post">
    <div class="form-group">
        <label for="email">Nom:</label>
        <input type="text" class="form-control" name="nom" id="nom">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" name="prenom" id="prenom">
    </div>
    <div class="form-group">
        <label for="pseudo">Pseudo:</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo">
    </div>
    <div class="form-group">
        <label for="email">Adresse e-mail:</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe:</label>
        <input type="password" class="form-control" name="pwd" id="pwd">
    </div>
    <button type="submit" class="btn btn-default">Soumettre</button>
</form>
<?php }
}
