<?php

$categorys = $result["data"]['categorys'];
    
?>

<h1>Liste categorie</h1>

<?php
foreach($categorys as $category ){

    ?>
    <p><?=$category->getTitle()?></p>
    <?php
}

var_dump($category);die;
  
