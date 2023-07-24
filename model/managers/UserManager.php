<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\UserManager;
    
    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";



        public function __construct(){
            parent::connect();
        }

        public function findEmailByUser($id){

            $sql = "SELECT *
            FROM ".$this->tableName." u
            WHERE id_user = :id";
            
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

    }