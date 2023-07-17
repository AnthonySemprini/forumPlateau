<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findTopicByCategory($id){ //fonction permettant de recup dans la bdd les topics d'une categorie


                 //requet sql
            $sql = "SELECT *                       
                    FROM ".$this->tableName." t
                    WHERE category_id = :id"; 
                    
            return $this->getMultipleResults(
                DAO::select($sql, ['id' =>$id]),
                $this->className
            );
        }
    }