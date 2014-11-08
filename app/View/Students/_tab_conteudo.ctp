<div role="tabpanel" class="tab-pane" id="conteudo">
  	
  	<table class="table">
  		<thead>
  			<tr>
  				<th>
  					Input
  				</th>
  				<th>
  					Ações
  				</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach($inputs as $i) : ?>
  			<tr>
  				<td>
  					<?php echo $i["Input"]["name"]; ?>
  				</td>
  				<td>
  					<a href="<?php echo $this->Html->url( array("controller" => "students", "action" => "add_student_input", $i["Input"]["id"], $this->request->data["Student"]["id"]) ); ?>" class="btn btn-default">
  						Adicionar
  					</a>
  				</td>
  			</tr>
  			<?php endforeach; ?>
  		</tbody>
  	</table>

</div>