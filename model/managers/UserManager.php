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

        public function findUser($email){

            $sql = "SELECT *
            FROM ".$this->tableName." u
            WHERE email = :email";
            
            return $this->getMultipleResults(
                DAO::select($sql, ['email' => $email]),
                $this->className
            );
        }

        

        public function verifEmail($email){

            $sql = "SELECT *
                    FROM" .$this->tableName."u
                    WHERE email = :email";
                    return $this->getMultipleResults(
                        DAO::select($sql, ['email' => $email]),
                        $this->className
                    );    
        }
        public function verifPassWord($password){
            $sql = "SELECT *
            FROM" .$this->tableName."u
            WHERE password = :password";
            return $this->getMultipleResults(
                DAO::select($sql, ['password' => $password]),
                $this->className
            );    
        }

    }