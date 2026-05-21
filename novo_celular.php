<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'config/conexao.php';

        $fabricante = isset($_POST['fabricante']) ? trim($_POST['fabricante']) : '';
        $modelo = isset($_POST['modelo']) ? trim($_POST['modelo']) : '';
        $memoria = isset($_POST['memoria']) ? (int) $_POST['memoria'] : 0;

        if ($fabricante !== '' && $modelo !== '' && $memoria > 0) {
            $stmt = $conexao->prepare("INSERT INTO celulares (fabricante, modelo, memoria) VALUES (?, ?, ?)");

            if ($stmt === false) {
                die('Erro ao preparar cadastro do celular: ' . $conexao->error);
            }

            $stmt->bind_param('ssi', $fabricante, $modelo, $memoria);

            if (!$stmt->execute()) {
                die('Erro ao cadastrar celular: ' . $stmt->error);
            }

            $stmt->close();
            $conexao->close();

            header('Location: celulares.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php
     require_once 'config/header.php';
?>

<body class="nav-md">
<div class="body">
    <div class="main_container container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 left_col">
                <div class="left_col">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <?php
                        require_once  'config/sidemenu.php';
                    ?>

                </div>
            </div>
            <div class="col-lg-10 col-md-12 right_col_wrapper">
                <div class="row">

                    <?php
                        require_once 'config/topmenu.php';
                        require_once 'paginas/novo_celular.php';
                        require_once 'config/footer.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
        require_once 'config/scripts.php';
    ?>
</body>
</html>
