<div class="titulo-tab" style="height: 54px;">
    <div class="btn-group">
        <a href="<?php echo $this->Html->url( array("action" => "index") ); ?>" class="btn btn-info"><i class="fa fa-list-ul"></i> Arquivo</a>
        <a href="<?php echo $this->Html->url( array("action" => "create") ); ?>" class="btn btn-default"><i class="fa fa-plus-circle"></i> Nova Mensagem</a>
    </div>
</div>

<div class="row">
    <?php foreach($messages as $m) : ?>
        <div class="col-xs-12 item-mensagem">
            <h4><?php echo $m["Message"]["name"]; ?> <small><i class="fa fa-user"></i> <?php echo $m["MessageAuthor"]["name"]; ?></small></h4>

            <?php echo $m["Message"]["content"]; ?>

            <div class="clearfix"></div>
    
            <a class="btn btn-success btn-lg pull-left" href="<?php echo $this->Html->url( array("action" => "view", $m["Message"]["id"]) ); ?>"><i class="fa fa-eye"></i> Ver Mensagem <small>(<?php echo count($m['MessageReply']); ?>)</small></a>

            <div class="pull-right labels-fluxo">
                <span class="label label-default"><?php echo $m["Message"]["views"]; ?> visualizações</span>
                <span class="label label-default timeago" title="<?php echo (new DateTime($m['Message']['created']))->format('c'); ?>"></span>
            </div>

            <div class="clearfix"></div>

            <hr>
        </div> <!-- .item-mensagem -->
    <?php endforeach; ?>
</div>