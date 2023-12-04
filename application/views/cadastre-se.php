<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <?php if ($cadastroRealizado == "0"): ?>
                <h2 class="mb-4">Cadastre-se</h2>
                <div class="formulario">
                    <?php if (isset($erro) && !empty($erro)) : ?>
                        <div class="alert alert-danger">
                            <?php echo $erro; ?>
                        </div>
                    <?php endif; ?>


                    <?= form_open('cadastro', ['method' => 'post']); ?>
                    <div class="form-group">
                        <?= form_label('Nome:', 'nome', ['class' => 'formulario_label']); ?>
                        <?= form_input(['type' => 'text', 'name' => 'nome', 'id' => 'nome', 'class' => 'form-control formulario_input', 'required' => 'required', 'value' => set_value('nome')]); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('E-mail:', 'email', ['class' => 'formulario_label']); ?>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control formulario_input', 'required' => 'required', 'value' => set_value('email')]); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Senha:', 'senha', ['class' => 'formulario_label']); ?>
                        <?= form_password(['name' => 'senha', 'id' => 'senha', 'class' => 'form-control formulario_input', 'required' => 'required', 'value' => set_value('senha')]); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Confirme sua senha:', 'confirma_senha', ['class' => 'formulario_label']); ?>
                        <?= form_password(['name' => 'confirma_senha', 'id' => 'confirma_senha', 'class' => 'form-control formulario_input', 'required' => 'required', 'value' => set_value('confirma_senha')]); ?>
                    </div>

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