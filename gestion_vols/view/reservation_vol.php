
<div class="modal fade" id="reserve<?php echo $row['id_vols'];?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="#">
				<h3 class="modal-title">Résérver un vol</h3>
				<div class="modal-body">
						<div class="modal-footer">
                                <select name="choix"  required aria-label="select example">
                                <option value="">Open this select menu</option>
                                <option >aller</option>
                                <option >aller-retour</option>
                                </select>
                                <div class="invalid-feedback">Example invalid select feedback</div>
								<input name="places_disponibles" type="number" placeholder="nombre de place"></input>
                            <input type="hidden" name='id_vols' value="<?php echo $row['id_vols'];?>">
							<button  id="button_reserve" name="submit_reserve" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
							Résérver</button>
                            </div>
						</div>
				</div>
			</form>
		</div>
	</div>
</div>
