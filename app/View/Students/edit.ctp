<div class="students form">
<?php echo $this->Form->create('Student'); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#perfil" role="tab" data-toggle="tab">Perfil</a></li>
  <li role="presentation"><a href="#conteudo" role="tab" data-toggle="tab">Conteúdo</a></li>
  <li role="presentation"><a href="#relatorios" role="tab" data-toggle="tab">Relatórios</a></li>
  <li role="presentation"><a href="#alertas" role="tab" data-toggle="tab">Alertas</a></li>
  <li role="presentation"><a href="#aulas" role="tab" data-toggle="tab">Aulas</a></li>
  <li role="presentation"><a href="#inputs" role="tab" data-toggle="tab">Inputs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
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
	</fieldset>

	<?php echo $this->Form->end(__('Submit')); ?>

  </div> <!-- #perfil -->
  <div role="tabpanel" class="tab-pane" id="conteudo">
  	
  	<ul class="nav nav-tabs" role="tablist">
  		<?php $i = 0; foreach($atores as $a) : $i++; ?>
	  	<li role="presentation" class="<?php echo ($i == 1) ? 'active' : ''; ?>"><a href="#<?php echo strtolower($a); ?>" role="tab" data-toggle="tab"><?php echo $a; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<div class="tab-content">

	<?php $i = 0; foreach($atores as $a) : $i++; ?>
		<div role="tabpanel" class="tab-pane <?php echo ($i == 1) ? 'active' : ''; ?>" id="<?php echo strtolower($a); ?>">
			<h2>Inputs</h2>

			<div class="row">
				
				<div class="col-xs-8">
					
					<div id="container-final" class="col-xs-12" style="background: #CCC; min-height: 80px;">
						<!--<small>Arraste o novo input para cá</small>-->

						<ul>
							<?php foreach($student_inputs as $si) : ?>
							<?php if($si["StudentInput"]["actor"] == strtolower($a) ) : ?>
							<li>
									<?php echo $si["Input"]["name"]; ?> - <?php echo $si["StudentInput"]["name"]; ?>
								<a href="<?php echo $this->Html->url( array("action" => "delete_student_input", $si["StudentInput"]["id"], $this->request->data["Student"]["id"] ) ); ?>">
									[X]
								</a>
							</li>
							<?php endif; ?>
							<?php endforeach; ?>
						</ul>

						<!--<ul id="lista-final" class="list" style="clear: both; width: 100%; height: 100px; background: red;"></ul>-->
					</div> <!-- #container-final -->

				</div>

				<div class="col-xs-4">
					<strong>Novo Input</strong>

					<div id="container-novo" class="col-xs-12" style="background: #DDD;">
						
						<ul id="lista-novo" class="list">
							<?php foreach($inputs as $i) : ?>
							<li>
								<a href="<?php echo $this->Html->url( array("action" => "add_input", $i["Input"]["id"], $this->request->data["Student"]["id"], $a) ); ?>" class="btn btn-default"><?php echo $i["Input"]["name"]; ?></a>
							</li>
							<?php endforeach; ?>
						</ul>

					</div> <!-- #container-novo -->
				</div>

			</div> <!-- .row -->

		</div>
	<?php endforeach; ?>

	</div>

  </div> <!-- #conteudo -->

  <div role="tabpanel" class="tab-pane" id="inputs">

  	<ul class="nav nav-tabs" role="tablist">
  		<li role="presentation"><a href="#criar-input" role="tab" data-toggle="tab">Criar novo registro</a></li>
  		<li role="presentation"><a href="#arquivo-input" role="tab" data-toggle="tab">Arquivo</a></li>
	</ul>

	<div class="tab-content">

		<div id="criar-input" class="tab-pane">
			Criar novo registro

			<?php echo $this->Form->create("StudentInputValues") ?>
		</div>

		<div id="arquivo-input" class="tab-pane">
			Arquivos
		</div>
  	
  	</div> <!-- .tab-content -->

  </div> <!-- #inputs -->
  
</div>

	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Student.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
	</ul>
</div>
