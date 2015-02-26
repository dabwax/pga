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
        echo $this->Html->css('https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css');
        echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css');
        echo $this->Html->css('//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css');
        echo $this->Html->css('http://imperavi.com/js/redactor/redactor.css');
        echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css');
        echo $this->Html->css('app.css');
        echo $this->Html->css('/admin/admin.css');

        echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
        echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');
        echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
        echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js');
        echo $this->Html->script('jquery.mask.min.js');
        echo $this->Html->script('jquery.timeago.js');
        echo $this->Html->script('//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js');
        echo $this->Html->script('http://imperavi.com/js/redactor/redactor.js');
        echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js');
        echo $this->Html->script('/admin/admin.js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>

    <div id="wrap">
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
                            <a href="<?php echo $this->Html->url( array("controller" => "students", "action" => "index") ); ?>">
                                Estudantes
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url( array("controller" => "posts", "action" => "index") ); ?>">
                                Notícias
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if(AuthComponent::user()) : ?>
                        <li>
                            <p style="color: #FFF; margin-top: 12px; margin-left: 12px;">Olá, <?php echo AuthComponent::user("User.username"); ?></p>
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

        <div class="clearfix"></div>

        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
    </div> <!-- .container -->

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright <?php echo date("Y"); ?> PGA.</p><strong class="label label-danger">ADMIN</strong>
                </div>
            </div>
        </div>
    </footer> <!-- footer -->

</body>
</html>
