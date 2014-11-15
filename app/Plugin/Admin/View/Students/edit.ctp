<div class="students form">
<?php echo $this->Form->create('Student'); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#perfil" role="tab" data-toggle="tab">Perfil</a></li>
  <li role="presentation"><a href="#conteudo" role="tab" data-toggle="tab">Conteúdo</a></li>
  <!-- <li role="presentation"><a href="#relatorios" role="tab" data-toggle="tab">Relatórios</a></li> -->
  <!-- <li role="presentation"><a href="#alertas" role="tab" data-toggle="tab">Alertas</a></li> -->
  <li role="presentation"><a href="#materias" role="tab" data-toggle="tab">Matérias</a></li>
  <li role="presentation"><a href="#exercicios" role="tab" data-toggle="tab">Exercícios</a></li>
  <li role="presentation"><a href="#inputs" role="tab" data-toggle="tab">Inputs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  
  <?php echo $this->element("../Students/_tab_perfil"); ?>

  <?php echo $this->element("../Students/_tab_conteudo"); ?>

  <?php echo $this->element("../Students/_tab_inputs"); ?>

  <?php echo $this->element("../Students/_tab_materias"); ?>

  <?php echo $this->element("../Students/_tab_exercicios"); ?>

</div>

	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Student.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Estudantes'), array('action' => 'index')); ?></li>
	</ul>
</div>
