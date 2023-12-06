<?php $this->load->view('components/pesquisa-livros'); ?>

<div class="row">

  <div class="row">
    <?php $this->load->view('components/resultados-pesquisa'); ?>
  </div>

  <?php if($total_geral == 0) : ?>
    <?php $this->load->view('components/nenhum-livro'); ?>
  <? endif; ?>
  

  <?php foreach ($items as $item): ?>
    <?php $this->load->view('components/item-livro',  array("item"=> $item)); ?>
    <?php $this->load->view('components/modal-livro',  array("item"=> $item)); ?> 
  <?php endforeach; ?>

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

  $(document).ready(function() {
    $(".remover-livro").click(function(e) {
      e.preventDefault();
      const livro_id = $(this).data('livro-id');
      const confirmacao = confirm('Tem certeza que deseja excluir este livro?');
      
      if (confirmacao) {
        window.location.href = '/livro/excluir/' + livro_id;
      }
    });
  });
</script>