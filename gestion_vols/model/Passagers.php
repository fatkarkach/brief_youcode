<?php


 class Passagers{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_vols");
		}
        

		function passager_insert($nom, $prénom, $date_naissance, $id) {	
            mysqli_query($this->conn, "INSERT Into `passager`(nom, prénom, date_naissance, id) values('$nom', '$prénom', '$date_naissance','$id')") or die(mysqli_error($this->conn));
		}
		function  passager_show_id() {

			$query = "SELECT * from passager 
			INNER JOIN reservation ON reservation.id = passager.id";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}
		function passagers_update($id_passager,$nom,$prénom,$date_naissance) {
            mysqli_query($this->conn, "UPDATE `passager` SET nom = '$nom', prénom = '$prénom', date_naissance = '$date_naissance' WHERE id_passager  = '$id_passager'") or die(mysqli_error($this->conn));
			
        }
		function passager_delete($id_passager){
			mysqli_query($this->conn, "DELETE from passager where id_passager='$id_passager'") or die(mysqli_error($this->conn));		
        }
}
?>