<section id="warnings">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			</div>
		</div>
	</div>
</section>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-default">
					<h3 class="page-title">Cadastrar Tripulante</h3>
					<hr>
					<?php echo $this->Form->create('Staff'); ?>
					<h4>Informações Pessoais</h4>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nome:</label>
								<?php echo $this->Form->input('name', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Nome do Tripulante') ); ?>
							</div>
							
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nom de Guerra:</label>
								<?php echo $this->Form->input('nickname', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Apelido do Tripulante') ); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="telefone">Telefone:</label>
								<?php echo $this->Form->input('phone', array('div' => false, 'label' => false, 'class' => 'phone form-control', 'placeholder' => 'Telefone do Tripulante') ); ?>
							</div>
							
							
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="celular">Celular:</label>
								<?php echo $this->Form->input('cellphone', array('div' => false, 'label' => false, 'class' => 'cellphone form-control', 'placeholder' => 'Celular do Tripulante') ); ?>
							</div>
							
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="sexo">Sexo:</label>
								<?php echo $this->Form->input('sex', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => array('m' => 'Masculino', 'f' => 'Feminino'), 'empty' => 'Selecione o sexo' ) ); ?>
							</div>
										
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="nascimento">Nascimento:</label>
								<?php echo $this->Form->input('date_of_birth', array('div' => false, 'label' => false, 'class' => 'date form-control', 'placeholder' => 'Nascimento do Tripulante', 'type' => 'text') ); ?>
							</div>
							
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							
							<div class="form-group">
								<label for="endereco">Endereço:</label>
								<?php echo $this->Form->input('address', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Endereço do Tripulante') ); ?>
							</div>
							
							
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="bairro">Bairro:</label>
								<?php echo $this->Form->input('neighborhood', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Bairro do Tripulante') ); ?>
							</div>
							
							
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cidade">Cidade:</label>
								<?php echo $this->Form->input('city', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Cidade do Tripulante') ); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							
							
							<div class="form-group">
								<label for="uf">UF:</label>
								<?php echo $this->Form->input('uf', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'select', 'options' => $estados, 'empty' => 'Selecione o UF' ) ); ?>
							</div>

							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cep">CEP:</label>
								<?php echo $this->Form->input('cep', array('div' => false, 'label' => false, 'class' => 'cep form-control', 'placeholder' => 'CEP do Tripulante') ); ?>
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="foto">Foto do Tripulante:</label>
								<?php echo $this->Form->input('photo', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'file' ) ); ?>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="nome">CPF:</label>
								<?php echo $this->Form->input('cpf', array('div' => false, 'label' => false, 'class' => 'form-control cpf', 'placeholder' => 'CPF do Tripulante', 'maxlength' => 15) ); ?>
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="foto">Identidade:</label>
								<?php echo $this->Form->input('identity', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'text' ) ); ?>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cep">ID UF:</label>
								<?php echo $this->Form->input('id_uf', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Estado de Emissão da ID') ); ?>
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="foto">ID Expedição:</label>
								<?php echo $this->Form->input('id_date', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'text', 'placeholder' => 'Data de Expedição da ID' ) ); ?>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cep">ID Expiração:</label>
								<?php echo $this->Form->input('id_exp', array('div' => false, 'label' => false, 'class' => 'date form-control', 'placeholder' => 'Expiração da ID') ); ?>
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="foto">Escolaridade:</label>
								<?php echo $this->Form->input('scholarly', array('div' => false, 'label' => false, 'class' => 'form-control', 'type' => 'text', 'placeholder' => 'Escolaridade' ) ); ?>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cep">Confidence US:</label>
								<?php echo $this->Form->input('confidence_us', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Nº do cartão confidence americano') ); ?>
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="cep">Expiração Confidence US:</label>
								<?php echo $this->Form->input('expire_us', array('div' => false, 'label' => false, 'class' => 'date form-control', 'placeholder' => 'Validade do cartão confidence americano', 'type' => 'text') ); ?>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cep">Confidence EU:</label>
								<?php echo $this->Form->input('confidence_eu', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Nº do cartão confidence europeu') ); ?>
							</div>
							
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="cep">Expiração Confidence EU:</label>
								<?php echo $this->Form->input('expire_eu', array('div' => false, 'label' => false, 'class' => 'date form-control', 'placeholder' => 'Validade do cartão confidence europeu', 'type' => 'text') ); ?>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="cep">Nome da Mãe:</label>
								<?php echo $this->Form->input('name_mother', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Nome da mãe do tripulante') ); ?>
							</div>
							
						</div>
					</div>
						<hr>
						<h4>Informações Profissionais</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="license">Licença:</label>
									<?php echo $this->Form->input('license', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Licença', 'type' => 'text') ); ?>
								</div>


								<div class="form-group">
									<label for="CANAC">CANAC:</label>
									<?php echo $this->Form->input('canac', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'CANAC', 'type' => 'text') ); ?>
								</div>
																
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nome">Matrícula:</label>
									<?php echo $this->Form->input('inscription', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'Inscrição do Tripulante', 'type' => 'text') ); ?>
								</div>
								
								<div class="form-group">
									<label for="nome">SISPAT:</label>
									<?php echo $this->Form->input('sispat', array('div' => false, 'label' => false, 'class' => 'form-control', 'placeholder' => 'SISPAT do Tripulante', 'type' => 'text') ); ?>
								</div>
								
							</div>
						</div>
						<button type="submit" class="btn btn-default">Cadastrar Tripulante</button>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>