<?php
include_once ("./models/model_usuario.php");
include ("./conexao.php");
include ("./bd/bd_usuario.php");
$dados = new BD_Usuario();
$usuarios = $dados->getUsuarios();
?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Lista de Usuários</h3>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Usuários Cadastrados</h5>
                        <div class="card-body">
                            <?php
                            if (isset ($_SESSION['mensagem_sucesso'])) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        ' . $_SESSION['mensagem_sucesso'] . '
                                        </div>';
                                unset($_SESSION['mensagem_sucesso']);
                            }
                            if (isset ($_SESSION['mensagem_erro'])) {
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
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $usuario['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $usuario['nome']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $usuario['email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $usuario['contacto']; ?>
                                                </td>
                                                <td><span
                                                        class="badge badge-<?php echo ($usuario['status'] == '1') ? 'success' : 'danger'; ?>">
                                                        <?php echo ($usuario['status'] == '1') ? 'Ativo' : 'Bloqueado'; ?>
                                                    </span></td>
                                                <td>
                                                    <?php
                                                    if ($usuario['status'] == 1):
                                                        ?>
                                                        <a href="./controllers/controller_usuario.php?bloquearOuDesbloquer=0&id=<?php echo $usuario['id']; ?>"
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Bloquear"> <i
                                                                class="fas fa-user-times"></i>
                                                        </a>
                                                        <?php
                                                    endif;
                                                    ?>
                                                    <?php
                                                    if ($usuario['status'] == 0):
                                                        ?>
                                                        <a href="./controllers/controller_usuario.php?bloquearOuDesbloquer=1&id=<?php echo $usuario['id']; ?>"
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Desbloquear"> <i
                                                                class="fas fa-user-times"></i>
                                                        </a>
                                                        <?php
                                                    endif;
                                                    ?>
                                                    <a href="?r=editar-usuario&id=<?php echo $usuario['id']; ?>"
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Editar"> <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="./controllers/controller_usuario.php?delete=true&id=<?php echo $usuario['id']; ?>"
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