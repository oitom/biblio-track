<div class="col-md-3 mb-4">
  <div class="card card-items-list <?=(str_replace(' ', '_', $item['categoria']))?>">
    <a href="#" data-toggle="modal" data-target="#bookModal<?= $item['id'] ?>" class="a-img">
      
      <?php if (strpos($item['capa'], "books.google") !== false) : ?>
        <img src="<?= $item['capa'] ?>" class="card-img-top" alt="Capa do Livro">
      <? else : ?>
        <img src="<?= UPLOAD . $item['capa'] ?>" class="card-img-top" alt="Capa do Livro">
      <? endif; ?>
    
    </a>
    <div class="card-body">
      <a href="#" data-toggle="modal" data-target="#bookModal<?= $item['id'] ?>" class="wl a-tit">
      <h5 class="card-title card-items-title">
          <?= $item['titulo'] ?>
          <em><?=ucwords($item['categoria']) ?></em>
        </h5>
      </a>
      <a href="#" data-toggle="modal" data-target="#bookModal<?= $item['id'] ?>" class="wl a-desc">
        <p class="card-text card-items-desc"><?= (mb_strlen($item['descricao']) > 60 ? mb_substr($item['descricao'], 0, 60) . '...' : $item['descricao'])?></p>
      </a>
    </div>
  </div>
</div>