<h2 class="titulo-tab">
	<i class="fa fa-pencil"></i> Input <small>Arquivo</small>
</h2>


<div class="row">
	<div class="btn-group">
		<a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default">Criar Novo Registro</a>
		<a href="<?php echo $this->Html->url( array("action" => "archive") ); ?>" class="btn btn-info">Arquivo</a>
	</div>
</div>

<?php
$timeline = array();

foreach($aulas as $data => $_aulas) :
    foreach($_aulas as $ator => $_aula) :

        $tmp = array(
            "date" => (new DateTime($data))->format('Y-m-d'),
            "type" => "blog_post",
            "ator" => ucfirst($ator),
            "title" => $data,
        );

        $content = "";
        //$content = "<div class='conteudo-esquerda'>";
        
        //$content .= "<img class='imagem-perfil' src='https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/c13.13.164.164/s50x50/13240_393598124084394_768161798_n.png?oh=a4427b14b5241e2dc00fb1a523a2a986&oe=550B4F64&__gda__=1427044825_173302d512885e532ec87c7416b0146a' />";

        //$content .= "</div>";

        $content .= "<div class='conteudo-direita'>";

            foreach($_aula as $_a) :
                $strong = (!empty($_a["StudentInput"]["name"])) ? $_a["StudentInput"]["name"] : "Matéria: " . $_a["StudentLesson"]["name"];

                $content .= "<strong>" . $strong . "</strong>";
                $content .= "<p>" . $_a["StudentInputValue"]["value"] . "</p>";
                $content .= "<div class='clearfix'></div>";
            endforeach;

        $content .= "</div>";

        $tmp["content"] = $content;

        $timeline[] = $tmp;
    endforeach;
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

<div class="row" style="margin-top: 20px;">
	
	<div id="timeline"></div>

</div>