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
          <a href="/livro/<?=$item['id']?>" class="btn btn-secondary btn-edit">Editar</a>
        </div>  
        <div>
          <a href="/livro/<?=$item['id']?>" data-livro-id="<?=$item['id']?>" class="btn btn-danger remover-livro">Excluir</a>
        </div>
      </div>
      
    </div>
  </div>
</div>