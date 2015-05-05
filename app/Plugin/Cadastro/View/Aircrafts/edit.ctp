<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Editar Aeronave</h3>
                    <hr>
                    <div class="row">

                        <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#formulario" aria-controls="formulario" role="tab" data-toggle="tab">Formulário</a></li>
                            <li role="presentation"><a href="#consulta" aria-controls="consulta" role="tab" data-toggle="tab">Bases Alocadas</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="formulario">
                                
                                <?php echo $this->Form->create('Aircraft', array('class' => 'col-md-12') ); ?>
                                <?php echo $this->Form->input('id'); ?>
                                    <div class="form-group">
                                        <label for="nome">Modelo:</label>
                                        <?php echo $this->Form->input('Aircraft.aircraft_model_id', array('label' => false, 'div' => false, 'class' => 'form-control', 'options' => $aircraft_models, 'empty' => 'Selecionar Modelo') ); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="registration">Matrícula:</label>
                                        <?php echo $this->Form->input('registration', array('label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => 'Matrícula da aeronave') ); ?>
                                    </div>


                                    <button type="submit" class="btn btn-default"><i class="fa fa-floppy-o"></i> Editar</button>
                                <?php echo $this->Form->end(); ?>

                            </div> <!-- #formulario -->
                            <div role="tabpanel" class="tab-pane" id="consulta">
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Escala (Mês)</th>
                                                <th>Base</th>
                                                <th>Início</th>
                                                <th>Fim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($sgb['AircraftModel']['Schedule'] as $s) : foreach($s['ScheduleGrade'] as $sg) : foreach($sg['ScheduleGradeAircraft'] as $sgb) : ?>
                                            <tr>
                                                <td><?php echo (!empty($s['name'])) ? $s['name'] : 'Indisponível';   ?></td>
                                                <td><?php echo $sgb['Basis']['name']; ?></td>
                                                <td><?php echo $s['date_start']; ?></td>
                                                <td><?php echo $s['date_finish']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                            </div> <!-- #consulta -->
                          </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>