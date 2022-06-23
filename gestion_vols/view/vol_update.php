<div class="modal fade" id="update_modal<?php echo $fetch['id_vols'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="#">
				<div class="modal-header">
					<h3 class="modal-title">Modifier un vol</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>	lieu_départ:</label>
							<input type="hidden" name="id_vols" value="<?php echo $fetch['id_vols'];?>" />
							<input type="text" class="form-control" id="recipient-name" name="lieu_départ" value="<?php echo $fetch['lieu_départ'];?>">
							</div>
							<div class=" form-group">
							<label>lieu_arrivé:</label>
							<input type="text" class="form-control" id="recipient-name" name="lieu_arrivé" value="<?php echo $fetch['lieu_arrivé'];?>">
							</div>
							<div class=" form-group">
							<label>	date_départ:</label>
							<input type="datetime" class="form-control" id="recipient-name" name="date_départ" value="<?php echo $fetch['date_départ'];?>">
							</div>
							<div class=" form-group">
							<label>date_arrivé:</label>
							<input type="datetime" class="form-control" id="recipient-name" name="date_arrivé" value="<?php echo $fetch['date_arrivé'];?>">
							</div>
							<div class=" form-group">
							<label>Prix:</label>
							<input type="number" class="form-control" id="recipient-name" name="prix" value="<?php echo $fetch['prix'];?>">
							</div>
							<div class=" form-group">
							<label>limites_places	:</label>
							<input type="number" class="form-control" id="recipient-name" name="limites_places" value="<?php echo $fetch['limites_places'];?>">
							</div>

					</div>
				</div>
				<div style=" clear:both;"></div>
						<div class="modal-footer">
							<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
							Modifier</button>
							<button class="btn btn-danger" type="button" data-dismiss="modal"><span
									class="glyphicon glyphicon-remove"></span> Fermer</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>