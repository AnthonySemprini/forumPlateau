<?php

$topics = $result["data"]['topics'];
//var_dump($topics);die;
  if(isset($topics)){
?>

<h1>Liste des topics</h1>

<?php
    
foreach($topics as $topic ){
        
        ?>
    <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId() ;?>">
    <p><?=$topic->getTitle()."</a>   ".$topic->getDateCrea()." ".$topic->getUser() ?></p>
    <?php


}
}else{

    echo "Cette categorie est vide";
}


  
