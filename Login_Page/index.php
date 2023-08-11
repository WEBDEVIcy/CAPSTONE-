<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
  <title>RizJourney | Login</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container" id="container">

  <div class="form-container register-container" >
  <?php if (isset($_GET['register_error'])) { ?>
                <p class="error"><?php echo $_GET['register_error']; ?></p>
            <?php } ?>
            <form method="POST" action="register.php" id="Register">
    <h1>Register here.</h1>
   
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="hidden" name="form_type" value="register">
    <button type="submit" name="register">Register</button>
    
  </form>
</div>


    <div class="form-container login-container">
    <form method="POST" action="login.php">
        <h1>Login</h1>
        <?php if (isset($_GET['error'])) { ?>
                    <div class="alert"><?php echo $_GET['error']; ?></div>
                <?php } ?>
        <input type="text" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Remember me</label>
          </div>
        </div>
        <button type="submit" name="login">Login</button>
       
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Hello <br> Rizalistas</h1>
          <p>if You have an account, login here and have fun</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start your <br> Rizjourney</h1>
          <p>if you don't have an account yet, join us and start your journey.</p>
          <button class="ghost" id="register">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="script.js"></script>

</body>
</html>



