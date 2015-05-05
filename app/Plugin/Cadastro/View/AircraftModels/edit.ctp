<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Editar Modelo de Aeronave</h3>
					<hr>
					<div class="row">
						<?php echo $this->Form->create('AircraftModel', array('class' => 'col-md-7') ); ?>
						<?php echo $this->Form->input('id'); ?>
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
								<?php echo $this->Form->input('use_in_planning', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => array('0' => 'Não', '1' => 'Sim') ) ); ?>
							</div>

							<button type="submit" class="btn btn-default">Editar</button>
						<?php echo $this->Form->end(); ?>
						<div class="col-md-5">
							<h4>Modelos Similares</h4>

							<table class="table">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											Modelo
										</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($aircraft_similars as $s) : ?>
									<tr>
										<td>
											<?php echo $i; ?>
										</td>
										<td>
											<?php echo $s["AircraftModelSimilar"]["model"]; ?>
										</td>
										<td>
											<?php echo $this->Form->postLink(
											   $this->Html->tag('i', '', array('class' => 'fa fa-trash')),
											        array('controller' => 'aircraft_similars', 'action' => 'delete', $s['AircraftSimilar']['id']),
											        array('escape'=>false),
											    __('Você tem certeza que quer apagar este registro? Esta ação é PERMANENTE!'),
											   array('class' => 'btn btn-mini')
											); ?>
										</td>
									</tr>
									<?php $i++; endforeach; ?>
								</tbody>
							</table>

							<?php echo $this->Form->create("AircraftSimilar", array("url" => array("controller" => "aircraft_similars", "action" => "add") ) ); ?>

							<?php echo $this->Form->input("aircraft_model_id", array("type" => "hidden", "value" => $this->request->data["AircraftModel"]["id"]) ); ?>

								<div class="form-group">
									<label for="">Adicionar Modelo</label>
									<?php echo $this->Form->input("aircraft_model_related_id", array("options" => $aircraft_models, "empty" => "Selecionar Modelo Similar", "class" => "form-control", "label" => false, "div" => false) ); ?>

								</div>

								<button type="submit" class="btn btn-default">Adicionar Similaridade</button>

							<?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>