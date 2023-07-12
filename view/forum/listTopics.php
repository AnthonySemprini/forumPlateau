<?php

$topics = $result["data"]['topics'];
    
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){
    ?>
    <p><?=$topic->getTitle()?></p>
    <?php
}
// var_dump($topic);die;


  
