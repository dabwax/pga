<div class="tab-pane fade" id="quinzenas">

	<?php if(!empty($quinzenas)) : ?>
	<div class="listing table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Período</th>
					<th>Data de Inserção</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($quinzenas as $q) : ?>
				<tr>
					<td>
						<?php echo ($q["StaffPeriod"]["period"] == 1) ? 'Primeira' : 'Segunda'; ?>
					</td>
					<td>
						<?php $datetime = new DateTime($q["StaffPeriod"]["created"]); echo $datetime->format('d/m/Y H:i:s'); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php else: ?>
	<hr>
	<em>Não há quinzenas para este tripulante.</em>
	<hr>
<?php endif; ?>
</div> <!-- #treinamento -->