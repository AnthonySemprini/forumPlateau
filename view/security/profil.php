<h1>Mon profil</h1>

<?php
if(isset($_SESSION['user'])){
$infosSession = $_SESSION['user'];
}

?>

<p>pseudo : <?= $infosSession['pseudo']?></p>
<p>pseudo : <?= $infosSession['email']?></p>