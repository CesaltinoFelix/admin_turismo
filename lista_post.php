<?php
include_once("./models/model_postagem.php");
include("./conexao.php");
include("./bd/bd_postagem.php");
$dados = new BD_postagem();
$postagens = $dados->getAllPostagens();
?>


<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Lista de Postagens</h3>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Postagens</h5>
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
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Img Capa</th>
                                            <th>Título</th>
                                            <th>Data</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($postagens as $postagem): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $postagem['id']; ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo "./uploads/" . $postagem['img_capa']; ?>"
                                                        alt="Imagem de Capa" width="100">
                                                </td>
                                                <td>
                                                    <?php echo $postagem['titulo']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $postagem['data']; ?>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Visualizar"> <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="?r=editar-post&id=<?php echo $postagem['id']; ?>"
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"> <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="./controllers/controller_postagem.php?delete=true&id=<?php echo $postagem['id']; ?>"
                                                        class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Excluir"> <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>