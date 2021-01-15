<?php
class Database{
	
    private $host  = 'sql204.epizy.com';
    private $user  = 'epiz_27635994';
    private $password   = "uJvoGdphiRYQFW";
    private $database  = "epiz_27635994_hiire_api"; 
    
   /* public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }*/
	
	public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
}
?>