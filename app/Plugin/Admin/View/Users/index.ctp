<div class="row">
	<div class="col-md-6">
         		 <div class="panel panel-default">
         		 	<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Usuário</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $u) : ?>
					<tr>
						<td><?php echo $u['User']['username']; ?></td>
						<td><?php if($u['User']['username'] != "pedro@redepga.com.br" && $u['User']['username'] != "ator") { echo $this->Html->link("Deletar", array('action' => 'delete', $u['User']['id']), array('class' => 'btn btn-default') ); } ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
         		 <div class="panel panel-default">
         		 	<div class="panel-body">
			<?php echo $this->Form->create("User", array('url' => array('action' => 'add') ) ); ?>
			<?php echo $this->Form->input("username", array('div' => 'form-group', 'class' => 'form-control', 'label' => 'Usuário') ); ?>
			<?php echo $this->Form->input("password", array('div' => 'form-group', 'class' => 'form-control', 'label' => 'Senha') ); ?>
			<?php echo $this->Form->input("role", array('type' => 'hidden', 'value' => 'admin') ); ?>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Salvar Usuário</button>
			</div>
			<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>