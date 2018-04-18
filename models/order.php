<?php
    require('product.php')
    require('../controllers/order')
    
    class Order {
        
        public $id;
        public $user;
        public $date;
        public $value;
        public $details;
        
        public function __constructor($id, $user, $date, $value, $details){
            $this->id = $id;
            $this->user = $user;
            $this->date = $date;
            $this->value = $value;
            $this->details = $details;
        }
    }
?>