<?php
					if (isset($_POST['add_passager'])){
							$passager_controller=new passager_controller();
							$passager_controller -> passagers_ajouter();
					}
					if(ISSET($_POST['delete'])){
						$user_back=new  user_back();
						$user_back ->reservation_supprimer();
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
                <li><a href="dashboard" class="nav-link px-2 link-dark">vols</a></li>
                <li><a href="reservation" class="nav-link px-2 link-dark"  id="vol">Reservation</a></li>
				<li><a href="passagers" class="nav-link px-2 link-dark">Passagers</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login"><button type="button" class="btn btn-primary">Deconnexion</button></a>
              </div>
			</header>
          </div>
			<div class="col-md-12 well">
		<a href="passagers"><button type="button" class="btn btn-success" id="passager"> voir des passagers</button></a>
				<br /><br />
				<?php
                        $reserve = new Reservation();
                        $res = $reserve -> reserve_show_all();
                 ?>
	<table class="table " id="table1" >
					<thead class="alert-success">
						<tr>
							<th scope='col'>lieu_départ</th>
							<th scope='col'>lieu_arrivé</th>
							<th scope='col'>date_départ</th>
							<th scope='col'>date_arrivé</th>
							<th scope='col'>nombre de places</th>
							<th scope='col'>prix($)</th>
							<th scope='col'>Action</th>
						</tr>
					</thead>
					<tbody style="background-color:#fff;">
                <?php
	                $places_disponibles=0;
					 while($fetch = mysqli_fetch_array($res)) { 
					if($_SESSION["id_user"]===$fetch['id_user']){
				?>
					<td><?= $fetch['lieu_départ']; ?></td>
					<td><?=$fetch['lieu_arrivé']; ?></td>
					<td><?=$fetch['date_départ']; ?></td>
					<td><?=$fetch['date_arrivé']; ?></td>
					<td><?=$fetch['places_disponibles'];?></td>
					<td><?=($fetch['prix']*$fetch['places_disponibles']); ?></td>
					<td>
					<img src="./public/images/trash3.svg" id="trash" data-target="#delete_modal<?php echo $fetch['id'];?>" data-toggle="modal">
					<img src="./public/images/eye-fill.svg" data-target="#read_modal<?php echo $fetch['id'];?>" data-toggle="modal">
					<img src="./public/images/person-plus.svg" data-toggle="modal" data-target="#form_modal<?php echo $fetch['id'];?>" id="ajout">
					</td>
					<?php
						include 'delete_user.php';
					    include 'read_user.php';
					?>
				<div class="modal fade" id="form_modal<?php echo $fetch['id'];?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="#">
							<div class="modal-header">
								<h3 class="modal-title" id="ajout">Ajouter des passagers</h3>
							</div>
							<div class="modal-body">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="form-group">
										<label>Nom:</label>
										<input type="text" class="form-control" id="recipient-name"
											required="required" name="nom">
									</div>
									<div class="form-group">
										<label>Prénom:</label>
										<input type="text" class="form-control" id="recipient-name" required="required"
											name="prénom">
									</div>
									<div class="form-group">
										<label>date_naissancet:</label>
										<input type="date" class="form-control" id="recipient-name" required="required"
											name="date_naissance"> 
									</div>
								</div>
							</div>
							<div style="clear:both;"></div>
							<div class="modal-footer">
								<input type='hidden' name="id" value="<?php echo $fetch['id'];?>"/>
								<button name="add_passager"  class="btn btn-primary"><span
										class="glyphicon glyphicon-save" id="enregistre"></span> Enregistrer</button>
								<button class="btn btn-danger" type="button" data-dismiss="modal"><span
										class="glyphicon glyphicon-remove"></span> Fermer</button>
							</div>
							</div>
						</form>
					</div>
				</div>

		</div>				
				</tr>
				<?php } }?>
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