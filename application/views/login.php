<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mb-4">Login</h2>
            <div class="formulario">
                
                <?php if (isset($erro) && !empty($erro)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $erro; ?>
                    </div>
                <?php endif; ?>        

                <?= form_open('login'); ?>
                <div class="form-group">
                    <?= form_label('E-mail:', 'email', ['class' => 'formulario_label']); ?>
                    <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control formulario_input', 'required' => 'required']); ?>
                </div>
                <div class="form-group">
                    <?= form_label('Senha:', 'password', ['class' => 'formulario_label']); ?>
                    <?= form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control formulario_input', 'required' => 'required']); ?>
                    <label class="formulario_lr"><a href="/recuperar-minha-senha">Esqueci minha senha</a></label>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <?= form_submit(['type' => 'submit', 'value' => 'Entrar', 'class' => 'btn btn-primary formulario_btn']); ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>