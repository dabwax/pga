<h2 style="font-size: 36px; font-family: Helvetica, Arial, sans-serif; color: #333 !important; margin: 10px;">Nova resposta para você</h2>
<p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 10px;">
	<strong><?php echo $autor ?></strong> respondeu a uma mensagem que você está incluído.
</p>
<p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 10px;">
	A resposta é: <br>
	<?php echo $mensagem; ?>
</p>

<p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 10px;">
Para responder, <?php 
   echo $this->Html->link('clique aqui', 
       Router::url(array('controller' =>'flow', 'action' => 'view', $id), true),
       array('escape'=>false,'target'=>'_blank')); 
?>.
</p>