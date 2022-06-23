

<?php

if (isset($_POST['inscrire'])){

$inscree=new login_back();
$inscree ->users_inscrire();

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>gestion des vols</title>
	<meta charset="UTF-8">
      <meta name="description" content="vols">
      <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
      <meta name="author" content="FAHO AIR">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="./public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./public/css/signin.css">
	<link rel="stylesheet" href="./public/css/style1.css">
  </head>
  <body class="text-center">
			 
							<form id="signup" action="#" method="POST">
							<img id="img_login"src="./public/images/icon1.svg" alt="signup"></img>
							<p>vous avez déjà un compte connectez-vous <span><a href="login">ici</a></span></p>
							<div class="form-floating">
        					<input type="text" name="nom" class="form-control"  placeholder="Nom">
        					<label for="floatingInput">Nom</label>
    						</div>
							<div class="form-floating">
        					<input type="text" name="prénom"class="form-control"  placeholder="prenom">
        					<label for="floatingInput">Prenom</label>
    						</div>
							<div class="form-floating">
        					<input type="date" name="date_naissance" class="form-control"  placeholder="Date de naissance">
        					<label for="floatingInput">Date de naissance</label>
    						</div>
							<div class="form-floating">
      						<input type="email" name="email" class="form-control"  placeholder="name@example.com">
      						<label for="floatingInput">Email address</label>
    						</div>
							<div class="form-floating">
      						<input type="password" name="mode_passe" class="form-control" placeholder="Password">
      						<label for="floatingPassword">Password</label>
    						</div>
							<button name="inscrire" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
							</form>
	

</body>

</html>