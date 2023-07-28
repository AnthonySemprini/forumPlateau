<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct(){
            parent::connect();
        }
        public function findPostByTopics($id){ //fonction permettant de recup dans la bdd les topics d'une categorie


            //requet sql
       $sql = "SELECT *                       
               FROM ".$this->tableName." p
               WHERE topic_id = :id"; 
               
       return $this->getMultipleResults(
           DAO::select($sql, ['id' =>$id]),
           $this->className
       );
   }

    }