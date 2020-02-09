<?php 
include('php_script/databaseConfig.php');
include('php_script/passwordScript.php');
include('php_script/session.php');

$msg = '';
date_default_timezone_set("Africa/Accra");
$currentTime = time();
$dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);





if (isset($_POST['login'])) {
  $login_user = mysqli_real_escape_string($conn, $_POST['login_user']);
  $login_password = mysqli_real_escape_string($conn, $_POST['login_password']);
  $login_as = mysqli_real_escape_string($conn, $_POST['login_as']);
  $enPassword = encryptIt($login_password);

  $login_SQL = "INSERT INTO users VALUES('','$login_user','$login_as','$enPassword','$dateTime')";
  $login_Result = mysqli_query($conn, $login_SQL);
  if ($login_Result) {

    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>You have successfully registered ' . $login_user . ' </strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
  } else {
    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Username already exist...</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
    <title>ICGC Campus Ministry : Sign up</title>
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="dashboard.php" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span><img src="img/logo.jpg" width="60" style="border-radius: 50px;" alt="ICGC"> </span><strong>&nbsp;&nbsp; ICGC Campus Ministry </strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>ICGC</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Notifications
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                  </ul>
                </li>-->
                <!-- Messages 
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                  </ul>
                </li>-->
                <!-- Languages dropdown  
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2">German</a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2">French                                         </a></li>
                  </ul>
                </li> -->
                <!-- Logout    -->
                <li class="nav-item"><a href="php_script/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <!-- <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
            <div class="title">
              <h1 class="h4">Welcome: <?php echo $login_session; ?></h1>
              <!--<p>Web Designer</p>-->
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li><a href="dashboard.php"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="register_members.php"> <i class="fa fa-fa-user"></i>Members</a></li>
                    <li><a href="tithe.php"> <i class="fa fa-bar-chart"></i>Tithe</a></li>
                    <li><a href="attendance.php"> <i class="icon-padnote"></i>Attendance </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Offering </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="offering.php">Offering</a></li>
                        <li><a href="pledges.php">Pledges</a></li>
                        <!--<li><a href="#">Page</a></li>-->
                      </ul>
                    </li>
                    <!--<li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>-->
          </ul><span class="heading">Visitors</span>
          <ul class="list-unstyled">
            <li> <a href="visitors.php"> <i class="icon-flask"></i>Visitor </a></li>
            <!--<li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>-->
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Sign up Page</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Sign up Page </li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Create User</h3>
                    </div>
                  
                    <div class="card-body">
                      <div align="center"><?php echo $msg; ?></div>
                      <form method="post" class="form-validate">
                        <div class="form-group">
                          <label for="login_user">User Name</label>
                          <input id="login_user" type="text" name="login_user" required data-msg="Please enter your username" class="form-control">
                          
                        </div>
                        <div class="form-group">
                          <label for="login_password">Password</label>
                          <input id="login_password" type="password" name="login_password" required data-msg="Please enter your password" class="form-control">
                          
                        </div>
                        <div class="form-group">
                          <label for="login_as">Login As</label>
                          <select class="form-group-material custom-select my-1 mr-sm-2" id="login_as" name="login_as">
                            <option value="Finance">Finance</option>
                            <option value="President">President</option>
                            <option value="Vice">Vice</option>
                            <option value="Admin">Administrator</option>
                            
                          </select>
                        </div>
                        <button type="submit" id="login" name="login" value="login" class="btn btn-primary btn-sm">Register</button>
                        
                        <button type="reset" id="login_reset" style="float:right" name="login_reset" value="login_reset" class="btn btn-danger btn-sm">Reset Fields</button>
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                      </form>

                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Users</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">  
                        <div id="showUsers"></div>
                        <!--<table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Login as</th>  
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
                            <? php/*
                            $show_display = '';
                            $show_login_sql = "SELECT * FROM users ORDER BY regDate DESC";
                            $show_login_result = mysqli_query($conn, $show_login_sql);

                            $count = 1;
                            if (mysqli_num_rows($show_login_result) > 0) {
                              while ($show_login_row = mysqli_fetch_array($show_login_result)) {
                                $show_display .= '
                                  <tr>
                                    <th scope="row">' . $count . '</th>
                                    <td>' . $show_login_row['username'] . '</td>
                                    <td>' . $show_login_row['password'] . '</td>
                                    <td>' . $show_login_row['login_as'] . '</td> 
                                     <td>
                                        <button type="button" id="' . $show_login_row["userid"] . '" class="delete btn btn-danger btn-sm" >Delete</button> | 
                                        <button type="button" id="' . $show_login_row["userid"] . '" class="update btn btn-primary btn-sm" data-toggle="modal" data-target="#myUpdateModal">Update</button>
                                     </td>
                                  </tr>
                                ';
                                $count++;
                              }
                            } */
                            ?>
                            <?php // echo $show_display; ?>
                            
                          </tbody>
                        </table>-->
                      </div>
                    </div>
                  </div>
                </div>
              <!--  <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Search for Member</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Username</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter                            </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Alumni Members</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">   
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Username</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter      </td>
                            </tr>
                            <tr>
                              <th scope="row">4</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">5</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">6</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter      </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Right Protected &copy; 2018 | ICGC UEW-K</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="#" class="external">Mish Rule | +233245181940</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
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

<script>
  $(document).ready(function(){
    DisplayUsers();
    function DisplayUsers(){
      var display = 'action';

       $.ajax({
        url:'php_script/signupScript.php',
        method:'POST',
        data:{display:display},
        success:function(data){
          $('#showUsers').html(data);
        }
      });
    }

//=======================================| SET UPDATE FIELDS |===============================

    $(document).on('click', '.update', function(){
      var id= $(this).attr("id");
      
      $.ajax({
        url:'php_script/signupScript.php',
        method:'POST',
        data:{id:id},
        dataType:'json',
        success:function(data){
          $('#hidden_user').val(data.user_id);
          $('#update_user').val(data.user_name);
          $('#update_password').val(data.pass_word);
          $('#update_as').val(data.login_as);
          //alert(data);
        }
      });
    });


//=======================================| DELETE FIELD |===============================

    $(document).on('click', '.delete', function(){
      var delete_id= $(this).attr("id");
      if(confirm("Are you sure you want to delete User")){
        $.ajax({
        url:'php_script/signupScript.php',
        method:'POST',
        data:{delete_id:delete_id},
        success:function(data){
           alert(data);
           DisplayUsers();
        }
      });
      }else{
        alert("Delete Cancelled");
      }
      
    });
//========================================| UPDATE BUTTON |=========================================
    $('#btnUpdate').click(function(){
      var hidden_user = $('#hidden_user').val();
      var update_user = $('#update_user').val();
      var update_password = $('#update_password').val();
      var update_as = $('#update_as').val();
      var btnUpdate = $('#btnUpdate').val();

        $.ajax({
        url:'php_script/signupScript.php',
        method:'POST',
        data:{hidden_user:hidden_user, update_user:update_user, update_password:update_password, update_as:update_as, btnUpdate:btnUpdate},
        success:function(data){
          $('#user_modal').html(data);
          setTimeout(() => {
              $('#myUpdateModal').modal('hide');
                 DisplayUsers();
          }, 3000);

        }
      });

    });
  });
</script>
<!-- Modal-->
  <div id="myUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">User Update</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <div id="user_modal"></div>
            <form>
            <input id="hidden_user" type="hidden" name="hidden_user" class="form-control">
            
            <div class="form-group">
            <!--  <label for="update_user">User Name</label>-->
              <input id="update_user" type="text" name="update_user" class="form-control">
                          
              </div>
              <div class="form-group">
          <!--    <label for="update_password">Password</label>-->
              <input id="update_password" type="text" name="update_password" class="form-control">
                          
            </div>

            <div class="form-group">
           <!--   <label for="update_as">Login As</label> -->
              <select class="form-group-material custom-select my-1 mr-sm-2" id="update_as" name="update_as">
                <option value="Finance">Finance</option>
                <option value="President">President</option>
                <option value="Vice">Vice</option>
                <option value="Admin">Administrator</option>          
              </select>
            </div>
            </form>
           <div class="modal-footer">
             <button type="button" id="btnClose" name="btnClose" data-dismiss="modal" class="btn btn-secondary">Close</button>
             <button type="button" id="btnUpdate" name="btnUpdate" class="btn btn-primary" value="update">Save changes</button>
           </div>
           </div>
         </div>
       </div>
</div>

