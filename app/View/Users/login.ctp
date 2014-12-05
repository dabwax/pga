<div class="panel panel-default panel-login">

	<div class="panel-heading text-center text-danger">
		<a href="<?php echo $this->Html->url("/"); ?>">
		 	<?php echo $this->Html->image("pga.png", array("class" => "pga", "alt" => "PGA") ); ?>
		 </a>
		 <div class="clearfix"></div>
	</div>

	<div class="panel-body">

		<?php echo $this->Form->create('User'); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<?php
			        		echo $this->Form->input('username', array("label" => false, "div" => false, "placeholder" => "E-mail", "class" => "form-control input-lg", "data-url" => $this->Html->url( array("action" => "ajax_check_username") ) ) );
			        	?>
					</div>

					<div class="form-group form-password hide">
						<?php
			        		echo $this->Form->input('password', array("label" => false, "div" => false, "placeholder" => "Senha", "class" => "form-control input-lg") );
			        	?>
					</div>
				</div>

				<!--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<label>
						<input type="checkbox" value="remember-me"> Lembrar
					</label>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
					<p class="blocks_forgotPwd">
						<a href="#" class="label label-default">Esqueceu sua senha?</a>
					</p>
				</div>-->

				<div class="clearfix"></div>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="alerta">
					
				</div>

				<div class="clearfix"></div>

				<input type="submit" value="Entrar" class="btn btn-success btn-lg btn-block" id="btn-entrar" disabled="disabled" />

			</div>
			
		<?php echo $this->Form->end(); ?>

	</div>

</div>