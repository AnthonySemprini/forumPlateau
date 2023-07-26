<?php

$posts = $result["data"]['posts'];

//var_dump($category);die;
if(isset($posts)){   
?>

<h1>Liste des posts du topic</h1>

<?php
foreach($posts as $post ){
  ?>
  <p><?=htmlspecialchars_decode($post->gettext())?><br></p>
  <p>Poster par : <?= $post->getUser()?></p><br>
  <p>Date : <?= $post->getDateCrea()?></p>
  <a style="color:red" href="index.php?ctrl=forum&action=deletePost&id=<?=$post->getId()?>">Supprimer le post</a>
  <?php
}
}else{
  
  echo "Post vide";
}
?>

<form method="POST" action="index.php?ctrl=forum&action=addPost&id=<?= $_GET['id']?>">
<input class="post" name="text" >
<input name="submit" type="submit">
</form>
