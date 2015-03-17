<?php if(!$this->request->is("post")) : ?>
<div class="row">
	<div class="col-xs-12">

		<h2 class="titulo text-center"><i class="fa fa-plus-square"></i> Incluir Input</h2>

		<table style="width: 100%; text-align: center; margin-top :10px; margin-bottom: 10px;">
			<tr>
				<td>
					Tipo: <span class="label label-default"><?php echo $input["Input"]["name"]; ?></span>
				</td>
				<td>
					Aluno: <span class="label label-default"><?php echo $student["Student"]["name"]; ?></span>
				</td>
			</tr>
		</table>

		<?php echo $this->Form->create("StudentInput"); ?>

		<?php echo $this->Form->input("StudentInput.name", array("label" => false, "placeholder" => "Nome do Input") ); ?>

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
			<button class="btn btn-success btn-block"><i class="fa fa-floppy-o"></i> Salvar Input</button>
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