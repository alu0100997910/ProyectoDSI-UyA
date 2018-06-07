<?php
    class Product {
        //Tabla y bbdd
        private $db;
        private $table = "product";
        
        //Properties
        public $id;
        public $name;
        public $desc;
        public $price=0;
        public $stock;
        public $img;
        public $alt;
        public $categoria=0;
        
        //Constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function getProduct(){
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id="' . $this->id . '";';
            return $this->conn->query($query);
        }
        
        public function getPage($page){
            $maxItems=4;
            $query = 'SELECT * FROM ' . $this->table;
            $first=true;
            if($this->categoria>0 && $this->categoria<5){
                $query = $query . ' WHERE categoria=' . $this->categoria;
                $first=false;
            }
            if($this->price>0 && $this->price<5){
                if($first) $query = $query . ' WHERE ';
                else $query = $query . ' AND ';
                $query=$query . 'price BETWEEN ';
                switch($this->price){
                    case 1:
                        $query=$query . "5 AND 20";
                        break;
                    case 2:
                        $query=$query . "20 AND 40";
                        break;
                    case 3:
                        $query=$query . "40 AND 60";
                        break;
                    case 4:
                        $query=$query . "60 AND 80";
                        break;
                }
            }
            $query = $query . " LIMIT " . (($page-1)*$maxItems) . ", $maxItems;";
            return $this->conn->query($query);
        }
        
        public function getItemCount(){
            $query = 'SELECT COUNT(*) as items FROM ' . $this->table;
            $first=true;
            if($this->categoria>0 && $this->categoria<5){
                $query = $query . ' WHERE categoria=' . $this->categoria;
                $first=false;
            }
            if($this->price>0 && $this->price<5){
                if($first) $query = $query . ' WHERE ';
                else $query = $query . ' AND ';
                $query=$query . 'price BETWEEN ';
                switch($this->price){
                    case 1:
                        $query=$query . "5 AND 20";
                        break;
                    case 2:
                        $query=$query . "20 AND 40";
                        break;
                    case 3:
                        $query=$query . "40 AND 60";
                        break;
                    case 4:
                        $query=$query . "60 AND 80";
                        break;
                }
            }
            return $this->conn->query($query);
        }
    
    }
        


?>