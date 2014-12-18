<h2 class="titulo-tab">
	<i class="fa fa-pencil"></i> Input <small>Arquivo</small>
</h2>

<div class="row">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default">Criar Novo Registro</a>
		<a href="<?php echo $this->Html->url( array("action" => "archive") ); ?>" class="btn btn-info">Arquivo</a>
	</div>
</div>

<div class="row" style="margin-top: 20px;">
	<table class="table table-bordered">
		<tbody>
			<?php foreach($aulas as $data => $_aulas) : ?>
			<?php foreach($_aulas as $ator => $_aula) : ?>
			<tr>
				<td colspan="4" style="background: #000; color: #FFF; font-weight: bold; text-align: center;">
					<?php echo $data; ?> <span class="label label-primary"><?php echo ucfirst($ator); ?></span>
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
					<?php echo (!empty($_a["StudentInput"]["name"])) ? $_a["StudentInput"]["name"] : "Matéria: " . $_a["StudentLesson"]["name"]; ?>
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
</div>