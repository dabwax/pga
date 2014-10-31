<div class="row">
	<div class="col-xs-12">

		<h2>Inserção de Input "<?php echo $input["Input"]["name"]; ?>" no Aluno "<?php echo $student["Student"]["name"]; ?>"</h2>
		
		<?php echo $this->Form->create("StudentInput"); ?>

		<?php echo $this->Form->input("StudentInput.name", array("label" => "Nome do campo") ); ?>

		<?php echo $this->Form->end("Salvar"); ?>
	</div>
</div>