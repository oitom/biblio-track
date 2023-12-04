<!-- Barra de pesquisa -->
<form action="<?php echo base_url('principal/index'); ?>" method="get">
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Pesquise por título, descrição ou nome do autor.." aria-label="Digite sua pesquisa" aria-describedby="button-addon2">  
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
          <select class="form-control" id="categoria" name="categoria">
              <option value="">Todas as Categorias</option>
              <option value="quero ler">Quero Ler</option>
              <option value="ja li">Já Li</option>
              <option value="lendo">Estou Lendo</option>
          </select>
      </div>
    </div>
    <div class="col">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit" id="buscar-btn" >Buscar</button>
      </div>
    </div>
  </div>
</form>

<div class="row">
  <div class="row">
      <div class="col-6">
          <p class="text-muted itc">Foram encontrados <em><?=count($items)?> livros</em> para sua busca.</p>
      </div>
      <div class="col-6">
          <p class="text-muted itc"><a href="/principal">Limpar</a></p>
      </div>
  </div>

  <!-- Items -->
  <?php foreach ($items as $item): ?>
    <div class="col-md-3 mb-4">
      <div class="card card-items-list <?=(str_replace(' ', '_', $item['categoria']))?>">
          <a href="#" data-toggle="modal" data-target="#bookModal<?= $item['id'] ?>">
            <img src="<?= UPLOAD . $item['capa'] ?>" class="card-img-top" alt="Capa do Livro">
          </a>
          <div class="card-body">
            <h5 class="card-title card-items-title">
              <?= $item['titulo'] ?>
              <em><?=ucwords($item['categoria']) ?></em>
            </h5>
            <p class="card-text card-items-desc"><?= (mb_strlen($item['descricao']) > 66 ? mb_substr($item['descricao'], 0, 66) . '...' : $item['descricao'])?></p>
          </div>
      </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="bookModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel<?= $item['id'] ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="bookModalLabel<?= $item['id'] ?>">
                    <?= $item['titulo'] ?>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <p class="modal-desc"><?= $item['descricao'] ?></p>
                <ul class="list-group">
                  <li class="list-group-item">
                    <p class="muted-text">
                      <i class="bi bi-file-person-fill"></i> <?= $item['autor'] ?>
                    </p>
                  </li>
                  <li class="list-group-item">
                    <p class="muted-text">
                      <i class="bi bi-book-half"></i> <?= $item['n_paginas'] ?> páginas
                    </p>
                  </li>
                  <li class="list-group-item">
                    <p class="muted-text">
                      <i class="bi bi-funnel-fill"></i> <?=ucwords($item['categoria']) ?>
                    </p>
                  </li>
                  <li class="list-group-item">
                    <p class="muted-text">
                      <i class="bi bi-calendar-check"></i> <?=date("d/m/Y", strtotime($item['data_cadastro'])) ?>
                    </p>
                  </li>
                </ul>
              </div>
              <div class="modal-footer justify-content-between">
                <div class="mr-auto">
                    <a href="/" class="btn btn-secondary">Editar</a>
                </div>  
                <div>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Excluir</button>
                </div>
              </div>
          </div>
      </div>
  </div>
  
  <?php endforeach; ?>
  <!-- Items -->
</div>

<!-- Paginação -->
<?= $this->pagination->create_links(); ?>
<!-- Paginação -->

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const filtro = urlParams.get('filtro');
  const categoria = urlParams.get('categoria');

  if (filtro) {
    $('#filtro').val(filtro);
  }
  if (categoria) {
    $('#categoria').val(categoria);
  }
</script>