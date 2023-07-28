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

// $IdPost = $post->getId();
$locker = $post->getTopic()->getlocked();

// var_dump($idTopic);die;
If($locker == 1){
?>

<form method="POST" action="index.php?ctrl=forum&action=addPost&id=<?= $_GET['id']?>">
<input class="post" name="text" >
<input name="submit" type="submit">
</form>
<?php
}else{
?>
<form method="POST" action="index.php?ctrl=forum&action=addPost&id=<?= $_GET['id']?>">
<p style="border-radius:8px; font-size:25px;color:White ;  text-align:center ; Width:220px ; Height:30px ; background-color:red" >Topic verrouiller !!!</p>
</form>
<?php
} 
?>