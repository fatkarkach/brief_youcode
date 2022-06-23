<?php
 class Vol{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_vols");
		}
		//insersion
		function vol_insert($lieu_départ, $lieu_arrivé,$date_départ, $date_arrivé,$prix,$limites_places) {	

            mysqli_query($this->conn, "INSERT INTO `vols`(lieu_départ, lieu_arrivé, date_départ, date_arrivé, prix, limites_places)
			 VALUES('$lieu_départ', '$lieu_arrivé', '$date_départ', '$date_arrivé', '$prix', '$limites_places')") or die(mysqli_error($this->conn));
		}
		//update
		function vol_update($id_vols ,$lieu_départ, $lieu_arrivé,$date_départ, $date_arrivé,$prix,$limites_places) {
            mysqli_query($this->conn, "UPDATE `vols` SET lieu_départ = '$lieu_départ', lieu_arrivé = '$lieu_arrivé', date_départ = '$date_départ',date_arrivé = '$date_arrivé' , prix = '$prix' , limites_places = '$limites_places' WHERE id_vols  = $id_vols") or die(mysqli_error($this->conn));
			
        }
		//delete
		function vol_delete($id_vols) {
			mysqli_query($this->conn, "DELETE from vols where id_vols='$id_vols'") or die(mysqli_error($this->conn));		
        }
		function vol_show($lieu_départ,$lieu_arrivé) {

			$query = "SELECT * from vols where lieu_départ='$lieu_départ' AND lieu_arrivé='$lieu_arrivé'AND limites_places > 0 ";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}
		function vol_show_id($id_vols) {

			$query = "SELECT * from vols where id_vols='$id_vols'";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}
		function vol_show_all() {

			$query = "SELECT * from vols";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}

		function return_n_r($id_vols) {
			$id=$id_vols;
			$query = "SELECT COUNT(*) as c_user ,
			(SELECT COUNT(*) FROM passager INNER JOIN reservation ON passager.id=reservation.id WHERE id_vols =".$id.") 
			as c_p FROM reservation WHERE id_vols =".$id."";
			$stmt = $this->conn->query($query);
			$nombre = $stmt->fetch_assoc();
			$a=$nombre['c_user']+$nombre['c_p'];
			return $a ;
		}













}
?>