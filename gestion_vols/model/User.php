<?php
session_start();

 class User{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_vols");
		}

		function user_insert($nom, $prénom,$date_naissance, $email,$mode_passe,$statut) {	

			$query= "SELECT * FROM utilisateurs WHERE email=?";
			$stmt = $this->conn->prepare($query);
			// Lie des variables à une requête MySQL
			$stmt->bind_param("s",$email);
			$stmt->execute();
			//Renvoie un tableau  rempli avec les données de la ligne renvoyée
			$result= $stmt->get_result();
			//renvoie le nombre de lignes
			$row1 = mysqli_num_rows($result);

			if ($row1 == 1) {			
				echo "user already taken";
			} else {
				
				$stmt =$this->conn->prepare("INSERT Into utilisateurs (nom, prénom,date_naissance,email,mode_passe, statut) values(?,?,?,?,?,?)");
				$stmt->bind_param("ssssss", $nom, $prénom,$date_naissance, $email, $mode_passe, $statut);
				$stmt->execute();
				
				header("Location: index");
			}			
		}
		function user_check($email,$mode_passe) {

			$query= "SELECT * FROM utilisateurs WHERE email=? && mode_passe =? ";
			$stmt =$this->conn->prepare($query);
			$stmt->bind_param("ss",$email,$mode_passe);
			$stmt->execute();
			$result= $stmt->get_result();
			$row1 = mysqli_num_rows($result);
			//récupère une ligne de résultat sous forme de tableau associatif.
			$row2 = $result->fetch_assoc();
			$_SESSION['fatma']=true;
			$_SESSION["nom"] = $row2["nom"];
			$_SESSION["prénom"] = $row2["prénom"];
			$_SESSION["date_naissance"] = $row2["date_naissance"];
			$_SESSION["statut"] =  $row2["statut"];
			$_SESSION["id_user"] =  $row2["id_user"];
			if ($row1 == 1 ) {
				if ($row2["statut"] == "Admin") {
					header("Location:admin");
				} else {

					header("Location:dashboard");
				}				
			} else {
				header("Location:index");		
			}
		}
		 function log_out()
		{
			session_destroy();
			$_SESSION['fatma']==false;
			unset($_SESSION['nom']);
			unset($_SESSION['prénom']);
			unset($_SESSION['date_naissance']);
			unset($_SESSION["statut"] );
			unset($_SESSION['nom']);
			unset($_SESSION['prénom']);
			unset($_SESSION['date_naissance']);

			header("Location: index");
		}
}










?>