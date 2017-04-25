{include file="tpl/header.tpl"}
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
{foreach from=$tab item=contenu}
<blockquote>
    <p>Posté par {$contenu.pseudo} </p>
    <p> {$contenu.contenu} </p>
    <p> Date d'ajout: {$contenu.DateC|date_format :"%D-%H h %M m %S s"} </p>
    {if $contenu.DateM!=0}
    <p> Date de modification: {$contenu.DateM|date_format: "%D-%H h %M m %S s"}</p>

    {/if}
    {if $connex == "co"}
      <a href="index.php?id={$contenu.message_id}">
          <button type="button" class="btn btn-success btn-lg">Modifier</button>
      </a>
      <a href="suppression_message.php?id={$contenu.message_id}">
          <button type="button" class="btn btn-primary btn-lg">Supprimer</button>
      </a>
      <p><span class='likePost' id={$contenu.message_id}  data-id={$contenu.nbLike}>{$contenu.nbLike} <img src='/micro_blog/img/like.png' width=5% height=5%></span> </p>
    {/if}

</blockquote>

 <br/>

{/foreach}

{if $connex == "co"}
<div id="ok">
</div>

  <div class="row">
      <form method="post" action="message.php">
          <div class="col-sm-10">
              <div class="form-group">
                  <textarea id="message" name="message" class="form-control" placeholder="Message">{$rep}</textarea>
                  <input type="hidden" id="id" name="id" value={$id} >
              </div>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
          </div>
      </form>
  </div>

{/if}
{literal}<script>
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
</script>{/literal}
<ul class="pagination">
{if $lienHashtag!=""}
    {if $page>1}
        <li><a href="index.php?page={$page-1}&lienHashtag={$lienHashtag}"><</a></li>
    {/if}
        {for $i=1 to {$nb_pages-1}}
          <li><a href="index.php?page={$i}&lienHashtag={$lienHashtag}">{$i}</a></li>
        {/for}
    {if $page < $nb_pages-1}
        <li><a href="index.php?page={$page+1}&lienHashtag={$lienHashtag}">></a></li>
    {/if}
  {else}
    {if $page>1}
        <li><a href="index.php?page={$page-1}"><</a></li>
    {/if}
        {for $i=1 to {$nb_pages-1}}
          <li><a href="index.php?page={$i}">{$i}</a></li>
        {/for}
    {if $page < $nb_pages-1}
        <li><a href="index.php?page={$page+1}">></a></li>
    {/if}
{/if}

</ul>
