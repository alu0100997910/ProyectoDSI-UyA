<?php
    class Database {
        private $host = "localhost";
        private $db_name = "c9";
        private $username = "legno";
        private $password = "";
        public $connection;
        
        public function getConnection(){
            $this->connection = null;
            try {
                $this->connection = new mysqli($this->host,$this->username,$this->password,$this->db_name);
                $this->connection->set_charset("utf8");
                
            }catch(mysqli_sql_exception $e){
                echo "Connection error: " . $e->getMessage();
            }
            return $this->connection;
        }
    }
?>