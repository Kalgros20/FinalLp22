<div class="container mt-5">
<div class="row">
    <form method="POST" action="<?= base_url($action) ?>" class="col-md-8 mx-auto">
        <p class="h5 text-center mb-4">Editar Imagem</p>

        <div class="md-form">
            <i class="fa fa-envelope prefix grey-text"></i>
            <input type="text" value="" name="nome" id="nome" class="form-control">
            <label for="produto">Nome da Imagem</label>
        </div>

        <div class="md-form">
            <i class="fa fa-pencil prefix"></i>
            <textarea type="text" name="descricao" id="descricao" class="md-textarea"></textarea>
            <label for="descricao">Descrição</label>
        </div>

   
        <input type="hidden" value="<?= isset($id) ? $id : '' ?>" name="id" class="form-control">
        <div class="text-center">
            <input type="submit" class="btn btn-default" value="Editar" name="submit">
        </div>
    </form>
</row>
</div>