<div role="tabpanel" class="tab-pane active" id="perfil">

    <?php
        echo $this->Form->input('Student.id');
    ?>

    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.name', array('class' => 'form-control', 'label' => 'Nome') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.date_of_birth', array('type' => 'text', 'class' => 'form-control calendario', 'label' => 'Data de Aniversário') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.school', array('class' => 'form-control', 'label' => 'Escola') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.clinical_condition', array('class' => 'form-control', 'label' => 'Condição Clínica') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.email', array('class' => 'form-control') ); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo $this->Form->input('Student.password', array('class' => 'form-control', 'label' => 'Senha', 'value' => '') ); ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?php echo $this->Form->input('Student.description', array('class' => 'form-control ckeditor', 'label' => 'Descrição') ); ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?php echo $this->Form->input('Student.school_grade', array('label' => 'Série Escolar', 'class' => 'form-control') ); ?>
        </div>
    </div>

    </div>

    <fieldset>

        <div class="col-md-6">
            <legend>Terapeuta <a href="<?php echo $this->Html->url( array('action' => 'send_welcome_email', $this->request->data['Student']['id'], 'psiquiatra') ); ?>" class="btn btn-primary">Disparar E-mail de Boas Vindas</a></legend>
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
            <legend>Escola <span class="label label-default">Mediador</span> <a href="<?php echo $this->Html->url( array('action' => 'send_welcome_email', $this->request->data['Student']['id'], 'mediador') ); ?>" class="btn btn-primary">Disparar E-mail de Boas Vindas</a></legend>
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
            <legend>Escola <span class="label label-default">Coordenador</span> <a href="<?php echo $this->Html->url( array('action' => 'send_welcome_email', $this->request->data['Student']['id'], 'coordenador') ); ?>" class="btn btn-primary">Disparar E-mail de Boas Vindas</a></legend>
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
            <legend>Responsável <span class="label label-default">Pai</span> <a href="<?php echo $this->Html->url( array('action' => 'send_welcome_email', $this->request->data['Student']['id'], 'pai') ); ?>" class="btn btn-primary">Disparar E-mail de Boas Vindas</a></legend>
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
            <legend>Responsável <span class="label label-default">Mãe</span>  <a href="<?php echo $this->Html->url( array('action' => 'send_welcome_email', $this->request->data['Student']['id'], 'mae') ); ?>" class="btn btn-primary">Disparar E-mail de Boas Vindas</a></legend>

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
            <legend>Tutor <a href="<?php echo $this->Html->url( array('action' => 'send_welcome_email', $this->request->data['Student']['id'], 'tutor') ); ?>" class="btn btn-primary">Disparar E-mail de Boas Vindas</a></legend>

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
            <button type="submit" class="btn btn-success btn-block">Editar Aluno</button>
        </div>
    </fieldset>

    <?php echo $this->Form->end(); ?>

  </div> <!-- #perfil -->