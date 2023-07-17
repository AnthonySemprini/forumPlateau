<?php

$categorys = $result["data"]['categorys'];
    
?>

<h1>Liste des categorie</h1>
<div>
<?php
foreach($categorys as $category ){
   // var_dump($category->getId());die;
    ?>
    <a href="index.php?ctrl=forum&action=listTopics&id=<?=$category->getId() ;?>">
    <p><?=$category->getTitle()?></p></a>
    <?php
}
?>
</div>  
