<?php if(!$this->request->is("post")) : ?>
<div class="row">
	<div class="col-xs-12">

		<h2 class="titulo">Inserção de Input</h2>

		<span class="label label-default"><?php echo $input["Input"]["name"]; ?></span>
		<span class="label label-default"><?php echo $student["Student"]["name"]; ?></span>

		<?php echo $this->Form->create("StudentInput"); ?>

		<?php echo $this->Form->input("StudentInput.name", array("label" => "Nome do campo") ); ?>

		<?php if($input["Input"]["id"] == $this->Html->getInputId("Escala Numérica") ) : ?>

			<?php echo $this->Form->input("StudentInput.config.range_start", array("label" => "Número Inicial", "type" => "text", "value" => 1) ); ?>
			<?php echo $this->Form->input("StudentInput.config.range_end", array("label" => "Número Final", "type" => "text", "value" => 5) ); ?>

		<?php endif; ?>

		<?php if($input["Input"]["id"] == $this->Html->getInputId("Escala Texto") ) : ?>

			<?php
				for($i = 1; $i <= 5; $i++) {
					echo $this->Form->input("StudentInput.config." . $i . ".name", array("label" => "Opção " . $i, "type" => "text") );
				}
			?>

		<?php endif; ?>

		<div class="form-group">
			<button class="btn btn-success btn-block">Salvar Campo</button>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
<?php endif; ?>

<?php if($this->request->is("post")) : ?>
<script>
$(document).ready(function() {
	parent.location.reload();
    parent.$.fancybox.close();                //will close the fancybox
});
</script>
<?php endif; ?>