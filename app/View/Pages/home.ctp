<h2 class="titulo-tab">
	<i class="fa fa-home"></i> Home
</h2>

<div class="row">
    <div class="col-xs-3 col-xs-offset-2">
        <a href="<?php echo $this->Html->url( array('controller' => 'input', 'action' => 'create') ); ?>" class="btn-atalho">
            <i class="fa fa-pencil"></i>
            Novo Input
        </a>
    </div>
    <div class="col-xs-3 col-xs-offset-2">
        <a href="<?php echo $this->Html->url( array('controller' => 'flow', 'action' => 'create') ); ?>" class="btn-atalho">
            <i class="fa fa-comments"></i>
            Nova Mensagem
        </a>
    </div>
</div>

<?php
$timeline = array();

	foreach($posts as $f) :

		#$actor = $f["Post"]["actor"];

        $tmp = array(
            "date" => $f['Post']['created'],
            "type" => 'blog_post',
            "title" => $f['Post']['name'],
        );

        $content = "<div class='conteudo-direita'>";

        $content .= $f['Post']['content'];

		$content .= "<small>" . (new DateTime($f['Post']['created']))->format('d/m/Y') . "</small>";

        $content .= "</div>";

        $tmp["content"] = $content;

        $timeline[] = $tmp;
endforeach;
?>

<script type="text/javascript">
	$(document).ready(function() {

        timeline_data = <?php echo json_encode($timeline); ?>;

        options       = {
                animation:   true,
                lightbox:    true,
                separator:   'year',
                columnMode:  'dual',
                responsive_width: 700
            };

            var timeline = new Timeline($('#timeline'), timeline_data);
        timeline.setOptions(options);
        timeline.display();
	});
</script>

<div class="row">
	<div id="timeline"></div>
</div>