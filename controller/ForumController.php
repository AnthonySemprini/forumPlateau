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
            //var_dump("ok");die;
            
  
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();
           

  
              //var_dump($topicManager->findAll(['title', "ASC"])->current());die;
        
                return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
               
                   "topics" => $topicManager->findTopicByCategory($id),
                   "categorys" => $categoryManager->findAll(['title', "ASC"])
                    ]];
          }

          public function addTopic($id){

            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();

            
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
