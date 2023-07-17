<?php

$posts = $result["data"]['posts'];
if(isset($posts)){   
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){
    ?>
  <p><?=$post->gettext()."<br>Poster par : ".$post->getUser()."<br>Date : ".$post->getDateCrea()?></p>
    <?php
}
}else{

  echo "Post vide";
}
?>
<form action="">
  <input type="text" >
<button>Ecrire un post</button>
</form>