<div class="row">
    <div class="col-md-12">

          <div class="panel panel-default">
              <div class="panel-heading">

                <div class="col-md-3">
                  <h3 class="panel-title">Estudantes <small>Editar</small></h3>
                </div>

                <div class="col-md-7">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist" style="width: 500px;">
                    <li role="presentation" class="active"><a href="#perfil" role="tab" data-toggle="tab">Perfil</a></li>
                    <li role="presentation"><a href="#conteudo" id="btn-conteudo" role="tab" data-toggle="tab">Inputs</a></li>
                    <li role="presentation"><a href="#outputs" id="btn-outputs" role="tab" data-toggle="tab">Outputs</a></li>
                    <!-- <li role="presentation"><a href="#relatorios" role="tab" data-toggle="tab">Relatórios</a></li> -->
                    <!-- <li role="presentation"><a href="#alertas" role="tab" data-toggle="tab">Alertas</a></li> -->
                    <li role="presentation"><a href="#materias" role="tab" data-toggle="tab">Matérias</a></li>
                    <li role="presentation"><a href="#exercicios" role="tab" data-toggle="tab">Exercícios</a></li>
                    <li role="presentation"><a href="#inputs" role="tab" data-toggle="tab">Exportação</a></li>
                  </ul>

                </div>

                <div class="col-md-2">
                  <a href="<?php echo $this->Html->url( array('action' => 'index') ); ?>" class="btn btn-primary pull-right">
                    Voltar
                  </a>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="panel-body">

                  <div class="students form">
                  <?php echo $this->Form->create('Student'); ?>

                  <!-- Tab panes -->
                  <div class="tab-content">

                    <?php echo $this->element("Students/_tab_perfil"); ?>

                    <?php echo $this->element("Students/_tab_conteudo"); ?>

                    <?php echo $this->element("Students/_tab_inputs"); ?>

                    <?php echo $this->element("Students/_tab_outputs"); ?>

                    <?php echo $this->element("Students/_tab_materias"); ?>

                    <?php echo $this->element("Students/_tab_exercicios"); ?>

                  </div>


                  </div>

              </div>
          </div>
  </div>
</div>