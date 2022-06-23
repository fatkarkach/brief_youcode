<div class="modal fade" id="read_p_modal<?php echo $fetch['id_passager'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="#">
				<div class="modal-header">
					<h3 class="modal-title"> donneés passagers</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
                            <label>Nom:</label>
                            <input type="hidden" name="id_passager" value="<?php echo $fetch['id_passager'];?>" />
								<?php echo $fetch['nom'];?>
						</div>
						<div class="form-group">
						<label>Prénom:</label>
                        <?php echo $fetch['prénom'];?>
						</div>
						<div class="form-group">
                        <label>date_naissance:</label>
                        <?php echo $fetch['date_naissance'];?>
						</div>
				</div>
			</div>
				<div style="clear:both;"></div>
						<div class="modal-footer">
							<button class="btn btn-danger" type="button" data-dismiss="modal"><span
									class="glyphicon glyphicon-remove"></span> Fermer</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>