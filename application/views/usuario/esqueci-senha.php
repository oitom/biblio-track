<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <?php if ($senhaSolicitada == "0"): ?>
        <h2 class="mb-4">Recupere o seu acesso!</h2>
        <h6 class="h6-desc-center">Não se preocupe! Enviaremos um link no seu e-mail para recuperação do seu acesso.</h6>
        <div class="formulario">
          <?php echo form_open('recuperar-minha-senha/senha_solicitada'); ?>
          <div class="form-group">
            <label for="email" class="formulario_label">E-mail:</label>
            <?php echo form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control formulario_input', 'required' => 'required']); ?>
          </div>
          <div class="row mt-5">
            <div class="col">
              <?php echo form_submit(['type' => 'submit', 'value' => 'Enviar', 'class' => 'btn btn-primary formulario_btn']); ?>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      <?php else: ?>
        <h2 class="mb-4">Link enviado com sucesso!</h2>
        <h6 class="h6-desc-center">Um link foi enviado no seu e-mail para recuperação do seu acesso! Confira seu e-mail</h6>
        <a href="/login" class="a-custom">Voltar ao login</a>
      <?php endif; ?>
    </div>
  </div>
</div>