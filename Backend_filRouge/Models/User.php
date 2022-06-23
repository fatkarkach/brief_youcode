<?php
 class User{
     function __construct() {
         $this->conn = new mysqli("localhost","root","","filerouge");
     }
		public function  user_connecter($email,$password) {
			$query= "SELECT * FROM partenaire WHERE email=? and password=?";
			$stmt =$this->conn->prepare($query);
			$stmt->bind_param("ss",$email,$password);
			$stmt->execute();
			$result= $stmt->get_result();
			$row1 = mysqli_num_rows($result);
			$row2 = $result->fetch_assoc();
			$_SESSION["email"] = $row2["email"];
			$_SESSION["password"] = $row2["password"];
			
			if ($row1 == 1 ) {
                return $row2;
			} else {
				  return $row2;
			}
		}
}
?>