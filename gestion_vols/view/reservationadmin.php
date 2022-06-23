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
                <li><a href="admin" class="nav-link px-2 link-dark">vols</a></li>
                <li><a href="reservationadmin" class="nav-link px-2 link-dark" id="vol">Reservation</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login"><button type="button" class="btn btn-primary">Deconnexion</button></a>
              </div>
</header>
				<?php
                        $reserve = new Reservation();
                        $res = $reserve -> reserve_show_all();
                 ?>
	         <table class="table " id="table2" >
					<thead class="alert-success">
						<tr>
							<th scope='col'>id_user</th>
							<th scope='col'>lieu_départ</th>
							<th scope='col'>lieu_arrivé</th>
							<th scope='col'>date_départ</th>
							<th scope='col'>date_arrivé</th>
							<th scope='col'>prix($)</th>
						</tr>
					</thead>
					<tbody style="background-color:#fff;">
                <tr>
                <?php

					 while($fetch = mysqli_fetch_array($res)) { ?>
                    <td><?=$fetch['id_user'] ?></td>
					<td><?= $fetch['lieu_départ']; ?></td>
					<td><?=$fetch['lieu_arrivé']; ?></td>
					<td><?=$fetch['date_départ']; ?></td>
					<td><?=$fetch['date_arrivé']; ?></td>
					<td><?=$fetch['prix']; ?></td>				
				</tr>
				<?php  }?>
				</tbody>
				</table>
			</div>
		</div>
	</div>		
	</div>
	<?php
	include('script.php');
	?>
</body>