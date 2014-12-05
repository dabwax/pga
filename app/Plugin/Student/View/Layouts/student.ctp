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
		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css');
		echo $this->Html->css('app.css');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.timeago.js');
		echo $this->Html->script('/admin/admin.js');

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

					 <a class="navbar-brand" href="<?php echo $this->Html->url("/estudante"); ?>">
					 	<?php echo $this->Html->image("pga.png", array("class" => "pga", "alt" => "PGA") ); ?>
					 </a>

				</div> <!-- .navbar-header -->
				
				<div class="collapse navbar-collapse navbar-ex1-collapse">

					<?php if(AuthComponent::user()) : ?>
					<ul class="nav navbar-nav">
						<li>
							<p style="color: #FFF; margin-top: 12px; margin-left: 12px;">Olá, <?php echo $this->Html->getStudentInfo("name"); ?></p>
						</li>
					</ul>
					<?php endif; ?>

					<ul class="nav navbar-nav navbar-right">
						<?php if(AuthComponent::user()) : ?>
						<li>
							<a href="<?php echo $this->Html->url( array("controller" => "users", "action" => "logout", "plugin" => false) ); ?>">Sair</a>
						</li>
						<?php endif; ?>
					</ul>

				</div> <!-- .navbar-ex1-collapse -->
				
			</div>
		</nav>

	</header>

	<div class="container">

		<div class="clearfix"></div>

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div> <!-- .container -->


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p>Copyright <?php echo date("Y"); ?> PGA.</p><strong class="label label-danger">ESTUDANTE</strong>
				</div>
			</div>
		</div>
	</footer> <!-- footer -->

</body>
</html>
