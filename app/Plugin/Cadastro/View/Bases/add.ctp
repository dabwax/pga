<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Cadastrar Base</h3>
                    <hr>
                    <div class="row">
                        <?php echo $this->Form->create('Basis', array('class' => 'col-md-7') ); ?>
                        <form role="form" class="col-md-7">
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
                                <?php echo $this->Form->input('phone', array('div' => false, 'label' => false, 'placeholder' => 'Telefone da base', 'class' => 'form-control') ); ?>
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

                            <button type="submit" class="btn btn-default">Cadastrar</button>
                        <?php echo $this->Form->end(); ?>
                        <div class="col-md-5">
                            <h4>Informações úteis</h4>
                            <p>Espaço destinado a instruções e informativos relacionados a essa página. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id condimentum quam. Maecenas porta ex in ipsum bibendum, vel egestas lectus posuere. Duis imperdiet dictum metus malesuada tempus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>