<?php
    class Product {
        
        public $id;
        public $name;
        public $desc;
        public $stock;
        public $price;
        
        public function __construct($id,$name,$desc,$stock,$price){
            $this->id = $id;
            $this->name = $name;
            $this->desc = $desc;
            $this->stock = $stock;
            $this->price = $price;
        }
    }
?>