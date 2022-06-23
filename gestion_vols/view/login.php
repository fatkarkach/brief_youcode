<?php

if(isset($_POST['login'])){
			$user_login= new login_back();
			$user_login ->users_login();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>gestion des vols</title>
    <meta charset="utf-8">
	<meta name="description" content="vols">
      <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
      <meta name="author" content="FAHO AIR">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="./public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./public/css/signin.css">
	<link rel="stylesheet" href="./public/css/style1.css">
  </head>
<body class="text-center">
	<form  id="login" action="#" method="POST">
	<img id="img_login"src="./public/images/icon1.svg" alt="login"></img>
	<div class="form-floating">
    <input type="email" name="email" class="form-control"   placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
    </div>
	<div class="form-floating">
    <input type="password" name="mode_passe" class="form-control"  placeholder="Password">
    <label for="floatingPassword">Password</label>
    </div>
	<button name="login" class="w-100 btn btn-lg btn-primary" type="submit">login</button>
	<p> vous n'avez pas de compte, s'identifiez <span><a href="index1">ici</a></span></p>
	<div class="form-btn">
	</div>
	</form>
</body>
</html>