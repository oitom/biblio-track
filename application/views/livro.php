<div class="container mt-5 mb-180">
  <div class="row justify-content-center">

    <div class="col-md-6">
      <?php if ($acao_realizada == "0"): ?>
        <?php if ($acao == "adicionar"): ?>
          <h2 class="mb-4">Novo livro</h2>
        <?php else: ?>
            <h2 class="mb-4">Editar Livro</h2>
        <?php endif; ?>

        <div class="formulario">
          <?php if (isset($erro) && !empty($erro)) : ?>
            <div class="alert alert-danger">
              <?php echo $erro; ?>
            </div>
          <?php endif; ?>
          
          <?= form_open("livro/$livro_id", ['method' => 'post', 'enctype' => 'multipart/form-data']); ?>
            <div class="row"> 
              
              <div class="col-md-12">
                <div class="form-group">
                  <?= form_label('Título:', 'titulo', ['class' => 'formulario_label']); ?>
                  <?= form_input(['type' => 'text', 'name' => 'titulo', 'id' => 'titulo', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '50', 'value' => set_value('nome', $dados['titulo'])]); ?>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <?= form_label('Descrição:', 'descricao', ['class' => 'formulario_label']); ?>
                  <?= form_textarea(['name' => 'descricao', 'id' => 'descricao', 'class' => 'form-control formulario_textarea', 'required' => 'required', 'rows' => '14', 'maxlength' => '300', 'value' => set_value('descricao', $dados['descricao'])]); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <?= form_label('Autor:', 'autor', ['class' => 'formulario_label']); ?>
                  <?= form_input(['type' => 'text', 'name' => 'autor', 'id' => 'autor', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '50', 'value' => set_value('autor', $dados['autor'])]); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <?= form_label('Número páginas:', 'autor', ['class' => 'formulario_label']); ?>
                  <?= form_input(['type' => 'text', 'name' => 'n_paginas', 'id' => 'n_paginas', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '10', 'value' => set_value('n_paginas', $dados['n_paginas'])]); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <?= form_label('Categoria:', 'categoria', ['class' => 'formulario_label']); ?>
                  <?= form_dropdown('categoria', $opcoes_categorias, set_value('categoria', $dados['categoria']), 'class="form-control formulario_input" id="categoria" required'); ?>      </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <?= form_label('Data cadastro:', 'data_cadastro', ['class' => 'formulario_label']); ?>
                  <?= form_input(['type' => 'text', 'name' => 'data_cadastro', 'id' => 'data_cadastro', 'class' => 'form-control formulario_input', 'value' => set_value('data_cadastro', date("d/m/Y")), 'disabled' => 'disabled']); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <?= form_label('Capa do livro:', 'capa', ['class' => 'formulario_label']); ?>
                  <?= form_upload(['name' => 'capa', 'id' => 'capa', 'class' => 'form-control', 'accept' => 'image/*']); ?>
                </div>
              </div>

              <?php if ($acao == "editar"): ?>
                <div class="col-md-6">
                  <div class="form-group">
                    <?= form_label('Capa do livro atual:', 'capa_atual', ['class' => 'formulario_label']); ?>
                    <img src="<?= UPLOAD . $dados['capa'] ?>" class="card-img-top" alt="Capa do Livro">
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <?= form_submit(['type' => 'submit', 'value' => ($acao == 'adicionar' ? 'Cadastrar' : 'Atualizar'), 'class' => 'btn btn-primary formulario_btn']); ?>
                </div>
            </div>
          <?= form_close(); ?>
        </div>
      <?php else: ?>
        <h2 class="mb-4">Cadastro realizado com sucesso!</h2>
        <a href="/livro/<?=$livro_id?>" class="a-custom">Voltar</a>
      <?php endif; ?>
    </div>
  </div>
</div>