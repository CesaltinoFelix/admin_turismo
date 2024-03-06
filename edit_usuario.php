<?php
include_once("./models/model_usuario.php");
include("./conexao.php");
include("./bd/bd_usuario.php");
$id_usuario = $_GET['id'];
$dados = new BD_Usuario();
$usuario = $dados->getUsuario($id_usuario);
?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Editando Usuário "<?php echo $usuario['nome']; ?>"</h3>
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

                            <form id="cadastroUsuarioForm" method="POST" action="./controllers/controller_usuario.php"
                                autocomplete="off">
                                <input type="hidden" name="id" value="<?php echo $id_usuario; ?>" id="">
                                <div class="form-group">
                                    <label for="inputNome" class="col-form-label">Nome</label>
                                    <input id="inputNome" value="<?php echo $usuario['nome']; ?>" name="nome"
                                        type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Endereço de Email</label>
                                    <input id="inputEmail" name="email" value="<?php echo $usuario['email']; ?>"
                                        type="email" placeholder="exemplo@dominio.com" class="form-control" required>
                                    <small class="form-text text-muted">Nós nunca compartilharemos seu e-mail
                                        com
                                        ninguém.</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputTelefone">Telefone</label>
                                    <input id="inputTelefone" name="contacto"
                                        value="<?php echo $usuario['contacto']; ?>" type="tel"
                                        placeholder="(+244) 999-999-999" class="form-control" required>
                                    <small class="form-text text-muted">Formato esperado: (+244)
                                        999-999-999</small>
                                </div>
                                <button type="submit" class="btn btn-success">Editar</button>
                                <button type="button" class="btn btn-secondary" onclick="limparForm()">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Função para verificar se a senha e a confirmação da senha são iguais
    document.getElementById('inputConfirmaSenha').addEventListener('keyup', function () {
        var senha = document.getElementById('inputSenha').value;
        var confirmSenha = document.getElementById('inputConfirmaSenha').value;
        var senhaFeedback = document.getElementById('senhaFeedback');
        if (senha === confirmSenha) {
            senhaFeedback.textContent = 'As senhas coincidem.';
            senhaFeedback.classList.remove('text-danger');
            senhaFeedback.classList.add('text-success');
        } else {
            senhaFeedback.textContent = 'As senhas não coincidem.';
            senhaFeedback.classList.remove('text-success');
            senhaFeedback.classList.add('text-danger');
        }
    });

    // Função para limpar o formulário
    function limparForm() {
        document.getElementById('cadastroUsuarioForm').reset();
        document.getElementById('senhaFeedback').textContent = '';
    }
</script>