<html>
<head>
<link href="../public/css/style1.css" rel="stylesheet">
</head>
<body>
<div class="modal fade" id="delete_modal<?php echo $fetch['id_vols'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="#">
				<h3 class="modal-title">Supprimer un vol</h3>
				<div class="modal-body">
						<div class="modal-footer">
                            <input type="hidden" name='id_vols' value="<?php echo $fetch['id_vols'];?>">
							<button name="delete" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
							Supprimer</button>
							<button class="btn btn-danger" type="button" data-dismiss="modal"><span
									class="glyphicon glyphicon-remove"></span> Fermer</button>
						</div>
				</div>
        </div>
			</form>
		</div>
	</div>
</div>
</boody>
</html>