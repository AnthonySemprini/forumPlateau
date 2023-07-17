<?php

$posts = $result["data"]['posts'];
if(isset($posts)){   
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){
    ?>
  <p><?=$post->gettext()?></p>
    <?php
}
}else{

  echo "Post vide";
}
//var_dump($posts);die;
