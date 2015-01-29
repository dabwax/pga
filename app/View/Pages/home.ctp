<h2 class="titulo-tab">
	<i class="fa fa-home"></i> Home
</h2>

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