<div class="row">
    <div class="col-md-12">

          <div class="panel panel-default">
              <div class="panel-heading">

                <div class="col-md-3">
                  <h3 class="panel-title">Estudantes <small>Adicionar</small></h3>
                </div>

                <div class="col-md-2 pull-right">
                  <a href="<?php echo $this->Html->url( array('action' => 'index') ); ?>" class="btn btn-primary pull-right">
                    Voltar
                  </a>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="panel-body">

<div class="students form">
<?php echo $this->Form->create('Student'); ?>

    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.name', array('class' => 'form-control') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.date_of_birth', array('type' => 'text', 'class' => 'form-control calendario') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.school', array('class' => 'form-control') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.clinical_condition', array('class' => 'form-control') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.email', array('class' => 'form-control') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.password', array('class' => 'form-control', 'label' => 'Senha') ); ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?php echo $this->Form->input('Student.description', array('class' => 'form-control ckeditor') ); ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?php echo $this->Form->input('Student.school_grade', array('label' => 'Série Escolar', 'class' => 'form-control ckeditor') ); ?>
        </div>
    </div>
    </div>

    <fieldset>

        <div class="col-md-6">
            <legend>Terapeuta</legend>
            <?php echo $this->Form->input("StudentPsychiatrist.id"); ?>
            <div class="form-group">
             <?php echo $this->Form->input('StudentPsychiatrist.name', array('class' => 'form-control') ); ?>
            </div>
            <div class="form-group">
            <?php echo $this->Form->input('StudentPsychiatrist.phone', array('class' => 'form-control', 'label' => 'Telefone') ); ?>
            </div>
            <div class="form-group">
            <?php echo $this->Form->input('StudentPsychiatrist.email', array('class' => 'form-control', 'label' => 'E-mail') ); ?>
            </div>
        </div>

        <div class="col-md-6">
            <legend>Escola <span class="label label-default">Mediador</span></legend>
            <?php echo $this->Form->input("StudentSchool.id"); ?>
            <div class="form-group">
            <?php echo $this->Form->input('StudentSchool.mediator_name', array('class' => 'form-control', 'label' => 'Nome') ); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('StudentSchool.mediator_phone', array('class' => 'form-control', 'label' => 'Telefone') ); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('StudentSchool.mediator_email', array('class' => 'form-control', 'label' => 'E-mail') ); ?>
            </div>
        </div>

        <div class="col-md-6">
            <legend>Escola <span class="label label-default">Coordenador</span></legend>
            <?php echo $this->Form->input("StudentSchool.id"); ?>

            <div class="form-group">
                <?php echo $this->Form->input('StudentSchool.coordinator_name', array('class' => 'form-control', 'label' => 'Nome') ); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('StudentSchool.coordinator_phone', array('class' => 'form-control', 'label' => 'Telefone') ); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('StudentSchool.coordinator_email', array('class' => 'form-control', 'label' => 'E-mail') ); ?>
            </div>
        </div>

        <div class="col-md-6">
            <legend>Responsável <span class="label label-default">Pai</span></legend>
            <?php echo $this->Form->input("StudentParent.id"); ?>

            <?php
                echo $this->Form->input('StudentParent.id');
            ?>

            <div class="form-group">
                <?php echo $this->Form->input('StudentParent.dad_name', array('class' => 'form-control', 'label' => 'Nome') ); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('StudentParent.dad_phone', array('class' => 'form-control', 'label' => 'Telefone') ); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('StudentParent.dad_email', array('class' => 'form-control', 'label' => 'E-mail') ); ?>
            </div>
        </div>

        <div class="col-md-6">
            <legend>Responsável <span class="label label-default">Mãe</span></legend>

            <div class="form-group">
                <?php echo $this->Form->input('StudentParent.mom_name', array('class' => 'form-control', 'label' => 'Nome') ); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('StudentParent.mom_phone', array('class' => 'form-control', 'label' => 'Telefone') ); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('StudentParent.mom_email', array('class' => 'form-control', 'label' => 'E-mail') ); ?>
            </div>
        </div>


        <div class="col-md-6">
            <legend>Tutor</legend>

            <div class="form-group">
            <?php echo $this->Form->input('StudentParent.tutor_name', array('class' => 'form-control', 'label' => 'Nome') ); ?>
            </div>

            <div class="form-group">
            <?php echo $this->Form->input('StudentParent.tutor_phone', array('class' => 'form-control', 'label' => 'Telefone') ); ?>
            </div>

            <div class="form-group">
            <?php echo $this->Form->input('StudentParent.tutor_email', array('class' => 'form-control', 'label' => 'E-mail') ); ?>
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block">Adicionar Aluno</button>
        </div>
    </fieldset>

    <?php echo $this->Form->end(); ?>
</div>


              </div>
          </div>
  </div>
</div>