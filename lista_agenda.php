<?php
include ("./conexao.php");
$query = "select * from tb_reserva_passeio";
$result = mysqli_query(estabelecerConexao(), $query);
while ($row = mysqli_fetch_assoc($result)) {
    $reservas[] = $row;
}
?>


<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Lista de Agenda de Passeio</h3>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Passeios</h5>
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
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Utente</th>
                                            <th class="border-0">Contacto</th>
                                            <th class="border-0">Provincia</th>
                                            <th class="border-0">Data</th>
                                            <th class="border-0">N. Pessoas</th>
                                            <th class="border-0">Valor</th>
                                            <th class="border-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($reservas))

                                            foreach ($reservas as $dado): ?>
                                                <tr>
                                                    <td><?php echo $dado['nome'] ?></td>
                                                    <td><?php echo $dado['contacto'] ?></td>
                                                    <td><?php echo $dado['ponto_turistico'] ?></td>
                                                    <td><?php echo $dado['data_reserva'] ?></td>
                                                    <td><?php echo $dado['numero_pessoas'] ?></td>
                                                    <td><?php echo $dado['numero_pessoas'] ?></td>
                                                    <td><span class="badge-dot badge-brand mr-1"></span>
                                                        <a href="./controllers/controller_postage.php?delete=true&id=<?php echo $postagem['id']; ?>"
                                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="confirmar"> Confirmar
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