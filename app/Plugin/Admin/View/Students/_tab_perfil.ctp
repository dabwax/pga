<div role="tabpanel" class="tab-pane active" id="perfil">
  	
  	<?php
		echo $this->Form->input('Student.id');
	?>

	<fieldset>
	<?php
		echo $this->Form->input('Student.name');
		echo $this->Form->input('Student.date_of_birth');
		echo $this->Form->input('Student.school');
		echo $this->Form->input('Student.clinical_condition');
		echo $this->Form->input('Student.description');
	?>
	</fieldset>
	<fieldset>
		<legend>Psico</legend>
		<?php
		echo $this->Form->input('StudentPsychiatrist.id');
		echo $this->Form->input('StudentPsychiatrist.name');
		echo $this->Form->input('StudentPsychiatrist.phone');
		echo $this->Form->input('StudentPsychiatrist.email');
	?>
	</fieldset>
	<fieldset>
		<legend>Escola - Mediador</legend>
		<?php
		echo $this->Form->input('StudentSchool.id');
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
		echo $this->Form->input('StudentParent.id');
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

  </div> <!-- #perfil -->