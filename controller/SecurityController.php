<?php


namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\CategorieManager;

class SecurityController extends AbstractController implements ControllerInterface{
    
    
    public function index(){}
    
    //!--------------------------------- REGISTER ------------------------------------------------

    public function register(){

        $userManager = new UserManager();

        if(isset($_GET['action'])){
            if($_POST["submit"]) {
                //filtre champ du form d'inscription
                $pseudo = filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST,"pass2",FILTER_SANITIZE_SPECIAL_CHARS);

                if($pseudo && $email && $pass1 && $pass2){
                    //verifie si tt est remplie
                    
                    
                    if(!$userManager->findUser($email)){
                        //verif si l'utilisateur exist deja
                        
                        if($pass1 == $pass2 && strlen($pass1) >= 5){
                            // var_dump($pseudo, $email, $pass1);die;
                            //verif si pass 1 et pass2 son egal et qu'ils ont au moin 5 caracthéres
                            
                            $userManager->add([
                                // var_dump("ok");die;
                                "pseudo" => $pseudo ,
                                "password" => password_hash($pass1, PASSWORD_DEFAULT), 
                                "email" => $email, 
                            ]);
                            $this->redirectTo("security","loginForm");
                                }else{
                                    echo "les mots de passe ne sont pas identique ou trop court";
                                }
                            
                    }else{
                        echo "Vous avez deja un compte";
                    }
                }else{
                    echo "Veuillez remplir tous les champs";
                }
                }
            }
        }
    
        public function registerForm(){
            return [
                "view" => VIEW_DIR."security/register.php"
            ];
        }

     //!--------------------------------- LOGIN ------------------------------------------------    

        public function login(){

            $userManager = new UserManager();

            if($_POST["submit"]){
                //si submit valider
                $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL); //contre faille XSS
                $pass1 = filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_SPECIAL_CHARS);

                if($email && $pass1){// verif form bien rempli
                    $user = $userManager->findUser($email);
                    //est ce que user exist

                    // recup password dans user pour stock dans $hash
                        if($user && password_verify($pass1,$user->getPassword())){
                            //verif pass1 et = a $hash
                            $_SESSION['user'] = $user;
                            // ouvre session user
                            header("Location: index.php?ctrl=home&action=index");exit;
                        }
                //     }else{
                //             header("Location: login.php");exit;
                //     }
                // }else{
               // }
                 }
            }
                // $this->redirectTo("security","login");
        }

        public function loginForm(){
            return [
                "view" => VIEW_DIR."security/login.php"
            ];
        }

        
        public function logOut(){
            unset($_SESSION['user']);
            $this->redirectTo("view","home");
        }

 //!--------------------------------- USER & PROFIL ------------------------------------------------

        public function deleteUser($id){
            $userManager = new UserManager();
           
            if(Session::isAdmin()){
                $userManager->delete($id);
                Session::addFlash("success","vous avez supprimer l'user avec succès");
                $this->redirectTo("forum","listUsers");
            }
        }

        public function profil(){
            $this->redirectTo("security","profil");

        }
       
            
       
}