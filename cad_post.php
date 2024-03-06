<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Cadastro de Postagem</h3>
                        <p>Preencha o formulário abaixo para cadastrar uma nova postagem.</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Cadastro</h5>
                        <div class="card-body">
                            <div class="p-xs">
                                <form action="./controllers/controller_postagem.php" method="POST" enctype="multipart/form-data" id="cadastroPostForm">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Titulo</label>
                                        <input id="inputNome" name="titulo" type="text" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Imagem de Capa</label>
                                        <input type="file" class="form-control" required name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Resumo</label>
                                        <input id="inputNome" name="resumo" type="text" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Descrição</label>
                                        <textarea name="descricao" id="conteudo"
                                            class="form-control summernote"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <button type="button" class="btn btn-secondary" onclick="limparForm()">Cancelar</button>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function limparForm() {
        document.getElementById('cadastroPostForm').reset();
        $('.summernote').summernote('destroy');
        $('#conteudo').val('');
        $('.summernote').summernote({
            height: 250
        });
    }
</script>