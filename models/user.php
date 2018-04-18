<?php 
    class User {
        public $name;
        public $lastname;
        public $email;
        public $id;
        public $avatar;
        public $gender;
        public $birth;
        
        public function __construct($n, $lstnm, $mail, $id, $avatar, $gender, $birth){
            $this->name = $n;
            $this->lastname = $lstnm;
            $this->email = $mail;
            $this->id = $id;
            $this->avatar = $avatar;
            $this->gender = $gender;
            $this->birth = $birth;
        }
    }
?>