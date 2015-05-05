<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Criar escala</h3>
					<div class="aligncenter">
						
						<?php echo $this->Form->create("StaffGrade"); ?>

						<div class="col-xs-6">
							
							<div class="form-group">
								<?php echo $this->Form->input("registration", array("options" => $aircrafts, "type" => "select", "empty" => "Selecionar Matrícula", "label" => "Matrícula", "class" => "form-control" ) ); ?>
							</div>

							<div class="form-group">
								<?php echo $this->Form->input("role", array("options" => $roles, "type" => "select", "empty" => "Selecionar Cargo", "label" => "Cargo", "class" => "form-control", "data-url" => $this->Html->url( array("controller" => "staff_grades", "action" => "ajax_verify_by_aircraft") ) ) ); ?>
							</div>

							<div class="form-group">
								<?php echo $this->Form->input("type", array("label" => "Tipo", "type" => "select", "options" => array("2" => "Escala"), "empty" => "Selecionar Tipo", "class" => "form-control")); ?>
							</div>

						</div>

						<div class="col-xs-6">
							
							<div class="form-group">
								<?php echo $this->Form->input("date_start", array("type" => "text", "class" => "date form-control", "label" => "Data Início") ); ?>
							</div>

							<div class="form-group">
								<?php echo $this->Form->input("date_finish", array("type" => "text", "class" => "date form-control", "label" => "Data Final") ); ?>
							</div>

						</div>

						<div class="clearfix"></div>
					
						<button type="submit" class="btn btn-danger" id="btn-validar-escala">Verificar Tripulantes</button>
 
						<?php echo $this->Form->end(); ?>

						<?php echo $this->Html->image("/js/libs/select2-3.5.1/select2-spinner.gif", array("id" => "ajax-load", "style" => "margin-top: 12px; display: none;") ); ?>

						<div id="alertas-ajax" style="margin-top: 10px; margin-bottom: 10px;"></div>

						<table id="tabela-resultados" class="table" style="display: none;">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Alertas</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div> <!-- .aligncenter -->
				</div> <!-- .box-default -->
			</div> <!-- .col-md-12 -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</section>

<script id="tmpl-staff" type="text/x-jsrender">
<tr>
	<td>
		{{:Staff.name}}
	</td>
	<td class="align-left">
		<ul>
		{{for #data.Staff.alerts}}
			<li style="background: {{:color}};">
				{{:message}}
			</li>
		{{/for}}
		</ul>
	</td>
	<td class="acoes-{{:Staff.id}}">
		{{if Staff.staff_grade_id}}
			{{include tmpl="#tmpl-btn-desescalar-lista"/}}
		{{else}}
			<a href="#" data-staff-id="{{:Staff.id}}" data-url="<?php echo $this->Html->url( array('controller' => 'staff_grades', 'action' => 'ajax_add_grade') ); ?>" class="btn-escalar-tripulante btn btn-default">
				Escalar
			</a>
		{{/if}}
	</td>
</tr>
</script>

<script id="tmpl-ajax-alerta" type="text/x-jsrender">
<div class="alert alert-{{:status}}" role="alert" style="padding: 3px;">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
	</button>

	<strong>
		{{:message}}
	</strong>
</div>
</script>

<script id="tmpl-btn-escalar" type="text/x-jsrender">
<a href="#" data-staff-id="{{:staff_id}}" data-url="<?php echo $this->Html->url( array('controller' => 'staff_grades', 'action' => 'ajax_add_grade') ); ?>" class="btn-escalar-tripulante btn btn-default">
	Escalar
</a>
</script>

<script id="tmpl-btn-desescalar" type="text/x-jsrender">
<a href="#" data-staff-grade-id="{{:staff_grade_id}}" data-staff-grade-contract-id="{{:staff_grade_contract_id}}" data-staff-id="{{:staff_id}}" data-url="<?php echo $this->Html->url( array('controller' => 'staff_grades', 'action' => 'ajax_delete_grade') ); ?>" class="btn-desescalar-tripulante btn btn-danger">
	Desescalar
</a>
</script>

<script id="tmpl-btn-desescalar-lista" type="text/x-jsrender">
<a href="#" data-staff-grade-id="{{:Staff.staff_grade_id}}" data-staff-grade-contract-id="{{:Staff.staff_grade_contract_id}}" data-staff-id="{{:Staff.id}}" data-url="<?php echo $this->Html->url( array('controller' => 'staff_grades', 'action' => 'ajax_delete_grade') ); ?>" class="btn-desescalar-tripulante btn btn-danger">
	Desescalar
</a>
</script>