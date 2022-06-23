<div class="modal fade" id="edit_p_modal<?php echo $fetch['id_passager'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="#">
				<div class="modal-header">
					<h3 class="modal-title">Modifier donneés passagers</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
                            <label>Nom:</label>
                            <input type="hidden" name="id_passager" value="<?php echo $fetch['id_passager'];?>" />
								<input type="text" class="form-control" id="recipient-name"value="<?php echo $fetch['nom'];?>"
									required="required"  name="nom">
						</div>
						<div class="form-group">
						<label>Prénom:</label>
						<input type="text" class="form-control" id="recipient-name" required="required"
                        value="<?php echo $fetch['prénom'];?> "name="prénom">
						</div>
						<div class="form-group">
						<label>date_naissancet:</label>
						<input type="date" class="form-control" id="recipient-name" required="required"
						name="date_naissance" value="<?php echo $fetch['date_naissance'];?>">
						</div>
				</div>
			</div>
				<div style="clear:both;"></div>
						<div class="modal-footer">
							<button name="editer" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
							Modifier</button>
							<button class="btn btn-danger" type="button" data-dismiss="modal"><span
									class="glyphicon glyphicon-remove"></span> Fermer</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>