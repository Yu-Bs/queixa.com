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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="MenuPrincipal.php">Queixa.com</a>
                        <!-- Dropdown do perfil (usuário logado) -->
                        <div class="btn-group">
                            <!-- Botão com imagem -->
                            <button class="btn btn-secondary btn-lg d-flex align-items-center" type="button">
                                <img src="img/perfilUsuario.png" alt="Botão" style="width: 30px; height: 30px;" class="me-2">
                                <!-- Nome do usuário logado-->
                                <?php
                                if (isset($_SESSION['user'])) {
                                    if (property_exists($_SESSION['user'], 'nomeUsuario')) {
                                        echo htmlspecialchars($_SESSION['user']->nomeUsuario);
                                    } elseif (property_exists($_SESSION['user'], 'nomeEmpresa')) {
                                        echo htmlspecialchars($_SESSION['user']->nomeEmpresa);
                                    }
                                }
                                ?>
                            </button>

                            <!-- Ícone do dropdown -->
                            <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>

                            <!-- Menu dropdown -->
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php">Deslogar</a></li>
                                <li><a class="dropdown-item" href="#">Minhas Reclamações</a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
</nav>

  <div class="container mt-4">
    <div class="row">
      <!-- Coluna da esquerda -->
      <div class="col-md-6">
        <!-- Campo de empresa -->
        <div class="input-group mb-3">
          <label for="categoriaSelect" class="form-label">Qual a empresa referente?</label>
            <select class="form-select">
              <option selected>Escolher...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>

        <!-- Nota -->
        <div class="input-group mb-3" style="max-width: 150px;">
          <input type="number" class="form-control" min="0" max="10" step="0.1" placeholder="0.0" />
          <span class="input-group-text">/10</span>
        </div>

        <!-- Campo de categoria -->
        <div class="input-group mb-3">
          <p class="fs-5 text-start">Em qual categoria você enquadraria sua queixa?</p>
          <label class="input-group-text">Selecione aqui:</label>
          <select class="form-select">
            <option selected>Escolher...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>

      <!-- Coluna da direita -->
      <div class="col-md-6">
        <!-- Produto ou não -->
        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
          <label class="form-check-label" for="radioDefault1">
            Sim, é referente a um produto
          </label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
          <label class="form-check-label" for="radioDefault2">
            Não, queixa direcionada à empresa como um todo
          </label>
        </div>

        <!-- Descrição da queixa -->
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Descreva sua queixa aqui: </label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" style="resize: none;"></textarea>
        </div>
      </div>
    </div>
  </div>


</body>
</html>