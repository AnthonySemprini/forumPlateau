<?php

$users = $result["data"]['user'];
//var_dump(['data']['users']);
if(isset($users)){   
?>

<h1>Liste des users</h1>

<?php
foreach($users as $user ){
  ?>
  <table style=" border: solid black 1px; border-collapse: collapse; margin:15px">
    <tbody>
      <tr style="">
        <td style="padding:15px">
  <p>User : <?= $user->getPseudo()?></p>
  <p>Email :<?= $user->getEmail()?></p>
  <a style="color:red" href="">Bannir</a><br>
  </td>
  </tr>
  </tbody>
  </table>
  <?php
}
}else{

  echo "user vide";
}
?>


