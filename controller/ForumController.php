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
            
            
            //var_dump("test2");die;
            
            if(isset($_POST['submit'])){
                //var_dump($_POST['submit']);die;
                
                if(isset($_POST['title']) && ($_POST['text']) && (!empty($_POST['title'])) && ($_POST['text'])){   //? verifie si title existe et si il est vide
                    $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_FULL_SPECIAL_CHARS);                   //? protege de  faille xss
                    $text = filter_input(INPUT_POST,'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    
                    
                    
                    $topicManager->add( $data=[
                        
                        //var_dump("test4"),die,
                        "title"=>$title,
                        "text"=>$text,
                        "user_id"=>$_SESSION['user']->getId(),
                        "category_id"=>$id
                    ]);
                
                
                
                }
                $this->redirectTo("forum",'listTopics',$id);   
            }
        }
    }
    public function block(){
    
    }

    public function deleteTopic($id){
        $topicManager = new TopicManager();
        
        $topic = $topicManager->findOneById($id);
        if(Session::isAdmin() OR $topicManager->findOneById($id)->getUser() == Session::getUser()){   //? autorise a suppr l'admin et le createur du post
            $topicManager->delete($id);
            Session::addFlash("success","vous avez supprimer le topic avec succès");    //? affiche vous avez suppr
            $this->redirectTo("forum","listtopics",$topic->getCategory()->getId());     //? redirige vers la list de post du topic en question
        }else{
            Session::addFlash("error","Impossible de supprime le topic");                //? envoi message erreur si suppr et refuse au user
            $this->redirectTo("forum","listtopics",$topic->getCategory()->getId());     //? redirige vers la list de post du topic en question
            
        }
        
    }
    public function blockTopic($id){
        $topicManager = new TopicManager();
        
        $topic = $topicManager->findOneById($id);
        if(Session::isAdmin() OR $topicManager->findOneById($id)->getUser() == Session::getUser()){   //? autorise a suppr l'admin et le createur du post
            $topicManager->block($id);
            Session::addFlash("success","vous avez verrouiller le topic avec succès");    //? affiche vous avez suppr
            $this->redirectTo("forum","listtopics",$topic->getCategory()->getId());     //? redirige vers la list de post du topic en question
        }else{
            Session::addFlash("error","Impossible de verrouiller le topic");                //? envoi message erreur si suppr et refuse au user
            $this->redirectTo("forum","listtopics",$topic->getCategory()->getId());     //? redirige vers la list de post du topic en question
            
        }
        
    }
    public function unBlockTopic($id){
        $topicManager = new TopicManager();
        
        $topic = $topicManager->findOneById($id);
        if(Session::isAdmin() OR $topicManager->findOneById($id)->getUser() == Session::getUser()){   //? autorise a suppr l'admin et le createur du post
            $topicManager->unBlock($id);
            Session::addFlash("success","vous avez deverrouiller le topic avec succès");    //? affiche vous avez suppr
            $this->redirectTo("forum","listtopics",$topic->getCategory()->getId());     //? redirige vers la list de post du topic en question
        }else{
            Session::addFlash("error","Impossible de deverrouiller le topic");                //? envoi message erreur si suppr et refuse au user
            $this->redirectTo("forum","listtopics",$topic->getCategory()->getId());     //? redirige vers la list de post du topic en question
            
        }
        
    }
    
    //!----------------------------- POST ----------------------------------------------
    
    public function listPosts($id){
        $postManager = new PostManager();
        //var_dump("ok");die;
        return [
            "view" => VIEW_DIR."forum/listPosts.php",    //?  redirige vers listpost
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
                    
                    if(isset($_POST['text']) && !empty($_POST['text'])){                             //? verifie si text existe et si il est vide
                        $text = filter_input(INPUT_POST,'text',FILTER_SANITIZE_FULL_SPECIAL_CHARS);   //? protege de  faille xss
                        $postManager->add( $data=[
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
            
            $post = $postManager->findOneById($id);
            if(Session::isAdmin() OR $postManager->findOneById($id)->getUser() == Session::getUser() ){   //? autorise a suppr l'admin et le createur du post
                $postManager->delete($id);
                Session::addFlash("success","vous avez supprimer le post avec succès");                 //? affiche vous avez suppr
                $this->redirectTo("forum","listposts",$post->getTopic()->getId());                      //? redirige vers la list de post du topic en question
            }else{
                Session::addFlash("error","Impossible de supprime le post");                           //? envoi message erreur si suppr et refuse au user
                $this->redirectTo("forum","listposts",$post->getTopic()->getId());                    //? redirige vers la list de post du topic en question
            }
        }
                    
    //!----------------------------- USER ----------------------------------------------

    public function profilUser($id){
        $userManager = new UserManager();

        return[
            "view" => VIEW_DIR."forum/profil.php",    //? dirige vers la list
            "data" => [
                "user" => $userManager->findUser($id)   //? recup tt les infos de user
                ]
            ];
    }
    
    public function listUsers($id){
        $userManager = new UserManager();
        return [
            "view" => VIEW_DIR."forum/listUsers.php",   //? dirige vers la list
            "data" => [
            
            "user" => $userManager->findAll(),   //? recup les Pseudo
            
            
                ]
            ];
    }
}
