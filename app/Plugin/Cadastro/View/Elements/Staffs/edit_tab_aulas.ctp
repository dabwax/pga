<div class="tab-pane fade" id="aulas">

	<?php if(!empty($aulas)) : ?>
	<div class="listing table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Aprovado?</th>
					<th>Treinamento</th>
					<th>Certificação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($aulas as $e) : ?>
				<tr>
					<td>
						<span class="label label-default"><?php echo ($e["TrainingCertificationStaff"]["status"] == 1) ? 'Sim' : 'Não'; ?></span>
					</td>
					<td>
						<?php echo $e["Training"]["name"]; ?>
					</td>
					<td>
						<?php echo $e["TrainingCertification"]["Certification"]["name"]; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php else: ?>
		<hr>
		<em>Não há aulas para este tripulante.</em>
		<hr>
	<?php endif; ?>

</div> <!-- #aulas -->