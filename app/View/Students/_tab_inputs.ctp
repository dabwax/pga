<div role="tabpanel" class="tab-pane" id="inputs">

	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation"><a href="#criar-input" role="tab" data-toggle="tab">Criar novo registro</a></li>
		<li role="presentation"><a href="#arquivo-input" role="tab" data-toggle="tab">Arquivo</a></li>
</ul>

<div class="tab-content">

	<div id="criar-input" class="tab-pane">
		
		<?php foreach($atores as $ac) : ?>

			<h3>Como <?php echo $ac; ?></h3>

			<?php echo $this->Form->create("StudentInputValue", array("url" => array("controller" => "students", "action" => "add_student_input_value") ) ); ?>

			<?php echo $this->Form->input("StudentInputValue.date", array("type" => "text", "class" => "calendario", "value" => date("d/m/Y")) ); ?>

			<?php

			$campos = array();
			
			foreach($student_inputs as $k => $si) : ?>

				<?php if($si["StudentInput"]["actor"] == strtolower($ac)) : $campos[$ac][] = $si; ?>

					<?php echo $this->Form->input("StudentInputValue." . $k . ".student_id", array("type" => "hidden", "value" => $this->request->data["Student"]["id"]) ); ?>
					<?php echo $this->Form->input("StudentInputValue." . $k . ".actor", array("type" => "hidden", "value" => strtolower($ac) ) ); ?>
					<?php echo $this->Form->input("StudentInputValue." . $k . ".student_input_id", array("type" => "hidden", "value" => $si["StudentInput"]["id"]) ); ?>

					<label for=""><?php echo $si["StudentInput"]["name"]; ?></label>

					<?php if( $si["Input"]["id"] == $this->Html->getInputId("Calendário") ) : ?>

						<?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "calendario") ); ?>

					<?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Texto") ) : ?>

						<?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false) ); ?>

					<?php elseif ( $si["Input"]["id"] == $this->Html->getInputId("Escala Numérica") ) : ?>

						<!-- Começo - label -->

						<table class="table">
							<thead>
								<tr>
									<th class="text-left">
										De <?php echo $si["StudentInput"]["config"]["range_start"] ?> a <?php echo $si["StudentInput"]["config"]["range_end"] ?>
									</th>
									<th class="text-right">
										Atual: <span id='<?php echo "ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>'>1</span>
									</th>
								</tr>
							</thead>
						</table>

						<!-- Fim - label -->

						<!-- Começo - range -->

						<div class="range-slider" data-min="<?php echo $si["StudentInput"]["config"]["range_start"]; ?>" data-max="<?php echo $si["StudentInput"]["config"]["range_end"]; ?>" data-input="<?php echo "#CampoEscalaNumerica" . $si["StudentInput"]["id"]; ?>" data-resultado="<?php echo "#ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>"></div>
						
						<?php
							echo $this->Form->input("StudentInputValue." . $k . ".value", array(
								"label" => false,
								"type" => "hidden",
								"id" => "CampoEscalaNumerica" . $si["StudentInput"]["id"],
								"value" => 1,
							));
						?>

						<!-- Fim - range -->

					<?php endif; ?>

				<?php endif; ?>

			<?php endforeach; ?>

			<?php if(empty($campos[$ac])) : ?>
				<div class="alert alert-info">
					Não há inputs para este ator.
				</div>
			<?php endif; ?>
		
		<?php endforeach; ?>

		<button type="submit" class="btn btn-success">Salvar Registro</button>

		<?php echo $this->Form->end(); ?>
	</div>

	<div id="arquivo-input" class="tab-pane">

		<table class="table">
			<thead>
				<tr>
					<th>
						Ator
					</th>
					<th>
						Campo
					</th>
					<th>
						Valor
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($aulas as $data => $_aulas) : ?>
				<?php foreach($_aulas as $ator => $_aula) : ?>
				<tr>
					<td colspan="4" style="background: #000; color: #FFF; font-weight: bold; text-align: center;">
						<?php echo $data; ?>	
					</td>
				</tr>
				<?php foreach($_aula as $_a) : ?>
				<tr>
					<td>
						<span class="label label-default">
							<?php echo ucfirst($ator); ?>
						</span>
					</td>
					<td>
						<?php echo $_a["StudentInput"]["name"]; ?>
					</td>
					<td>
						<?php echo $_a["StudentInputValue"]["value"]; ?>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php endforeach; ?>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div> <!-- #arquivo-input -->
	
	</div> <!-- .tab-content -->

</div> <!-- #inputs -->