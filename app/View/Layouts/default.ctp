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

		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css');
		echo $this->Html->css('/files/select2-3.5.2/select2.css');
		echo $this->Html->css('/files/zozo-tabs/css/zozo.tabs.min.css');
		echo $this->Html->css('/files/zozo-tabs/css/zozo.tabs.flat.min.css');
		echo $this->Html->css('/files/timeline/css/timeline.css');
		echo $this->Html->css('app.css');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.timeago.js');
		echo $this->Html->script('/files/select2-3.5.2/select2.min.js');
		echo $this->Html->script('/files/select2-3.5.2/select2_locale_pt-BR.js');
		echo $this->Html->script('/files/zozo-tabs/js/zozo.tabs.js');
		echo $this->Html->script('/files/timeline/javascript/scriptgates.js');
		echo $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/ckeditor.js');
		echo $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/adapters/jquery.js');
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

					<?php if(AuthComponent::user()) : ?>
					<ul class="nav navbar-nav">
						<li>
							<p class="p-ator" style="color: #FFF; margin-top: 12px; margin-left: 12px;">Olá, <?php echo $this->Html->getActorInfo("name"); ?></p>
						</li>
					</ul>
					<?php endif; ?>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "pages", "action" => "display", "sobre") ); ?>"><i class="fa fa-question-circle"></i> O que é o PGA?</a>
						</li>
						<?php if(AuthComponent::user()) : ?>
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

		<?php if(AuthComponent::user()) : ?>

		<div class="row" style="margin-top: 20px;">

			<div class="col-xs-2 col-avatar">
				<img src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpf1/v/t1.0-9/1959245_10204384379905989_197016952929631028_n.jpg?oh=98407c834c988c78824d0e57c3bc5801&oe=54DB36A1&__gda__=1423755979_66d9a1a136c1491c8409e61037813ca5" class="img-circle" alt="">
			</div> <!-- .col-avatar -->

			<div class="col-xs-6 col-student">
				<h2 class="text-right"><?php echo $this->Html->getStudentInfo("name"); ?></h2>
				<p class="since"><i class="fa fa-clock-o"></i> Desde <?php echo date_format(date_create($this->Html->getStudentInfo("created")), "d/m/Y"); ?></p>
			</div> <!-- .col-student -->

			<div class="col-xs-4 col-actors">

				<ul>
					<li>
						<strong><i class="fa fa-users"></i> Pais</strong>
						<?php echo $this->Html->getParentsName(); ?>
					</li>

					<li>
						<strong><i class="fa fa-user-md"></i> Psico</strong>
						<?php echo $this->Html->getPsychiatristName(); ?>
					</li>
					<li>
						<strong><i class="fa fa-hospital-o"></i> Escola</strong>
						<?php echo $this->Html->getSchoolName(); ?>
					</li>
					<li>
						<strong><i class="fa fa-user"></i> Tutor</strong>
						<?php echo $this->Html->getTutorName(); ?>
					</li>
				</ul>

			</div> <!-- .actors -->
		</div> <!-- .row -->



		<div id='tabbed-nav' data-role='z-tabs' data-options='{"orientation":"vertical","theme": "flat-peter-river", "animation": {"duration": 500, "effects": "slideV"}}'>
		  <ul>
	        <li><a><i class="fa fa-home"></i> Home</a></li>
	        <li><a><i class="fa fa-pencil"></i> Input</a></li>
	        <li><a><i class="fa fa-bars"></i> Feed</a></li>
	        <li><a><i class="fa fa-line-chart"></i> Evolução</a></li>
	        <li><a><i class="fa fa-comments"></i> Fluxo</a></li>
		  </ul>
		  <div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "pages", "action" => "home") ); ?>">
		  	</div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "input", "action" => "create") ); ?>">
		  	</div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "feed", "action" => "index") ); ?>">
		  	</div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "evolution", "action" => "index") ); ?>">
		  	</div>
		  	<div data-content-url="<?php echo $this->Html->url( array("controller" => "flow", "action" => "index") ); ?>">
		  	</div>
		  </div>
		</div>
		<?php endif; ?>

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div> <!-- .container -->


	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p>PGA <?php echo date("Y"); ?> - TODOS OS DIREITOS RESERVADOS.</p>
				</div>
			</div>
		</div>
	</footer> <!-- footer -->

</body>
</html>
