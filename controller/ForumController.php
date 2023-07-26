<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;
use Model\Managers\PostManager;
use Model\Managers\UserManager;

class ForumController extends AbstractController implements ControllerInterface{
    
    public function index(){
        // var_dump("ok");die;
      
      
     }
    //!----------------------------- CATEGORY ----------------------------------------------

    public function listCategory(){
        $categoryManager = new CategoryManager();

        // var_dump($categoryManager->findAll(['title', "ASC"])->current());die;

        return [
            "view" => VIEW_DIR."forum/listCategory.php",
            "data" => [
            
                "categorys" => $categoryManager->findAll(['title', "ASC"])
                ]
            ];
    }
        
    //!----------------------------- Topic ----------------------------------------------     

    public function listTopics($id){
        $topicManager = new TopicManager();
          
            return [
                "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                
                "topics" => $topicManager->findTopicByCategory($id),
                //"categorys" => $categoryManager->findAll(['title', "ASC"])
                ]];
    }
               
                
    public function addTopic($id){ 
        $topicManager = new TopicManager();
        if($_SESSION['user']){
            $user = 1;
            
            //var_dump("test2");die;
            
            if(isset($_POST['submit'])){
                //var_dump($_POST['submit']);die;
                
                if(isset($_POST['title']) && ($_POST['text']) && (!empty($_POST['title'])) && ($_POST['text'])){// verifie si title existe et si il est vide
                    $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $text = filter_input(INPUT_POST,'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    
                    
                    
                    $topicManager->add( $data=[
                        
                        //var_dump("test4"),die,
                        "title"=>$title,
                        "text"=>$text,
                        "user_id"=>$_SESSION['user']->getId(),
                        "category_id"=>$id
                    ]);
                }    
                
            }
            $this->redirectTo("forum",'listTopics',$id);   
        }
    }
                
    public function deleteTopic($id){
        $topicManager = new TopicManager();
        $userManager = new UserManager();
        
        if(Session::isAdmin()){
            $topicManager->delete($id);
            Session::addFlash("success","vous avez supprimer le topic avec succès");
            $this->redirectTo("view","home");
        }else{
            echo "Impossible pour vous de supprimer ce topic";
            
        }
        
    }

    //!----------------------------- POST ----------------------------------------------

    public function listPosts($id){
        $postManager = new PostManager();
        //var_dump("ok");die;
        return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
            
                    "posts" => $postManager->findPostByTopics($id)
                    ]
                ];
    }
    public function addPost($id){ 
        $postManager = new PostManager();
        if($_SESSION['user']){
         

            if(isset($_POST['submit'])){
        //var_dump($_POST['submit']);die;
        
        if(isset($_POST['text']) && !empty($_POST['text'])){// verifie si text existe et si il est vide
            $text = filter_input(INPUT_POST,'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            
            
            $postManager->add( $data=[
                
                //var_dump("test4"),die,
                
                "text"=>$text,
                "user_id"=>$_SESSION['user']->getId(),
                "topic_id"=>$id
            ]);
                //var_dump($text);die;
            //var_dump($text);die;
        }    
        $this->redirectTo("forum",'listPosts',$id);   
        }


        }
        
    }                

    public function deletePost($id){
        $postManager = new PostManager();
        $userManager = new UserManager();
        
        if(Session::isAdmin()){
            $postManager->delete($id);
            Session::addFlash("success","vous avez supprimer le post avec succès");
            $this->redirectTo("view","home");
        }else{
            Session::addFlash("succes","Vous ne pouvez pas supprimer le post");
            $this->redirectTo("forum","listposts");
        }

    }
                    
    //!----------------------------- USER ----------------------------------------------

    public function profilUser($id){
        $userManager = new UserManager();

        return[
            "view" => VIEW_DIR."forum/profil.php",
            "data" => [
                "user" => $userManager->findUser($id)

            ]
            ];
    }
   
    public function listUsers($id){
    //var_dump("ok");die;
    

    $userManager = new UserManager();

    //var_dump($postManager->findAll(['title', "ASC"])->current());die;

    return [
        "view" => VIEW_DIR."forum/listUsers.php",
        "data" => [
        
        "user" => $userManager->findAll(['pseudo']),
        
        
            ]
        ];
    }
}
