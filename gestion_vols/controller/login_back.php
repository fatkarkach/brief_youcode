<?php
class login_back{
//add user
public function users_inscrire(){
	if(isset($_POST['inscrire'])){

		$nom = $_POST['nom'];
		$prénom = $_POST['prénom'];
		$date_naissance = $_POST['date_naissance'];
		$email = $_POST['email'];
		$mode_passe = $_POST['mode_passe'];
		$statut = "User";
		$user = new User();
		$user->user_insert($nom, $prénom,$date_naissance,$email,$mode_passe,$statut);
	}
}
// login
public function users_login(){
	if(isset($_POST['login'])){
	$email = $_POST['email'];
	$mode_passe = $_POST['mode_passe'];
	$user = new User();
	$user->user_check($email, $mode_passe);
}
}

}
