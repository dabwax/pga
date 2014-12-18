<h2 class="titulo-tab">
	<i class="fa fa-bars"></i> Feed
</h2>

<div class="row">
	<?php foreach($feed as $f) : ?>
		<div class="col-xs-12">
			<?php $actor = $f["Feed"]["actor"]; ?>
			<strong>Por <?php echo $actor[$actor["prefix"] . "name"]; ?></strong>

			<span class="label label-default timeago" title="<?php echo (new DateTime($f['Feed']['created']))->format('c'); ?>"></span>
			
			<ul>
			<?php foreach($f["Feed"]["content"] as $c) : ?>

				<?php
					if($c["actor"] == $this->Html->getActorTypeInPortuguese($actor["model"], $actor["prefix"]) ) :
				?>
					<li>
					<?php if(!empty($c["student_input_id"])) : ?>
						
						<span class="label label-info label-xs"><?php echo $student_inputs[$c["student_input_id"]]; ?></span>
					<?php endif; ?>

					<?php if(!empty($c["student_lesson_id"])) : ?>

						<span class="label label-success label-xs"><?php echo $student_lessons[$c["student_lesson_id"]]; ?></span>
					<?php endif; ?>

					<?php echo $c["value"]; ?>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
			</ul>

			<hr>
		</div>
	<?php endforeach; ?>
</div>