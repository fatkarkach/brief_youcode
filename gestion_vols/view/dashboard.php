
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>FAHO_air</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="./public/css/style1.css" rel="stylesheet">
</head>

<body>
<header>
          <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
              <img  id ="image_logo"src="./public/images/icon1.svg"></a></img>
              </a>
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
			  <li><a href="#" class="nav-link px-2 link-dark" id="vol">vols</a></li>
                <li><a href="reservation" class="nav-link px-2 link-dark">Reservation</a></li>
				<li><a href="passagers" class="nav-link px-2 link-dark">Passagers</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login"><button type="button" class="btn btn-primary">Deconnexion</button></a>
              </div>
</header>

<body>
	<!-- Default form subscription -->
	<form class="text-center border border-light p-5" method="post" action="recherche">
		<!-- Name -->
		<input type="text" placeholder="Lieu_départ" name="lieu_départ" class="form-control mb-4"><br>
		<input type="text" placeholder="Lieu_Arrivé"  name="lieu_arrivé" class="form-control mb-4">

		<!-- Sign in button -->
		<button class="btn btn-info btn-block" type="submit" name="submit-search">Chercher les vols</button>


	</form>
	</section>
	</div>
	<?php
	include('script.php');
	?>


</body>

</html>