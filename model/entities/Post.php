<?php
    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity{

        private $id;
        private $text;
        private $dateCrea;
        private $topic;
        private $user;
    
        
        public function __construct($data){         
            $this->hydrate($data);        
        }
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        /**
         * Get the value of text
         */ 
        public function gettext()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function settext($text)
        {
                $this->text = $text;

                return $this;
        }
        public function getdateCrea(){
            $formattedDate = $this->dateCrea->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setdateCrea($date){
            $this->dateCrea = new \DateTime($date);
            return $this;
        }
        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }
        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
                return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }

        
    }