<?php

$categorys = $result["data"]['categorys'];
    
?>

<h1>Liste des categorie</h1>

<?php
foreach($categorys as $category ){

    ?>
    <p><?=$category->getTitle()?></p>
    <?php
}
//var_dump($categorys);die;
  
