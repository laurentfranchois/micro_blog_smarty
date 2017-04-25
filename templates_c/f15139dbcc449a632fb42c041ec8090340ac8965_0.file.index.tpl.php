<?php
/* Smarty version 3.1.31, created on 2017-04-24 17:11:47
  from "C:\UwAmp\www\micro_blog\tpl\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58fe15b34643f0_28997688',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f15139dbcc449a632fb42c041ec8090340ac8965' => 
    array (
      0 => 'C:\\UwAmp\\www\\micro_blog\\tpl\\index.tpl',
      1 => 1493046124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/header.tpl' => 1,
  ),
),false)) {
function content_58fe15b34643f0_28997688 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\UwAmp\\www\\micro_blog\\tpl\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:tpl/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
    <?php if ($_smarty_tpl->tpl_vars['contenu']->value['DateM'] != 0) {?>
    <p> Date de modification: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['contenu']->value['DateM'],"%D-%H h %M m %S s");?>
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
      <p><span class='likePost' id=<?php echo $_smarty_tpl->tpl_vars['contenu']->value['message_id'];?>
  data-id=<?php echo $_smarty_tpl->tpl_vars['contenu']->value['nbLike'];?>
><?php echo $_smarty_tpl->tpl_vars['contenu']->value['nbLike'];?>
 <img src='/micro_blog/img/like.png' width=5% height=5<?php echo '%>';?></span> </p>
    <?php }?>

</blockquote>

 <br/>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php if ($_smarty_tpl->tpl_vars['connex']->value == "co") {?>
<div id="ok">
</div>

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

<?php }
echo '<script'; ?>
>
$("#message").keyup(function(){
$("#ok").empty();
$("#ok").append("<p>Prévisualisation du message</p>");
$("#ok").append(jQuery("#message").val());
});

$(document).on("click",".likePost",function(e){
  var date=2;
  var id=$(this).attr('id');
  var nbLike=$(this).attr('data-id');
  nbLike++;
  e.preventDefault();
  $.ajax({
    url : '/micro_blog/query.php',
    data:'nbLike='+nbLike+'&id='+id+'',
    type : 'GET',
    dataType : 'json',
    success : function(data){
    },
    error : function(resultat, statut, erreur){
    },
    complete : function(resultat, statut){
      $("#"+id).empty();
      $("#"+id).append(nbLike);

    }
  });
});
<?php echo '</script'; ?>
>
<ul class="pagination">
<?php if ($_smarty_tpl->tpl_vars['lienHashtag']->value != '') {?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
&lienHashtag=<?php echo $_smarty_tpl->tpl_vars['lienHashtag']->value;?>
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
&lienHashtag=<?php echo $_smarty_tpl->tpl_vars['lienHashtag']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
        <?php }
}
?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['nb_pages']->value-1) {?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
&lienHashtag=<?php echo $_smarty_tpl->tpl_vars['lienHashtag']->value;?>
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
