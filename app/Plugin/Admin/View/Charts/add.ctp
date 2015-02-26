<div class="charts form">
<?php echo $this->Form->create('Chart'); ?>
	<fieldset>
		<legend><?php echo __('Add Chart'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('config');
		echo $this->Form->input('student_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Charts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chart Student Inputs'), array('controller' => 'chart_student_inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chart Student Input'), array('controller' => 'chart_student_inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
