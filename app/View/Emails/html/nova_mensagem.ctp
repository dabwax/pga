<h2 style="font-size: 36px; font-family: Helvetica, Arial, sans-serif; color: #333 !important; margin: 10px;">Nova mensagem para você</h2>
<p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 10px;">
	<strong><?php echo $autor_nome ?></strong> enviou uma mensagem e incluiu você como destinatário.
</p>
<p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 10px;">
	A mensagem é: <br>
	<strong><?php echo $titulo; ?></strong>
	<br>
	<?php echo $mensagem; ?>
</p>

<p style="font-size: 17px; line-height: 24px; font-family: Georgia, 'Times New Roman', Times, serif; color: #333; margin: 10px;">
Para responder, <?php 
   echo $this->Html->link('clique aqui', 
       Router::url(array('controller' =>'flow', 'action' => 'view', $id), true),
       array('escape'=>false,'target'=>'_blank')); 
?>.
</p>