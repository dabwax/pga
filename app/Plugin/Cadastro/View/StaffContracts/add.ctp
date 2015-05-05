<?php echo $this->Form->create("StaffContract"); ?>
<?php echo $this->Form->input("staff_id" ,array("type" => "hidden", "value" => $staff_id) ); ?>
<?php echo $this->Form->input("contract_id" ,array("label" => "Contrato", "div" => "form-group", "class" => "form-control", "empty" => "Selecionar") ); ?>
<?php echo $this->Form->input("role" ,array("label" => "Cargo", "div" => "form-group", "class" => "form-control", "options" => array("CMDT" => "Comandante", "COPIL" => "Co-piloto") ) ); ?>
<?php echo $this->Form->input("status" ,array("label" => "Status", "div" => "form-group", "class" => "form-control", "options" => array(1 => "Ativo", 0 => "Inativo") ) ); ?>
<?php echo $this->Form->input("date" ,array("label" => "Data", "div" => "form-group", "class" => "form-control", "type" => "text", "value" => (new DateTime("now"))->format("d/m/Y")  ) ); ?>

<div class="form-group">
	<button type="submit" class="btn btn-success btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
</div>
<?php echo $this->Form->end(); ?>

<?php if($this->request->is("post")) { ?>
	<?php

        echo $this->Html->css('/components/fancybox/source/jquery.fancybox.css');
        echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
        echo $this->Html->script('/components/fancybox/source/jquery.fancybox.pack.js');
?>

<script>
	parent.jQuery.fancybox.close();
	parent.window.location.reload();
</script>
<?php } ?>