<?php
    require_once 'config/conexao.php';

    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $celular = null;

    if ($id > 0) {
        $stmt = $conexao->prepare("SELECT id, fabricante, modelo, memoria FROM celulares WHERE id = ?");

        if ($stmt === false) {
            die('Erro ao preparar consulta do celular: ' . $conexao->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $celular = $result->fetch_assoc();

        $stmt->close();
    }
?>

                    <!-- page content -->
                    <div class="col-lg-12 col-md-12 right_col" role="main">
                        <div class="">
                            <div class="page-title row">
                                <div class="col-sm-6 col-12 text-left">
                                    <h3>Editar Celular</h3>
                                </div>

                                <div class="col-sm-6 col-12 text-right">
                                    <div class="row">
                                        <div class="offset-xl-7 col-xl-5 col-lg-12 col-md-12 col-sm-5 col-12 form-group pull-right top_search mt-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Procurar por...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-light" type="button">Ir!</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Dados do Celular</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Configuração 1</a>
                                                        </li>
                                                        <li><a href="#">Configuração 2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <br>
                                            <?php if ($celular) { ?>
                                                <form class="form-horizontal form-label-left" method="post" action="editar_celular.php">
                                                    <input type="hidden" name="id" value="<?php echo (int) $celular['id']; ?>">

                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-12" for="fabricante">Fabricante</label>
                                                        <div class="col-md-6 col-sm-9 col-12">
                                                            <input type="text" id="fabricante" name="fabricante" class="form-control" value="<?php echo htmlspecialchars($celular['fabricante']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-12" for="modelo">Modelo</label>
                                                        <div class="col-md-6 col-sm-9 col-12">
                                                            <input type="text" id="modelo" name="modelo" class="form-control" value="<?php echo htmlspecialchars($celular['modelo']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3 col-sm-3 col-12" for="memoria">Memória</label>
                                                        <div class="col-md-6 col-sm-9 col-12">
                                                            <input type="number" id="memoria" name="memoria" class="form-control" value="<?php echo (int) $celular['memoria']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="ln_solid"></div>

                                                    <div class="form-group row">
                                                        <div class="col-md-6 col-sm-9 col-12 offset-md-3">
                                                            <a href="celulares.php" class="btn btn-secondary">Cancelar</a>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-save"></i> Salvar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php } else { ?>
                                                <div class="alert alert-warning" role="alert">
                                                    Celular não encontrado.
                                                </div>
                                                <a href="celulares.php" class="btn btn-secondary">Voltar</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page content -->
