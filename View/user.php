<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajaFacs</title>
    <link rel="icon" href="View/images/iconviajafacs.png" type="image/png">
    <link rel="stylesheet" href="View/styles/style.css">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">
                <img src="View/images/logo-viajafacs.png" height="60" alt="ViajaFacs" loading="lazy" style="margin-top: -1px;" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link active">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="user/checkin">Check-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user/cancellation">Cancelamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user/centerhelp">Central de Ajuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="View/images/img-salvador.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="View/images/img-saopaulo.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="View/images/img-belohorizonte.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid" id="GreyBackground">
        <br>
        <div class="container p-4" id="Filter">
            <div class="row">

                <div class="col-4 text-start mb-1">
                    <?php
                    if (isset($_SESSION['nome'])) {
                        $nome = $_SESSION['nome'];
                        $idUsuario = $_SESSION['idUsuario'];
                        echo "<h2>Olá, $nome!</h2>";
                    } else {
                        echo "<h2>Olá, usuário!</h2>";
                    }
                    ?>
                </div>

                <div class="col-6 text-start mb-1">
                    <a href="user/myprofile" id="A-NoDecoration">
                        <h2><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg> Meu Perfil</h2>
                    </a>
                </div>
            </div>

            <div class="row">
                <h3>Suas Passagens</h3>
                <?php if (count($passagens) > 0) : ?>
                    <?php foreach ($passagens as $passagem) : ?>
                        <?php if ($passagem['statusCancelamento'] != 1) : ?>
                        <div class="col">
                            <div class="card cardT">
                                <div class="card-body">
                                    <h6 class="card-title fw-normal">
                                        <b id="AmareloTexto">ID Passagem: </b>
                                        <?php echo '00' . $passagem['idPassagem'] . ' - ' . $passagem['origem'] . ' - ' . $passagem['destino']; ?>
                                    </h6>
                                    <h6 class="card-text fw-normal"><b class="text-success">Checkin: </b><?php echo $passagem['statusCheckin'] == 0 ? 'Desabilitado' : 'Habilitado'; ?></h6>
                                    <h6 class="card-text fw-normal"><b class="text-danger">Cancelamento: </b><?php echo $passagem['statusCancelamento'] == 0 ? 'Falso' : 'Ativo'; ?></h6>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>                       
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Você não possui passagens.</p>
                <?php endif; ?>

            </div>
        </div>
        <br>

        <div class="container p-4" id="Filter">
            <h2>Encontre os melhores voos</h2>
            <div class="row">
                <form method="post" action="searchVoo">
                    <div class="input-group">
                        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg></span>
                        <input class="form-control" list="datalistOrigem" name="origem" id="origem" placeholder="Origem" required>
                        <datalist id="datalistOrigem">
                            <option value="Salvador">
                            <option value="São Paulo">
                            <option value="Belo Horizonte">
                            <option value="Rio de Janeiro">
                        </datalist>

                        <input class="form-control" list="datalistDestino" name="destino" id="destino" placeholder="Destino" required>
                        <datalist id="datalistDestino">
                            <option value="Salvador">
                            <option value="São Paulo">
                            <option value="Belo Horizonte">
                            <option value="Rio de Janeiro">
                        </datalist>
                        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                            </svg></span>
                    </div>
                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" name="passagem" id="idaVolta" value="idaVolta" required>
                        <label class="form-check-label" for="inlineRadio1">Ida e Volta</label>
                    </div>
                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" name="passagem" id="ida" value="ida" required>
                        <label class="form-check-label" for="inlineRadio2">Só Ida</label>
                    </div>
                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" name="passagem" id="inlineRadio3" value="option3" disabled>
                        <label class="form-check-label" for="inlineRadio3">Multidestino</label>
                    </div>

                    <input type="submit" class="btn btn-success btn-sm" id="AmareloBtn" value="Buscar">
                </form>
            </div>
        </div>





        <div class="container mt-4 mb-4">
            <h2 class="mb-4">Passagens que estão bombando no ViajaFacs</h2>

            <div class="row row-cols-md-4 g-4 justify-content-around">

                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://media.staticontent.com/media/pictures/d184a06f-db25-4ec6-bc21-b73bc4db0ca9" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para Rio de Janeiro</h5>
                            <h6 class="card-text fw-normal">Saindo de São Paulo</h6>
                            <h7 class="card-text fw-normal">Por: <b>Gol Airlines</b></h7>
                            <span class="badge" id="BadgePequenoB">Ida</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 318,00</b></p>
                        </div>
                    </a>
                </div>

                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://media.staticontent.com/media/pictures/408861fa-25f7-4b7b-a395-a5311e7c51f2" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para Salvador</h5>
                            <h6 class="card-text fw-normal">Saindo de Rio de Janeiro</h6>
                            <h7 class="card-text fw-normal">Por: <b>Latam Airlines</b></h7>
                            <span class="badge" id="BadgePequenoB">Ida</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 298,00</b></p>
                        </div>
                    </a>
                </div>

                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://media.staticontent.com/media/pictures/80081fcb-d440-45eb-a770-318317a7ae04" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para São Paulo</h5>
                            <h6 class="card-text fw-normal">Saindo de Salvador</h6>
                            <h7 class="card-text fw-normal">Por: <b>Azul Airlines</b></h7>
                            <span class="badge" id="BadgePequenoB">Ida</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 404,00</b></p>
                        </div>
                    </a>
                </div>

                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://images.pexels.com/photos/6057833/pexels-photo-6057833.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para Belo Horizonte</h5>
                            <h6 class="card-text fw-normal">Saindo de São Paulo</h6>
                            <h7 class="card-text fw-normal">Por: <b>Azul Airlines</b></h7>
                            <span class="badge" id="BadgePequenoB">Ida</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 660,00</b></p>
                        </div>
                    </a>
                </div>



                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://images.pexels.com/photos/14236881/pexels-photo-14236881.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para Salvador</h5>
                            <h6 class="card-text fw-normal">Saindo de Belo Horizonte</h6>
                            <h7 class="card-text fw-normal">Por: <b>Latam Airlines</b></h7>
                            <span class="badge" id="BadgePequenoA">Volta</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 500,00</b></p>
                        </div>
                    </a>
                </div>


                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://images.pexels.com/photos/1268855/pexels-photo-1268855.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para Rio de Janeiro</h5>
                            <h6 class="card-text fw-normal">Saindo de Salvador</h6>
                            <h7 class="card-text fw-normal">Por: <b>Gol Airlines</b></h7>
                            <span class="badge" id="BadgePequenoA">Volta</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 400,00</b></p>
                        </div>
                    </a>
                </div>

                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://images.pexels.com/photos/13435510/pexels-photo-13435510.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para Belo Horizonte</h5>
                            <h6 class="card-text fw-normal">Saindo de Rio de Janeiro</h6>
                            <h7 class="card-text fw-normal">Por: <b>Gol Airlines</b></h7>
                            <span class="badge" id="BadgePequenoA">Volta</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 350,00</b></p>
                        </div>
                    </a>
                </div>

                <div class="card p-0 cardT" style="width: 20rem">
                    <a id="Passagem" href="#Filter">
                        <img src="https://images.pexels.com/photos/1482193/pexels-photo-1482193.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h6 class="card-text fw-normal">Passagem</h6>
                            <h5 class="card-title fw-semibold">Voos para São Paulo</h5>
                            <h6 class="card-text fw-normal">Saindo de Belo Horizonte</h6>
                            <h7 class="card-text fw-normal">Por: <b>Gol Airlines</b></h7>
                            <span class="badge" id="BadgePequenoA">Volta</span>
                            <hr>
                            <p class="card-text fw-normal">Preço: <b>R$ 299,00</b></p>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <div class="container mt-5" id="Ajuda">
            <div class="row row-cols-md-4 g-4 justify-content-around">
                <figure class="figure">
                    <img src="https://media.staticontent.com/media/pictures/bf76ebe3-7301-40c6-ad17-4e3e10879159" width="300px" class="figure-img img-fluid rounded mx-auto d-block" alt="A generic square placeholder image with rounded corners in a figure.">
                    <figcaption class="figure-caption">A Latam Airlines é a companhia surgida da fusão entre a chilena
                        LAN Airlines e a TAM Linhas Aéreas. O anúncio foi feito
                        em 2010 e desde então a companhia tem crescido e conquistado novas rotas.</figcaption>
                </figure>
                <figure class="figure">
                    <img src="https://media.staticontent.com/media/pictures/b0e700eb-ba6a-4baf-9e58-15687cb95a28" width="300px" class="figure-img img-fluid rounded mx-auto d-block" alt="A generic square placeholder image with rounded corners in a figure.">
                    <figcaption class="figure-caption">Atualmente, a Azul atende 105 destinos e possui 138 aeronaves a
                        seu serviço, o que a torna uma das companhias mais
                        completas e abrangentes de todo o país.</figcaption>
                </figure>
                <figure class="figure">
                    <img src="https://media.staticontent.com/media/pictures/2a2f0df8-3c25-407d-8074-f76ac4961bdb" width="300px" class="figure-img img-fluid rounded mx-auto d-block" alt="A generic square placeholder image with rounded corners in a figure.">
                    <figcaption class="figure-caption">Conhecida principalmente pelos preços acessíveis, a Gol Linhas
                        Aéreas atua no mercado nacional de aviação pautada nas
                        inovações e no pioneirismo.</figcaption>
                </figure>
                <figure class="figure">
                    <img src="https://media.staticontent.com/media/pictures/9887b3c0-5988-4a0a-83f4-e80ee1d2aeea" width="300px" class="figure-img img-fluid rounded mx-auto d-block" alt="A generic square placeholder image with rounded corners in a figure.">
                    <figcaption class="figure-caption">O ViajaFacs disponibiliza passagens aéreas em promoção, preços
                        especiais, além de uma plataforma totalmente desenvolvida
                        para que você tenha muito mais facilidade e praticidade na busca de passagens.</figcaption>
                </figure>
            </div>
        </div>
        <div class="container mt-4">
            <h2>Perguntas frequentes sobre a ViajaFacs</h2>
            <div class="row mt-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Que ofertas de viagem posso encontrar no ViajaFacs?</h5>
                            <p class="card-text">Seja bem-vindo ao novo site do ViajaNet. Agora você pode encontrar tudo
                                para sua viagem ideal. Procure as melhores ofertas em passagens aéreas, hotéis, pacotes
                                de
                                viagem, aluguel de carros e muito mais!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Quais são os horários de funcionamento do Central de
                                Atendimento?</h5>
                            <p class="card-text">As horas de funcionamento do centro de serviço são:
                                Segunda a Sexta: Das 8hs as 19hs.
                                Sabado, Domingo e Feriados: Das 9hs as 15hs</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Como comprar viagens pelo telefone?</h5>
                            <p class="card-text">No ViajaFacs você pode comprar vôos, hotéis, pacotes de viagem e muito
                                mais
                                em nosso centro de vendas. Se você estiver nas capitais e regiões metropolitanas ligue
                                para
                                4933-1246, se estiver em outras regiões ligue para 11 4933-1246.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Como posso verificar minha reserva?</h5>
                            <p class="card-text">Em minhas viagens você pode ver o status e os detalhes de suas
                                reservas,
                                verificar a bagagem permitida em seu vôo e descobrir quais vistos e documentos você
                                precisa
                                para viajar. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
    </div>

    <footer class="bg-light">

        <section class="border-top">
            <div class="container text-center text-md-start mt-0">

                <div class="row mt-3">

                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-2">

                        <h6 class="text-uppercase fw-bold mb-4" id="AmareloTexto">
                            Sobre
                        </h6>
                        <p class="text-justify">
                            A Viajafacs é uma empresa de passagem aérea que oferece voos econômicos e serviços de
                            viagem
                            para clientes em todo o mundo. Fundada em 2023, a empresa tem crescido rapidamente,
                            ampliando sua presença em destinos nacionais.
                        </p>
                    </div>


                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">

                        <h6 class="text-uppercase fw-bold mb-4" id="AmareloTexto">
                            Redes sociais
                        </h6>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg> <a href="#" id="A-NoDecoration">Instagram</a>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg> <a href="#" id="A-NoDecoration">Linkedin</a>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                            </svg> <a href="#" id="A-NoDecoration">GitHub</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-">

                        <h6 class="text-uppercase fw-bold mb-4" id="AmareloTexto">Contato</h6>
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z" />
                            </svg>
                            Salvador, Bahia Brasil</p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                            </svg>
                            viajaFacs@unifacs.com.br
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            +55 71 9710-6280
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="fw-bold" id="AmareloTexto" target="_blank" href="https://github.com/brunoabreusz">viajafacs.com.br</a>
        </div>

    </footer>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="View/javascript/funcoes.js"></script>
</body>

</html>