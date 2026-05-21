<?php
    require_once 'config/conexao.php';

    $sql = "SELECT id, fabricante, modelo, memoria FROM celulares ORDER BY id";
    $result = $conexao->query($sql);

    if ($result === false) {
        die('Erro ao carregar celulares: ' . $conexao->error);
    }
?>

                    <!-- page content -->
                    <div class="col-lg-12 col-md-12 right_col" role="main">
                        <div class="">
                            <div class="page-title row">
                                <div class="col-sm-6 col-12 text-left">
                                    <a href="novo_celular.php" class="btn btn-success mt-3">
                                        <i class="fa fa-plus"></i> Novo Celular
                                    </a>
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
                                            <h2>Lista de Celulares</h2>
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

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fabricante</th>
                                                    <th>Modelo</th>
                                                    <th>Memória</th>
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($result->num_rows > 0) { ?>
                                                    <?php while ($celular = $result->fetch_assoc()) { ?>
                                                        <tr>
                                                            <th scope="row"><?php echo (int) $celular['id']; ?></th>
                                                            <td><?php echo htmlspecialchars($celular['fabricante']); ?></td>
                                                            <td><?php echo htmlspecialchars($celular['modelo']); ?></td>
                                                            <td><?php echo (int) $celular['memoria']; ?></td>
                                                            <td>
                                                                <a href="editar_celular.php?id=<?php echo (int) $celular['id']; ?>" class="btn btn-info btn-sm" title="Editar">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button
                                                                    type="button"
                                                                    class="btn btn-danger btn-sm btn-excluir-celular"
                                                                    title="Excluir"
                                                                    data-toggle="modal"
                                                                    data-target="#modalExcluirCelular"
                                                                    data-id="<?php echo (int) $celular['id']; ?>"
                                                                    data-modelo="<?php echo htmlspecialchars($celular['modelo'], ENT_QUOTES); ?>">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Nenhum celular cadastrado.</td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalExcluirCelular" tabindex="-1" role="dialog" aria-labelledby="modalExcluirCelularLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalExcluirCelularLabel">Excluir celular</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir o celular <strong id="nomeCelularExcluir"></strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form method="post" action="celulares.php" class="m-0">
                                        <input type="hidden" name="acao" value="excluir">
                                        <input type="hidden" name="id" id="idCelularExcluir" value="">
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        (function () {
                            var botoesExcluir = document.querySelectorAll('.btn-excluir-celular');
                            var campoIdExcluir = document.getElementById('idCelularExcluir');
                            var nomeCelularExcluir = document.getElementById('nomeCelularExcluir');

                            for (var i = 0; i < botoesExcluir.length; i++) {
                                botoesExcluir[i].addEventListener('click', function () {
                                    campoIdExcluir.value = this.getAttribute('data-id');
                                    nomeCelularExcluir.textContent = this.getAttribute('data-modelo');
                                });
                            }
                        })();
                    </script>
                    <!-- /page content -->
