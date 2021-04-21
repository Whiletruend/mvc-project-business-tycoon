<?php
  if(isset($_POST['mail_USER']) & isset($_POST['username_USER']) & isset($_POST['password_USER'])) {
      $postMail = $_POST['mail_USER'];
      $postName = $_POST['username_USER'];
      $postPass = $_POST['password_USER'];

      $register = new RegisterControler;
      
      $register->addAccount($postMail, $postName, $postPass);
  }
?>

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
  <body class="text-center">
    <div class='container'> 
        <main class="form-signin w-25 position-absolute top-50 start-50 translate-middle">
            <form action='#' method='POST'>
                <h1 class="h3 mb-3 fw-normal">Créer un compte</h1>

                <div class="form-floating">
                <input type="email" name='mail_USER' class="form-control" id="floatingInput" placeholder="email">
                <label for="floatingInput">Adresse Mail</label>
                </div>

                <div class="form-floating">
                <input type="username" name='username_USER' class="form-control" id="floatingInput" placeholder="username">
                <label for="floatingInput">Nom d'utilisateur</label>
                </div>

                <div class="form-floating">
                <input type="password" name='password_USER' class="form-control" id="floatingPassword" placeholder="password">
                <label for="floatingPassword">Mot de passe</label>
                </div>
                <br>
                <button type='submit' class="w-100 btn btn-lg btn-primary">S'enregistrer</button>
    
                <p class="mt-5 mb-3 text-muted">&copy; Laboratory Clicker 2021–2021</p>
            </form>
        </main>
    </div>
  </body>
</html>