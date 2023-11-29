<div class="home">
    
        <h1>WORLD FORUM</h1>
        <?php
        if (isset($_SESSION['user'])) {
            //var_dump($_SESSION['user']."");die;
            echo "<p class='bienvenue'>Bienvenue " . $_SESSION['user'] . "" . "</p>";
        }
        ?>
        <img class="world" src="public/img/world.png" alt="">

        <p>Ici, vous pouvez partager vos expériences, poser des questions et discuter avec une communauté dynamique
            partageant les mêmes intérêts. N'oubliez pas de lire nos règles avant de publier. Bonne navigation et
            excellentes discussions !"</p>
    </div>
