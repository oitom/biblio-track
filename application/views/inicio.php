<section id="slider-section">
    <div class="containder-fluid">
      <h1>
        O seu <em>livro</em><br>
        <em>favorito</em> está <em>aqui!</em>
      </h1>
      <h6>Econtre uma variedade de livros em nossa plataforma.</h6>
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