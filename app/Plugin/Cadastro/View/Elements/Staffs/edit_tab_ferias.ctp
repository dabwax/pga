<div class="tab-pane fade" id="ferias">

	<?php if(!empty($ferias)) : ?>
	<div class="listing table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Data Inicial</th>
					<th>Data Final</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ferias as $f) : ?>
				<tr>
					<td>
						<?php echo $f["StaffGrade"]["date_start"]; ?>
					</td>
					<td>
						<?php echo $f["StaffGrade"]["date_finish"]; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php else: ?>
		<hr>
		<em>Não há férias para este tripulante.</em>
		<hr>
	<?php endif; ?>

		<?php echo $this->Form->create("StaffGrade", array("controller" => "staff_grades", "action" => "add_external") ); ?>
		<?php echo $this->Form->input("type", array("type" => "hidden", "value" => 5) ); ?>
		<?php echo $this->Form->input("staff_id", array("type" => "hidden", "value" => $this->request->data["Staff"]["id"]) ); ?>

			<div class="row">
				<div class="col-md-6">
						
					<div class="form-group">
						<label for="date_start">Data Inicial:</label>
						<?php echo $this->Form->input("date_start", array("class" => "date form-control", "div" => false, "label" => false, "type" => "text") ); ?>
					</div>
				</div>

				<div class="col-md-6">
						
					<div class="form-group">
						<label for="date_end">Data Final:</label>
						<?php echo $this->Form->input("date_finish", array("class" => "date form-control", "div" => false, "label" => false, "type" => "text") ); ?>
					</div>

				</div>

				<div class="col-md-12">
					
					<button type="submit" class="btn btn-default">Adicionar Férias</button>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
</div> <!-- #ferias -->