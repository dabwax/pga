<div class="charts view">
<h2><?php echo __('Chart'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chart['Chart']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($chart['Chart']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($chart['Chart']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Config'); ?></dt>
		<dd>
			<?php echo h($chart['Chart']['config']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chart['Student']['name'], array('controller' => 'students', 'action' => 'view', $chart['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($chart['Chart']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($chart['Chart']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chart'), array('action' => 'edit', $chart['Chart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chart'), array('action' => 'delete', $chart['Chart']['id']), array(), __('Are you sure you want to delete # %s?', $chart['Chart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Charts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chart'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chart Student Inputs'), array('controller' => 'chart_student_inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chart Student Input'), array('controller' => 'chart_student_inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Chart Student Inputs'); ?></h3>
	<?php if (!empty($chart['ChartStudentInput'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Chart Id'); ?></th>
		<th><?php echo __('Student Input Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chart['ChartStudentInput'] as $chartStudentInput): ?>
		<tr>
			<td><?php echo $chartStudentInput['id']; ?></td>
			<td><?php echo $chartStudentInput['chart_id']; ?></td>
			<td><?php echo $chartStudentInput['student_input_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chart_student_inputs', 'action' => 'view', $chartStudentInput['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chart_student_inputs', 'action' => 'edit', $chartStudentInput['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chart_student_inputs', 'action' => 'delete', $chartStudentInput['id']), array(), __('Are you sure you want to delete # %s?', $chartStudentInput['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chart Student Input'), array('controller' => 'chart_student_inputs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
