<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Cadastrar Contrato</h3>
					<hr>
					<div class="row">
						<?php echo $this->Form->create('Contract', array('class' => 'col-md-7') ); ?>
							<div class="form-group">
								<label for="nome">Aeronave:</label>
								<?php echo $this->Form->input('Contract.aircraft_id', array('div' => false, 'label' => false, 'class' => 'form-control', 'options' => $aircrafts, 'type' => 'select', 'empty' => "Selecionar Aeronave") ); ?>
							</div>
							
							<div class="form-group">
								<label for="modelo">Nome:</label>
								<?php echo $this->Form->input('name', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Nome do contrato') ); ?>
							</div>
							
							<div class="form-group">
								<label for="vencimento">Código:</label>
								<?php echo $this->Form->input('code', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Código do contrato', 'type' => 'text') ); ?>
							</div>
							
							<div class="form-group">
								<label for="observacoes">PDF:</label>
								<?php echo $this->Form->input('pdf', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'file') ); ?>
							</div>
							
							<div class="form-group">
								<label for="vencimento">Expiração:</label>
								<?php echo $this->Form->input('expire', array('div' => false, 'label' => false, 'class' => 'date form-control', 'placeholder' => 'Expiração do contrato', 'type' => 'text') ); ?>
							</div>
							
							<button type="submit" class="btn btn-default">Cadastrar</button>
						</form>
						<div class="col-md-5">
							<h4>Informações úteis</h4>
							<p>Espaço destinado a instruções e informativos relacionados a essa página. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id condimentum quam. Maecenas porta ex in ipsum bibendum, vel egestas lectus posuere. Duis imperdiet dictum metus malesuada tempus.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>