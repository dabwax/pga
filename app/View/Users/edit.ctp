<?php if(!$show_form) : ?>
<div id='tabbed-nav'>
	<ul>
	<li data-link="editar"><a id="btn-editar"><i class="fa fa-pencil"></i> Perfil</a></li>
	</ul>
	<div>
		<div data-content-url="<?php echo $this->Html->url( array("controller" => "users", "action" => "edit", "true") ); ?>">
		</div>
	</div>
</div>
<?php else : ?>

<?php echo $this->Form->create("User", array('url' => array('true'), 'type' => 'file' ) ); ?>

	<?php echo $this->Form->input("id", array("type" => "hidden", "value" => AuthComponent::user('Actor.id')) ); ?>
	<?php echo $this->Form->input("model", array("type" => "hidden", "value" => AuthComponent::user('Actor.model')) ); ?>
	<?php echo $this->Form->input("prefix", array("type" => "hidden", "value" => AuthComponent::user('Actor.prefix')) ); ?>
	<?php echo $this->Form->input("auth_name", array("type" => "hidden", "value" => $this->Html->getActorInfo("name")) ); ?>
	<?php echo $this->Form->input("auth_email", array("type" => "hidden", "value" => $this->Html->getActorInfo("email")) ); ?>

<div class="col-md-6">
	<?php echo $this->Form->input("name", array("label" => "Nome", "class" => "form-control" ) ); ?>
	<?php echo $this->Form->input("email", array("label" => "E-mail", "class" => "form-control" ) ); ?>
</div>

<div class="col-md-6">
	<?php echo $this->Form->input("password", array("label" => "Senha", "class" => "form-control") ); ?>
	<?php echo $this->Form->input("avatar", array("type" => "file", "label" => "Foto de Perfil") ); ?>
</div>

<div class="col-md-12">
	<button type="submit" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Atualizar meus dados</button>
</div>

<?php echo $this->Form->end(); ?>
<?php endif; ?>