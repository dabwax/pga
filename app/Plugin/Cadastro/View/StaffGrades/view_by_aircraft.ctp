<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Visualizar escala por aeronave</h3>
						
						<?php echo $this->Form->create("StaffGrade"); ?>

						<div class="row">
							<div class="col-xs-6">


								<div class="form-group">
									<?php echo $this->Form->input("month", array("type" => "select", "empty" => "Selecionar Mês", "label" => "Mês", "class" => "form-control", "options" => $months ) ); ?>
								</div>

								<div class="form-group">
									<?php echo $this->Form->input("year", array("type" => "select", "label" => "Ano", "empty" => "Selecionar Ano", "class" => "form-control", "options" => $years ) ); ?>
								</div>

							</div>
							<div class="col-xs-6">
								
								<div class="form-group">
									<?php echo $this->Form->input("aircraft_id", array("options" => $aircrafts, "type" => "select", "empty" => "Selecionar Aeronave", "label" => "Aeronave", "class" => "form-control" ) ); ?>
								</div>

								<button type="submit" class="btn btn-danger">Visualizar</button>

							</div>
						</div>

						<?php echo $this->Form->end(); ?>

							<table class="table">
								<thead>
									<tr>
										<th>
											Matrícula
										</th>
										<th>
											Base
										</th>
										<th>
											Tripulante
										</th>
										<th>
											Função
										</th>
										<th>
											1ª quinzena
										</th>
										<th>
											2º quinzena
										</th>
									</tr>
								</thead>
								<tbody>
									<?php //foreach($staff_grades as $g) : ?>
									<tr>
										<td rowspan="4" style="vertical-align: middle;">
											PR-HJS
										</td>
										<td rowspan="4" style="vertical-align: middle;">
											JPA
										</td>
										<td>
											Tripulante A
										</td>
										<td>
											1P
										</td>
										<td style="background: #ffe1b7">
											01/12/2014 a 16/12/2014
										</td>
										<td style="background: #cee1fc">
											
										</td>
									</tr>
									<tr>
										<td>
											Tripulante B
										</td>
										<td>
											2P
										</td>
										<td style="background: #ffe1b7">
											01/12/2014 a 16/12/2014
										</td>
										<td style="background: #cee1fc">
											
										</td>
									</tr>
									<tr>
										<td>
											Tripulante C
										</td>
										<td>
											1P
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/12/2014 a 31/12/2014
										</td>
									</tr>
									<tr>
										<td>
											Tripulante D
										</td>
										<td>
											2P
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/12/2014 a 31/12/2014
										</td>
									</tr>
									<tr>
										<td rowspan="4" style="vertical-align: middle;">
											CH-KLM
										</td>
										<td rowspan="4" style="vertical-align: middle;">
											MAGÉ
										</td>
										<td>
											Tripulante E
										</td>
										<td>
											1P
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/01/2015 a 31/01/2015
										</td>
									</tr>
									<tr>
										<td>
											Tripulante F
										</td>
										<td>
											2P
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/01/2015 a 31/01/2015
										</td>
									</tr>
									<tr>
										<td>
											Tripulante G
										</td>
										<td>
											1P
										</td>
										<td style="background: #ffe1b7">
											01/01/2015 a 16/01/2015
										</td>
										<td style="background: #cee1fc">
											
										</td>
									</tr>
									<tr>
										<td>
											Tripulante H
										</td>
										<td>
											2P
										</td>
										<td style="background: #ffe1b7">
											01/01/2015 a 16/01/2015
										</td>
										<td style="background: #cee1fc">
											
										</td>
									</tr>
									<?php //endforeach; ?>
								</tbody>
							</table>

				</div> <!-- .box-default -->
			</div> <!-- .col-md-12 -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</section>