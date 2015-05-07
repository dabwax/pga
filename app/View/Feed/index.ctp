<?php
$timeline = array();

	foreach($feed as $f) :

        $tmp = array(
            "date" => $f['Feed']['date'],
            "type" => 'blog_post',
            "title" => (new DateTime($f['Feed']['date']))->format('d/m/Y'),
        );

        $texto = "";
        $ja_adicionou_a_classe = false;

        $content = "<div class='container-feed'> <div class='conteudo-esquerda' style='width: 100%;'>";

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

                $sub_texto = "";

                $sub_texto .= "<strong>" . $strong . "</strong>";
                $sub_texto .= "<p>" . $c["value"] . "</p>";
                $sub_texto .= "<div class='clearfix'></div>";

                if(strlen($texto) > 100 && !$ja_adicionou_a_classe) {
                    $ja_adicionou_a_classe = true;
                    $tmp2 = "<span class='restante'>";
                    $tmp2 .= $sub_texto;

                    $sub_texto = $tmp2;
                }

                $texto .= $sub_texto;
            endforeach;

            $texto .= "</span>";

            $content .= $texto;

            $content .= "<a href='javascript:;' class='ler-mais-feed disable-ajax' data-toggle='false'>ver mais</a>";

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
                responsive_width: 700,
                max: 5,
                loadmore: 5,
                animation: false
            };

            <?php if($tem_busca == true) : ?>
            options['showHighlight'] = "<?php echo $s; ?>";
            <?php endif; ?>

            carregarTimeline(timeline_data, options);
        
});
</script>
    
    <div class="col-md-8 pull-right text-right" style="margin-right: 0px; padding-right: 0px;">

            <?php echo $this->Form->create("Search", array('class' => 'form-pesquisar hide col-md-6', 'url' => array('controller' => 'search', 'action' => 'feed_index') ) ); ?>

            <div class="col-md-5" style="padding: 0px;">
                <?php echo $this->Form->input("date_start", array('label' => false, 'div' => false, 'placeholder' => 'Data Inicial', 'class' => 'form-control calendario', 'value' => $date_start->format("d/m/Y") ) ); ?>
            </div>

            <div class="col-md-5" style="padding: 0px;">
                <?php echo $this->Form->input("date_finish", array('label' => false, 'div' => false, 'placeholder' => 'Data Final', 'class' => 'form-control calendario', 'value' => $date_finish->format("d/m/Y") ) ); ?>
            </div>

            <div class="col-md-1 text-right" style="padding: 0px;">
                <button href="#" class="btn btn-default btn-enviar-calendario"><i class="fa fa-check-square"></i></button>
            </div>

            <?php echo $this->Form->end(); ?>

            <?php echo $this->Form->create("Search", array('class' => 'form-busca hide col-md-6', 'url' => array('controller' => 'search', 'action' => 'feed_busca') ) ); ?>

            <div class="col-md-8" style="padding: 0px;">
                <?php echo $this->Form->input("s", array('label' => false, 'div' => false, 'placeholder' => 'Pesquisar', 'class' => 'form-control') ); ?>
            </div>

            <div class="col-md-2 text-right" style="padding: 0px;">
                <button href="#" class="btn btn-default btn-enviar-busca"><i class="fa fa-check-square"></i></button>
            </div>

            <div class="col-md-2 text-left">
                <a href="<?php echo $this->Html->url( array('controller' => 'hashtags', 'action' => 'lightbox', AuthComponent::user("Student.Student.id"), 0, 'busca') ); ?>" class="btn btn-default btn-iframe disable-ajax">#</a>
            </div>

            <?php echo $this->Form->end(); ?>

            <a href="#" class="btn btn-default btn-pesquisar" data-target="calendario"><i class="fa fa-calendar"></i></a>
            <a href="#" class="btn btn-default btn-pesquisar" data-target="busca"><i class="fa fa-search"></i></a>

        <?php if($tem_busca == true) : ?>
            <a href="<?php echo $this->Html->url( array('controller' => 'search', 'action' => 'clear', 'feed') ); ?>" class="btn btn-default btn-limpar-busca disable-ajax">Limpar Busca</a>
        <?php endif; ?>

        </div>

    <div class="clearfix"></div>
    
<div class="row">
        <?php if($busca_de_data == true) : ?>
        <h2 style="margin: 0px; color: #BDC3C7; font-weight: 300; text-align: center; margin-bottom: 12px;">De <?php echo $date_start->format("d/m/Y"); ?> a <?php echo $date_finish->format("d/m/Y"); ?></h2>
    <?php endif; ?>
	<div id="timeline" class="timeline-feed"></div>
</div>