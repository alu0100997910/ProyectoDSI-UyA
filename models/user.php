<?php
    class User {
        //Database connection and table name
        private $conn;
        private $table_name = "user";
        
        //Properties
        public $id;
        public $name;
        public $lastname;
        public $email;
        public $password;
        public $avatar;
        public $fechanacimiento;
        //public $fechaalta;
        
        //Constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function getUser(){
            $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id="' . $this->id . '";';
            return $this->conn->query($query);
        }
        
        public function updateUser(){
            $query = 'UPDATE ' . $this->table_name . ' SET ';
            $first=true;
            if ($this->name != null){
                $query = $query . '`name`="'. $this->name . '"';
                $first=false;
            }
                
            if($this->lastname != null) {
                if($first){
                    $query=$query . '`lastname`="'. $this->lastname . '"';
                    $first=false;
                } else $query=$query . ', `lastname`="'. $this->lastname . '"';
            }
                
                
            if($this->password != null){
                if($first){
                    $query=$query . '`password`="'. $this->password . '"';
                    $first=false;
                } else $query=$query . ', `password`="'. $this->password . '"';
            }
                
            
            //if($this->avatar !=null)
            //    $query=$query . ', `avatar`="'. $this->avatar .'"';
            
            if($this->fechanacimiento != null){
                if($first){
                    $query=$query . '`fechanacimiento`="'. $this->fechanacimiento .'"';
                    $first=false;
                } else $query=$query . ', `fechanacimiento`="'. $this->fechanacimiento .'"';
            }
            
            $query=$query . ' WHERE id="' . $this->id . '";';
            
            if($this->conn->query($query)){
                return true;
            }
            return false;
        }
        
        public function createUser(){
            if($this->name==null || $this->lastname==null || $this->email==null || $this->password==null) return 4;
            if ($this->conn->query("SELECT email from $this->table_name WHERE email='$this->email'")->num_rows == 0){
                $query = 'INSERT INTO ' . $this->table_name . ' (`id`, `name`, `lastname`, `email`, `password`, `avatar`, `fechanacimiento`, `fecharegistro`) VALUES (NULL, "' . $this->name . '", "'. $this->lastname .'", "' . $this->email . '", "' . $this->password . '", NULL, NULL, CURDATE());';
                if($this->conn->query($query)){
                    return 1;
                }
                return 0;
            } else return 2;
        }
    }
?>