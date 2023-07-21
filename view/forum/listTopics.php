<?php

$topics = $result["data"]['topics'];
//$categorys = $result["data"]['categorys'];
//var_dump($topics);die;
  if(isset($topics)){
?>

<h1>Liste des topics</h1>

<?php
    
foreach($topics as $topic ){
        
        ?>
    <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId() ;?>">
    <p><?=$topic->getTitle()."</a><br>Crée par ".$topic->getUser()."<br> Date :".$topic->getDateCrea() ?></p>
    <?php


}
}else{

    echo "Cette categorie est vide";
}
?>


<form method="POST" action="index.php?ctrl=forum&action=addTopic&id=<?= $_GET['id']?>">
  <p>Titre</p>
  <input type="text" name="title">
  <br>
  <input type="submit" name="submit" >
</form> 


