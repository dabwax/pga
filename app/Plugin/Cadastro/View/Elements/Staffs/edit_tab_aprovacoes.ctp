<div class="tab-pane fade" id="aprovacoes">

    <div class="listing table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Grupo</th>
                    <th>Função</th>
                    <th>Aeronaves do Grupo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cgs as $t) : ?>
                <tr>
                    <td><?php echo $t['ClientGroup']['Client']['name']; ?></td>
                    <td><?php echo $t['ClientGroup']['name']; ?></td>
                    <td><?php echo strtoupper($t['ClientGroupStaff']['role']); ?></td>
                    <td>
                    	<?php foreach($t['ClientGroup']['ClientGroupAircraft'] as $a) : ?>
                    	<span class="label label-default" style="margin: 3px;">
                    		<?php echo $a['Aircraft']['registration']; ?>
                    	</span>
                    <?php endforeach; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div> <!-- #aprovacoes -->