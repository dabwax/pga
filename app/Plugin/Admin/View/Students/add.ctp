<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend>Aluno</legend>
	<?php
		echo $this->Form->input('Student.name');
		echo $this->Form->input('Student.date_of_birth');
		echo $this->Form->input('Student.school');
		echo $this->Form->input('Student.clinical_condition');
		echo $this->Form->input('Student.description');
		echo $this->Form->input('Student.email');
	?>
	</fieldset>
	<fieldset>
		<legend>Psico</legend>
		<?php
		echo $this->Form->input('StudentPsychiatrist.name');
		echo $this->Form->input('StudentPsychiatrist.phone');
		echo $this->Form->input('StudentPsychiatrist.email');
	?>
	</fieldset>
	<fieldset>
		<legend>Escola - Mediador</legend>
		<?php
		echo $this->Form->input('StudentSchool.mediator_name');
		echo $this->Form->input('StudentSchool.mediator_phone');
		echo $this->Form->input('StudentSchool.mediator_email');
	?>
		<legend>Escola - Coordenador</legend>
		<?php
		echo $this->Form->input('StudentSchool.coordinator_name');
		echo $this->Form->input('StudentSchool.coordinator_phone');
		echo $this->Form->input('StudentSchool.coordinator_email');
	?>
	</fieldset>
	<fieldset>
		<legend>Responsável - Pai</legend>
		<?php
		echo $this->Form->input('StudentParent.dad_name');
		echo $this->Form->input('StudentParent.dad_phone');
		echo $this->Form->input('StudentParent.dad_email');
	?>
		<legend>Responsável - Mãe</legend>
		<?php
		echo $this->Form->input('StudentParent.mom_name');
		echo $this->Form->input('StudentParent.mom_phone');
		echo $this->Form->input('StudentParent.mom_email');
	?>
		<legend>Tutor</legend>
		<?php
		echo $this->Form->input('StudentParent.tutor_name');
		echo $this->Form->input('StudentParent.tutor_phone');
		echo $this->Form->input('StudentParent.tutor_email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
	</ul>
</div>
