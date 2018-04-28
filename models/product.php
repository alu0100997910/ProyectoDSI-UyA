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
        public $url;
        
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
            if ($this->stock != null){
                if($first == false)
                    $query = $query . ', `stock`="'. $this->stock . '"'; 
                else{
                    $query = $query . '`stock`="'. $this->stock . '"'; 
                    $first = false;
                }
            }
            
            if ($this->url != null){
                if($first == false)
                    $query = $query . ', `url`="'. $this->url . '"'; 
                else{
                    $query = $query . '`url`="'. $this->url . '"'; 
                    $first = false;
                }
            }
                        
            $query=$query . ' WHERE id="' . $this->id . '";';
            
            if($this->conn->query($query)){
                return true;
            }
            return false;
            
        }
        
        public function createProduct(){
            if($this->name==null || $this->desc==null || $this->price==null ||  $this->url==null || $this->stock==null ) return 0;
            if ($this->conn->query("SELECT email from $this->table_name WHERE email='$this->email'")->num_rows == 0){
                $query = 'INSERT INTO ' . $this->table_name . ' (`id`, `name`, `desc`, `price`, `stock`, `url`) VALUES ( "' . $this->name . '", "'. $this->desc .'", "' . $this->price . '", "' . $this->stock . '");'; 
                if($this->conn->query($query)){
                    return 1;
                }
                return 0;
            } else return 2;
        }
    
    }
        


?>