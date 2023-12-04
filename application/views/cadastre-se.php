<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <?php if ($cadastroRealizado == "0"): ?>
                <h2 class="mb-4">Cadastre-se</h2>
                <div class="formulario">
                    <?php if (isset($erro) && !empty($erro)) : ?>
                        <div class="alert alert-danger">
                            <?php echo $erro; ?>
                        </div>
                    <?php endif; ?>

                    <?= form_open('cadastro', ['method' => 'post']); ?>
                    
                    <div class="row">                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Nome:', 'nome', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'nome', 'id' => 'nome', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '40', 'value' => set_value('nome')]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('E-mail:', 'email', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '40', 'value' => set_value('email')]); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Senha:', 'senha', ['class' => 'formulario_label']); ?>
                                <?= form_password(['name' => 'senha', 'id' => 'senha', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '8', 'value' => set_value('senha')]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Confirme sua senha:', 'confirma_senha', ['class' => 'formulario_label']); ?>
                                <?= form_password(['name' => 'confirma_senha', 'id' => 'confirma_senha', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '8', 'value' => set_value('confirma_senha')]); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <?= form_label('Endereço:', 'endereço', ['class' => 'formulario_label']); ?>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('CEP:', 'cep', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'cep', 'id' => 'cep', 'class' => 'form-control formulario_input', 'required' => 'required','maxlength' => '9', 'value' => set_value('cep')]); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <?= form_label('Rua:', 'rua', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'rua', 'id' => 'rua', 'class' => 'form-control formulario_input', 'required' => 'required','maxlength' => '50', 'value' => set_value('rua')]); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= form_label('Número:', 'numero', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'numero', 'id' => 'numero', 'class' => 'form-control formulario_input', 'required' => 'required','maxlength' => '10', 'value' => set_value('numero')]); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Bairro:', 'bairro', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'bairro', 'id' => 'bairro', 'class' => 'form-control formulario_input', 'required' => 'required','maxlength' => '20', 'value' => set_value('bairro')]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Complemento:', 'complemento', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'complemento', 'id' => 'complemento', 'class' => 'form-control formulario_input', 'maxlength' => '30', 'value' => set_value('complemento')]); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Cidade:', 'cidade', ['class' => 'formulario_label']); ?>
                                <?= form_input(['type' => 'text', 'name' => 'cidade', 'id' => 'cidade', 'class' => 'form-control formulario_input', 'required' => 'required','maxlength' => '40', 'value' => set_value('cidade')]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= form_label('Estado:', 'estado', ['class' => 'formulario_label']); ?>
                                <?= form_dropdown('estado', $estados, set_value('estado'), ['class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '2',]); ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- submit -->
                    <div class="row mt-5">
                        <div class="col">
                            <?= form_submit(['type' => 'submit', 'value' => 'Cadastrar', 'class' => 'btn btn-primary formulario_btn']); ?>
                        </div>
                    </div>
                    <?= form_close(); ?>
                <?php else: ?>
                    <h2 class="mb-4">Cadastro realizado com sucesso!</h2>
                    <h6 class="h6-desc-center">Agora você pode consultar todos os livros em nossa plataforma!</h6>
                    <a href="/login" class="a-custom">Entrar</a>
                <?php endif; ?>
            </div>
         </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#cep').mask('00000-000');
        $('#cep').blur(function() {
            // Obtém o valor do CEP
            var cep = $(this).val().replace('-', '');

            // Verifica se o CEP tem o formato válido
            if (cep.length === 8) {
                // Faz a requisição AJAX para o serviço ViaCEP
                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/',
                    dataType: 'json',
                    success: function(data) {
                        // Preenche os campos de endereço com os dados retornados
                        $('#rua').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.localidade);
                        $('#estado').val(data.uf);
                    }
                });
            }
        });
    });
</script>