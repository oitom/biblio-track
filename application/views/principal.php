<section id="main-section">
  <div class="container mx-auto mt-3">
    <div class="row">
      <div class="col mb-2">
        <!-- <p class="text-muted text-sm">Olá <?=$header["session_data"]["user_nome"];?>, bem-vindo ao <em>Biblio Track!</em></p> -->
        <div class="card card-menu lendo">
          <div class="card-body">
            <h5 class="card-title text-muted text-md cb">Lendo atualmente</h5>
            <p class="text-sm"><?=$categorias["lendo"]?> Livro(s)</p>
          </div>
        </div>
      </div>

      <div class="col mb-2">
        <div class="card card-menu quero_ler">
          <div class="card-body">
            <h5 class="card-title text-muted text-md cb">Quero ler</h5>
            <p class="text-sm"><?=$categorias["quero ler"]?> livro(s)</p>
          </div>
        </div>
      </div>

      <div class="col mb-2">
        <div class="card card-menu ja_li">
          <div class="card-body">
            <h5 class="card-title text-muted text-md cb">Já lidos</h5>
            <p class="text-sm"><?=$categorias["ja li"]?> livro(s)</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12 mb-2">
        <div class="card clima_tempo">
          <div class="card-body">
              <h5 class="card-title text-muted text-sm cb">
                <?=$clima['temperatura_atual']; ?>°C
                <img src="<?=$clima['temp_img']; ?>" class="img-fluid imgsm">
                <?=$clima['cidade']; ?>
              </h5>

              <h5 class="card-title text-muted text-sm">
                <?=$clima['descricao']; ?>

                <img src="<?=IMAGES?>temperature_min.png" class="imgsmm">
                <?=$clima['temp_min']; ?>°C / <?=$clima['temp_max']; ?>°C
                <img src="<?=IMAGES?>temperature_max.png" class="imgsmm">
              </h5>                   
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<section id="book">
  <div class="container mt-5 mb-180">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Barra de pesquisa -->
            <form action="<?php echo base_url('principal/index'); ?>" method="get">
              <div class="input-group mb-3">
                <input type="text" name="filtro" class="form-control" placeholder="Pesquise por titulo, descricao ou nome do autor.." aria-label="Digite sua pesquisa" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
              </div>
            </form>

            <div class="row">
              <!-- Items -->
              <?php foreach ($items as $item): ?>
                <div class="col-md-3 mb-4">
                  <div class="card card-items-list <?=(str_replace(' ', '_', $item['categoria']))?>">
                      <a href="#" data-toggle="modal" data-target="#bookModal<?= $item['id'] ?>">
                        <img src="<?= UPLOAD . $item['capa'] ?>" class="card-img-top" alt="Capa do Livro">
                      </a>
                      <div class="card-body">
                        <h5 class="card-title card-items-title"><?= $item['titulo'] ?></h5>
                        <p class="card-text card-items-desc"><?= (mb_strlen($item['descricao']) > 66 ? mb_substr($item['descricao'], 0, 66) . '...' : $item['descricao'])?></p>
                      </div>
                  </div>
                </div>

              <!-- Modal -->
              <div class="modal fade" id="bookModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel<?= $item['id'] ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="bookModalLabel<?= $item['id'] ?>">Detalhes do Livro: <?= $item['titulo'] ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <!-- Adicione aqui o conteúdo detalhado do livro, como imagem, autor, etc. -->
                              <p><?= $item['descricao'] ?></p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
        </div>
    </div>
  </div>
</section>