<h1>BIENVENUE SUR LE FORUM</h1>

<?php
if(isset($_SESSION['user'])) {
    echo "<p>Hello".$_SESSION['user']['pseudo']."</p>";
}
?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ut nemo quia voluptas numquam, itaque ipsa soluta ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>


<?php
//var_dump($_SESSION); verif user est connect

//verififie si connect
if(isset($_SESSION['user'])) { ?>
        <a href="index.php?ctrl=security&action=logout">Se deconnecter</a>
        <a href="index.php?ctrl=security&action=profil">Mon profil</a>
        <?php }else{ ?>
            <p>
                <a href="index.php?ctrl=security&action=login">Se connecter</a>
                <span>&nbsp;-&nbsp;</span>
                <a href="index.php?ctrl=security&action=register">S'inscrire</a>
            </p>

    <?php } ?>
