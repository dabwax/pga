<div class="students index">
	<h2><?php echo __('Students'); ?></h2>

	<p>
		<?php echo $this->Html->link(__('Adicionar Novo Estudante'), array('action' => 'add'), array( "class" => "btn btn-default") ); ?>
	</p>

	<table class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id', "#"); ?></th>
			<th><?php echo $this->Paginator->sort('name', "Nome"); ?></th>
			<th><?php echo $this->Paginator->sort('school', "Escola"); ?></th>
			<th><?php echo $this->Paginator->sort('clinical_condition', "Condição Clínica"); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['name']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['school']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['clinical_condition']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'edit', $student['Student']['id']), array("class" => "btn btn-primary btn-xs") ); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>