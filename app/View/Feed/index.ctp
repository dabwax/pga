<?php
$timeline = array();

	foreach($feed as $f) :
		$actor = $f["Feed"]["actor"];

        $tmp = array(
            "date" => $f['Feed']['created'],
            "type" => 'blog_post',
            "title" => (new DateTime($f['Feed']['created']))->format('d/m/Y'),
        );

        $content = "<div class='conteudo-esquerda'>";

        $content .= "<img class='imagem-perfil' src='https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/c13.13.164.164/s50x50/13240_393598124084394_768161798_n.png?oh=a4427b14b5241e2dc00fb1a523a2a986&oe=550B4F64&__gda__=1427044825_173302d512885e532ec87c7416b0146a' />";

        $content .= "</div>";

        $content .= "<div class='conteudo-direita'>";

			foreach($f["Feed"]["content"] as $c) :

				if(!empty($c["student_input_id"])) :
                	$strong = $student_inputs[$c["student_input_id"]];
            	else :
            		$strong = "Matéria: " . $student_lessons[$c["student_lesson_id"]];
            	endif;


                $content .= "<strong>" . $strong . "</strong>";
                $content .= "<p>" . $c["value"] . "</p>";
                $content .= "<div class='clearfix'></div>";
            endforeach;

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