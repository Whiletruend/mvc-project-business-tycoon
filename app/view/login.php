<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="container h-100 w-25">
      <div class="row align-items-center h-100">
          <div class="col-12">
              <div class="h-100 justify-content-center">
                  <div>
                    <main class="form-login">
                      <form action='#' method='POST'>
                        <?php if(self::$msg != '') {?>
                          <div class="alert alert-danger alert-dismissible fade show" id='login_error_Alert' role="alert">
                            <strong>Erreur !</strong> <?= self::$msg ?> <a href="?action=login" class="alert-link">Recommencer</a>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                          <script>
                            $("#login_error_Alert").fadeTo(2000, 500).slideUp(500, function(){
                                $("#login_error_Alert").slideUp(500);
                            });
                          </script>
                        <?php } ?>

                        <?php if(isset($_GET['account_created'])) { ?>
                          <div class="alert alert-success alert-dismissible fade show" id='created_account_Alert' role="alert">
                            <strong>Succès !</strong> Votre compte a bien été créé.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                          <script>
                            $("#created_account_Alert").fadeTo(2000, 500).slideUp(500, function(){
                                $("#created_account_Alert").slideUp(500);
                            });
                          </script>
                        <?php } ?>

                        <center><h1 class="h3 mb-3 fw-normal">Se connecter</h1></center>

                        <div class="form-floating">
                        <input type="email" name='mail_USER' class="form-control" id="floatingInput" placeholder="email">
                        <label for="floatingInput">Adresse Mail</label>
                        </div>
                        <div class="form-floating">
                        <input type="password" name='password_USER' class="form-control" id="floatingPassword" placeholder="password">
                        <label for="floatingPassword">Mot de passe</label>
                        </div>
                        <br>
                        <button type='submit' class="w-100 btn btn-lg btn-primary">Connexion</button>
                      </form>
                    </main>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </body>
</html>