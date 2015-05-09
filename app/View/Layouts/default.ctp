<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?> - PGA
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oxygen:400,300,700' rel='stylesheet' type='text/css'>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css');
		echo $this->Html->css('https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css');
		echo $this->Html->css('/files/select2-3.5.2/select2.css');
		echo $this->Html->css('/files/zozo-tabs/css/zozo.tabs.min.css');
		echo $this->Html->css('/files/zozo-tabs/css/zozo.tabs.flat.min.css');
		echo $this->Html->css('/files/timeline/css/timeline.css');
		echo $this->Html->css('/files/fancybox/jquery.fancybox.css');
		echo $this->Html->css('http://imperavi.com/js/redactor/redactor.css');
		echo $this->Html->css('app.css');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/i18n/jquery-ui-i18n.min.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.timeago.js');
		echo $this->Html->script('/files/select2-3.5.2/select2.min.js');
		echo $this->Html->script('/files/select2-3.5.2/select2_locale_pt-BR.js');
		echo $this->Html->script('/files/zozo-tabs/js/zozo.tabs.js');
		echo $this->Html->script('/files/timeline/javascript/timeline.js');
		echo $this->Html->script('http://imperavi.com/js/redactor/redactor.js');
		echo $this->Html->script('/files/canvasjs/jquery.canvasjs.min.js');
		echo $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js");
		echo $this->Html->script('/files/fancybox/jquery.fancybox.pack.js');
		echo $this->Html->script('/files/jquery.highlight-5.js');
		echo $this->Html->script('/files/jquery.fittext.js');
		echo $this->Html->script('app.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<header class="blurred no-padding-bottom no-padding-top" style="display: block;">

		<nav class="navbar navbar-inverse no-margin-bottom" role="navigation">
			<div class="container">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					 	<span class="sr-only">Toggle navigation</span>
					 	<span class="icon-bar"></span>
					 	<span class="icon-bar"></span>
					 	<span class="icon-bar"></span>
				 	</button>

					 <a class="navbar-brand" href="<?php echo $this->Html->url("/"); ?>">
					 	<?php echo $this->Html->image("pga.png", array("class" => "pga", "alt" => "PGA") ); ?>
					 </a>

				</div> <!-- .navbar-header -->

				<div class="collapse navbar-collapse navbar-ex1-collapse">

					<?php if(AuthComponent::user() && $this->params['action'] != "set_student") : ?>
					<p class="p-ator col-md-7" style="color: #FFF; margin-top: 12px; margin-left: 12px;">Olá, <?php echo $ator_atualizado[$ator_atualizado['prefix'] . 'name']; ?></p>

					<?php endif; ?>

					<ul class="nav navbar-nav navbar-right">
						<?php if(AuthComponent::user() && $this->params['action'] != "set_student") : ?>
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "users", "action" => "set_student") ); ?>"><i class="fa fa-users"></i> Alunos</a>
						</li>
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "users", "action" => "edit") ); ?>"><i class="fa fa-pencil"></i> Perfil</a>
						</li>
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "users", "action" => "logout") ); ?>"><i class="fa fa-power-off"></i> Sair</a>
						</li>
						<?php endif; ?>
					</ul>

				</div> <!-- .navbar-ex1-collapse -->

			</div>
		</nav>

	</header>

	<div class="container">

		<?php if(AuthComponent::user() && $this->params['action'] != "set_student") : ?>

		<div class="row" style="margin-top: 20px;">

			<div class="col-xs-6 col-md-2 col-avatar text-center">
				<?php if(!empty(AuthComponent::user('Student.Student.avatar'))) : ?>
				<div class="img-avatar img-circle" style="width: 130px; height: 130px;">
					<img src="<?php echo $this->Html->url('/uploads/' . $ator_atualizado[$ator_atualizado['prefix'] . 'avatar']); ?>" class="img-circle" alt="">
				</div>
			<?php else : ?>
				<div class="img-avatar img-circle" style="width: 130px; height: 130px;">
					<img src="<?php echo $this->Html->url('/uploads/indisponivel.jpg'); ?>" class="img-circle" alt="">
				</div>
			<?php endif; ?>
			</div> <!-- .col-avatar -->

			<div class="col-xs-6 col-md-6 col-student">
				<h2 class="text-left"><?php echo $this->Html->getStudentInfo("name"); ?></h2>
				<p class="since pull-left"><i class="fa fa-clock-o"></i> Desde <?php echo date_format(date_create($this->Html->getStudentInfo("created")), "d/m/Y"); ?></p>
			</div> <!-- .col-student -->

			<div class="col-md-4 col-actors">

				<ul>
					<li title="<?php echo $this->Html->getParentsName(); ?>">
						<strong ><i class="fa fa-users"></i> <span class="hidden-xs hidden-sm">Pais</span></strong>
						<?php
						echo $this->Text->truncate($this->Html->getParentsName(),
						    30,
						    array(
						        'ellipsis' => '...',
						        'exact' => true
						    )
						);

						?>
					</li>

					<li title="<?php echo $this->Html->getPsychiatristName(); ?>">
						<strong><i class="fa fa-user-md"></i> Psico</strong>
						<?php
						echo $this->Text->truncate($this->Html->getPsychiatristName(),
						    30,
						    array(
						        'ellipsis' => '...',
						        'exact' => true
						    )
						);

						?>
					</li>
					<li title="<?php echo $this->Html->getSchoolName(); ?>">
						<strong><i class="fa fa-hospital-o"></i> Escola</strong>
						<?php
						echo $this->Text->truncate($this->Html->getSchoolName(),
						    30,
						    array(
						        'ellipsis' => '...',
						        'exact' => true
						    )
						);

						?>
					</li>
					<li title="<?php echo $this->Html->getTutorName(); ?>">
						<strong><i class="fa fa-user"></i> Tutor</strong>
						<?php
						echo $this->Text->truncate($this->Html->getTutorName(),
						    30,
						    array(
						        'ellipsis' => '...',
						        'exact' => true
						    )
						);

						?>
					</li>
				</ul>

			</div> <!-- .actors -->
		</div> <!-- .row -->


		<?php echo $this->Session->flash(); ?>

		<?php if ($this->here == $this->webroot) { ?>
		<div id='tabbed-nav'>
		  <ul>
	        <?php if(AuthComponent::user("Actor.prefix") != "dad_" && AuthComponent::user("Actor.prefix") != "mom_") : ?>
		        <li data-link="input"><a id="btn-input"><i class="fa fa-pencil"></i> Input</a></li>
		        <li data-link="feed"><a id="btn-feed"><i class="fa fa-bars"></i> Feed</a></li>
	    <?php endif; ?>
	        <li data-link="evolucao"><a id="btn-evolucao"><i class="fa fa-line-chart"></i> Evolução</a></li>
	        <li data-link="mensagem"><a><i class="fa fa-comments"></i> Fluxo</a></li>
	        <?php if(AuthComponent::user("Actor.prefix") == "tutor_") : ?>
	        <li data-link="exercicios"><a><i class="fa fa-comments"></i> Exercícios</a></li>
	    <?php endif; ?>
		  </ul>
		  <div>

	        <?php if(AuthComponent::user("Actor.prefix") != "dad_" && AuthComponent::user("Actor.prefix") != "mom_") : ?>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "input", "action" => "create") ); ?>">
		  	</div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "feed", "action" => "index") ); ?>">
		  	</div>
	    <?php endif; ?>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "evolution", "action" => "index") ); ?>">
		  	</div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "flow", "action" => "index") ); ?>">
		  	</div>
		        	<?php if(AuthComponent::user("Actor.prefix") == "tutor_") : ?>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "exercises", "action" => "index") ); ?>">
		  	</div>
		    	<?php endif; ?>
		  </div>
		</div>
		<?php } ?>
		<?php endif; ?>

		<?php echo $this->fetch('content'); ?>
	</div> <!-- .container -->


	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>PGA <?php echo date("Y"); ?> - TODOS OS DIREITOS RESERVADOS.</p>
				</div>
			</div>
		</div>
	</footer> <!-- footer -->

</body>
</html>
