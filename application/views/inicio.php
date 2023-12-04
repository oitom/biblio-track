<section id="slider-section">
    <div class="containder-fluid">
      <h1>
        Seu <em>livro</em> aqui!
      </h1>
      <h6>Gerencie os seus livros de forma fácil em nossa plataforma.</h6>
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