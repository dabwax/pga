<?php if($this->request->is("get")) { ?>
	<?php

        echo $this->Html->css('/components/fancybox/source/jquery.fancybox.css');
        echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
        echo $this->Html->script('/components/fancybox/source/jquery.fancybox.pack.js');
?>

<script>
	parent.window.location.reload();
</script>
<?php } ?>