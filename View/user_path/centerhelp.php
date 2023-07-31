<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViajaFacs - Central de Ajuda</title>
    <link rel="icon" href="../View/images/iconviajafacs.png" type="image/png">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="topo">
        <div class="container">
            <a class="navbar-brand">
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
                        $idUsuario = $_SESSION['idUsuario'];
                        echo "<h4>Olá, $nome!</h4>";
                    } else {
                        echo "<h4>Olá, usuário!</h4>";
                    }
                    ?>
                </div>
                <div class="col-12">
                    <h2>Selecione a passagem e faça sua reclamação.</h2> <br>
                    <form method="post" action="centerhelpInsert" onsubmit="return checkReclamacao()">
                        <div class="text-start mb-3">
                            <?php if (count($passagens) > 0) : ?>
                                <?php foreach ($passagens as $passagem) : ?>
                                    <div class="card cardT mt-2 mb-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-1">
                                                    <input class="form-check-input align-text-bottom " type="radio" name="idPassagem" id="idPassagem" value="<?php echo $passagem['idPassagem'] ?>" required>
                                                    <input class="form-check-input align-text-bottom " type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $idUsuario = $_SESSION['idUsuario'] ?>">
                                                </div>
                                                <div class="col-11">
                                                    <h6 class="card-title fw-normal">
                                                        <b id="AmareloTexto">ID Passagem: </b>
                                                        <?php echo '00' . $passagem['idPassagem'] . ' - ' . $passagem['origem'] . ' - ' . $passagem['destino']; ?>
                                                    </h6>
                                                    <h6 class="card-text fw-normal"><b class="text-success">Checkin: </b><?php echo $passagem['statusCheckin'] == 0 ? 'Desabilitado' : 'Habilitado'; ?></h6>
                                                    <h6 class="card-text fw-normal"><b class="text-danger">Cancelamento: </b><?php echo $passagem['statusCancelamento'] == 0 ? 'Falso' : 'Ativo'; ?></h6>
                                                </div>
                                            </div>

                                            </h6>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Você não possui passagens.</p>
                            <?php endif; ?>
                        </div>

                        <div class="text-start mb-3">
                            <label class="form-label">Deixe sua reclamação:</label>
                            <textarea type="text" class="form-control" rows="8" id="comentarioUsuario" name="comentarioUsuario">Estou com problema na minha passagem 001.....</textarea>
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
        <?php if ($reclamacoes && count($reclamacoes) > 0) : ?>
            <?php foreach ($reclamacoes as $reclamacao) : ?>
                <div class="card cardT mt-4 mb-4">
                    <div class="card-body">
                        <h6 class="card-title"><b>User ID:</b> <?php echo $reclamacao['idUsuario']; ?></h6>
                        <p class="card-text"><?php echo $reclamacao['comentarioUsuario']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Nenhuma reclamação encontrada.</p>
        <?php endif; ?>

    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../View/javascript/funcoes.js"></script>
</body>

</html>