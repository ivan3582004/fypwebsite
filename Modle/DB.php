<?php
class DB {
	protected $hostname ="127.0.0.1";
	protected $username = "root";
	protected $pwd = "";
	protected $db="fyp";
	//protected $conn = mysqli_connect($this->hostname, $this->username, $this->pwd,$this->db)or die (mtsqli_error($conn));
	protected function connect() {
		$conn = mysqli_connect($this->hostname, $this->username, $this->pwd,$this->db);
		return $conn;
	}
	
	function seachWhere_getRc($table,$col,$value) {
		$conn = $this->connect();
		$sql = "Select * from ".$table." where ".$col." = '".$value."'";
		$rs = mysqli_query($conn, $sql)or die (mysqli_error($conn));
		$rsArray = null;
		for($i =0;$rc = mysqli_fetch_assoc($rs);$i++) {
				foreach($rc as $key => $value){
					$rsArray[$key][$i] = $value;
				}
			};
		mysqli_close($conn);
		return $rsArray;
	}
	
	function getMax($table,$col) {
		$conn = $this->connect();
		$sql = "Select * from ".$table." Order by $col";
		//$sql = "SELECT * FROM `ticket` WHERE shopID = 1 order by sequence";
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		$max;
		while($rc = mysqli_fetch_assoc($rs)) {
			$max=$rc[$col];
		}
		return $max;
	}
	
	function getID($table,$col) {
		$conn = $this->connect();
		$sql = "Select * from ".$table;
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		$ID = 1;				
		while($rc = mysqli_fetch_assoc($rs)) {
			if ($rc[$col]==$ID){
			$ID++;
			}
		}
		return $ID;
	}	
	
	
	function seachWhere_getRow($table,$col,$value) {
	$conn = $this->connect();
	$sql = "Select * from ".$table." where ".$col." = '".$value."'";
	$rs = mysqli_query($conn, $sql)or die (mysqli_error($conn));
	
    return mysqli_num_rows($rs);
  }	
  
		
		
	function seachWhere($table,$col,$value) {
	$conn = $this->connect();
	$sql = "Select * from ".$table." where ".$col." = '".$value."'";
	$rs = mysqli_query($conn, $sql)or die (mysqli_error($conn));
	$acArray = null;
	while($rc = mysqli_fetch_assoc($rs)) {
			foreach($rc as $key => $value){
				$acArray[$key] = $value;
			}
		};
	mysqli_close($conn);
    return $acArray;
  }
  
  function editRow($table,$col,$value,$whereCol,$whereValue) {
	  $conn = $this->connect();
	 $sql = "UPDATE ".$table." SET ".$col." = '".$value."' WHERE ".$whereCol." = '".$whereValue."'";
	mysqli_query($conn, $sql)or die (mysqli_error($conn));
	if (mysqli_affected_rows($conn)>0){
		return true;
	}else{
		return false;
	}
	mysqli_close($conn);
  }
  
  
  function addRow($table,$value) {
	  $conn = $this->connect();
	 $sql = "INSERT INTO ".$table." VALUES (".$value.");";
	mysqli_query($conn, $sql)or die (mysqli_error($conn));
	if (mysqli_affected_rows($conn)>0){
		return true;
	}else{
		return false;
	}
	mysqli_close($conn);
  }
  
  function removeFavoritelist($value,$value1) {
	  $conn = $this->connect();
	 $sql = "DELETE FROM favoritelist WHERE `favoritelist`.`CustomerID` = '".$value."' AND `favoritelist`.`ShopID` = '".$value1."'";
	mysqli_query($conn, $sql)or die (mysqli_error($conn));
	if (mysqli_affected_rows($conn)>0){
		return true;
	}else{
		return false;
	}
	mysqli_close($conn);
  }

	function removeOGMember($value,$value1) {
		$conn = $this->connect();
		$sql = "DELETE FROM operatorgroupmemberlist WHERE `operatorgroupmemberlist`.`OpertorID` = '".$value."' AND `operatorgroupmemberlist`.`OperatorGroupID` = '".$value1."'";
		mysqli_query($conn, $sql)or die (mysqli_error($conn));
		if (mysqli_affected_rows($conn)>0){
			return true;
		}else{
			return false;
		}
		mysqli_close($conn);
	}
}
?>
