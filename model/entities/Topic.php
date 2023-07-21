<?php
    namespace Model\Entities;

    use App\Entity;

    final class Topic extends Entity{

        private $id;
        private $title;
        private $text;
        private $dateCrea;
        private $locked;
        private $category;
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
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

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

        public function getDateCrea(){
            $formattedDate = $this->dateCrea->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setdateCrea($date){
            $this->dateCrea = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of locked
         */ 
        public function getlocked()
        {
                return $this->locked;
        }

        /**
         * Set the value of locked
         *
         * @return  self
         */ 
        public function setlocked($locked)
        {
                $this->locked = $locked;

                return $this;
        }
        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }
    }
