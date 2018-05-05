<?php
    class Product {
        //Tabla y bbdd
        private $db;
        private $table = "product";
        
        //Properties
        public $id;
        public $name;
        public $desc;
        public $price;
        public $stock;
        public $img;
        public $alt;
        
        //Constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function getProduct(){
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id="' . $this->id . '";';
            return $this->conn->query($query);
        }
    
    }
        


?>