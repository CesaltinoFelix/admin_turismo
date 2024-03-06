<?php
include_once("./models/model_postagem.php");
include("./conexao.php");
include("./bd/bd_postagem.php");
$id_postagem = $_GET['id'];
$dados = new BD_Postagem();
$postagem = $dados->getPostagem($id_postagem);
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Editando Postagem "
                            <?php echo $postagem['titulo']; ?>"
                        </h3>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de Edição</h5>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['mensagem_sucesso'])) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        ' . $_SESSION['mensagem_sucesso'] . '
                                        </div>';
                                unset($_SESSION['mensagem_sucesso']);
                            }
                            if (isset($_SESSION['mensagem_erro'])) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    ' . $_SESSION['mensagem_erro'] . '
                                    </div>';
                                unset($_SESSION['mensagem_erro']);
                            }
                            ?>
                            <div class="p-xs">
                                <form action="./controllers/controller_postagem.php" method="POST"
                                    enctype="multipart/form-data" id="cadastroPostForm">
                                    <input type="hidden" name="id" value="<?php echo $id_postagem; ?>" id="">
                                    <input type="hidden" name="img_capa_antiga"
                                        value="<?php echo $postagem['img_capa']; ?>" id="">
                                    <input type="hidden" name="id_postagem" value="<?php echo $id_postagem; ?>" id="">
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Titulo</label>
                                        <input id="inputNome" value="<?php echo $postagem['titulo']; ?>" name="titulo"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Imagem de Capa</label>
                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Resumo</label>
                                        <input id="inputNome" value="<?php echo $postagem['resumo']; ?>" name="resumo"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNome" class="col-form-label">Descrição</label>
                                        <textarea name="descricao" id="conteudo" class="form-control summernote">
                                            <?php echo $postagem['descricao']; ?>
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: #34a854;">Salvar Alteração</button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="limparForm()">Cancelar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>