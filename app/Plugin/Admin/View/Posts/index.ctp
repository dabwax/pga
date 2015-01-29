<div class="posts index">
	<h2><?php echo __('Notícias'); ?></h2>
	<a href="<?php echo $this->Html->url( array('action' => 'add') ); ?>" class="btn btn-default">Adicionar Nova Notícia</a>
	<table class="table table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Autor'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Ultima Modificação'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $post['Post']['id']), array('class' => 'btn btn-default') ); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $post['Post']['id']), array('class' => 'btn btn-default'), __('Você tem certeza disto? Esta ação é PERMANENTE!', $post['Post']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>