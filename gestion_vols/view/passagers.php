<?php
if (isset($_POST['editer'])){

	$passager_update=new passager_controller();
	$passager_update ->passager_modifier();

}
if (isset($_POST['supp'])){

	$passager_supp=new passager_controller();
	$passager_supp ->passager_supprimer();

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
                <li><a href="vols" class="nav-link px-2 link-dark" >vols</a></li>
                <li><a href="reservation" class="nav-link px-2 link-dark">Reservation</a></li>
                <li><a href="vols" class="nav-link px-2 link-dark" id="vol">passagers</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login"><button type="button" class="btn btn-primary">Deconnexion</button></a>
              </div>
			</header>
          </div>
		<div class="col-md-12 well">
	<table class="table " id="table_passager" >
					<thead class="alert-success">
                    <tr>
                              
                                <th scope="col">nom</th>
                                <th scope="col">prénom</th>
                                <th scope="col">date_naissance</th>
                                <th scope="col">Action</th>
                 </tr>
					</thead>
					<tbody style="background-color:#fff;">
                    <?php
                      
                      $reserve = new Passagers();
                      $res = $reserve -> passager_show_id();

                      while($fetch= $res->fetch_array(MYSQLI_ASSOC)){
                      if($_SESSION["id_user"]===$fetch['id_user']){
                      ?>
                     <tr>
                        <td><?php echo $fetch['nom'];?></td>
                        <td><?php echo $fetch['prénom'];?></td>
                        <td><?php echo $fetch['date_naissance'];?></td>
                        <td>
                        <img src="./public/images/pencil-square.svg" class="btn btn-warning" data-toggle="modal" 
									data-target="#edit_p_modal<?php echo $fetch['id_passager'];?>"><span
										class="glyphicon glyphicon-edit"></span></img>
										<img src="./public/images/trash3.svg" id="trash" data-target="#supp_p<?php echo $fetch['id_passager'];?>" data-toggle="modal">
										<img src="./public/images/eye-fill.svg" data-target="#read_p_modal<?php echo $fetch['id_passager'];?>" data-toggle="modal">
                      </td>
                      <?php include 'edit_passager.php';?>
                      <?php include 'supprimer_passagers.php';?>
                      <?php include 'read_passagers.php'; ?>   
                  <?php  }}?>
              </tr>
    
          </tbody>
	<?php
	include('script.php');
	?>

</body>