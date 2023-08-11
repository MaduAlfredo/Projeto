<!doctype html>
<html lang="pt-br">
<head>
  <title>Taskbolt | Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Login</span><span>Cadastro</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form method="post" action="../php/session.php">
                        <h4 class="mb-4 pb-3">Login</h4>
                        <div class="form-group" >
                          <input type="email" class="form-style" placeholder="E-mail" name="email">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" name="senha" placeholder="senha">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button class="btn mt-4" type="submit">Login</button> 
                      </form>
                        <p class="mb-0 mt-4 text-center"><a href="#" class="link">Esqueceu a senha?</a></p>
        
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="../php/process.php" method="POST">
                        <h4 class="mb-3 pb-3">Cadastro</h4>
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Nome completo" name="nome">
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="tel" class="form-style" placeholder="Número de telefone" name="phone">
                          <i class="input-icon uil uil-phone"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" class="form-style" placeholder="E-mail" name="email">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Senha" name="pass">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4" name="send">Cadastrar-se</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
