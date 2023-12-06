<div class="container mt-2">
  <div class="row justify-content-center mb-3">
    <div class="col-md-6 mb-4">
      <h1 class="h-header text-center">Organize sua<br>jornada <em>literária!</em></h1>
      <h6 class="h-desc text-center">O <em>Biblio Track</em> é o seu companheiro perfeito para gerenciar os livros que você já leu, aqueles que deseja ler e os que estão atualmente em suas mãos.</h6>
    </div>
  </div>
  <div class="row justify-content-center mb-180">
    <div class="col-md-4">
      <h3 class="text-center">Login</h3>
      <div class="formulario frm-login">

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
            <?= form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control formulario_input mb-2','maxlength' => '8', 'required' => 'required']); ?>
            <label class="formulario_lr"><a href="/recuperar-minha-senha">Esqueci minha senha</a></label>
          </div>
          <div class="row mt-5 justify-content-between">
            <div class="col mr-auto">
              <?= form_submit(['type' => 'submit', 'value' => 'Entrar', 'class' => 'btn btn-primary formulario_btn']); ?>
            </div>
            <div class="col">
              <a href="/cadastre-se" class="btn btn-primary formulario_btn formulario_lr">Cadastre-se</a>
            </div>
          </div>
          
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>