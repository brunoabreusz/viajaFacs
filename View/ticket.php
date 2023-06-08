<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ViajaFacs - Passagens Aéreas</title>
  <link rel="icon" href="View/images/iconviajafacs.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="View/styles/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand">
        <img src="View/images/logo-viajafacs.png" height="60" alt="ViajaFacs" loading="lazy" style="margin-top: -1px;" />
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="user">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Passagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Passagens aéreas para <?php echo $origem; ?> - <?php echo $destino; ?></h2>

    <div class="container mt-3">
      <form action="checkout.html">
        <h3 class="text-start mb-2 p-2" id="">Somente Ida <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
          </svg></h3>
          <?php for ($cont = 0; $cont < count($listaVoo); $cont++) { ?>
        <div class="card">
          <div class="row g-0 text-center m-2">
            <div class="col fw-normal">
              <input class="form-check-input align-text-bottom " type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <img src="View/images/logo-viajafacs.png" width="110px" /><p class="card-text fw-normal">Nome Companhia: <b><?php echo $listaVoo[$cont]->getIdCompanhiaAerea(); ?></b></p>
            </div>
            <div class="col-sm">
              <p class="card-text fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 16 16">
                  <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z" />
                </svg> <b><?php echo $listaVoo[$cont]->getOrigem(); ?> - <?php echo $listaVoo[$cont]->getDestino(); ?></b></p>
              <p class="card-text fw-normal">Hora Saida: <b><?php echo $listaVoo[$cont]->getDataHoraSaida(); ?></b></p>
              <p class="card-text fw-normal">Hora Chegada: <b><?php echo $listaVoo[$cont]->getDataHoraChegada(); ?></b></p>
            </div>
            <div class="col-sm">
              <p class="card-text fw-normal">Qtd. Assentos: <b><?php echo $listaVoo[$cont]->getAssentos(); ?></b>
              <p class="card-text fw-normal">Preço Voo Economico: <b>R$: <?php echo $listaVoo[$cont]->getPrecoVooEconomico(); ?></b></p> 
              <p class="card-text fw-normal">Preço Voo Primeira Classe: <b>R$: <?php echo $listaVoo[$cont]->getPrecoVooPrimeiraClasse(); ?></b></p>
            </div>
          </div>
        </div>
        <br>
        <?php } ?>



        <button type="submit" class="btn btn-primary mt-3 mb-3" id="AmareloBtn">Realizar pedido</button>
        <button type="button" class="btn btn-primary mt-3 mb-3" id="liveToastBtn">Ver mais voos</button>
      </form>
    </div>
  </div>
  </div>
  </div>


  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="images/iconviajafacs.png" class="rounded me-2" alt="...">
        <p class="me-auto">ViajaFacs</p>
        <small>1 seg</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Sem mais voos no momento....
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="View/javascript/funcoes.js"></script>
</body>

</html>