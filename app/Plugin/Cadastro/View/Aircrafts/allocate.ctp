<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Alocar Aeronave "<?php echo $aircraft["Aircraft"]["registration"]; ?>"</h3>
					<hr>
					<div class="row">
						<?php echo $this->Form->create('AircraftBasis', array('class' => 'col-md-7') ); ?>
							<?php echo $this->Form->input("AircraftBasis.aircraft_id", array("value" => $aircraft["Aircraft"]["id"], "type" => "hidden") ); ?>
							<div class="form-group">
								<label for="nome">Base:</label>
								<?php echo $this->Form->input('AircraftBasis.basis_id', array('label' => false, 'div' => false, 'class' => 'form-control', 'options' => $bases, 'empty' => 'Selecionar Base') ); ?>
							</div>
							
							<div class="form-group">

								<div class="row">
									<div class="col-xs-12">
										<label for="registration">Período:</label>
									</div>

									<div class="col-xs-6">
										<?php echo $this->Form->input('start', array('label' => false, 'div' => false, 'class' => 'form-control datepicker', 'placeholder' => 'Data Início', 'type' => 'text') ); ?>
									</div>

									<div class="col-xs-6">
										<?php echo $this->Form->input('end', array('label' => false, 'div' => false, 'class' => 'form-control datepicker', 'placeholder' => 'Data Fim', 'type' => 'text') ); ?>
									</div>
								</div>

							</div>

							<button type="submit" class="btn btn-default">Cadastrar</button>
						<?php echo $this->Form->end(); ?>
						<div class="col-md-5">
							<h4>Histórico de Alocações desta Aeronave</h4>
							
							<hr>

							<?php if(!empty($allocates)) : ?>
							<table class="table">
								<thead>
									<tr>
										<th>Base</th>
										<th>Período</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($allocates as $a) : ?>
									<tr>
										<td>
											<?php echo $a["Basis"]["name"]; ?>
										</td>
										<td>
											<?php echo $a["AircraftBasis"]["start"]; ?> a <?php echo $a["AircraftBasis"]["end"]; ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<?php else: ?>
								<em>Não há alocações para esta aeronave no momento.</em>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>