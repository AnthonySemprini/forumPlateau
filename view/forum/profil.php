<div class="profile">
    <h1>Mon profil</h1>

    <img class="user" src="public/img/user.png" alt="">
    <?php
    if (isset($_SESSION['user'])) {
        //var_dump($_SESSION['user']);die;
        $infosSession = $_SESSION['user'];
    }

    ?>

    <p>Pseudo :
        <?= $infosSession->getPseudo() ?>
    </p>
    <p>Email :
        <?= $infosSession->getEmail() ?>
    </p>
</div>