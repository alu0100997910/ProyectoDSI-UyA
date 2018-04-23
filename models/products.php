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
        
        //Constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function getProduct(){
            $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id="' . $this->id . '";';
            return $this->conn->query($query);
        }
    
        public function updateProduct(){
            $query = 'UPDATE ' . $this->table_name . ' SET ';
            $first=true;
            if ($this->name != null){
                $query = $query . '`name`="'. $this->name . '"';
                $first=false;
            }
            if ($this->desc != null){
                if($first == false)
                    $query = $query . ', `desc`="'. $this->desc . '"'; 
                else{
                    $query = $query . '`desc`="'. $this->desc . '"'; 
                    $first = false;
                }
            }
            
            if ($this->price != null){
                if($first == false)
                    $query = $query . ', `price`="'. $this->price . '"'; 
                else{
                    $query = $query . '`price`="'. $this->price . '"'; 
                    $first = false;
                }
            }
            
            
        }
    
    }



?>