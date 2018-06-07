<?php
    class CarritoData {
        private $carrito=[];
        
        public function get(){
            return $this->carrito;
        }
        
        public function push($elem){
            array_push($this->carrito, $elem);
        }
        
        public function pop($pos){
            unset($this->carrito[$pos]);
            $this->carrito=array_values($this->carrito);
        }
        
        public function order(){
            $this->carrito=[];
        }
        
        public function size(){
            return count($this->carrito);
        }
    }
    
    class Carrito {
        private $data;
        
        public function __construct(){
            $this->data=new CarritoData();
        }
        
        public function get(){
            return $this->data->get();
        }
        
        public function push($elem){
            $this->data->push($elem);
        }
        
        public function order(){
            $this->data->order();
        }
        
        public function pop($pos){
            if($pos>=0 && $pos<= $this->data->size()){
                $this->data->pop($pos);
                return true;
            } else{
                return false;
            }
            
        }
    }

?>