<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViajaFacs - Comprar</title>
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
                        <a class="nav-link active">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item"><a href="u" id="A-NoDecoration">Voltar para a página anterior</a>
                </li>
            </ol>
        </nav>
    </div> -->

    <div class="container">
        <h2 class="mt-5">Falta pouco! Complete seus dados e finalize sua compra. </h2>

        <div class="card mt-4">
            <h3 class="m-3"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-airplane-fill text-center" viewBox="0 0 16 16">
                    <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z" />
                </svg> Detalhamento da compra:</h3>
            <div class="m-3">
                <?php if (!empty($listaVooIda) && !empty($listaVooVolta)) : ?>
                    <h6 class="card-title fw-normal"><b id="AmareloTexto">Passagem: </b><?php echo $listaVooIda[0]->getOrigem(), " - ", $listaVooIda[0]->getDestino(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Saida: </b><?php echo $listaVooIda[0]->getDataHoraSaida(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Chegada: </b><?php echo $listaVooIda[0]->getDataHoraChegada(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Qtd. Assentos: </b><?php echo $listaVooIda[0]->getAssentos(); ?></h6>
                    <hr>
                    <h6 class="card-title fw-normal"><b id="AmareloTexto">Passagem: </b><?php echo $listaVooVolta[0]->getOrigem(), " - ", $listaVooVolta[0]->getDestino(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Saida: </b><?php echo $listaVooVolta[0]->getDataHoraSaida(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Chegada: </b><?php echo $listaVooVolta[0]->getDataHoraChegada(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Qtd. Assentos: </b><?php echo $listaVooVolta[0]->getAssentos(); ?></h6>
                    <hr>
                <?php elseif (!empty($listaVooIda)) : ?>
                    <h6 class="card-title fw-normal"><b id="AmareloTexto">Passagem: </b><?php echo $listaVooIda[0]->getOrigem(), " - ", $listaVooIda[0]->getDestino(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Saida: </b><?php echo $listaVooIda[0]->getDataHoraSaida(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Chegada: </b><?php echo $listaVooIda[0]->getDataHoraChegada(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Qtd. Assentos: </b><?php echo $listaVooIda[0]->getAssentos(); ?></h6>
                    <!-- <h6 class="card-text fw-normal"><b id="AmareloTexto">Preço Economico: </b><//?php echo $listaVooIda[0]->getPrecoVooEconomico(); ?></h6> -->
                    <!-- <h6 class="card-text fw-normal"><b id="AmareloTexto">Preço Primeira Classe: </b><//?php echo $listaVooIda[0]->getPrecoVooPrimeiraClasse(); ?></h6> -->
                <?php elseif (!empty($listaVooVolta)) : ?>
                    <h6 class="card-title fw-normal"><b id="AmareloTexto">Passagem: </b><?php echo $listaVooVolta[0]->getOrigem(), " - ", $listaVooVolta[0]->getDestino(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Saida: </b><?php echo $listaVooVolta[0]->getDataHoraSaida(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Hora Chegada: </b><?php echo $listaVooVolta[0]->getDataHoraChegada(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Qtd. Assentos: </b><?php echo $listaVooVolta[0]->getAssentos(); ?></h6>
                    <!-- <h6 class="card-text fw-normal"><b id="AmareloTexto">Preço Economico: </b><//?php echo $listaVooVolta[0]->getPrecoVooEconomico(); ?></h6>
                    <h6 class="card-text fw-normal"><b id="AmareloTexto">Preço Primeira Classe: </b><//?php echo $listaVooVolta[0]->getPrecoVooPrimeiraClasse(); ?></h6> -->
                <?php endif; ?>
                <p class="fw-normal mt-2"><b>*Caso o cancelamento seja solicitado 24h após a realização da compra e ao menos 7 dias antes da data do embarque, o reembolso será integral conforme Resoluções da ANAC.</b></p>
            </div>



        </div>
        <!-- 
        <div class="card mt-4">

        </div> -->

        <div class="card mt-4">
            <h3 class="m-3"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-airplane-fill text-center" viewBox="0 0 16 16">
                    <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z" />
                </svg> Complete com os dados do cartão:</h3>
            <form name="comprar">

                <h4 class="m-3">Escolha sua classe</h4>
                <div class="row m-3">
                    <?php if (!empty($listaVooIda) && !empty($listaVooVolta)) : ?>
                        <?php if (!empty($listaVooIda) && !empty($listaVooVolta)) : ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <h6 class="card-title fw-normal"><b id="AmareloTexto">Primeira classe:</b> R$: <?php echo $listaVooIda[0]->getPrecoVooPrimeiraClasse() + $listaVooVolta[0]->getPrecoVooPrimeiraClasse(); ?></h6>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <h6 class="card-title fw-normal"><b>Classe econômica:</b> R$: <?php echo $listaVooIda[0]->getPrecoVooEconomico() + $listaVooVolta[0]->getPrecoVooEconomico(); ?></h6>
                            </div>
                        <?php endif; ?>
                    <?php elseif (!empty($listaVooIda)) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <h6 class="card-title fw-normal"><b id="AmareloTexto">Primeira classe:</b> R$: <?php echo $listaVooIda[0]->getPrecoVooPrimeiraClasse(); ?></h6>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <h6 class="card-title fw-normal"><b>Classe econômica:</b> R$: <?php echo $listaVooIda[0]->getPrecoVooEconomico(); ?></h6>
                        </div>
                    <?php elseif (!empty($listaVooVolta)) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <h6 class="card-title fw-normal"><b id="AmareloTexto">Primeira classe:</b> R$: <?php echo $listaVooVolta[0]->getPrecoVooPrimeiraClasse(); ?></h6>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <h6 class="card-title fw-normal"><b>Classe econômica:</b> R$: <?php echo $listaVooVolta[0]->getPrecoVooEconomico(); ?></h6>
                        </div>
                    <?php endif; ?>
                    <!-- <p>*Embora ambas as opções permitam que você alcance o seu destino, o voo de primeira classe oferece uma
                    experiência superior em termos de conforto, conveniência e luxo.</p> -->
                </div>

                <div class="m-3">
                    <div class="row">
                        <div class="form-group col">
                            <label class="card-title fw-normal m-1">Número do cartão:</label>
                            <input type="text" class="form-control" placeholder="5322 0146 4397 8449" maxlength="19" onkeydown="return apenasNumeros(event)" required>
                        </div>
                        <div class="form-group col">
                            <label class="card-title fw-normal m-1">Titular:</label>
                            <input type="text" name="titular" class="form-control" placeholder="Nome do Titular">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="card-title fw-normal m-1">Data de Validade:</label>
                            <input type="date" class="form-control" placeholder="09/06/2024" required>
                        </div>
                        <div class="form-group col">
                            <label class="card-title fw-normal m-1">Cód. Segurança</label>
                            <input type="text" name="cvv" class="form-control" placeholder="240" maxlength="3" onkeydown="return apenasNumeros(event)" required>
                        </div>
                        <div class="form-group col">
                            <label class="card-title fw-normal m-1">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" oninput="mascara(this)" maxlength="14" minlength="14" required>
                        </div>
                    </div>
                    <?php
                    // Valor total a ser parcelado
                    $valorTotal = 1000;

                    // Número máximo de parcelas
                    $maxParcelas = 6;

                    // Calcula o valor de cada parcela
                    $valorParcela = round($valorTotal / $maxParcelas, 2);

                    // Exibe as opções de parcelas
                    echo '<div class="form-group col">';
                    echo '<label class="card-title fw-normal m-1">Parcelas</label>';
                    echo '<select class="form-select form-select-md" aria-label=".form-select-sm example">';
                    echo '<option selected>Parcelas</option>';

                    for ($parcelas = 1; $parcelas <= $maxParcelas; $parcelas++) {
                        $valorFormatado = number_format($valorParcela * $parcelas, 2, ',', '.');

                        echo '<option value="' . $parcelas . '">' . $parcelas . 'x de R$ ' . $valorFormatado . '</option>';
                    }

                    echo '</select>';
                    echo '</div>';
                    ?>

                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" value="" id="agree-form" name="agree-form">
                        <label for="agree-form" class="form-check-label">Li e aceito as condições de compra, <a href="https://policies.google.com/terms?hl=pt-BR" target="_blank"><b>política de
                                    privacidade</b></a>.</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-3" id="AmareloBtn">Confirmar pagamento</button>
                </div>
            </form>

        </div>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="View/javascript/funcoes.js"></script>
</body>

</html>