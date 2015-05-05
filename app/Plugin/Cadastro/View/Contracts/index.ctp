<section id="warnings">
</section>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Lista de Contratos</h3>
					<hr>
					<div class="listing table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><?php echo $this->Paginator->sort('Aircraft.name', 'Aeronave'); ?></th>
									<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
									<th><?php echo $this->Paginator->sort('code', 'Código'); ?></th>
									<th><?php echo $this->Paginator->sort('pdf', 'PDF'); ?></th>
									<th><?php echo $this->Paginator->sort('expire', 'Expiração'); ?></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($contracts as $c): ?>
								<tr>
									<td><?php echo h($c['Aircraft']['registration']); ?></td>
									<td><?php echo h($c['Contract']['name']); ?></td>
									<td><?php echo h($c['Contract']['code']); ?></td>
									<td><?php echo h($c['Contract']['pdf']); ?></td>
									<td><?php echo h($c['Contract']['expire']); ?></td>
									<td>
										<a href="<?php echo $this->Html->url( array("action" => "edit", $c['Contract']['id']) ); ?>">
											<i class="fa fa-pencil"></i>
										</a>
										<?php echo $this->Form->postLink(
										   $this->Html->tag('i', '', array('class' => 'fa fa-trash')),
										        array('action' => 'delete', $c['Contract']['id']),
										        array('escape'=>false),
										    __('Você tem certeza que quer apagar este registro? Esta ação é PERMANENTE!'),
										   array('class' => 'btn btn-mini')
										); ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="aligncenter">
						<?php
							echo $this->Paginator->numbers(array('separator' => ''));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>