<div class="titulo-tab" style="height: 54px;">
        <div class="btn-group" style="text-align: right;">
            <a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default">Criar Novo Registro</a>
            <a href="<?php echo $this->Html->url( array("action" => "archive") ); ?>" class="btn btn-info">Arquivo</a>
        </div>
</div>



<?php
$timeline = array();

foreach($aulas as $data => $_aulas) :
    foreach($_aulas as $ator => $_aula) :

        $tmp = array(
            "date" => DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d'),
            "type" => "blog_post",
            "ator" => ucfirst($ator),
            "title" => $data,
        );

        $content = "";
        //$content = "<div class='conteudo-esquerda'>";

        //$content .= "<img class='imagem-perfil' src='https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/c13.13.164.164/s50x50/13240_393598124084394_768161798_n.png?oh=a4427b14b5241e2dc00fb1a523a2a986&oe=550B4F64&__gda__=1427044825_173302d512885e532ec87c7416b0146a' />";

        //$content .= "</div>";

        $content .= "<div class='conteudo-direita' style='width: 100%;'>";

            foreach($_aula as $_a) :
                $strong = (!empty($_a["StudentInput"]["name"])) ? $_a["StudentInput"]["name"] : "Matéria: " . $_a["StudentLesson"]["name"];


                if($_a['StudentInput']['input_id'] == 6) {
                    $_a["StudentInputValue"]["value"] = str_replace(".", ",", $_a["StudentInputValue"]["value"]);
                }
                $content .= "<div class='col-md-6 text-center'>";
                $content .= "<strong>" . $strong . "</strong>";
                $content .= "<p>" . $_a["StudentInputValue"]["value"] . "</p>";
                $content .= "<div class='clearfix'></div>";

                $content .= "</div>";

                // é matéria
                if(empty($_a["StudentInput"]["name"])) {
                    if(!empty($_a['StudentInputValue']['nota_1'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Teste <small>Esperado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_1'] . "</p>";
                        $content .= "</div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_2'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Teste <small>Alcançado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_2'] . "</p>";
                        $content .= "</div>";
                        $content .= "<div class='clearfix'></div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_3'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Prova <small>Esperado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_3'] . "</p>";
                        $content .= "</div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_4'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Prova <small>Alcançado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_4'] . "</p>";
                        $content .= "</div>";
                        $content .= "<div class='clearfix'></div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_5'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Trabalho <small>Esperado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_5'] . "</p>";
                        $content .= "</div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_6'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Trabalho <small>Alcançado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_6'] . "</p>";
                        $content .= "</div>";
                        $content .= "<div class='clearfix'></div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_7'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Nota Bimestral <small>Esperado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_7'] . "</p>";
                        $content .= "</div>";
                    }
                    if(!empty($_a['StudentInputValue']['nota_8'])) {
                         $content .= "<div class='col-md-6 text-center'>";
                        $content .= "<strong>Nota Bimestral <small>Alcançado</small> </strong>";
                        $content .= "<p>" . $_a['StudentInputValue']['nota_8'] . "</p>";
                        $content .= "</div>";
                        $content .= "<div class='clearfix'></div>";
                    }
                }
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
                responsive_width: 700,
                max: 5,
                loadmore: 5,
                animation: false
            };
            <?php if($tem_busca == true && !empty($s)) : ?>
            options['showHighlight'] = "<?php echo $s; ?>";
            <?php endif; ?>
            
            carregarTimeline(timeline_data, options);
});
</script>

    
    <div class="col-md-8 pull-right text-right" style="padding-right: 0px; margin-right: 0px;">

            <?php echo $this->Form->create("Search", array('class' => 'form-pesquisar hide col-md-6', 'url' => array('controller' => 'search', 'action' => 'input_index') ) ); ?>

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

            <?php echo $this->Form->create("Search", array('class' => 'form-busca hide col-md-6', 'url' => array('controller' => 'search', 'action' => 'input_busca') ) ); ?>

            <div class="col-md-10" style="padding: 0px;">
                <?php echo $this->Form->input("s", array('label' => false, 'div' => false, 'placeholder' => 'Pesquisar', 'class' => 'form-control') ); ?>
            </div>

            <div class="col-md-1 text-right" style="padding: 0px;">
                <button href="#" class="btn btn-default btn-enviar-busca"><i class="fa fa-check-square"></i></button>
            </div>

            <?php echo $this->Form->end(); ?>

            <a href="#" class="btn btn-default btn-pesquisar" data-target="calendario"><i class="fa fa-calendar"></i></a>
            <a href="#" class="btn btn-default btn-pesquisar" data-target="busca"><i class="fa fa-search"></i></a>
        <?php if($tem_busca == true) : ?>
            <a href="<?php echo $this->Html->url( array('controller' => 'search', 'action' => 'clear', 'input_arquivo') ); ?>" class="btn btn-default btn-limpar-busca disable-ajax">Limpar Busca</a>
    <?php endif; ?>

    </div>

<div class="clearfix"></div>
<div class="row" style="margin-top: 20px;">

        <?php if($busca_de_data == true) : ?>
        <h2 style="margin: 0px; color: #BDC3C7; font-weight: 300; text-align: center; margin-bottom: 12px;">De <?php echo $date_start->format("d/m/Y"); ?> a <?php echo $date_finish->format("d/m/Y"); ?></h2>
    <?php endif; ?>
	<div id="timeline"></div>

</div>