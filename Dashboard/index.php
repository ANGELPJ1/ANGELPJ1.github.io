<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Inicio de sesion Angel Tech</title>

  <!-- Font Icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../white_on_trans.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="../white_on_trans.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../white_on_trans.png" />

  <!-- Main css -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
      <div class="container">
        <div class="signin-content">
          <div class="signin-image">
            <figure>
              <img src="images/signin-image.jpg" alt="sing up image" />
            </figure>
          </div>

          <div class="signin-form">
            <div style="text-align: center;">
              <a href="../index.php">
                <img src="../images/black_white_on_trans.png" alt="sing up image" alt="Pagina Inicial"
                  style="width: 40%; max-width: 600px; height: auto; display: block; margin: 0 auto 20px;" />
              </a>
              <h2 class="form-title">Inicia Sesion:</h2>
            </div>

            <form method="POST" action="login.php" class="register-form" id="login-form">
              <div class="form-group">
                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="your_name" id="your_name" placeholder="Usuario" />
              </div>
              <div class="form-group">
                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="your_pass" id="your_pass" placeholder="Contraseña" />
              </div>
              <div style="text-align: center;">
                <div class="form-group">
                  <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                  <label for="remember-me" class="label-agree-term"><span><span></span></span>Recuerdame</label>
                </div>
                <div class="form-group form-button">
                  <input type="submit" name="signin" id="signin" class="form-submit" value="Acceder" />
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>