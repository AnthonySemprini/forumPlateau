<?php

$posts = $result["data"]['posts'];
$array_of_posts = array();
foreach ($posts as $post) {
  $array_of_posts[] = $post;
}
$number_of_posts = count($array_of_posts);

if(isset($posts)){   
  ?>

<h1>Liste des messages du sujet </h1>
<p>Nombre de post : <?=$number_of_posts?></p>

<?php
foreach($array_of_posts as $post ){
  ?>
  <div style=" width:350px ; border-radius:8px ; border:solid black 2px ; padding:15px ; margin:15px">
  <p>ID du message : <?=$post->getId()?></p>
  <p>Message:<?=htmlspecialchars_decode($post->gettext())?></p>
  <p>Posté par : <?= $post->getUser()?></p>
  <p>Date : <?= $post->getDateCrea()?></p>
  <a style="color:red" href="index.php?ctrl=forum&action=deletePost&id=<?=$post->getId()?>">Supprimer le message</a>
  </div>
  <?php
}
}else{
  
  echo "Message vide";
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
<p style="border-radius:8px; font-size:25px;color:White ;  text-align:center ; Width:220px ; Height:30px ; background-color:red" >Sujet verrouillé !!!</p>
</form>
<?php
} 
?>