<div class="tab-pane fade" id="horas">
	<div class="listing table-responsive">

		<?php if(!empty($voos)) : ?>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Modelo <a href="#"><span class="caret"></span></a></th>
					<th>FB <a href="#"><span class="caret"></span></a></th>
					<th>Total <a href="#"><span class="caret"></span></a></th>
					<th>IFR. <a href="#"><span class="caret"></span></a></th>
					<th>Noturno <a href="#"><span class="caret"></span></a></th>
					<th>H. Nav. <a href="#"><span class="caret"></span></a></th>
					<th>APP <a href="#"><span class="caret"></span></a></th>
					<th>Diurno <a href="#"><span class="caret"></span></a></th>
					<th>Noturno <a href="#"><span class="caret"></span></a></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($voos as $fbs) : ?>

				<?php

				$totais = array(
					"1P" => array("total" => 0, "ifr" => 0, "noturno" => 0, "h_nav" => 0, "app" => 0, "daytime" => 0, "nighttime" => 0),
					"IN" => array("total" => 0, "ifr" => 0, "noturno" => 0, "h_nav" => 0, "app" => 0, "daytime" => 0, "nighttime" => 0),
					"2P" => array("total" => 0, "ifr" => 0, "noturno" => 0, "h_nav" => 0, "app" => 0, "daytime" => 0, "nighttime" => 0),
					"DC" => array("total" => 0, "ifr" => 0, "noturno" => 0, "h_nav" => 0, "app" => 0, "daytime" => 0, "nighttime" => 0),
					"CM" => array("total" => 0, "ifr" => 0, "noturno" => 0, "h_nav" => 0, "app" => 0, "daytime" => 0, "nighttime" => 0),
					"GERAL" => array("total" => 0, "ifr" => 0, "noturno" => 0, "h_nav" => 0, "app" => 0, "daytime" => 0, "nighttime" => 0),
				);

				foreach($fbs as $fb => $v) :

					$fb = $fbs['StaffFlight']['fb'];

					@$totais[$fb]["total"] = $totais[$fb]["total"] + $fbs['StaffFlight']["total"];
					@$totais[$fb]["ifr"] = $totais[$fb]["ifr"] + $fbs['StaffFlight']["ifr"];
					@$totais[$fb]["noturno"] = $totais[$fb]["noturno"] + $fbs['StaffFlight']["noturno"];
					@$totais[$fb]["h_nav"] = $totais[$fb]["h_nav"] + $fbs['StaffFlight']["h_nav"];
					@$totais[$fb]["app"] = $totais[$fb]["app"] + $fbs['StaffFlight']["app"];
					@$totais[$fb]["daytime"] = $totais[$fb]["daytime"] + $fbs['StaffFlight']["daytime"];
					@$totais[$fb]["nighttime"] = $totais[$fb]["nighttime"] + $fbs['StaffFlight']["nighttime"];
				?>
				<tr>
					<td><?php echo $aircraft_models_mask[$fbs['StaffFlight']['aircraft_model_id']]; ?></td>
					<td><?php echo $fbs['StaffFlight']['fb']; ?></td>
					<td><?php echo $fbs['StaffFlight']['total']; ?></td>
					<td><?php echo $fbs['StaffFlight']["ifr"]; ?></td>
					<td><?php echo $fbs['StaffFlight']["noturno"]; ?></td>
					<td><?php echo $fbs['StaffFlight']["h_nav"]; ?></td>
					<td><?php echo $fbs['StaffFlight']["app"]; ?></td>
					<td><?php echo $fbs['StaffFlight']["daytime"]; ?></td>
					<td><?php echo $fbs['StaffFlight']["nighttime"]; ?></td>
				</tr>
				<?php endforeach; ?>

				<?php endforeach; ?>

				<?php foreach($totais as $fb => $dados) : ?>
				<tr>
					<td colspan="2" class="totals-table">Total <?php echo $fb; ?>:</td>
					<td><?php echo $dados["total"]; ?></td>
					<td><?php echo $dados["ifr"]; ?></td>
					<td><?php echo $dados["noturno"]; ?></td>
					<td><?php echo $dados["h_nav"]; ?></td>
					<td><?php echo $dados["app"]; ?></td>
					<td><?php echo $dados["daytime"]; ?></td>
					<td><?php echo $dados["nighttime"]; ?></td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
		<?php else: ?>
			<hr>
			<em>Não há vôos para este tripulante.</em>
			<hr>
		<?php endif; ?>
	</div>
	<!--<p><strong>Adicionar Horas de Vôo</strong></p>
	
	<?php echo $this->Form->create("StaffFlight", array("url" => array("controller" => "staff_flights", "action" => "add") ) ); ?>
		<?php echo $this->Form->input("staff_id", array("type" => "hidden", "value" => $this->request->data["Staff"]["id"]) ); ?>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="codigo">Modelo:</label>
					<?php echo $this->Form->input("StaffFlight.aircraft_model_id", array("class" => "form-control", "div" => false, "label" => false, "empty" => "Selecionar Modelo", "options" => $aircraft_models) ); ?>
				</div>
				
				<div class="form-group">
					<label for="fb">FB:</label>
					<?php echo $this->Form->input("fb", array("class" => "form-control", "div" => false, "label" => false, "type" => "select", "options" => $fb, "empty" => "Selecionar FB") ); ?>
				</div>
				
				<div class="form-group">
					<label for="total">Total:</label>
					<?php echo $this->Form->input("total", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
				
				<div class="form-group">
					<label for="ifr">IFR:</label>
					<?php echo $this->Form->input("ifr", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
				
				<div class="form-group">
					<label for="noturno">Noturno:</label>
					<?php echo $this->Form->input("noturno", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>						
			</div>
			<div class="col-md-6">
				
				<div class="form-group">
					<label for="h_nav">H. NAV:</label>
					<?php echo $this->Form->input("h_nav", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
				
				<div class="form-group">
					<label for="app">APP:</label>
					<?php echo $this->Form->input("app", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
				
				<div class="form-group">
					<label for="daytime">Diurno:</label>
					<?php echo $this->Form->input("daytime", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
				
				<div class="form-group">
					<label for="nighttime">Noturno:</label>
					<?php echo $this->Form->input("nighttime", array("class" => "form-control", "div" => false, "label" => false, "type" => "text") ); ?>
				</div>
				
				<div class="form-group">
					<label for="observations">Observações:</label>
					<?php echo $this->Form->input("observations", array("class" => "form-control", "div" => false, "label" => false, "type" => "textarea") ); ?>
				</div>
				
			</div>
		</div>

		<button type="submit" class="btn btn-default">Adicionar Horas de Vôo</button>

		<p class="comment"><strong>Comentário:</strong> Aqui seria a importação das horas do sistema da OMNI que conversamos</p>
	<?php echo $this->Form->end(); ?>
	-->
</div>