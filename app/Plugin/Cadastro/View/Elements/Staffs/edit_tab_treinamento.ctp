<div class="tab-pane fade" id="treinamento">

    <?php if(!empty($treinamento)) : ?>

    <a href="javascript:;" class="btn btn-primary btn-toggle-arquivo-morto" style="margin-top: 10px; margin-bottom: 10px;">Mostrar/Esconder Arquivo Morto</a>

    <div class="listing table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Vencimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($treinamento as $t) : ?>
                <tr class="<?php if($t['StaffCertification']['arq_morto'] == 1) :?>hide<?php endif; ?>">
                    <td>
                    <?php echo $t["Certification"]["name"]; ?>
                </td>
                <td>
                    <?php echo ( new DateTime($t["StaffCertification"]["date_start"]) )->format("d/m/Y"); ?>
                    </td>
                    <td>
                    <?php echo ( new DateTime($t["StaffCertification"]["date_finish"]) )->format("d/m/Y"); ?>
                    </td>
                    <?php echo ($t["Certification"]["name"] == "") ? '<em>Indisponível</em>' : ''; ?>
                    </td>
                    <td>
                        <?php $dateTime1 = DateTime::createFromformat("d/m/Y", $t["StaffCertification"]["expire"]); $dateTime2 = new DateTime("now"); ?>
                        <?php if($t["StaffCertification"]["expire"] == "30/11/-0001" || $t["StaffCertification"]["expire"] == "0000-00-00" || $t["StaffCertification"]["expire"] == "00/00/0000") { ?>
                        Não Expira
                        <?php } else { ?>
                        <span style="<?php if($dateTime1 < $dateTime2) : ?>color: red;<?php endif; ?>"><?php echo $t["StaffCertification"]["expire"]; ?></span>
                        <?php } ?>
                    </td>
                    <td>
                        <a target="_blank" href="<?php echo $this->Html->url( array('plugin' => 'exportacao', 'controller' => 'certificado', 'action' => 'view', $t['StaffCertification']['id']) ); ?>" class="btn btn-default">Fazer Download</a>
                        <a target="_blank" href="<?php echo $this->Html->url( array('plugin' => 'exportacao', 'controller' => 'certificado', 'action' => 'view2', $t['StaffCertification']['id']) ); ?>" class="btn btn-default">Visualizar</a>
                        <a href="<?php echo $this->Html->url( array('plugin' => 'cadastro', 'controller' => 'staffs', 'action' => 'delete_item', 'model' => 'StaffCertification', 'id' => $t['StaffCertification']['id'], 'staff' => $t['StaffCertification']['staff_id']) ); ?>" onclick="if(!confirm('Você tem certeza disto? Esta ação é permanente!')) { return false; }" class="btn btn-danger btn-xs" style="color: #FFF;">
                                            <i class="fa fa-trash"></i>
                                        </a>

                        <input type="checkbox" class="checkbox-arquivo-morto" data-toggle="true" <?php if($t['StaffCertification']['arq_morto'] == 1) : ?>checked="checked"<?php endif; ?> data-url="<?php echo $this->Html->url( array('plugin' => false, 'controller' => 'ajax', 'action' => 'certificado_arquivo_morto') ); ?>" data-id="<?php echo $t["StaffCertification"]["id"]; ?>" data-on="Arquivo Morto" data-off="Enviar para Arquivo Morto" data-width="150" />
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <hr>
        <em>Não há treinamentos disponíveis para este tripulante.</em>
        <hr>
    <?php endif; ?>
    <?php echo $this->Form->create("StaffCertification", array(
        "controller" => "staff_certifications",
        "action" => "add",
        "novalidate" => true
    ) ); ?>

    <?php echo $this->Form->input("staff_id", array("type" => "hidden", "value" => $this->request->data["Staff"]["id"]) ); ?>

    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <label for="name">Certificado:</label>
                <?php echo $this->Form->input("certification_id", array("options" => $certifications, "type" => "select", "empty" => "Selecionar Certificação", "label" => false, "div" => false, "class" => "form-control select-add-novo-certificado", 'data-url' => $this->Html->url( array('plugin' => 'treinamento', 'action' => 'ajax_find_supplier2', 'controller' => 'trainings') ) ) ); ?>
            </div>
        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="name">Data de Início:</label>
                <?php echo $this->Form->input("date_start", array("type" => "text", "label" => false, "div" => false, "class" => "form-control date datepicker") ); ?>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="name">Local:</label>
                <div id="campo-local"></div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="name">Data de Término:</label>
                <?php echo $this->Form->input("date_finish", array("type" => "text", "label" => false, "div" => false, "class" => "form-control date datepicker") ); ?>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="name">Carga Horária:</label>
                <?php echo $this->Form->input("pf", array("type" => "text", "label" => false, "div" => false, "class" => "form-control") ); ?>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="date_end">Data Expiração:</label>
                <?php echo $this->Form->input("expire", array("class" => "date form-control datepicker", "div" => false, "label" => false, "type" => "text") ); ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-default">Adicionar Certificação</button>
        </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div> <!-- #treinamento -->