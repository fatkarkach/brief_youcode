<?php
 class Reservation{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_vols");
		}
		//insersion
		function reserve_insert($choix,$id_user, $id_vols,$places_disponibles) {	
        mysqli_query($this->conn, "INSERT INTO `reservation` (choix, id_user, id_vols,places_disponibles)
			 VALUES('$choix', $id_user, $id_vols,$places_disponibles)") or die(mysqli_error($this->conn));
		}
	
		function reserve_show_all() {
			
			$query = "SELECT *FROM reservation 
            INNER JOIN utilisateurs ON utilisateurs.id_user = reservation.id_user
            INNER JOIN vols ON vols.id_vols = reservation.id_vols ";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}
		
		// //delete
		 function reservation_delete($id) {
			mysqli_query($this->conn, "DELETE from reservation where id='$id'") or die(mysqli_error($this->conn));		
         }
		













}
?>