<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css');
		echo $this->Html->css('app.css');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.timeago.js');
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
							<p style="color: #FFF; margin-top: 12px; margin-left: 12px;">Olá, <?php echo $this->Html->getActorInfo("name"); ?></p>
						</li>
					</ul>
					<?php endif; ?>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "pages", "action" => "display", "sobre") ); ?>">O que é o PGA?</a>
						</li>
						<?php if(AuthComponent::user()) : ?>
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "users", "action" => "logout") ); ?>">Sair</a>
						</li>
						<?php endif; ?>
					</ul>

				</div> <!-- .navbar-ex1-collapse -->
				
			</div>
		</nav>

	</header>

	<div class="container">

		<?php if(AuthComponent::user()) : ?>
		<div class="btn-group">
			<a href="<?php echo $this->Html->url( array("controller" => "input", "action" => "index") ); ?>" class="btn btn-primary">
				Input
			</a>
			<a href="<?php echo $this->Html->url( array("controller" => "feed", "action" => "index") ); ?>" class="btn btn-primary">
				Feed
			</a>
			<a href="<?php echo $this->Html->url( array("controller" => "evolution", "action" => "index") ); ?>" class="btn btn-primary">
				Evolução
			</a>
			<a href="<?php echo $this->Html->url( array("controller" => "flow", "action" => "index") ); ?>" class="btn btn-primary">
				Fluxo
			</a>
		</div>

		<div class="row" style="margin-top: 20px;">

			<div class="col-xs-2 col-avatar">
				<img src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpf1/v/t1.0-9/1959245_10204384379905989_197016952929631028_n.jpg?oh=98407c834c988c78824d0e57c3bc5801&oe=54DB36A1&__gda__=1423755979_66d9a1a136c1491c8409e61037813ca5" class="img-circle" alt="">
			</div> <!-- .col-avatar -->

			<div class="col-xs-6 col-student">
				<h2><?php echo $this->Html->getStudentInfo("name"); ?></h2>
				<p>Aluno desde <?php echo date_format(date_create($this->Html->getStudentInfo("created")), "d/m/Y"); ?></p>
			</div> <!-- .col-student -->

			<div class="col-xs-4 col-actors">

				<ul>
					<li>
						<strong>Pais:</strong>
						<?php echo $this->Html->getParentsName(); ?>
					</li>

					<li>
						<strong>Psico:</strong>
						<?php echo $this->Html->getPsychiatristName(); ?>
					</li>
					<li>
						<strong>Escola:</strong>
						<?php echo $this->Html->getSchoolName(); ?>
					</li>
				</ul>

			</div> <!-- .actors -->
		</div> <!-- .row -->
		<?php endif; ?>

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div> <!-- .container -->


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p>Copyright <?php echo date("Y"); ?> PGA.</p>
				</div>
			</div>
		</div>
	</footer> <!-- footer -->

</body>
</html>
