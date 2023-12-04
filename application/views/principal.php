<section id="main-section">
  <div class="container col-md-10 mx-auto mt-3">
    <div class="row">
      <div class="col">
        <p class="text-muted text-sm">Olá <?=$header["session_data"]["user_nome"];?>, bem-vindo ao <em>Biblio Track!</em></p>
      </div>
      <div class="col-md-3 col-sm-8">
        <div class="card">
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
<?php
