<?php

$users = $result["data"]['users'];
//var_dump(['data']['users']);
if(isset($users)){   
?>

<h1>Liste des users</h1>

<?php
foreach($users as $user ){
    ?>
  <p>user: <?= $user->getEmail()?></p><br>
  <p>user: <?= $user->getPseudo()?></p><br>
    <?php
}
}else{

  echo "user vide";
}
?>


