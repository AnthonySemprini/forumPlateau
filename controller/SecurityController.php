<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\CategorieManager;

class SecurityController extends AbstractController implements ControllerInterface{

public function index(){}

public function register(){

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "register":
            if($_POST["submit"]) {
            //filtre champ du form d'inscription
            $pseudo = filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
            $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST,"pass2",FILTER_SANITIZE_SPECIAL_CHARS);

        if($pseudo && $email && $pass1 && $pass2){
            //var_dump("ok");die;
            $requet = $pdo->prepare("SELECT * FROM user WHERE email = :email");
            $requet->execute(["email" => $email]);
            $user = $requet->fetch();
            // si l'utilisateur exist
          
                    if($user){
                        $this->redirectTo("security","register");
                    }else{
                        //var_dump("no user");die;
                        //insertion de l'utilisateur dans la bdd
                        if($pass1 == $pass2 && strlen($pass1) >= 5){
                            
                            
                            $insertUser->add($data = [
                                "password" => password_hash($pass1, PASSWORD_DEFAULT), 
                                "pseudo" => $pseudo ,
                                "email" => $email 
                            ]);
                            $this->redirectTo("security","login");
                        }else{
                            //message "les mots de passe ne sont pas identique ou trop court
                        }
                    }
                }else{
            //probleme de saisie dans les champs du formulaire
        }
    }
}

break;

case "login":
    if($_POST["submit"]){
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
        $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);

        if($email && $pass1){
            if(!$userManager->findOnebyEmail($email)){
    }

    $this->redirectTo("security","login");
    break;

    case "logout":
        break;
}
    }
}
}
}