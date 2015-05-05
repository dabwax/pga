<section id="warnings">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title"><?php echo $this->request->data["Staff"]["name"]; ?> <small> - edição</small></h3>
                    <hr>

                    <?php echo $this->element('/Staffs/edit_form'); ?>

                    <ul class="nav nav-tabs" role="tablist" style="margin-top: 20px;">
                        <li class="active"><a href="#hab" role="tab" data-toggle="tab">Habilitações</a></li>
                        <li><a href="#horas" role="tab" data-toggle="tab">Horas de Vôo</a></li>
                        <li class=""><a href="#treinamento" role="tab" data-toggle="tab">Certificações</a></li>
                        <li class=""><a href="#ferias" role="tab" data-toggle="tab">Férias</a></li>
                        <li class=""><a href="#cargo" role="tab" data-toggle="tab">Cargo</a></li>
                        <li class=""><a href="#designacoes" role="tab" data-toggle="tab">Designações</a></li>
                        <li class=""><a href="#escalas" role="tab" data-toggle="tab">Escalas</a></li>
                        <!--<li class=""><a href="#calendario" role="tab" data-toggle="tab">Calendário</a></li>-->
                        <li class=""><a href="#quinzenas" role="tab" data-toggle="tab">Quinzenas</a></li>
                        <li class=""><a href="#contratos" role="tab" data-toggle="tab">Vinculos Contratais</a></li>
                        <li class=""><a href="#aprovacoes" role="tab" data-toggle="tab">Aprovações</a></li>
                    </ul>

                    <div class="tab-content">
                        <?php echo $this->element('/Staffs/edit_tab_habilitacoes'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_horas'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_treinamento'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_ferias'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_cargo'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_designacoes'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_escalas'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_quinzenas'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_contratos'); ?>
                        <?php echo $this->element('/Staffs/edit_tab_aprovacoes'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>