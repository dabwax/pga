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
		echo $this->Html->script('/files/timeline/javascript/scriptgates.js');
		echo $this->Html->script('http://imperavi.com/js/redactor/redactor.js');
		echo $this->Html->script('/files/canvasjs/jquery.canvasjs.min.js');
		echo $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js");
		echo $this->Html->script('/files/fancybox/jquery.fancybox.pack.js');
		echo $this->Html->script('/files/fireshot/fsapi.js');
		echo $this->Html->script('app.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

<div class="container">

	<div style="margin-top: 20px;">
		<?php echo $this->Session->flash(); ?>
	</div>

	<?php echo $this->fetch('content'); ?>
</div>

</body>
</html>
