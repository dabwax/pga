<div class="roles view">
<h2><?php echo __('Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($role['Role']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aircraft Model'); ?></dt>
		<dd>
			<?php echo h($role['Role']['aircraft_model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Base'); ?></dt>
		<dd>
			<?php echo h($role['Role']['base']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Training Hour'); ?></dt>
		<dd>
			<?php echo h($role['Role']['training_hour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($role['Role']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($role['Role']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $role['Role']['id']), array(), __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Grouping Aircraft Staffs'), array('controller' => 'client_grouping_aircraft_staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Grouping Aircraft Staff'), array('controller' => 'client_grouping_aircraft_staffs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Client Grouping Aircraft Staffs'); ?></h3>
	<?php if (!empty($role['ClientGroupingAircraftStaff'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Grouping Aircraft Id'); ?></th>
		<th><?php echo __('Staff Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Ceated'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['ClientGroupingAircraftStaff'] as $clientGroupingAircraftStaff): ?>
		<tr>
			<td><?php echo $clientGroupingAircraftStaff['id']; ?></td>
			<td><?php echo $clientGroupingAircraftStaff['client_grouping_aircraft_id']; ?></td>
			<td><?php echo $clientGroupingAircraftStaff['staff_id']; ?></td>
			<td><?php echo $clientGroupingAircraftStaff['role_id']; ?></td>
			<td><?php echo $clientGroupingAircraftStaff['ceated']; ?></td>
			<td><?php echo $clientGroupingAircraftStaff['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_grouping_aircraft_staffs', 'action' => 'view', $clientGroupingAircraftStaff['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_grouping_aircraft_staffs', 'action' => 'edit', $clientGroupingAircraftStaff['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_grouping_aircraft_staffs', 'action' => 'delete', $clientGroupingAircraftStaff['id']), array(), __('Are you sure you want to delete # %s?', $clientGroupingAircraftStaff['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Grouping Aircraft Staff'), array('controller' => 'client_grouping_aircraft_staffs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
