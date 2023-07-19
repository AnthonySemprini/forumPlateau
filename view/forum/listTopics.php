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


<form method="POST" action="index.php?action=">
  <p>Titre</p>
  <input type="text" name="title">
  <br>
  <p>Premier post</p>
  <input type="text" name="firstPost">
  <br>
  <br>
  <button>Envoyer</button>
</form> 

<!-- <select name="selectCategory" id="">
  <option value="">Selectionner la categorie... </option>
  <?php
  //var_dump($categorys);die;
    foreach($categorys as $category){
      ?>
      <option value="<?= $category->getId()?>"><?= $category->getTitle()?></option>
      <?php
    }
    ?>
</select> -->