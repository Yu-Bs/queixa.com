<?php
include_once './conexaoDatabase.php';
include_once './usuario.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <title>Queixa.com</title>
</head>

<body>
  <!--cor de fundo-->
  <div class="p-3 mb-2 bg-info-subtle text-info-emphasis" style="height: 100vh;">

    <!--Barra navegação-->
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
            <input class="form-control me-2" type="search" placeholder="Busque por empresas" aria-label="Search">
            <button class="btn btn-outline-custom" type="submit">Buscar</button>
          </form>

          <!-- Botões para redirecionar -->
          <div class="d-flex">
            <a href="loginEmpCon.php" class="btn btn-outline-custom">Entrar</a>
            <a href="#" class="btn btn-outline-custom ms-2">Cadastrar</a>
          </div>
        </div>
      </div>
    </nav>

    <!--texto a direita na tela-->
    <div style="position: absolute; right: 50px; top: 50%; transform: translateY(-50%); color:black">
      <p class="fs-1 text-center">Ainda não possui cadastro?</p>
      <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Cadastrar-se</button>
      </div>
    </div>


    <!--card de fundo-->
    <div class="container mt-5">
      <div class="card shadow p-4" style="max-width: 400px;">
        <h4 class="text-center mb-4">Vamos entrar na sua conta!</h4>

        <?php if (isset($_SESSION['msg'])) { ?>
          <tr>
            <td colspan="2" style="color: red;">
              <?php echo $_SESSION['msg']; ?></td>
          </tr>
        <?php
          session_destroy();
        } ?>

        <!--email, senha e botão-->
        <form action="ValidacaoUsu.php" method="POST">
          <div class="mb-3 text-start">
            <label for="staticEmail" class="form-label">E-mail</label>
            <input type="email" name="usuario" class="form-control" id="staticEmail" placeholder="Digite seu Email">
          </div>
          <div class="mb-3 text-start">
            <label for="inputPassword" class="form-label">Senha</label>
            <input type="password" name="senhaUsuario" class="form-control" id="inputPassword" placeholder="Digite sua senha">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>