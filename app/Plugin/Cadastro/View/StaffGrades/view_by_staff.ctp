<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Visualizar escala por tripulante</h3>
						
						<?php echo $this->Form->create("StaffGrade"); ?>

						<div class="row">
							<div class="col-xs-6">


								<div class="form-group">
									<?php echo $this->Form->input("month", array("type" => "select", "empty" => "Selecionar Mês", "label" => "Mês", "class" => "form-control", "options" => $months ) ); ?>
								</div>

							</div>
							<div class="col-xs-6">
								
								<div class="form-group">
									<?php echo $this->Form->input("year", array("type" => "select", "label" => "Ano", "empty" => "Selecionar Ano", "class" => "form-control", "options" => $years ) ); ?>
								</div>

								<button type="submit" class="btn btn-danger">Visualizar</button>

							</div>
						</div>

						<?php echo $this->Form->end(); ?>

							<table class="table">
								<thead>
									<tr>
										<th>
											Tripulante
										</th>
										<th>
											1ª quinzena
										</th>
										<th>
											2º quinzena
										</th>
										<th>
											Matrícula
										</th>
										<th>
											Base
										</th>
										<th>
											Função
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											Tripulante A
										</td>
										<td style="background: #ffe1b7">
											01/12/2014 a 16/12/2014
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td>
											PR-HJS
										</td>
										<td>
											JPA
										</td>
										<td>
											1P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante B
										</td>
										<td style="background: #ffe1b7">
											01/12/2014 a 16/12/2014
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td>
											PR-HJS
										</td>
										<td>
											JPA
										</td>
										<td>
											2P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante C
										</td>
										<td style="background: #ffe1b7">
											01/12/2014 a 16/12/2014
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td>
											PR-HJS
										</td>
										<td>
											JPA
										</td>
										<td>
											1P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante D
										</td>
										<td style="background: #ffe1b7">
											01/12/2014 a 16/12/2014
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td>
											PR-HJS
										</td>
										<td>
											JPA
										</td>
										<td>
											2P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante A
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/12/2014 a 31/12/2014
										</td>
										<td>
											PR-CHM
										</td>
										<td>
											MAGÉ
										</td>
										<td>
											1P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante B
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/12/2014 a 31/12/2014
										</td>
										<td>
											PR-CHM
										</td>
										<td>
											MAGÉ
										</td>
										<td>
											2P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante C
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/12/2014 a 31/12/2014
										</td>
										<td>
											PR-CHM
										</td>
										<td>
											MAGÉ
										</td>
										<td>
											1P
										</td>
									</tr>
									<tr>
										<td>
											Tripulante D
										</td>
										<td style="background: #cee1fc">
											
										</td>
										<td style="background: #ffe1b7">
											17/12/2014 a 31/12/2014
										</td>
										<td>
											PR-CHM
										</td>
										<td>
											MAGÉ
										</td>
										<td>
											2P
										</td>
									</tr>
								</tbody>
							</table>

				</div> <!-- .box-default -->
			</div> <!-- .col-md-12 -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</section>