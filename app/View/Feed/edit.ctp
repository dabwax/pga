<?php echo $this->Form->create("StudentInputValue"); ?>

<div class="row">

<?php 

$campos = array();

foreach($student_input_values as $k => $si) :

if($si["StudentInput"]["actor"] == strtolower($actor)) : $campos[$actor][] = $si; ?>

<div class="col-xs-6">
    <?php echo $this->Form->input("StudentInputValue." . $k . ".id", array("type" => "hidden", "value" => $si['StudentInputValue']['id']) ); ?>

    <label for=""><?php echo $si["StudentInput"]["name"]; ?></label>

    <?php if( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Calendário") ) : ?>

        <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "calendario", "type" => "text", "value" => $si['StudentInputValue']['value'] ) ); ?>

    <?php elseif ( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Número") ) : ?>

        <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "numero", "type" => "text", "value" => $si['StudentInputValue']['value'] ) ); ?>

    <?php elseif ( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Intervalo de Tempo") ) : ?>

        <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false, "class" => "time-value", "type" => "hidden", "value" => $si['StudentInputValue']['value']) ); ?>

        <?php echo $this->Form->input("StudentInputValue." . $k . ".config.time_start", array("label" => false, "type" => "time", "interval" => 10, "timeFormat" => "24") ); ?>
        <?php echo $this->Form->input("StudentInputValue." . $k . ".config.time_end", array("label" => false, "type" => "time", "interval" => 10, "timeFormat" => "24") ); ?>

    <?php elseif ( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Texto") ) : ?>

        <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false) ); ?>

    <?php elseif ( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Texto Privativo") ) : ?>

        <?php echo $this->Form->input("StudentInputValue." . $k . ".value", array("label" => false) ); ?>

    <?php elseif ( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Escala Numérica") ) : ?>

        <!-- Começo - label -->

        <table class="table table-intervalo">
            <thead>
                <tr>
                    <th class="text-left">
                        De <?php echo $si["StudentInput"]["config"]["range_start"] ?> a <?php echo $si["StudentInput"]["config"]["range_end"] ?>
                    </th>
                    <th class="text-right">
                        Atual: <span id='<?php echo "ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>' class="fwb"><?php echo $si['StudentInputValue']['value']; ?></span>
                    </th>
                </tr>
            </thead>
        </table>

        <!-- Fim - label -->

        <!-- Começo - range -->

        <div class="range-slider" data-min="<?php echo $si["StudentInput"]["config"]["range_start"]; ?>" data-max="<?php echo $si["StudentInput"]["config"]["range_end"]; ?>" data-input="<?php echo "#CampoEscalaNumerica" . $si["StudentInput"]["id"]; ?>" data-value="<?php echo $si['StudentInputValue']['value']; ?>" data-resultado="<?php echo "#ResultadoEscalaNumerica" . $si["StudentInput"]["id"]; ?>"></div>

        <?php
            echo $this->Form->input("StudentInputValue." . $k . ".value", array(
                "label" => false,
                "type" => "hidden",
                "id" => "CampoEscalaNumerica" . $si["StudentInput"]["id"],
                "value" => $si['StudentInputValue']['value'],
            ));
        ?>

        <!-- Fim - range -->

    <?php elseif ( $si["StudentInput"]["Input"]["id"] == $this->Html->getInputId("Escala Texto") ) : ?>

        <!-- Começo - label -->

        <table class="table">
            <thead>
                <tr>
                    <th class="text-left">
                        <?php foreach($si["StudentInput"]["config"] as $k_config => $c) : ?>
                            <?php echo $c["name"]; ?> <?php echo ($k_config != sizeof($si["StudentInput"]["config"])) ? "/" : ""; ?>
                        <?php endforeach; ?>
                    </th>
                    <th class="text-right">
                        Atual: <span id='<?php echo "ResultadoEscalaTexto" . $si["StudentInput"]["id"]; ?>'><?php echo $si["StudentInput"]["config"][1]["name"]; ?></span>
                    </th>
                </tr>
            </thead>
        </table>

        <!-- Fim - label -->

        <!-- Começo - range -->

        <div class="range-texto-slider" data-min="1" data-max="<?php echo sizeof($si["StudentInput"]["config"]); ?>" data-config='<?php echo json_encode($si["StudentInput"]["config"]); ?>' data-input="<?php echo "#CampoEscalaTexto" . $si["StudentInput"]["id"]; ?>" data-resultado="<?php echo "#ResultadoEscalaTexto" . $si["StudentInput"]["id"]; ?>"></div>

        <?php
            echo $this->Form->input("StudentInputValue." . $k . ".value", array(
                "label" => false,
                "type" => "hidden",
                "id" => "CampoEscalaTexto" . $si["StudentInput"]["id"],
                "value" => $si["StudentInput"]["config"][1]['name'],
            ));
        ?>

        <!-- Fim - range -->

    <?php endif; ?>

<?php endif; ?>
    
</div>
<?php endforeach; ?>
    

</div>


    <div class="container">
    <div class="row">
    <div class="col-md-12">

     <?php if(!empty($student_input_values)) : ?>
        <button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-floppy-o"></i> Salvar Edição</button>

        <a href="<?php echo $this->Html->url( array('action' => 'delete', $id) ); ?>" onclick="if(!confirm('Você tem certeza disto?')) { return false; }">ou mover registro para lixeira</a>

    <?php endif; ?>
    </div>
    </div>
    </div>

    <?php echo $this->Form->end(); ?>

    <?php if(empty($student_input_values)) : ?>
    <div class="alert alert-warning">Não há nenhuma entrada para este feed. Feche a janela, por favor!</div>
    <?php endif; ?>