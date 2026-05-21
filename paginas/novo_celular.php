                    <!-- page content -->
                    <div class="col-lg-12 col-md-12 right_col" role="main">
                        <div class="">
                            <div class="page-title row">
                                <div class="col-sm-6 col-12 text-left">
                                    <h3>Novo Celular</h3>
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
                                            <h2>Cadastro de Celular</h2>
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
                                            <form class="form-horizontal form-label-left" method="post" action="novo_celular.php">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-12" for="fabricante">Fabricante</label>
                                                    <div class="col-md-6 col-sm-9 col-12">
                                                        <input type="text" id="fabricante" name="fabricante" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-12" for="modelo">Modelo</label>
                                                    <div class="col-md-6 col-sm-9 col-12">
                                                        <input type="text" id="modelo" name="modelo" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-12" for="memoria">Memória</label>
                                                    <div class="col-md-6 col-sm-9 col-12">
                                                        <input type="number" id="memoria" name="memoria" class="form-control" required min="1">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page content -->
