<?php


namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\CategorieManager;

class SecurityController extends AbstractController implements ControllerInterface{
    
    
    public function index(){}
    
    public function listUsers(){
        $userManager =  UserManager();

        return [
            "view" => VIEW_DIR."forum/listUsers.php",
            "data" => [
                "users" =>$userManager->findEmailByUser($email),
            ]];
    }
    public function register(){

        if(isset($_GET['action'])){
            if($_POST["submit"]) {
                //filtre champ du form d'inscription
                $pseudo = filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST,"pass2",FILTER_SANITIZE_SPECIAL_CHARS);

            if($pseudo && $email && $pass1 && $pass2){
                //var_dump("ok");die;
                // $requet = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                // $requet->execute(["email" => $email]);
                // $user = $requet->fetch();
                return[
                    "view" => VIEW_DIR."forum/listUsers.php",
                    "data" =>[
                        "user" => $userManager->findEmailByUser($email),
                ]];
            }

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
    }    


        public function login(){
            if($_POST["submit"]){
                $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);

                if($email && $pass1){
                    $requet = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $requet->execute(["email" => $email]);
                $user = $requet->fetch();
                    //est ce que user exist
                    if($user){
                        $hash = $user['password'];
                        if(password_verify($pass1,$hash));{
                            $_SESSION['user'] = $user;
                            header("Location: home.php");exit;
                        }
                        }else{
                            header("Location: login.php");exit;
                        }
                    }else{

                        }
                }
                $this->redirectTo("security","login");
        }

        public function profil(){
            $this->redirectTo("security","profil");

        }
        public function logout(){
            unset($_SESSION['user']);
            header("Location: home.php");exit;
        }