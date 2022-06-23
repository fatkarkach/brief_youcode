<div class="modal fade" id="read_modal<?php echo $fetch['id_vols'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="../controller/admin_back.php">
					<h3 class="modal-title">Voir un vol</h3>
				<div class="modal-body">
						<div class="form-group">
							<label>	lieu_départ:</label>
							 <?php echo $fetch['lieu_départ'];?>
							</div>
							<div class=" form-group">
							<label>lieu_arrivé:</label>
							<?php echo $fetch['lieu_arrivé'];?>
							</div>
							<div class=" form-group">
							<label>	date_départ:</label>
							<?php echo $fetch['date_départ'];?>
							</div>
							<div class=" form-group">
							<label>date_arrivé:</label>
							<?php echo $fetch['date_arrivé'];?>
							</div>
							<div class=" form-group">
							<label>Prix:</label>
						<?php echo $fetch['prix'];?>
							</div>
							<div class=" form-group">
							<label>limites_places	:</label>
							<?php echo $fetch['limites_places'];?>
							</div>

					</div>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span
									class="glyphicon glyphicon-remove"></span> Fermer</button>
				</div>
							
						
				</div>
			</form>
		</div>
	</div>
</div>