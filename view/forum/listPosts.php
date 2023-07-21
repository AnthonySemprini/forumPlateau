<?php

$posts = $result["data"]['posts'];
if(isset($posts)){   
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){
    ?>
  <p><?=htmlspecialchars_decode($post->gettext())?><br></p>
  <p>Poster par : <?= $post->getUser()?></p><br>
  <p>Date : <?= $post->getDateCrea()?></p>
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
