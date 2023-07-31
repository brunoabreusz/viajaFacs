<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ViajaFacs - Editar Perfil</title>
    <link rel="icon" href="../View/images/iconviajafacs.png" type="image/png">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home">
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
                        <a class="nav-link active">Editar Perfil</a>
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
                <h2>Editar informações do seu Perfil</h2>
                <form method="post" action="update">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $usuario->getEmail(); ?>">
                        <label for="email" class="form-label">Digite o seu e-mail</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu nome" value="<?php echo $usuario->getNome(); ?>">
                        <label for="name" class="form-label">Digite o seu nome</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento" value="<?php echo $usuario->getDataNascimento(); ?>">
                        <label for="name" class="form-label">Data de nascimento</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="cpf" name="cpf" oninput="mascara(this)" maxlength="14" minlength="14" placeholder="Digite seu cpf" value="<?php echo $usuario->getCpf(); ?>">
                        <label for="name" class="form-label">Digite seu CPF</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="telefone" name="telefone" maxlength="15" onkeyup="handlePhone(event)" placeholder="Telefone" value="<?php echo $usuario->getTelefone(); ?>">
                        <label for="name" class="form-label">Telefone</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" value="<?php echo $usuario->getSenha(); ?>">
                        <label for="name" class="form-label">Digite sua senha</label>
                    </div>

                    <div class="mt-3 mb-3">
                        <input type="submit" class="btn btn-success" id="AmareloBtn" value="Salvar">
                    </div>

                </form>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-12">
                        <img src="../View/images/Acess.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../View/javascript/funcoes.js"></script>
</body>

</html>