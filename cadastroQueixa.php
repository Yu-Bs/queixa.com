<?php
session_start();
include_once 'conexaoDatabase.php';
include_once 'empresa.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/cadastroQueixa.css">
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

  <p class="text-center fs-4">Vamos nos Queixar!</p>
  <!--card fundo-->
  <div class="container mt-5">
    <div class="card shadow p-4 w-100 h-90">
    <div class="container mt-4">
      <div class="row">
        <!-- Coluna da esquerda -->
        <div class="col-md-6">
          <!-- Campo de empresa -->
        <div style="position: relative;">
          <label for="empresaInput" class="form-label">Qual a empresa referente?</label>
          <input type="text" class="form-control" id="empresaInput" autocomplete="off" placeholder="Digite o nome da empresa">
          <div id="buscaEmpresa" class="list-group position-absolute z-3 w-50" 
              style="max-height: 200px; overflow-y: auto;"></div>
        </div>

          <!-- Nota -->
          <p>Digite a nota para a empresa ou produto</p>
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
              <option value="1">Qualidade do produto</option>
              <option value="2">Atendimento ao cliente</option>
              <option value="3">Entrega</option>
            </select>
          </div>
        </div>

        <!-- Coluna da direita -->
        <div class="col-md-6">
          <!-- Produto ou não -->
          <p>Sua queixa é referente a um produto especifico?</p>
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
          <!--caixa de texto "escondida"-->
          <div class="mb-3" id="campoProduto" style="display: none;">
            <label for="nomeProduto" class="form-label">Digite qual produto é referente à queixa: </label>
            <input type="text" class="form-control" id="nomeProduto" placeholder="Digite o nome do produto" autocomplete="off">
            <ul id="sugestoes" class="list-group" style="position: absolute; z-index: 1000;"></ul>
          </div>

          <!-- Descrição da queixa -->
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descreva sua queixa aqui: </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Descreva aqui" rows="6" style="resize: none;"></textarea>
          </div>
        </div>
        <!--botão envio-->
        <div class="d-flex justify-content-center mt-4">
          <button class="btn btn-primary">Enviar Queixa</button>
        </div>

      </div>
    </div>
    </div>
  </div>

</body>


<script>
  //script funcionamento checkbox
  //Quando a página carrega
  document.addEventListener("DOMContentLoaded", function () {
    const simProduto = document.getElementById("radioDefault1");
    const naoProduto = document.getElementById("radioDefault2");
    const campoProduto = document.getElementById("campoProduto");

    function atualizarCampoProduto() {
      if (simProduto.checked) {
        campoProduto.style.display = "block";
      } else {
        campoProduto.style.display = "none";
      }
    }

    //Chamar ao carregar
    atualizarCampoProduto();

    //Atualiza quando usuário clicar
    simProduto.addEventListener("change", atualizarCampoProduto);
    naoProduto.addEventListener("change", atualizarCampoProduto);
  });
</script>

<script>
  //script funcionamento autocomplete empresa
document.addEventListener('DOMContentLoaded', function () {
  const input = document.getElementById('empresaInput');
  const sugestoes = document.getElementById('buscaEmpresa');

  input.addEventListener('input', function () {
    const termo = this.value.trim();

    if (termo.length < 2) {
      sugestoes.innerHTML = '';
      return;
    }

    fetch('buscaEmpresas.php?termo=' + encodeURIComponent(termo))
      .then(response => response.json())
      .then(empresas => {
        sugestoes.innerHTML = '';

        if (empresas.length === 0) {
          sugestoes.innerHTML = '<div class="list-group-item">Nenhuma empresa encontrada</div>';
          return;
        }

        empresas.forEach(nome => {
          const item = document.createElement('div');
          item.classList.add('list-group-item', 'list-group-item-action');
          item.textContent = nome;

          item.addEventListener('click', function () {
            input.value = nome;
            sugestoes.innerHTML = '';
          });

          sugestoes.appendChild(item);
        });
      })
      .catch(error => {
        console.error('Erro ao buscar empresas:', error);
        sugestoes.innerHTML = '<div class="list-group-item text-danger">Erro ao buscar empresas</div>';
      });
  });

  // Fecha sugestões se clicar fora
  document.addEventListener('click', function (event) {
    if (!event.target.closest('#empresaInput') && !event.target.closest('#buscaEmpresa')) {
      sugestoes.innerHTML = '';
    }
  });
});
</script>

<script>
  //script autocomplete produtos queixa
  const input = document.getElementById("nomeProduto");
  const sugestoes = document.getElementById("sugestoes");

  input.addEventListener("input", async () => {
    const termo = input.value;
    sugestoes.innerHTML = "";

    if (termo.length < 2) return;

    const resposta = await fetch(`/buscaProdutos?termo=${encodeURIComponent(termo)}`);
    const produtos = await resposta.json();

    produtos.forEach(produto => {
      const item = document.createElement("li");
      item.className = "list-group-item list-group-item-action";
      item.textContent = produto.nome;
      item.onclick = () => {
        input.value = produto.nome;
        sugestoes.innerHTML = "";
      };
      sugestoes.appendChild(item);
    });
  });
</script>

</html>