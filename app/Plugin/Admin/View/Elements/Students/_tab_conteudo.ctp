<div role="tabpanel" class="tab-pane" id="conteudo">

	<!-- Nav tabs -->
	<ul class="nav nav-tabs nav-conteudo-atores" role="tablist">
		<?php foreach($atores as $a) : ?>
	  	<li><a href="#<?php echo strtolower($a); ?>" id="btn-<?php echo strtolower($a); ?>" role="tab" data-toggle="tab"><?php echo $a; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<?php foreach($atores as $a) : ?>
		<div role="tabpanel" class="tab-pane" id="<?php echo strtolower($a); ?>">

            <div class="col-md-4">
            <table class="table">
                <thead>
                  <tr>
                    <th>
                      Opções de Input
                    </th>
                    <th>

                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($inputs as $i) : ?>
                  <tr>
                    <td>
                      <?php echo $i["Input"]["name"]; ?>
                    </td>
                    <td>
                      <a href="<?php echo $this->Html->url( array("controller" => "students", "action" => "add_input", $i["Input"]["id"], $this->request->data["Student"]["id"], strtolower($a) ) ); ?>" class="btn btn-default btn-incluir-input fancybox">
                        <i class="fa fa-plus-square"></i> Incluir
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              </div>

              <div class="col-md-8" style="margin-top: 30px;">

			<?php foreach($student_inputs as $si) : ?>

				<ul class="list-group">
				<?php if($si["StudentInput"]["actor"] == strtolower($a)) : ?>
					<li class="list-group-item">

                                      <span class="icone-ajax" style="display: none;">
                                        <i class="fa fa-spin fa-spinner"></i>
                                      </span>

                                      <span class="icone-sucesso" style="display: none;">
                                        <i class="fa fa-check"></i>
                                      </span>

						<strong>
                                                <input type="text" value="<?php echo $si["StudentInput"]["order"]; ?>" data-id="<?php echo $si["StudentInput"]["id"]; ?>" data-url="<?php echo $this->Html->url( array('controller' => 'students', 'action' => 'ajax_edit_student_input') ); ?>" data-field="order" data-reload="true" class="campo-studentinput" style="width: 60px;" />
                                                <input type="text" value="<?php echo $si["StudentInput"]["name"]; ?>" data-id="<?php echo $si["StudentInput"]["id"]; ?>" data-url="<?php echo $this->Html->url( array('controller' => 'students', 'action' => 'ajax_edit_student_input') ); ?>" data-field="name" class="campo-studentinput" />
                                                <small style="color: #999;"><?php echo $si["Input"]["name"]; ?></small>
                                              </strong>

            <?php if($si["Input"]["id"] == $this->Html->getInputId("Escala Numérica") ) : ?>
                <span class="label label-default" style="margin-right: 4px;">
                  De <?php echo $si["StudentInput"]["config"]["range_start"]; ?>
                  a <?php echo $si["StudentInput"]["config"]["range_end"]; ?>
                </span>
            <?php endif; ?>

            <?php if(!empty($si["StudentInput"]["config"]) && $si["Input"]["id"] == $this->Html->getInputId("Escala Texto") ) : ?>
                <?php foreach($si["StudentInput"]["config"] as $c) : ?>
                <span class="label label-default" style="margin-right: 4px;">
                  <?php echo $c["name"]; ?>
                </span>
                <?php endforeach; ?>
            <?php endif; ?>

						<a href="<?php echo $this->Html->url( array("controller" => "students", "action" => "delete_student_input", $si["StudentInput"]["id"], $this->request->data["Student"]["id"]) ); ?>" class="btn btn-danger btn-xs pull-right"  onclick="if(!confirm('Você tem certeza disto? Esta ação é PERMANENTE!')) { return false; }">
							<i class="fa fa-trash"></i>
						</a>

						<div class="clearfix"></div>
					</li>
				<?php endif; ?>
				</ul>

			<?php endforeach; ?>
		</div>
          </div>
		<?php endforeach; ?>

	</div>

</div>