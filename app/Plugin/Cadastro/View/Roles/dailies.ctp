<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Valores de Diárias</h3>
                    <hr>

                    <?php echo $this->Form->create("TrainingDaily"); ?>

                    <div class="row">
	                    <div class="col-md-6">
	                    	<h4>Tripulante</h4>
	                    	<hr>
		                    <?php echo $this->Form->input("id"); ?>
		                    <?php echo $this->Form->input("national", array('label' => 'Nacional', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("europe", array('label' => 'Europa', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("international", array('label' => 'Internacional', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("bonus", array('label' => 'Bonificação de Instrutor/Examinador <i class="fa fa-question-circle" title="Verba destinada a gratificação de instrutor/examinador por viagem ao simulador" data-toggle="tooltip" data-placement="top"></i>', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("base_bonus", array('label' => 'Adicional de Chefe de Base <i class="fa fa-question-circle" title="Se trata de um valor de bonificação paga aos representantes e/ou chefes de base" data-toggle="tooltip" data-placement="top"></i>', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("basis_daily", array('label' => 'Diária adicional de Base <i class="fa fa-question-circle" title="Se trata de valor de bonificação para viagem à bases afastadas em que o acesso é difícil" data-toggle="tooltip" data-placement="top"></i>', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("basis_deslocation", array('label' => 'Adicional para deslocamento para a Base <i class="fa fa-question-circle" title="Verba destinada ao trajeto inter-municipal que o tripulante percorre por meios próprios para se chegar a base" data-toggle="tooltip" data-placement="top"></i>', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		                    <?php echo $this->Form->input("basis_transportation", array('label' => 'Adicional para transporte para a Base <i class="fa fa-question-circle" title="Verba destinada ao transporte diária dos tripulantes casa/hotel - base, onde não há veículos disponibilizados pela empresa para esse transporte" data-toggle="tooltip" data-placement="top"></i>', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		     </div>
	                    <div class="col-md-6">
	                    	<h4>Comissário</h4>
	                    	<hr>
		                    <?php echo $this->Form->input("national_comissary", array('label' => 'Nacional', 'class' => 'form-control', 'div' => 'form-group') ); ?>
		     </div>
	     </div>

                    <div class="form-group">
                    	<button type="submit" class="btn btn-success btn-block"><i class="fa fa-floppy-o"></i> Editar Valores</button>
                    </div>
                    <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>