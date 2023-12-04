<div class="col mb-2">
  <div class="card card-menu lendo">
    <div class="card-body">
      <h5 class="card-title text-muted text-md cb">Estou Lendo</h5>
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
      <h5 class="card-title text-muted text-md cb">Já li</h5>
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
          <i class="bi bi-thermometer"></i>
          <?=$clima['temp_min']; ?>°C / <?=$clima['temp_max']; ?>°C
          <i class="bi bi-thermometer-high"></i>
        </h5>                   
    </div>
  </div>
</div>