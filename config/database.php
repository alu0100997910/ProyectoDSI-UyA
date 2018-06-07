<?php
    class Database {
        private $host; 
        private $db_name; 
        private $username;
        private $password;
        
        public function getConnection(){
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $this->host = $url["host"];
            $this->username = $url["user"];
            $this->password = $url["pass"];
            $this->db_name = substr($url["path"], 1);
            $this->connection = null;
            try {
                $this->connection = new mysqli($this->host,$this->username,$this->password,$this->db_name);
                $this->connection->set_charset("utf8");
                
            }catch(mysqli_sql_exception $e){
                echo "Connection error: " . $e->getMessage();
            }
            return $this->connection;
        }
        
        public function __destruct(){
            //$this->connection.close();
        }
    }
?>