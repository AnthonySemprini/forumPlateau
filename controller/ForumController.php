<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;

class ForumController extends AbstractController implements ControllerInterface{
    
    public function index(){
        // var_dump("ok");die;
       

        $topicManager = new TopicManager();
         $categoryManager = new CategoryManager();

         return [
             "view" => VIEW_DIR."forum/listTopics.php",
             "data" => [
                 "topics" => $topicManager->findAll(["dateCrea", "DESC"]),
                 "categorys" => $categoryManager->findAll(['title', "ASC"])
                 ]
             ];
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
        public function listTopic(){
           //var_dump("ok");die;
           
 
             $topicManager = new TopicManager();
 
             //var_dump($topicManager->findAll(['title', "ASC"])->current());die;
 
             return [
                 "view" => VIEW_DIR."forum/listTopic.php",
                 "data" => [
              
                     "topics" => $topicManager->findAll(['title', "ASC"])
                     ]
                 ];
         }
 
        

    }
