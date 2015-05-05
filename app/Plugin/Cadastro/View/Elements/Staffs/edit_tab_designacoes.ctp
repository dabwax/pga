<div class="tab-pane fade" id="designacoes">

	<?php if(!empty($designacoes)) : ?>
	<div class="listing table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Data Inicial</th>
					<th>Designação</th>
					<th>Aeronave</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($designacoes as $c) : ?>
				<tr>
					<td>
						<?php echo $c["StaffDesignation"]["date_start"]; ?>
					</td>
					<td>
						<?php echo $c["Designation"]["name"]; ?>
					</td>
					<td>
						<?php echo $c["AircraftModel"]["model"]; ?>
					</td>
			                    <td>
			                        <a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staffs', 'action' => 'delete_item', 'model' => 'StaffDesignation', 'id' => $c['StaffDesignation']['id'], 'staff' => $c['StaffDesignation']['staff_id']) ); ?>" onclick="if(!confirm('Você tem certeza disto? Esta ação é permanente!')) { return false; }" class="btn btn-danger btn-xs" style="color: #FFF;">
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
	<em>Não há designações para este tripulante.</em>
	<hr>
	<?php endif; ?>

	<?php echo $this->Form->create("StaffDesignation", array(
		"controller" => "staff_designations",
		"action" => "add",
		"novalidate" => true
	) ); ?>

	<?php echo $this->Form->input("staff_id", array("type" => "hidden", "value" => $this->request->data["Staff"]["id"]) ); ?>

	<div class="row">
		<div class="col-md-6">

			<div class="form-group">
				<label for="name">Designação:</label>
				<?php echo $this->Form->input("designation_id", array("options" => $designations, "type" => "select", "empty" => "Selecionar Designação", "label" => false, "div" => false, "class" => "form-control") ); ?>
			</div>
		</div>

		<div class="col-md-6">

			<div class="form-group">
				<label for="date_end">Data Inicial:</label>
				<?php echo $this->Form->input("date_start", array("class" => "date form-control", "div" => false, "label" => false, "type" => "text") ); ?>
			</div>

		</div>
	</div>

	<div class="row">

		<div class="col-md-12">

			<div class="form-group">
				<label for="date_end">Modelo de Aeronave:</label>
				<?php echo $this->Form->input("aircraft_model_id", array("class" => "form-control", "div" => false, "label" => false, "type" => "select", "options" => $aircraft_models, "empty" => "Selecionar Modelo de Aeronave") ); ?>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-default">Adicionar Designação</button>
		</div>
	</div>

	<?php echo $this->Form->end(); ?>
</div> <!-- #cargo -->