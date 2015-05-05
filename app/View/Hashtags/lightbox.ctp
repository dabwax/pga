<h3>Hashtags</h3>
<div class="row" style="margin-top: 40px;">
<?php foreach($hashtags as $h) : ?>
    <div class="col-md-3 form-group">
        <a href="javascript:;" class="btn btn-default btn-hashtag" data-id="<?php echo $student_input_id; ?>" data-tipo="<?php echo $tipo; ?>"><?php echo $h['Hashtag']['value']; ?></a>
    </div>
<?php endforeach; ?>
</div>