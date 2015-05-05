<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-default">
                    <h3 class="page-title">Importação</h3>
                    <hr>

                    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#hora" aria-controls="hora" role="tab" data-toggle="tab">Horas</a></li>
    <li role="presentation"><a href="#tripulante" aria-controls="tripulante" role="tab" data-toggle="tab">Tripulantes</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="margin-top: 20px;">
    <div role="tabpanel" class="tab-pane active" id="hora">

        <?php echo $this->Form->create("FileUpload", array('enctype' => 'multipart/form-data') ); ?>
        <?php echo $this->Form->input("type", array("type" => "hidden", "value" => "hora") ); ?>
        <?php echo $this->Form->input("attachment", array("type" => "file", "div" => "form-group col-md-6", "class" => "", "label" => "Arquivo") ); ?>
        <div class="form-group col-md-6" style="margin-top: 10px;">
            <button type="submit" class="btn btn-block btn-success"><i class="fa fa-upload"></i> Enviar Arquivo</button>
        </div>
        <?php echo $this->Form->end(); ?>

        <table class="table table-datatable">
            <thead>
                <tr>
                    <th>Arquivo</th>
                    <th>Autor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($file_uploads as $u) : if($u['FileUpload']['type'] == 'hora') : ?>
                <tr>
                    <td>
                        <a href="<?php echo $this->Html->url(array("action" => "download", $u['FileUpload']['id'])); ?>" class="btn btn-xs btn-default" target="_blank">
                            <?php echo $u['FileUpload']['attachment']; ?>
                        </a>
                    </td>
                    <td><?php echo $u['User']['email']; ?></td>
                    <td><?php echo (new DateTime($u['FileUpload']['created']))->format("d/m/Y H:i:s"); ?></td>
                </tr>
            <?php endif; endforeach; ?>
            </tbody>
        </table>

        <div class="clearfix"></div>
        
    </div>
    <div role="tabpanel" class="tab-pane" id="tripulante">
        

        <?php echo $this->Form->create("FileUpload", array('enctype' => 'multipart/form-data') ); ?>
        <?php echo $this->Form->input("type", array("type" => "hidden", "value" => "tripulante") ); ?>
        <?php echo $this->Form->input("attachment", array("type" => "file", "div" => "form-group col-md-6", "class" => "", "label" => "Arquivo") ); ?>
        <div class="form-group col-md-6" style="margin-top: 10px;">
            <button type="submit" class="btn btn-block btn-success"><i class="fa fa-upload"></i> Enviar Arquivo</button>
        </div>
        <?php echo $this->Form->end(); ?>

        <table class="table table-datatable">
            <thead>
                <tr>
                    <th>Arquivo</th>
                    <th>Autor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($file_uploads as $u) : if($u['FileUpload']['type'] == 'tripulante') : ?>
                <tr>
                    <td>
                        <a href="<?php echo $this->Html->url(array("action" => "download", $u['FileUpload']['id'])); ?>" class="btn btn-xs btn-default" target="_blank">
                            <?php echo $u['FileUpload']['attachment']; ?>
                        </a>
                    </td>
                    <td><?php echo $u['User']['email']; ?></td>
                    <td><?php echo (new DateTime($u['FileUpload']['created']))->format("d/m/Y H:i:s"); ?></td>
                </tr>
            <?php endif; endforeach; ?>
            </tbody>
        </table>

    </div>
  </div>


                </div>
            </div>
        </div>
    </div>
</section>