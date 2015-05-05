<div class="tab-pane fade" id="cargo">

    <?php if(!empty($cargos)) : ?>
    <div class="listing table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Data Inicial</th>
                    <th>Cargo</th>
                    <th>Aeronave</th>
                    <th>Base</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cargos as $c) : ?>
                <tr>
                    <td>
                        <?php echo $c["StaffRole"]["date_start"]; ?>
                    </td>
                    <td>
                        <?php echo $c["Role"]["name"]; ?>
                    </td>
                    <td>
                        <?php echo $c["AircraftModel"]["name"]; ?>
                    </td>
                    <td>
                        <?php echo $c["Basis"]["name"]; ?>
                    </td>
                    <td>
                        <a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staffs', 'action' => 'delete_item', 'model' => 'StaffRole', 'id' => $c['StaffRole']['id'], 'staff' => $c['StaffRole']['staff_id']) ); ?>" onclick="if(!confirm('Você tem certeza disto? Esta ação é permanente!')) { return false; }" class="btn btn-danger btn-xs" style="color: #FFF;">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <hr>
    <em>Não há cargos para este tripulante.</em>
    <hr>
    <?php endif; ?>

    <?php echo $this->Form->create("StaffRole", array(
        "controller" => "staff_roles",
        "action" => "add",
        "novalidate" => true
    ) ); ?>

    <?php echo $this->Form->input("staff_id", array("type" => "hidden", "value" => $this->request->data["Staff"]["id"]) ); ?>

    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <label for="name">Cargo:</label>
                <?php echo $this->Form->input("role_id", array("options" => $roles, "type" => "select", "empty" => "Selecionar Cargo", "label" => false, "div" => false, "class" => "form-control", "data-url" => $this->Html->url( array('action' => 'ajax_check_role_type', 'ext' => 'json') ) ) ); ?>
            </div>
        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="date_end">Data Inicial:</label>
                <?php echo $this->Form->input("date_start", array("class" => "date form-control", "div" => false, "label" => false, "type" => "text") ); ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="form-group campo-base hide">
                <label for="name">Base:</label>
                <?php echo $this->Form->input("basis_id", array("options" => $bases, "type" => "select", "empty" => "Selecionar Base", "label" => false, "div" => false, "class" => "form-control") ); ?>
            </div>
        </div>

        <div class="col-md-12">

            <div class="form-group campo-aeronave hide">
                <label for="date_end">Modelo de Aeronave:</label>
                <?php echo $this->Form->input("aircraft_model_id", array("class" => "form-control", "div" => false, "label" => false, "type" => "select", "options" => $aircraft_models, "empty" => "Selecionar Modelo de Aeronave") ); ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-default">Adicionar Cargo</button>
        </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div> <!-- #cargo -->