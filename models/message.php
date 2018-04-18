<?php
    class Message {
        
        public $id;
        public $user;
        public $text;
        
        public function __construct($id, $user, $text){
            $this->id = $id;
            $this->user = $user;
            $this->text = $text;
        }
        
    }

?>