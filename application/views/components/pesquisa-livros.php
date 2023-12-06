<form action="<?php echo base_url('livro/meus-livros'); ?>" method="get">
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Pesquise por título, descrição ou nome do autor.." aria-label="Digite sua pesquisa" aria-describedby="button-addon2">  
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <select class="form-control mb-3" id="categoria" name="categoria">
          <option value="">Todas as Categorias</option>
          <option value="lendo">Estou Lendo</option>
          <option value="quero ler">Quero Ler</option>
          <option value="ja li">Já Li</option>
        </select>
      </div>
    </div>
    <div class="col">
      <div class="input-group-append">
        <button class="btn btn-primary mb-3" type="submit" id="buscar-btn" >Buscar</button>
      </div>
    </div>
  </div>
</form>