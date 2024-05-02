<?php
include ("./conexao.php");
include ("./bd/bd_estatisticas.php");
$dados = new BD_Estatisticas();
$total_Usuarios = $dados->getTotalUsuarios();
$total_Reservas = $dados->getTotalReservas();
$total_Hoteis = $dados->getTotalHoteis();
$total_Clientes = $dados->getTotalClientes();
$query = "select * from tb_reserva_passeio";
$result = mysqli_query(estabelecerConexao(), $query);
while ($row = mysqli_fetch_assoc($result)) {
    $reservas[] = $row;
}
?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
                <div class="row">


                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Usuarios</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo $total_Usuarios; ?></h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                            class="fa fa-fw fa-arrow-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Clientes</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">560</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                            class="fa fa-fw fa-arrow-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Hóspedes</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">320</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                            class="fa fa-fw fa-arrow-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Reservas</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">57</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                    <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                            class="fa fa-fw fa-arrow-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Reservas Recentes</h5>
                            <div class="card-body p-0">
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
                                                        <td>Kz800.00</td>
                                                        <td><span class="badge-dot badge-brand mr-1"></span>Confirmada
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <tr>
                                                <td colspan="7"><a href="#"
                                                        class="btn btn-outline-light float-right">Ver
                                                        Detalhes</a></td>
                                            </tr>
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
</div>