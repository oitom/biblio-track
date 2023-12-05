<div class="container mt-5 mb-180">
  <div class="row justify-content-center">

    <div class="col-md-6">
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

          <?php if ($acao_realizada == 1) : ?>
            <div class="alert alert-success">
              <p>Livro <?=($acao== 'adicionar' ? 'cadastrado': 'editado')?> com sucesso!</p>

              <?php if($acao== 'adicionar'):?>
                <script>
                  $(document).ready(function() {
                    setTimeout(function() {
                      window.location.href = '/livro/<?=$livro_id?>';
                    }, 2000);
                  });
                </script>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          
          <?= form_open("livro/$livro_id", ['method' => 'post', 'enctype' => 'multipart/form-data']); ?>
            <div class="row"> 
              
              <div class="col-md-12">
                <div class="form-group">
                  <?= form_label('Título:', 'titulo', ['class' => 'formulario_label']); ?>
                  <?= form_input(['type' => 'text', 'name' => 'titulo', 'id' => 'titulo', 'class' => 'form-control formulario_input', 'required' => 'required', 'maxlength' => '50', 'value' => set_value('nome', $dados['titulo'])]); ?>
                </div>
                <div id="sugestoes"></div>
                
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
                  <?= form_upload(['name' => 'capa', 'id' => 'capa', 'class' => 'form-control', 'accept' => 'image/*', 'onchange' => 'exibirImagemSelecionada()']); ?>
                  <input type="hidden" name="capa-externa" id="capa-externa">
                </div>
              </div>

              
              <div class="col-md-6">
                <div class="form-group">
                  <?= form_label('Capa do livro atual:', 'capa_atual', ['class' => 'formulario_label']); ?>

                  <?php if (strpos($dados['capa'], "books.google") !== false) : ?>
                    <img id="imagemLivro" src="<?= $dados['capa'] ?>" class="card-img-top" alt="Capa do Livro">
                  <? else : ?>
                      <img id="imagemLivro" src="<?= UPLOAD . $dados['capa'] ?>" class="card-img-top" alt="Capa do Livro">
                  <? endif; ?>
                </div>
              </div>
              
            </div>

            <div class="row mt-5">
                <div class="col">
                    <?= form_submit(['type' => 'submit', 'value' => ($acao == 'adicionar' ? 'Cadastrar' : 'Atualizar'), 'class' => 'btn btn-primary formulario_btn']); ?>
                </div>
            </div>
          <?= form_close(); ?>
        </div>
    </div>
  </div>
</div>
<script>
  function exibirImagemSelecionada() {
        var inputImagem = document.getElementById('capa');
        var imagemLivro = document.getElementById('imagemLivro');

        if (inputImagem.files && inputImagem.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function (e) {
              console.log(e);
              console.log(e.target.result);
              imagemLivro.src = e.target.result;
            };

            leitor.readAsDataURL(inputImagem.files[0]);
        }
    }
</script>
<script>
$(document).ready(function () {
  $('#titulo').on('keyup', function () {
    var titulo = $('#titulo').val();
    var apiKey = 'AIzaSyDabVqrVFkIBJgJ9kFPQ20Rv7KBMRR2tiY';
    var apiUrl = 'https://www.googleapis.com/books/v1/volumes?q=' + encodeURIComponent(titulo) + '&key=' + apiKey;
    var livros = [];

    if (titulo.length >= 5) {
      $.ajax({
          url: apiUrl,
          type: 'GET',
          dataType: 'json',
          success: function (data) {
              $('#sugestoes').html("");

              if (data.items) {
                  for (var i = 0; i < Math.min(5, data.items.length); i++) {
                      var livro = data.items[i];
                      var tituloLivro = livro.volumeInfo.title;
                      var capaLivro = livro.volumeInfo.imageLinks ? livro.volumeInfo.imageLinks.thumbnail : '';
                      livros.push(livro);

                      var sugestao = $('<div id="s-'+i+'" class="sugestao"">');
                      sugestao.append('<img src="' + capaLivro + '" alt="Capa do livro">');
                      sugestao.append('<p>' + tituloLivro + '</p>');                      

                      sugestao.click(function () {
                        var idx = $(this).attr('id').split('-')[1];
                        var livroClicado = livros[idx];
                        
                        $('#titulo').val($(this).next('p').text());
                        $('#sugestoes').empty();
                        exibirInformacoesLivro(livroClicado);
                      });
                      $('#sugestoes').append(sugestao);
                  }
              }
          },
          error: function (error) {
            console.log('Erro na solicitação AJAX:', error);
          }
      });
    }
  });

  function exibirInformacoesLivro(livro) {
    var tituloLivro = livro.volumeInfo.title;
    var descricaoLivro = livro.volumeInfo.description ? livro.volumeInfo.description : '';
    var autorLivro = livro.volumeInfo.authors ? livro.volumeInfo.authors.join(', ') : '';
    var numPaginasLivro = livro.volumeInfo.pageCount ? livro.volumeInfo.pageCount : '';
    var capaLivro = livro.volumeInfo.imageLinks ? livro.volumeInfo.imageLinks.thumbnail : '';
    
    $("#titulo").val(tituloLivro);
    $("#descricao").val(descricaoLivro);
    $("#autor").val(autorLivro);
    $("#n_paginas").val(numPaginasLivro);
    
    if(capaLivro != '') {
      $("#imagemLivro").attr('src', capaLivro);
      $("#capa-externa").val(capaLivro);
    }
  }
});
</script>