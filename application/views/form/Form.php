<br><br>
<div class="container">
    <form method="post" enctype="multipart/form-data" action="<?= base_url($action) ?>">

        <p class="h5 text-center mb-4">Gerenciador de Imagens</p>

        <div class="md-form">
            <i class="fa fa-envelope prefix grey-text"></i>
            <input type="text" id="defaultForm-email" class="form-control" name="descricao">
            <label for="defaultForm-email">Descrição</label>
        </div>

        <div class="file-field">
            <div class="btn btn-primary btn-sm">
                <label for="butao">
                    <span>Choose file</span>
                </label>
                <input type="file" name="file" id="butao" style="display: none;">
            </div>
        </div>

        <div class="text-center">
            <input type="submit" class="btn btn-unique" name="submit">
        </div>
    </form>
    <?php echo $lista ?>
</div>