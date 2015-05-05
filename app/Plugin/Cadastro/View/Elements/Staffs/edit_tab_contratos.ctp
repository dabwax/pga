<div class="tab-pane fade" id="contratos">

    <a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staff_contracts', 'action' => 'add', $this->request->data['Staff']['id']) ); ?>" class="btn btn-success btn-block abrir-modal" style="margin-top: 10px; margin-bottom: 10px;">Adicionar</a>

    <div class="listing table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Contrato</th>
                    <th>Aeronave</th>
                    <th>Função</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Gerência</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sc as $t) : ?>
                <tr>
                    <td><?php echo $t['Contract']['name']; ?></td>
                    <td><?php echo $t['Contract']['Aircraft']['registration']; ?></td>
                    <td><?php echo strtoupper($t['StaffContract']['role']); ?></td>
                    <td><?php if($t['StaffContract']['status'] == 0 || $t['StaffContract']['status'] == NULL) : ?><span class="label label-danger">Inativo</span><?php else : ?><span class="label label-default">Ativo</span><?php endif; ?></td>
                    <td><?php echo $t['StaffContract']['date']; ?></td>
                    <td><?php echo $t['Contract']['management']; ?></td>
                    <td>
                        <a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staff_contracts', 'action' => 'edit', $t['StaffContract']['id'], $this->request->data['Staff']['id']) ); ?>" class="btn btn-primary abrir-modal" style="color: #FFF;"><i class="fa fa-pencil"></i></a>
                        <a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staff_contracts', 'action' => 'delete', $t['StaffContract']['id'], $this->request->data['Staff']['id']) ); ?>" class="btn btn-danger abrir-modal" style="color: #FFF;"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div> <!-- #contratos -->