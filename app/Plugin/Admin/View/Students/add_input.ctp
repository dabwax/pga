<div class="row">
	<div class="col-xs-12">

		<h2>Inserção de Input "<?php echo $input["Input"]["name"]; ?>" no Aluno "<?php echo $student["Student"]["name"]; ?>"</h2>
		
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

		<?php echo $this->Form->end("Salvar"); ?>
	</div>
</div>