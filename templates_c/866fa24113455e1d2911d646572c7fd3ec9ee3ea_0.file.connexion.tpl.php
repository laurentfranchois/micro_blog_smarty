<?php
/* Smarty version 3.1.31, created on 2017-02-28 15:41:48
  from "C:\UwAmp\www\micro_blog\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58b59a3cad4fb0_95314896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '866fa24113455e1d2911d646572c7fd3ec9ee3ea' => 
    array (
      0 => 'C:\\UwAmp\\www\\micro_blog\\connexion.tpl',
      1 => 1488296482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b59a3cad4fb0_95314896 (Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="connexion.php" method="post">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd" id="pwd">
    </div>
    <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php }
}
