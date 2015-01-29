<div class="posts form">
<?php echo $this->Form->create('Post', array('novalidate' => true) ); ?>
	<fieldset>
		<legend><?php echo __('Editar Notícia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Título') );
		echo $this->Form->input('content', array('label' => 'Conteúdo') );
		echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => AuthComponent::user('User.id') ) );
	?>
		<button type="submit" class="btn btn-primary">Editar</button>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>