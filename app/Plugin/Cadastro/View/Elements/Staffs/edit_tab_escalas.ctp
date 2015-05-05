<div class="tab-pane fade" id="escalas">

	<?php if(!empty($escalas)) : ?>
	<div class="listing table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Data Inicial</th>
					<th>Data Final</th>
					<th>Aeronave</th>
					<th>Tipo</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($escalas as $e) : ?>
				<tr>
					<td>
						<?php echo $e["StaffGrade"]["date_start"]; ?>
					</td>
					<td>
						<?php echo $e["StaffGrade"]["date_finish"]; ?>
					</td>
					<td>
						<?php
							if(!empty($e["StaffGradeContract"]["Contract"])) {
								echo $e["StaffGradeContract"]["Contract"]["Aircraft"]["registration"];
							} else {
								echo "<em>Indisponível</em>";
							}
						?>
					</td>
					<td>
						<span class="label label-default"><?php echo $e["StaffGrade"]["type"]; ?></span>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php else: ?>
	<hr>
	<em>Não há escalas para este tripulante.</em>
	<hr>
<?php endif; ?>
</div> <!-- #escalas -->