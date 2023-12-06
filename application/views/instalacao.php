<style>
  .alert {
    padding: 20px;
    background-color: #f76b62;
    color: #000;
    margin-bottom: 15px;
  }
  .info {
    padding: 20px;
    background-color: #28a093;
    color: white;
    margin-bottom: 15px;
  }
  code{
    color: #000;
  }
  i.bi.bi-copy {
    cursor: pointer;
  }
  .copiado {
    transition: color 0.5s ease;
  }
  a{
    color: #000;
    font-weight: bold;
  }
</style>

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 mx-auto mt-5">
        <div class="alert">
          <strong>Atenção:</strong> Para que a aplicação funcione corretamente, é necessário executar o passo 5 das <a href="README.md" target="_blank">instruções.</a>
        </div>

        <div class="info">
          <h5>Execute as migrations necessárias para construir os dados da aplicação:</h5>
          <p>No terminal do projeto /biblio-track cole o código abaixo:</p>
          <code id="codigo">docker-compose exec web php index.php migrate</code>
          <i class="bi bi-copy" onclick="copiarTexto()" id="iconeCopiar"></i>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
   function copiarTexto() {
    var codigo = document.getElementById('codigo');

    var selecao = window.getSelection();
    var intervalo = document.createRange();
    intervalo.selectNodeContents(codigo);
    selecao.removeAllRanges();
    selecao.addRange(intervalo);

    document.execCommand('copy');

    selecao.removeAllRanges();

    var iconeCopiar = document.getElementById('iconeCopiar');
    iconeCopiar.classList.remove('bi-copy');
    iconeCopiar.classList.add('bi-check', 'copiado');

    setTimeout(function() {
      iconeCopiar.classList.remove('bi-check', 'copiado');
      iconeCopiar.classList.add('bi-copy');
    }, 1500);
  }
</script>