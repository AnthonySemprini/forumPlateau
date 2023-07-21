<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface{
    
    public function index(){
        // var_dump("ok");die;
      
      
     }

    public function listCategory(){
           // var_dump("ok");die;
          

            $categoryManager = new CategoryManager();

            // var_dump($categoryManager->findAll(['title', "ASC"])->current());die;

            return [
                "view" => VIEW_DIR."forum/listCategory.php",
                "data" => [
             
                    "categorys" => $categoryManager->findAll(['title', "ASC"])
                    ]
                ];
        }
        
         
       public function listTopics($id){
            
            
  
            $topicManager = new TopicManager();
            //$categoryManager = new CategoryManager();
            
            
            
              //var_dump($topicManager->findAll(['title', "ASC"])->current());die;
              
                return [
                    "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    
                   "topics" => $topicManager->findTopicByCategory($id),
                   //"categorys" => $categoryManager->findAll(['title', "ASC"])
                   ]];
                }
                //var_dump("ok");die;
                
                public function addTopic($id){ 
                    $topicManager = new TopicManager();
                    //if($_SESSION['user']){
                        $user = 1;
                        
                        //var_dump("test2");die;
                        
                        if(isset($_POST['submit'])){
                            //var_dump($_POST['submit']);die;
                            
                            if(isset($_POST['title']) && (!empty($_POST['title']))){// verifie si title existe et si il est vide
                                $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                
                                
                                $topicManager->add( $data=[
                                    
                                    //var_dump("test4"),die,
                                    "title"=>$title,
                                    "user_id"=>$user,
                                    "category_id"=>$id
                                ]);
                                //var_dump($title);die;
                            }
                            
                        }
                        $this->redirectTo("forum",'listTopics',$id);   
                }
                

        

         public function listPosts($id){
            //var_dump("ok");die;
            
  
              $postManager = new PostManager();
  
              //var_dump($postManager->findAll(['title', "ASC"])->current());die;
           
              return [
                  "view" => VIEW_DIR."forum/listPosts.php",
                  "data" => [
               
                      "posts" => $postManager->findPostByTopics($id)
                      ]
                  ];
          }
 
        

    }
