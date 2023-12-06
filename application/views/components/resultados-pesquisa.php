<div class="col-6">
  <?php if($total_geral > 0) : ?>
    <p class="text-muted itc">Foram encontrados <em><?=$total?> livros</em> para sua busca.</p>
  <? endif; ?>
</div>
<div class="col-6">
  <?php if(isset($_GET['filtro']) || isset($_GET['categoria'])) : ?>
    <p class="text-muted itc"><a href="/livro/meus-livros">Limpar</a></p>
  <? endif; ?>
</div>