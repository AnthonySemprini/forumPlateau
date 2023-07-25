<h1>Mon profil</h1>

<?php
if(isset($_SESSION['user'])){
$infosSession = $_SESSION['user'];
//var_dump($_SESSION['user']);die;
}

?>

<p>pseudo : <?= $infosSession['pseudo']?></p>
<p>email : <?= $infosSession['email']?></p>