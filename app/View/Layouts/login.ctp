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
<body class="body-login">

	<div class="container">
		<div style="margin-top: 40px;">
			<?php echo $this->Session->flash(); ?>
		</div>
		<?php echo $this->fetch('content'); ?>
	</div> <!-- .container -->

	<footer class="login">
		<div class="container">
			<p class="login">Plataforma de gestão de alunos <a href="#" title="Sobre o PGA" class="btn-sobre-pga" data-toggle="modal" data-target="#modalSobre"><i class="fa fa-question-circle"></i></a></p>
		</div>
	</footer>

	<!-- Modal -->
	<div class="modal fade" id="modalSobre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Sobre o PGA</h4>
	      </div>
	      <div class="modal-body">
	        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus libero, tincidunt ac tincidunt ac, faucibus nec nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur magna diam, tincidunt in urna id, finibus fermentum felis. Mauris non nunc varius, sagittis risus eu, dictum mauris. Phasellus at magna non urna lobortis rhoncus. Cras congue dignissim metus id consequat. Nullam et lorem et lorem ullamcorper euismod ac posuere justo. Mauris vitae est volutpat, facilisis enim at, congue nisi. Etiam nec dapibus mi. Integer sodales lobortis metus.</p>
	        <p>Pellentesque lacus quam, sagittis ut commodo et, euismod ut leo. Nam hendrerit ante ut tempor laoreet. Maecenas feugiat aliquet arcu. Cras eget facilisis augue, a molestie velit. Sed tincidunt aliquet massa, sit amet cursus felis ornare in. Nulla ac ornare ex. Nulla non lobortis lectus, vel dapibus risus.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>
</html>
