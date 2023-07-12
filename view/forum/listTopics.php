<?php

$topics = $result["data"]['topics'];
    
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){
    ?>
    <a href='index.php?ctrl=forum&action=listPosts'><p><?=$topic->getTitle()?></p></a>
    <?php
}
// var_dump($topic);die;


  
