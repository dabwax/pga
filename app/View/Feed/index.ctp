<?php
$timeline = array();

	foreach($feed as $f) :

        $tmp = array(
            "date" => $f['Feed']['date'],
            "type" => 'blog_post',
            "title" => (new DateTime($f['Feed']['date']))->format('d/m/Y'),
        );

        $content = "<div class='container-feed'> <div class='conteudo-esquerda'>";

                                        $participantes = array();

			foreach($f["Feed"]["content"] as $c) :

                                        switch($c['actor']) {
                                            case 'pais':
                                                $model = "StudentParent";
                                                $atores = array("dad_", "mom_");
                                                break;
                                            case 'tutor':
                                                $model = "StudentParent";
                                                $atores = array("tutor_");
                                                break;
                                            case 'psico':
                                                $model = "StudentPsychiatrist";
                                                $atores = array("");
                                                break;
                                            case 'escola':
                                                $model = "StudentSchool";
                                                $atores = array("mediator_", "coordinator_");
                                                break;
                                            case 'aluno':
                                                $model = "Student";
                                                $atores = array("");
                                                break;
                                        }

                                        foreach($atores as $ator) {
                                            $name = AuthComponent::user('Student.' . $model . '.' . $ator . 'name');

                                            if(!in_array($name, $participantes)) {
                                                $participantes[$c['actor']] = $name;
                                            }
                                        }

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

        $content .= "<div class='participantes'>";

        foreach($participantes as $ator => $participante) {
        $content .= "<img class='imagem-perfil-peq imagem-" . strtolower($ator) . "' src='https://scontent-mia.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/10897095_1391792897788211_8200672264827065811_n.jpg?oh=c0b254f8d67a5fd1790e80d4ec8a4c90&oe=554CE694' title='" . $participante . "' />";
        }

        $content .= "</div>";

        $content .= '<a href="' . $this->Html->url( array('action' => 'edit', $f['Feed']['id']) ) . '" class="btn-editar-feed disable-ajax" style="font-size: 22px !important;"><i class="fa fa-pencil"></i></a>';

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
    
    <div class="col-md-6 pull-right text-right">
        <div class="row">
            <a href="#" class="btn btn-default btn-pesquisar pull-right"><i class="fa fa-calendar"></i></a>
            <?php echo $this->Form->create("Search", array('class' => 'form-pesquisar hide') ); ?>
            <div class="col-md-5" style="padding: 0px;">
                <?php $dateTime = new DateTime(); ?>
                <?php echo $this->Form->input("date_start", array('label' => false, 'div' => false, 'placeholder' => 'Data Inicial', 'class' => 'form-control', 'value' => '01' . $dateTime->format('/m/Y') ) ); ?>
            </div>
            <div class="col-md-5" style="padding: 0px;">
            <?php echo $this->Form->input("date_finish", array('label' => false, 'div' => false, 'placeholder' => 'Data Final', 'class' => 'form-control', 'value' => $dateTime->format('d/m/Y') ) ); ?>
            </div>
            <div class="col-md-1 text-right" style="padding: 0px;">
                <button href="#" class="btn btn-default btn-enviar-calendario"><i class="fa fa-check-square"></i></button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

    <div class="clearfix"></div>
	<div id="timeline" class="timeline-feed"></div>
</div>