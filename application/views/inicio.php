<section id="slider-section">
    <div class="containder-fluid">
      <h1>
        Organize sua<br>jornada <em>literária!</em>
      </h1>
      <h6> O Biblio Track é o seu companheiro perfeito para gerenciar os livros que você já leu, aqueles que deseja ler e os que estão atualmente em suas mãos.</h6>
      <div class="btns-home">
        <a href="/login">Login</a>
        <a href="/cadastre-se">Cadastar-se</a>
      </div>
    </div>
</section>
<script>
  $(document).ready(function() {
    handleResize();
    $(window).resize(function() {
      handleResize();
    });
  });

  function handleResize() {
    let ht = $(window).height();
    let nw = (ht - 60 - 65);
    $("#slider-section").css("min-height", nw +"px");
  }
</script>