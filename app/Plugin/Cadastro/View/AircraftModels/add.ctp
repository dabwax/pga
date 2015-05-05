<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Cadastrar Modelo de Aeronave</h3>
					<hr>
					<div class="row">
						<?php echo $this->Form->create('AircraftModel', array('class' => 'col-md-7') ); ?>
							<div class="form-group">
								<label for="nome">Nome:</label>
								<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Nome da aeronave') ); ?>
							</div>
							
							<div class="form-group">
								<label for="modelo">Modelo:</label>
								<?php echo $this->Form->input('model', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Modelo da aeronave') ); ?>
							</div>
							
							<div class="form-group">
								<label for="class">Classe:</label>
								<?php echo $this->Form->input('class', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => $classe, 'empty' => 'Selecione a classe' ) ); ?>
							</div>
							
							<div class="form-group">
								<label for="size">Porte:</label>
								<?php echo $this->Form->input('size', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => $porte, 'empty' => 'Selecione o porte' ) ); ?>
							</div>
							
							<div class="form-group">
								<label for="motor">Motorização:</label>
								<?php echo $this->Form->input('motor', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => $motorizacao, 'empty' => 'Selecione a motorização' ) ); ?>
							</div>

							<div class="form-group">
								<label for="motor">Usar em Planejamento?</label>
								<?php echo $this->Form->input('use_in_planning', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => array(0 => 'Não', 1 => 'Sim') ) ); ?>
							</div>

							<button type="submit" class="btn btn-default">Cadastrar</button>
						<?php echo $this->Form->end(); ?>
						<div class="col-md-5">
							<h4>Informações úteis</h4>
							<p>Espaço destinado a instruções e informativos relacionados a essa página. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id condimentum quam. Maecenas porta ex in ipsum bibendum, vel egestas lectus posuere. Duis imperdiet dictum metus malesuada tempus.</p>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>