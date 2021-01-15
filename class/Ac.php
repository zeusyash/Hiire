<?php
class ac{   
    
    private $Table = "ac";      
    public $acid;
    public $acname;
	public $descr;

    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read(){
        echo " = 16 ";
	
		if($this->acid) {
                    echo " = 19 ";

			$stmt = $this->conn->prepare("SELECT * FROM ".$this->Table." WHERE acid = ?");
                    echo " = 22 ";

			$stmt->bind_param("i", $this->id);					
                    echo " = 25 ";

		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->Table);	
                    echo " = 29 ";
	
		}		
		$stmt->execute();	
                echo " = 33 ";
		
//		$result = $stmt->get_result();	
                echo " = 36 ";
	
		return $stmt;	
	}
	
	function create(){
		
		$this->acname  = htmlspecialchars(strip_tags($this->acname));
		$this->descr  = htmlspecialchars(strip_tags($this->descr));


		$stmt = $this->conn->prepare("INSERT INTO ".$this->Table." VALUES(0,'".$this->acname."','".$this->descr."')");
		

		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
		
	function update(){
		
		$this->acid = htmlspecialchars(strip_tags($this->acid));
		$this->acname  = htmlspecialchars(strip_tags($this->acname));
		$this->descr  = htmlspecialchars(strip_tags($this->descr));

		
	
		$stmt = $this->conn->prepare("UPDATE ".$this->Table." SET acid=".$this->acid.",acname='".$this->acname."',descr='".$this->descr."' WHERE acid =".$this->acid. "");
 	
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	function delete(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->Table." 
			WHERE acid = ?");
			
		$this->uid = htmlspecialchars(strip_tags($this->acid));
	 
		$stmt->bind_param("i", $this->acid);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
	

}
?>