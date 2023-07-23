<?php

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "register":
            //filtre champ du form d'inscription
            $pseudo = filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
            $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST,"pass2",FILTER_SANITIZE_SPECIAL_CHARS);

            if($pseudo && $emailil && $pass1 && $pass2){
                //var_dump("ok");die;
                $requet = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $requet->execute(["email" => $email]);
                $user = $requet->fetch();
                // si l'utilisateur exist
                if($user){
                    header("Location: register.php"); exit;
                }else{
                    //var_dump("no user");die;
                    //insertion de l'utilisateur dans la bdd
                    if($pass1 == $pass2 && strlen($pass1) >= 5){
                        $insertUser = $pdo ->prepare(
                                            "INSERT INTO user (pseudo, email, password) 
                                             VALUE (:pseudo, :email, :password)");
                        $insertUser->execute([
                                "pseudo" => $pseudo,
                                "email" => $email,
                                "password" => password_hash($pass1, PASSWORD_DEFAULT)
                                //hash le pass1 
                        ]);
                        header("Location: login.php");exit;
                }
            }
            break;
    }
}