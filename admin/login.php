<?php
include('php_script/databaseConfig.php');
include('php_script/passwordScript.php');
session_start();
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST['loginUsername']);
  $myPassword = mysqli_real_escape_string($conn, $_POST['loginPassword']);

  // $encPassword = encryptIt($myPassword);

  $sql = "SELECT username FROM users WHERE username='$username' AND pass_word='$encPassword'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $_SESSION['login_user'] = $username;
    header("Location:dashboard.php");
  } else {
    $error = '<div class=" alert alert - danger alert - dismissible fade show " role=" alert ">
                  <strong>Your username or Password is invalid</strong>
                  <button type=" button " class=" close "  data-dismiss=" alert " aria-label=" Close ">
                    <span aria-hidden=" true ">&times;</span>
                  </button>
                </div>';
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <!--<h1>Dashboard</h1>-->
                                    <img src="img/icgc.png" alt="ICGC Logo" style="width:100%">
                                </div>
                                <div align="center">
                                    <marquee direction="up">
                                        <h1>INTERNATIONAL <br />CENTRAL GOSPEL <br />CHURCH <br />CAMPUS CHURCH (UEW-K)
                                        </h1>
                                    </marquee>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <?php echo $error; ?>
                                <form method="post" class="form-validate">
                                    <div class="form-group">
                                        <input id="loginUsername" type="text" name="loginUsername" required
                                            data-msg="Please enter your username" class="input-material">
                                        <label for="loginUsername" class="label-material">User Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="loginPassword" type="password" name="loginPassword" required
                                            data-msg="Please enter your password" class="input-material">
                                        <label for="loginPassword" class="label-material">Password</label>
                                    </div><button type="submit" id="send" name="send"
                                        class="btn btn-primary">Login</button>
                                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                                </form>
                                <!--<a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>