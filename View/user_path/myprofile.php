<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViajaFacs - Meu Perfil</title>
    <link rel="icon" href="../View/images/iconviajafacs.png" type="image/png">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../user">
                <img src="../View/images/logo-viajafacs.png" height="60" alt="ViajaFacs" loading="lazy" style="margin-top: -1px;" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../user">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active">Meu Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-11 col-md-9" id="form-container">
        <div class="row gx-5">
            <div class="col-md-6">
                <h2 class="mb-5 mt-2">Informações do seu Perfil</h2>
                <div class="form-floating">
                    <h5 class="card-title fw-normal"><b id="AmareloTexto">E-mail:</b> <?php echo $usuario->getEmail(); ?></h5>
                </div>
                <div class="form-floating">
                    <h5 class="card-title fw-normal"><b id="AmareloTexto">Nome:</b> <?php echo $usuario->getNome(); ?></h5>
                </div>
                <div class="form-floating">
                    <h5 class="card-title fw-normal"><b id="AmareloTexto">Data de Nascimento:</b> <?php echo $usuario->getDataNascimento(); ?></h5>
                </div>
                <div class="form-floating">
                    <h5 class="card-title fw-normal"><b id="AmareloTexto">CPF:</b> <?php echo $usuario->getCpf(); ?></h5>
                </div>
                <div class="form-floating">
                    <h5 class="card-title fw-normal"><b id="AmareloTexto">Telefone:</b> <?php echo $usuario->getTelefone(); ?></h5>
                </div>
                <div class="form-floating">
                    <h5 class="card-title fw-normal"><b id="AmareloTexto">Senha:</b> ***********</h5>
                </div>


                <div class="mt-5 mb-5">
                    <a href="editprofile"><input type="button" class="btn btn-success" id="AmareloBtn" value="Editar"></a>
                </div>
            </div>
        </div>
    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../View/javascript/funcoes.js"></script>
</body>

</html>