<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Editar Cargo</h3>
					<hr>

					<div class="row">

					<div class="col-md-6">
						<?php
							echo $this->Form->create('Role', array('novalidate' => true) );
							echo $this->Form->input('id');
						?>

						<div class="form-group">
							<label for="nome">Nome:</label>
							<?php echo $this->Form->input('Role.name', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'text') ); ?>
						</div>

						<div class="form-group">
							<label for="nome">Obrigatório Modelo de Aeronave?</label>
							<?php echo $this->Form->input('Role.aircraft_model', array('div' => false, 'label' => false, 'class' => 'form-control', 'value' => $this->request->data["Role"]["aircraft_model"], 'empty' => 'Selecionar', 'type' => 'select', 'options' => array(1 => 'Sim', 2 => 'Não') ) ); ?>
						</div>

						<div class="form-group">
							<label for="nome">Obrigatório Base?</label>
							<?php echo $this->Form->input('Role.base', array('div' => false, 'label' => false, 'class' => 'form-control', 'value' => $this->request->data["Role"]["base"], 'type' => 'select', 'options' => array(1 => 'Sim', 2 => 'Não', 'empty' => 'Selecionar') ) ); ?>
						</div>

						<div class="form-group">
							<label for="nome">Valor/H de Treinamento:</label>
							<?php echo $this->Form->input('Role.training_hour', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'text') ); ?>
						</div>

						<button type="submit" class="btn btn-default">Editar</button>

					<?php echo $this->Form->end(); ?>
					</div>
					<div class="col-md-6">
						<h4>Informações úteis</h4>
						<p>Espaço destinado a instruções e informativos relacionados a essa página. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id condimentum quam. Maecenas porta ex in ipsum bibendum, vel egestas lectus posuere. Duis imperdiet dictum metus malesuada tempus.</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>