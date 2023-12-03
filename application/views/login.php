<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mb-4">Login</h2>
            <div class="formulario">
                
                <p class="error">
                    <?=(isset($error)? $error : '') ?>
                </p>

                <?php echo form_open('login'); ?>
                <div class="form-group">
                    <label for="email" class="formulario_label">E-mail:</label>
                    <input type="email" class="form-control formulario_input" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha" class="formulario_label">Senha:</label>
                    <input type="password" class="form-control formulario_input" id="password" name="password" required>
                    <label class="formulario_lr"><a href="/recuperar-minha-senha">Esqueci minha senha</a></label>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <button type="submit" class="btn btn-primary formulario_btn">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>