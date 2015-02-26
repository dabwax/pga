<div class="charts index">
	<h2><?php echo __('Charts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('config'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($charts as $chart): ?>
	<tr>
		<td><?php echo h($chart['Chart']['id']); ?>&nbsp;</td>
		<td><?php echo h($chart['Chart']['name']); ?>&nbsp;</td>
		<td><?php echo h($chart['Chart']['type']); ?>&nbsp;</td>
		<td><?php echo h($chart['Chart']['config']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chart['Student']['name'], array('controller' => 'students', 'action' => 'view', $chart['Student']['id'])); ?>
		</td>
		<td><?php echo h($chart['Chart']['created']); ?>&nbsp;</td>
		<td><?php echo h($chart['Chart']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chart['Chart']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chart['Chart']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chart['Chart']['id']), array(), __('Are you sure you want to delete # %s?', $chart['Chart']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Chart'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chart Student Inputs'), array('controller' => 'chart_student_inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chart Student Input'), array('controller' => 'chart_student_inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
