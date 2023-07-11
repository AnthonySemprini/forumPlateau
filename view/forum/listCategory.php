<?php

$categorys = $result["data"]['categorys'];
    
?>

<h1>liste categorys</h1>

<?php
foreach($categorys as $category ){

    ?>
    <p><?=$category->getTitle()?></p>
    <?php
}


  
