<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViajaFacs - Central de Ajuda</title>
    <link rel="icon" href="../View/images/iconviajafacs.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="topo">
        <div class="container">
            <a class="navbar-brand">
                <img src="../View/images/logo-viajafacs.png" height="60" alt="ViajaFacs" loading="lazy"
                    style="margin-top: -1px;" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../user">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active">Central de Ajuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-4" id="Yellow">
        <h1 class="text-center fw-bold" id="White">Central de Ajuda</h1>
    </div>

    <div class="container col-11 col-md-9" id=".">
        <div class="row align-items-center gx-5">
            <div class="col-md-6 order-md-2">
                <img src="../View/images/Warning.png" alt="Warning" class="img-fluid mx-auto d-block">
            </div>
            <div class="col-md-6 order-md-1">
                <div class="text-start mb-3">
                <?php
                    if (isset($_SESSION['nome'])) {
                        $nome = $_SESSION['nome'];
                        echo "<h4>Olá, $nome!</h4>";
                    } else {
                        echo "<h4>Olá, usuário!</h4>";
                    }
                    ?>
                </div>
                <div class="col-12">
                    <h2>Preencha os campos abaixo</h2> <br>
                    <form name="reclamacao" onsubmit="return checkReclamacao()">
                        <div class="text-start mb-3">
                            <label class="form-label">ID da Passagem:</label>
                            <input type="text" class="form-control" placeholder="500" id="idPassagem" required>
                        </div>

                        <div class="text-start mb-3">
                            <label class="form-label">Deixe sua reclamação:</label>
                            <textarea type="text" class="form-control" rows="8" id="reclamacaoTxt"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm" id="AmareloBtn">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <h2>Ajudas Solicitadas</h2>

        <div class="card cardT mt-4 mb-4">
            <div class="card-body">
                <h6 class="card-title">Passagem ID: <b>645616354564</b></h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusamus
                    voluptatibus dicta consectetur eveniet reiciendis fuga corporis eaque aperiam aut aliquid quam
                    molestiae, doloribus obcaecati itaque facere veniam laborum architecto.</p>
            </div>
        </div>
        <div class="card cardT mt-4 mb-4">
            <div class="card-body">
                <h6 class="card-title">Passagem ID: <b>645616354564</b></h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusamus
                    voluptatibus dicta consectetur eveniet reiciendis fuga corporis eaque aperiam aut aliquid quam
                    molestiae, doloribus obcaecati itaque facere veniam laborum architecto.</p>
            </div>
        </div>
        <div class="card cardT mt-4 mb-4">
            <div class="card-body">
                <h6 class="card-title">Passagem ID: <b>645616354564</b></h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusamus
                    voluptatibus dicta consectetur eveniet reiciendis fuga corporis eaque aperiam aut aliquid quam
                    molestiae, doloribus obcaecati itaque facere veniam laborum architecto.</p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="../View/javascript/funcoes.js"></script>
</body>

</html>