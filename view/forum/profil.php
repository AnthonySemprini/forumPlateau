<h1>Mon profil</h1>

<?php
if(isset($_SESSION['user'])){
    //var_dump($_SESSION['user']);die;
$infosSession = $_SESSION['user'];
}

?>

<p>pseudo : <?= $infosSession->getPseudo()?></p>
<p>email : <?= $infosSession->getEmail()?></p>