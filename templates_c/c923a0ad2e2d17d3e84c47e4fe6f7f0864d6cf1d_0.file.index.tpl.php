<?php
/* Smarty version 3.1.31, created on 2017-03-29 15:37:40
  from "C:\UwAmp\www\micro_blog\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58dbb8a4076f84_20334206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c923a0ad2e2d17d3e84c47e4fe6f7f0864d6cf1d' => 
    array (
      0 => 'C:\\UwAmp\\www\\micro_blog\\index.tpl',
      1 => 1490794655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:haut.tpl' => 1,
  ),
),false)) {
function content_58dbb8a4076f84_20334206 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\UwAmp\\www\\micro_blog\\tpl\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:haut.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <form method="post" action="index.php">
        <div class="col-sm-10">
            <div class="form-group">
                <textarea id="recherche" name="recherche" class="form-control"
                          placeholder="Recherche"> </textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">Rechercher</button>
        </div>
    </form>
</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value, 'contenu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contenu']->value) {
?>
<blockquote>
    <p>Posté par <?php echo $_smarty_tpl->tpl_vars['contenu']->value['pseudo'];?>
 </p>
    <p> <?php echo $_smarty_tpl->tpl_vars['contenu']->value['contenu'];?>
 </p>
    <p> Date d'ajout: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['contenu']->value['DateC'],"%D-%H h %M m %S s");?>
 </p>
    <?php if ($_smarty_tpl->tpl_vars['contenu']->value['DateM'] > 0) {?>
    <p> Date de modification: <?php echo $_smarty_tpl->tpl_vars['contenu']->value['DateM'];?>
</p>

    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['connex']->value == "co") {?>
      <a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['contenu']->value['message_id'];?>
">
          <button type="button" class="btn btn-success btn-lg">Modifier</button>
      </a>
      <a href="suppression_message.php?id=<?php echo $_smarty_tpl->tpl_vars['contenu']->value['message_id'];?>
">
          <button type="button" class="btn btn-primary btn-lg">Supprimer</button>
      </a>
    <?php }?>

</blockquote>

 <br/>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php if ($_smarty_tpl->tpl_vars['connex']->value == "co") {?>
  <div class="row">
      <form method="post" action="message.php">
          <div class="col-sm-10">
              <div class="form-group">
                  <textarea id="message" name="message" class="form-control" placeholder="Message"><?php echo $_smarty_tpl->tpl_vars['rep']->value;?>
</textarea>
                  <input type="hidden" id="id" name="id" value=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 >
              </div>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
          </div>
      </form>
  </div>
<?php }?>


<ul class="pagination">
<?php if ($_smarty_tpl->tpl_vars['search']->value != '') {?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"><</a></li>
    <?php }?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['nb_pages']->value-1;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_prefixVariable1+1 - (1) : 1-($_prefixVariable1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
          <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
        <?php }
}
?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['nb_pages']->value-1) {?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
&search=<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">></a></li>
    <?php }?>
  <?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"><</a></li>
    <?php }?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['nb_pages']->value-1;
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_prefixVariable2+1 - (1) : 1-($_prefixVariable2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
          <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
        <?php }
}
?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['nb_pages']->value-1) {?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
">></a></li>
    <?php }
}?>

</ul>
<?php }
}
