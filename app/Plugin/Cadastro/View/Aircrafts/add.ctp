<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Cadastrar Aeronave</h3>
					<hr>
					<div class="row">
						<?php echo $this->Form->create('Aircraft', array('class' => 'col-md-7') ); ?>
							<div class="form-group">
								<label for="nome">Modelo:</label>
								<?php echo $this->Form->input('Aircraft.aircraft_model_id', array('label' => false, 'div' => false, 'class' => 'form-control', 'options' => $aircraft_models, 'empty' => 'Selecionar Modelo') ); ?>
							</div>
							
							<div class="form-group">
								<label for="registration">Matrícula:</label>
								<?php echo $this->Form->input('registration', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Matrícula da aeronave') ); ?>
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