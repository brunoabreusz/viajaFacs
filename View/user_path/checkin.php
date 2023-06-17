<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViajaFacs - Check-in</title>
    <link rel="icon" href="../View/images/iconviajafacs.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <a class="nav-link active">Check-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-4 bg-success">
        <h1 class="text-center fw-bold" id="White">Check-in</h1>
    </div>


    <div class="container col-11 col-md-9" id=".">
        <div class="row align-items-center gx-5">
            <div class="col-md-6 order-md-2">
                <img src="../View/images/Confirmed.png" alt="Warning" class="img-fluid mx-auto d-block">
            </div>
            <div class="col-md-6 order-md-1">
                <div class="col-12">
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
                        <h2 class="mb-">Para fazer o check-in, por favor, clique na passagem abaixo.</h2>
                        <form method="post" action="checkinAtualizar">

                            <?php if (count($passagens) > 0) : ?>
                                <?php foreach ($passagens as $passagem) : ?>
                                    <div class="card cardT mt-2 mb-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-1">
                                                    <input class="form-check-input align-text-bottom " type="radio" name="idPassagem" id="idPassagem" value="<?php echo $passagem['idPassagem'] ?>" required>
                                                </div>
                                                <div class="col-11">
                                                    <h6 class="card-title fw-normal">
                                                        <b id="AmareloTexto">ID Passagem: </b>
                                                        <?php echo '00' . $passagem['idPassagem'] . ' - ' . $passagem['origem'] . ' - ' . $passagem['destino']; ?>
                                                        <h6 class="card-text fw-normal"><b class="text-success">Checkin: </b><?php echo $passagem['statusCheckin'] == 0 ? 'Desabilitado' : 'Habilitado'; ?>
                                                        </h6>
                                                </div>
                                            </div>

                                            </h6>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Você não possui passagens.</p>
                            <?php endif; ?>


                            <button type="submit" class="btn btn-success btn-md" id="AmareloBtn">Realizar
                                Check-in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="../View/javascript/funcoes.js"></script>
</body>

</html>