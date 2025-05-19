<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <title>Queixa.com</title>
    <!-- No <head> ou antes do </body> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/cadastro.js"></script> <!-- Arquivo externo -->
    <link rel="stylesheet" href="css/navBar.css">
    <link rel="stylesheet" href="css/cadastroEmpresa.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="MenuPrincipal.php">Queixa.com</a>
            <!-- Botão que aparece em telas pequenas para abrir/fechar o menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Itens que irão para o botão acima -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <form class="d-flex mx-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-custom" type="submit">Search</button>
                </form>
                <!-- Botões para redirecionar -->
                <div class="d-flex align-items-center gap-2">
                    <span class="text-muted">Já tem cadastro?</span>
                    <a href="loginEmpCon.php" class="btn btn-outline-custom">Entrar</a>
                </div>
            </div>
        </div>
    </nav>

   
</body>

</html>