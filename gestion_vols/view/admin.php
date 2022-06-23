<?php

	if (isset($_POST['save'])){

	$admin_back=new admin_back();
	$admin_back ->users_ajouter();

}
if (isset($_POST['update'])){

	$admin_update=new admin_back();
	$admin_update ->users_modifier();

}
if (isset($_POST['delete'])){

	$admin_delete=new admin_back();
	$admin_delete ->users_supprimer();
}
?>
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
                <li><a href="admin" class="nav-link px-2 link-dark" id="vol">vols</a></li>
                <li><a href="reservationadmin" class="nav-link px-2 link-dark">Reservation</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login"><button type="button" class="btn btn-primary">Deconnexion</button></a>
              </div>
</header>

			<div class="col-md-12 well">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal" id="ajout"> Ajouter des vols</button>
				<br /><br />
				<table class="table" id="table3" >
					<thead class="alert-success">
						<tr>
							<th>lieu_départ</th>
							<th>lieu_arrivé</th>
							<th>date_départ</th>
							<th>date_arrivé</th>
							<th>Prix</th>
							<th>limites_places</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody style="background-color:#fff;">
						<?php

						$vol = new Vol();
   						$res = $vol -> vol_show_all();
					
					while($fetch = mysqli_fetch_array($res)){
				?>
						<tr>
							<td><?php echo $fetch['lieu_départ'];?></td>
							<td><?php echo $fetch['lieu_arrivé'];?></td>
							<td><?php echo $fetch['date_départ'];?></td>
							<td><?php echo $fetch['date_arrivé'];?></td>
							<td><?php echo $fetch['prix'];?></td>
							<td><?php echo $fetch['limites_places'];?></td>
							<td><img src="./public/images/pencil-square.svg" class="btn btn-warning" data-toggle="modal" 
									data-target="#update_modal<?php echo $fetch['id_vols'];?>"><span
										class="glyphicon glyphicon-edit"></span>
										<img src="./public/images/trash3.svg" id="trash" data-target="#delete_modal<?php echo $fetch['id_vols'];?>" data-toggle="modal">
										<img src="./public/images/eye-fill.svg" data-target="#read_modal<?php echo $fetch['id_vols'];?>" data-toggle="modal">
							</td>
						</tr>
						<?php
					
					include 'vol_update.php';
					include 'delete.php';
					include 'read.php';
					
					}
				?>
					</tbody>
				</table>
			</div>
			<div class="modal fade" id="form_modal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="#">
							<div class="modal-header">
								<h3 class="modal-title" id="ajout">Ajouter des vols</h3>
							</div>
							<div class="modal-body">
								<div class="col-md-8">
							
										<label>lieu départ:</label>
										<input type="text" class="form-control" id="recipient-name"
											required="required" name="lieu_départ">
									
									<div class="form-group">
										<label>lieu_arrivé:</label>
										<input type="text" class="form-control" id="recipient-name" required="required"
											name="lieu_arrivé">
									</div>
									<div class="form-group">
										<label>	date_départ:</label>
										<?php
                                $date = new DateTime(); // Date object using current date and time
                                $dt= $date->format('Y-m-d\TH:i:s');
                                echo "<input type='datetime-local' class='form-control' id='recipient-name' required='required' name='date_départ' min='$dt'>";?>
									</div>
									<div class="form-group">
										<label>	date_arrivé:</label>
										<?php  echo " <input type='datetime-local 'class='form-control' id='recipient-name' required='required'
											name='date_arrivé' min='$dt'>"?>
									</div>
									<div class="form-group">
										<label>prix:</label>
										<input type="number" class="form-control" id="recipient-name"
											required="required" name="prix">
									</div>
									<div class="form-group">
										<label>limites_places:</label>
										<input id="ajouter_vol" type="number" name="limites_places" class="form-control" required="required" />
									</div>
								</div>
							</div>
							<div style="clear:both;"></div>
							<div class="modal-footer">
								<button name="save" class="btn btn-primary"><span
										class="glyphicon glyphicon-save" id="enregistre"></span> Enregistrer</button>
								<button class="btn btn-danger" type="button" data-dismiss="modal"><span
										class="glyphicon glyphicon-remove"></span> Fermer</button>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('script.php');
	?>

</body>

</html>