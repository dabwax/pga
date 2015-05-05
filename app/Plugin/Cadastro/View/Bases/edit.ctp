<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Editar Base</h3>
                    <hr>

                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#formulario" data-toggle="tab">Formulário</a></li>
                    <li role="presentation"><a href="#consulta" data-toggle="tab">Aeronaves Alocadas</a></li>
                    <li role="presentation"><a href="#consulta2" data-toggle="tab">Representantes/Chefes de Base Alocados</a></li>
                  </ul> <!-- .nav-tabs -->

                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="formulario">
                        

                        <?php echo $this->Form->create('Basis'); ?>
                        <?php echo $this->Form->input('id'); ?>

                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <?php echo $this->Form->input('name', array('div' => false, 'label' => false, 'placeholder' => 'Nome da base', 'class' => 'form-control') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="nome">Abreviação:</label>
                                <?php echo $this->Form->input('abbreviation', array('div' => false, 'label' => false, 'placeholder' => 'Abreviação da base', 'class' => 'form-control') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade:</label>
                                <?php echo $this->Form->input('city', array('div' => false, 'label' => false, 'placeholder' => 'Cidade da base', 'class' => 'form-control') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="uf">UF:</label>
                                <?php echo $this->Form->input('uf', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => $estados, 'empty' => 'Selecione o UF' ) ); ?>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <?php echo $this->Form->input('phone', array('div' => false, 'label' => false, 'phone placeholder' => 'Telefone da base', 'class' => 'form-control') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="responsavel">Responsável:</label>
                                <?php echo $this->Form->input('Basis.staff_id', array('class' => 'form-control', 'label' => false, 'div' => false, 'empty' => 'Selecionar responsável') ); ?>
                            </div>

                            <div class="form-group">
                                <label for="responsavel">DIÁRIA adicional de viagem:</label><br>
                                <?php echo $this->Form->input('Basis.daily', array('type' => 'checkbox', 'data-toggle' => true,  'data-off' => 'Não',  'data-on' => 'Sim', 'class' => 'form-control', 'label' => false, 'div' => false) ); ?>
                            </div>

                            <div class="form-group">
                                <label for="responsavel">DESLOCAMENTO para a base:</label><br>
                                <?php echo $this->Form->input('Basis.deslocation', array('type' => 'checkbox', 'data-toggle' => true,  'data-off' => 'Não',  'data-on' => 'Sim', 'class' => 'form-control', 'label' => false, 'div' => false) ); ?>
                            </div>

                            <div class="form-group">
                                <label for="responsavel">TRANSPORTE para a base:</label><br>
                                <?php echo $this->Form->input('Basis.transportation', array('type' => 'checkbox', 'data-toggle' => true,  'data-off' => 'Não',  'data-on' => 'Sim', 'class' => 'form-control', 'label' => false, 'div' => false) ); ?>
                            </div>

                            <div class="form-group">
                                <label for="observacoes">Observações:</label>
                                <?php echo $this->Form->input('observations', array('div' => false, 'label' => false, 'placeholder' => 'Observações', 'class' => 'form-control', 'rows' => 3, 'type' => 'textarea') ); ?>
                            </div>

                            <button type="submit" class="btn btn-default">Editar</button>
                        <?php echo $this->Form->end(); ?>

                    </div> <!-- #formulario -->
                    <div role="tabpanel" class="tab-pane" id="consulta">
                        
                        <table class="table table-datatable">
                            <thead>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Escala (Mês)</th>
                                    <th>Frota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($sga as $tmp) : if(!empty($tmp['ScheduleGrade']['Schedule']['name'])) : ?>
                                <tr>
                                    <td><?php echo $tmp['Aircraft']['registration'];   ?></td>
                                    <td><?php echo (!empty($tmp['ScheduleGrade']['Schedule']['name'])) ? $tmp['ScheduleGrade']['Schedule']['name'] : 'Indisponível';   ?></td>
                                    <td><?php echo $tmp['Aircraft']['AircraftModel']['model'];   ?></td>
                                </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- #consulta -->
                    <div role="tabpanel" class="tab-pane" id="consulta2">
                        
                        <table class="table table-datatable">
                            <thead>
                                <tr>
                                    <th>Tripulante</th>
                                    <th>Designação</th>
                                    <th>Escala (Mês)</th>
                                    <th>Início</th>
                                    <th>Fim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($sgb as $tmp) : if(!empty($tmp['ScheduleGrade']['Schedule']['name'])) : ?>
                                <tr>
                                    <td><?php echo $tmp['Staff']['name'];   ?></td>
                                    <td><?php echo $tmp['Designation']['name'];   ?></td>
                                    <td><?php echo (!empty($tmp['ScheduleGrade']['Schedule']['name'])) ? $tmp['ScheduleGrade']['Schedule']['name'] : 'Indisponível';   ?></td>
                                    <td><?php echo $tmp['ScheduleGradeBase']['start']; ?></td>
                                    <td><?php echo $tmp['ScheduleGradeBase']['finish']; ?></td>
                                </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- #consulta2 -->
                  </div> <!-- .tab-content -->

                    </div>
            </div>
        </div>
    </div>
</section>