<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Agendar Passeio</h3>
                        <p>Preencha o formulário abaixo para agendar passeio.</p>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Formulário de agendamento</h5>
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

                            <form id="cadastroUsuarioForm" method="POST" action="./controllers/controller_agenda.php"
                                autocomplete="off">
                                <div class="form-group">
                                    <label for="inputNome" class="col-form-label">Provincia</label>
                                    <select id="provincia" required  class="form-control" name="provincia">
                                        <option value="bengo">Bengo</option>
                                        <option value="benguela">Benguela</option>
                                        <option value="bie">Bié</option>
                                        <option value="cabinda">Cabinda</option>
                                        <option value="cuando_cubango">Cuando Cubango</option>
                                        <option value="cuanza_norte">Cuanza Norte</option>
                                        <option value="cuanza_sul">Cuanza Sul</option>
                                        <option value="cunene">Cunene</option>
                                        <option value="huambo">Huambo</option>
                                        <option value="huila">Huíla</option>
                                        <option selected value="luanda">Luanda</option>
                                        <option value="lunda_norte">Lunda Norte</option>
                                        <option value="lunda_sul">Lunda Sul</option>
                                        <option value="malanje">Malanje</option>
                                        <option value="moxico">Moxico</option>
                                        <option value="namibe">Namibe</option>
                                        <option value="uige">Uíge</option>
                                        <option value="zaire">Zaire</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="inputEmail">Data do Passeio</label>
                                    <input id="data" name="data" min="dataMinima()" type="date" 
                                        class="form-control" required>
                                    <small class="form-text text-muted"> Data de inicio do passeio</small>
                                </div>
                                <div class="form-group">
                                        <label for="inputEmail">Total de Vagas</label>
                                    <input id="vaga_total" name="vaga_total" min="1" type="number" 
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label for="inputEmail">Valor Unitario</label>
                                    <input id="valor" name="valor" min="1" type="number" 
                                        class="form-control" required>
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

<script>

function dataMinima() {
            let hoje = new Date();
            let dd = hoje.getDate();
            let mm = hoje.getMonth() + 1; // Janeiro é 0!
            let yyyy = hoje.getFullYear();

            if (dd < 10) {
                dd = '0' + dd;
            }

            if (mm < 10) {
                mm = '0' + mm;
            }

            return yyyy + '-' + mm + '-' + dd;
        }

        document.getElementById('data').setAttribute('min', dataMinima());
    // Função para limpar o formulário
    function limparForm() {
        document.getElementById('cadastroUsuarioForm').reset();
        document.getElementById('senhaFeedback').textContent = '';
    }
</script>