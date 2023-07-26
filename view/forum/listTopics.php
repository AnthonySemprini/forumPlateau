<?php

$topics = $result["data"]['topics'];

//var_dump($topics);die;
  if(isset($topics)){
?>

<h1>Liste des topics </h1>

<?php
    
foreach($topics as $topic ){
        
        ?>
    <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId() ;?>">
    <p><?=$topic->getTitle()."</a><br>
    text: ".$topic->gettext()."<br>
    Crée par ".$topic->getUser()."<br> 
    Date :".$topic->getDateCrea() ?></p>
    <a style="color:red" href="index.php?ctrl=forum&action=deleteTopic&id=<?=$topic->getId()?>">Supprimer le topic</a>
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
  <p>Resume</p>
  <input type="text" name="text">
  <br>
  <input type="submit" name="submit" >
</form> 


