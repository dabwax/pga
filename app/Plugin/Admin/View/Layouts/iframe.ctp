<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Oxygen:400,300,700' rel='stylesheet' type='text/css'>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css');
		echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css');
		echo $this->Html->css('app.css');
		echo $this->Html->css('/admin/iframe.css');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js');
		echo $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js');
		echo $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/localization/messages_pt_BR.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.timeago.js');
		echo $this->Html->script('/admin/iframe.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="body-iframe">

	<div class="container">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div> <!-- .container -->

</body>
</html>
