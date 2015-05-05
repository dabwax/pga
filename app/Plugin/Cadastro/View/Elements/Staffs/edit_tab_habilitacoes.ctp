<div class="tab-pane fade active in" id="hab">

	<?php if(!empty($habilitacoes)) : ?>
	<div class="listing table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Código</th>
					<th>Aeronave</th>
					<th>Tipo</th>
					<th>CANAC</th>
					<th>Licença</th>
					<th>Vencimento</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($habilitacoes as $h) : ?>
				<tr>
					<td><?php echo $h["StaffLicence"]["code"]; ?></td>
					<td><?php echo $h["AircraftModel"]["model"]; ?></td>
					<td><?php echo $h["StaffLicence"]["type"]; ?></td>
					<td><?php echo $h["StaffLicence"]["canac"]; ?></td>
					<td><?php echo $h["StaffLicence"]["license"]; ?></td>
					<td><?php echo $h["StaffLicence"]["expiration"]; ?></td>
					<td>
						<a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staffs', 'action' => 'delete_item', 'model' => 'StaffLicence', 'id' => $h['StaffLicence']['id'], 'staff' => $h['StaffLicence']['staff_id']) ); ?>" onclick="if(!confirm('Você tem certeza disto? Esta ação é permanente!')) { return false; }" class="btn btn-danger btn-xs" style="color: #FFF;">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php else: ?>
		<hr>

		<em>Não há habilitações para este tripulante.</em>

		<div class="clearfix"></div>

		<hr>
	<?php endif; ?>

	<p><strong>Adicionar Habilitação</strong></p>

	<?php echo $this->Form->create("StaffLicence", array("url" => array("controller" => "staff_licences", "action" => "add") ) ); ?>
		<?php echo $this->Form->input("staff_id", array("type" => "hidden", "value" => $this->request->data["Staff"]["id"]) ); ?>
		<?php echo $this->Form->input("canac", array("type" => "hidden", "value" => $this->request->data["Staff"]["canac"]) ); ?>
		<?php echo $this->Form->input("license", array("type" => "hidden", "value" => $this->request->data["Staff"]["license"]) ); ?>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="codigo">Código:</label>
					<?php echo $this->Form->input("code", array("class" => "form-control", "div" => false, "label" => false, "type" => "select", "options" => $codes ) ); ?>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="vencimento">Vencimento:</label>
					<?php echo $this->Form->input("expiration", array("class" => "date form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="tipo">Aeronave:</label>
					<?php echo $this->Form->input("StaffLicence.aircraft_model_id", array("div" => false, "label" => false, "class" => "form-control", "empty" => "Selecionar Aeronave", "options" => $aircraft_models) ); ?>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="exp">Tipo:</label>
					<?php echo $this->Form->input("StaffLicence.type", array("div" => false, "label" => false, "class" => "form-control", "empty" => "Selecionar Tipo", "options" => $ifrh) ); ?>
				</div>
			</div>

		</div>
		<button type="submit" class="btn btn-default">Adicionar Habilitação</button>
	<?php echo $this->Form->end(); ?>
</div>