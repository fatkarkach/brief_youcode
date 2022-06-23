
<?php
if (isset($_POST['submit_reserve']))
{
	$reserve_back=new user_back();
	$reserve_back ->reserver();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sky flight</title>
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
                <li><a href="vols" class="nav-link px-2 link-dark" >vols</a></li>
                <li><a href="reservation" class="nav-link px-2 link-dark" id="vol">Reservation</a></li>
                <li><a href="vols" class="nav-link px-2 link-dark" >passagers</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login"><button type="button" class="btn btn-primary">Deconnexion</button></a>
              </div>
			</header>
<div class="col-md-12 well">
				<?php
				if(isset($_POST['lieu_départ'])&&isset($_POST['lieu_arrivé'])){
				$lieu_départ = $_POST['lieu_départ'];
				$lieu_arrivé = $_POST['lieu_arrivé'];
				$vol = new Vol();
   				$res = $vol ->vol_show($lieu_départ,$lieu_arrivé);
				
							$row_cnt = $res->num_rows; 
							if($row_cnt <= 0)
							echo " Aucun résultat trouvé";
												
					 else { ?>	
					<table class="table " id="table4" >
					<thead class="alert-success">
						<tr>
							<th scope='col'>lieu_départ</th>
							<th scope='col'>lieu_arrivé</th>
							<th scope='col'>date_départ</th>
							<th scope='col'>date_arrivé</th>
							<th scope='col'>prix($)</th>
							<th scope='col'>places disponibles</th>
							<th scope='col'>Reservation</th>
						</tr>
					</thead>
				<tbody style="background-color:#fff;">
				<?php	while ($row = $res->fetch_assoc()) { 
					?>
					<td><?= $row['lieu_départ']; ?></td>
					<td><?= $row['lieu_arrivé']; ?></td>
					<td><?= $row['date_départ']; ?></td>
					<td><?= $row['date_arrivé']; ?></td>
					<td><?= $row['prix']; ?></td>
					<td><?=$row['limites_places']-$vol->return_n_r($row['id_vols']);?></td>
					<td>
					<button id="button_reserve" data-target="#reserve<?php echo $row['id_vols'];?>" data-toggle="modal">Résérver</button>	
					</td>
					
				</tr>
				<?php if($row['limites_places']-$vol->return_n_r($row['id_vols'])>0)
				{
					include 'reservation_vol.php';
				}
				else
				{
					include 'reservationerreur.php';
				} ?>
				
				<?php } ?>
				
				<?php } ?>
				<?php } ?>

				</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php
	include('script.php');
	?>

</body>

</html>