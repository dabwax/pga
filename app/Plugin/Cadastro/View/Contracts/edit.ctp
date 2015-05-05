<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Editar Contrato</h3>
                    <hr>
                    <div class="row">
                        <?php echo $this->Form->create('Contract', array('class' => 'col-md-7') ); ?>
                            <?php echo $this->Form->input("id"); ?>
                            <div class="form-group">
                                <label for="nome">Aeronave:</label>
                                <?php echo $this->Form->input('Contract.aircraft_id', array('div' => false, 'label' => false, 'class' => 'form-control', 'options' => $aircrafts, 'type' => 'select', 'empty' => "Selecionar Aeronave") ); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="modelo">Nome:</label>
                                <?php echo $this->Form->input('name', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Nome do contrato') ); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="vencimento">Código:</label>
                                <?php echo $this->Form->input('code', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Código do contrato', 'type' => 'text') ); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="observacoes">PDF:</label>
                                <?php echo $this->Form->input('pdf', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'file') ); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="vencimento">Expiração:</label>
                                <?php echo $this->Form->input('expire', array('div' => false, 'label' => false, 'class' => 'date form-control', 'placeholder' => 'Expiração do contrato', 'type' => 'text') ); ?>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Editar</button>
                        <?php echo $this->Form->end(); ?>
                        <div class="col-md-5">
                            <h4>Informações úteis</h4>
                            <p>Espaço destinado a instruções e informativos relacionados a essa página. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id condimentum quam. Maecenas porta ex in ipsum bibendum, vel egestas lectus posuere. Duis imperdiet dictum metus malesuada tempus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    
                    <h3 class="page-title">Escalar Aeronaves</h3>
                    <hr>

                    <?php echo $this->Form->create("ContractGrade", array("url" => array("controller" => "contract_grades", "action" => "add") ) ); ?>

                    <?php echo $this->Form->input("contract_id", array("value" => $this->request->data["Contract"]["id"], "type" => "hidden") ); ?>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nome">Data Inicial:</label>
                                <?php echo $this->Form->input('date_start', array('div' => false, 'label' => false, 'class' => 'date form-control', 'type' => 'text') ); ?>
                            </div> <!-- .form-group -->

                            <div class="form-group">
                                <label for="nome">Base:</label>
                                <?php echo $this->Form->input('basis_id', array('div' => false, 'label' => false, 'class' => 'form-control', 'options' => $bases, 'type' => 'select', 'empty' => "Selecionar Base") ); ?>
                            </div> <!-- .form-group -->

                            <button type="submit" class="btn btn-primary">Salvar</button>

                        </div> <!-- .col-md-6 -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nome">Data Final:</label>
                                <?php echo $this->Form->input('date_finish', array('div' => false, 'label' => false, 'class' => 'date form-control', 'type' => 'text') ); ?>
                            </div> <!-- .form-group -->

                        </div> <!-- .col-md-6 -->
                    </div> <!-- .row -->

                    <?php echo $this->Form->end(); ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Base</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contract_grades as $g) : ?>
                            <tr>
                                <td><?php echo $g["ContractGrade"]["date_start"]; ?></td>
                                <td><?php echo $g["ContractGrade"]["date_finish"]; ?></td>
                                <td><?php echo $g["Basis"]["name"]; ?> - <?php echo $g["Basis"]["city"]; ?> - <?php echo $g["Basis"]["uf"]; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> <!-- .table -->

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    
                    <h3 class="page-title">Requisitos</h3>
                    <hr>

                    <?php echo $this->Form->create("ContractRequisition", array("url" => array("controller" => "contract_requisitions", "action" => "add") ) ); ?>

                    <?php echo $this->Form->input("contract_id", array("value" => $this->request->data["Contract"]["id"], "type" => "hidden") ); ?>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nome">Cargo:</label>
                                <?php echo $this->Form->input('role', array('div' => false, 'label' => false, 'class' => 'form-control', 'options' => $roles, 'type' => 'select', 'empty' => "Selecionar Cargo") ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Horas de Vôo como Comandante:</label>
                                <?php echo $this->Form->input('commander_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Horas de Vôo como Comandante', 'type' => 'number') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Horas de vôo com o tipo de motor:</label>
                                <?php echo $this->Form->input('motor_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'number', 'placeholder' => 'Horas de vôo com o tipo de motor') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Horas de vôo em IFR:</label>
                                <?php echo $this->Form->input('ifr_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'number', 'placeholder' => 'Horas de vôo em IFR') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Horas de vôo com modelo de mesmo porte:</label>
                                <?php echo $this->Form->input('size_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'number', 'placeholder' => 'Horas de vôo com modelo de mesmo porte') ); ?>
                            </div>

                            <button type="submit" class="btn btn-default">Adicionar Requisito</button>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="modelo">Horas de Vôo Total:</label>
                                <?php echo $this->Form->input('flight_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'number', 'placeholder' => 'Horas de Vôo Total') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Tipo de motor:</label>
                                <?php echo $this->Form->input('motor_type', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => array("MONO" => "Mono", "MULTI" => "Multi"), "empty" => "Selecionar tipo de motor" ) ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Horas de vôo com modelo similar:</label>
                                <?php echo $this->Form->input('similar_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'number', 'placeholder' => 'Horas de vôo com modelo similar') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="modelo">Horas de vôo com modelo exato:</label>
                                <?php echo $this->Form->input('model_time', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'number', 'placeholder' => 'Horas de vôo com modelo exato') ); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo $this->Form->end(); ?>
                </div> <!-- .box-default -->
            </div>
        </div> <!-- .row -->

        <?php foreach($requisitions as $r) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title"><?php echo ($r["ContractRequisition"]["role"] == 1) ? "Comandante" : "Co-piloto"; ?></h3>
                    <hr>
                    <div class="listing table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>TOTAL</th>
                                    <th>1P </th>
                                    <th>1P MOTOR</th>
                                    <th>SIMILAR</th>
                                    <th>IFR</th>
                                    <th>1P Modelo</th>
                                    <th>PORTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["flight_time"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["commander_time"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["motor_time"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["similar_time"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["ifr_time"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["model_time"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $r["ContractRequisition"]["size_time"]; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4>Treinamentos Necessários</h4>
                    <hr>
                    <div class="listing table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de Treinamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($r["ContractRequisitionTraining"] as $t) : ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <?php echo $t["Certification"]["name"]; ?>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <h4>Adicionar Treinamento</h4>
                    <hr>
                    <div class="row">
                        <?php echo $this->Form->create('ContractRequisitionTraining', array('class' => 'col-md-6', 'url' => array("controller" => "contract_requisition_trainings", "action" => "add") ) ); ?>

                            <?php echo $this->Form->input("contract_requisition_id", array("value" => $r["ContractRequisition"]["id"], "type" => "hidden") ); ?>

                            <div class="form-group">
                                <label for="nome">Treinamento:</label>
                                <?php echo $this->Form->input('ContractRequisitionTraining.certification_id', array('div' => false, 'label' => false, 'class' => 'form-control', 'options' => $certifications, 'type' => 'select', 'empty' => "Selecionar Treinamento") ); ?>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Adicionar Treinamento</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</section>