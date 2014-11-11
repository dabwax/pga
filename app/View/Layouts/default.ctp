<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css');
		echo $this->Html->css('cake.generic');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('app.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link("PGA", 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
