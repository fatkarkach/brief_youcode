<div class="modal fade" id="read_modal<?php echo $fetch['id'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
					<h3 class="modal-title">Voir une résérvation</h3>
				<div class="modal-body">
						<div class="form-group">
							<label>	Nom:</label>
							 <?php echo $fetch['nom'];?>
							</div>
							<div class=" form-group">
							<label>prénom:</label>
							<?php echo $fetch['prénom'];?>
							</div>
							<div class=" form-group">
							<label>	date_naissance:</label>
							<?php echo $fetch['date_naissance'];?>
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