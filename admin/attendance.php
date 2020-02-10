<?php 
// include('php_script/databaseConfig.php');
// include('php_script/session.php');
  require_once('db.php');
  require_once('functions.php');
  require_once('sessions.php');
?>

<!DOCTYPE html>
<html>
<?php require_once('head.php');?>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <?php require_once('header.php'); ?>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php require_once('nav.php'); ?>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Attendance Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Page </li>
                    </ul>
                </div>
                <section class="tables">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard1"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4"><i class="fa fa-university"></i> Church Attendance</h3>
                                    </div>
                                    <div class="card-body">

                                        <form action="<?php $_PHP_SELF; ?>" method="POST">
                                            <div class="table-responsive">
                                                <?php 
                                                $msg='';
                                                    date_default_timezone_set("Africa/Accra");
                                                    $currentTime = time();
                                                    $dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
                                                    if(isset($_POST['log_attendance'])){
                                                      $attendance_male = mysqli_real_escape_string($conn, $_POST['attendance_male']);
                                                      $attendance_female = mysqli_real_escape_string($conn, $_POST['attendance_female']);
                                                      $attendance_visitors = mysqli_real_escape_string($conn, $_POST['attendance_vistitors']);

                                                      $attendanceSQL = "INSERT INTO attendance VALUES('','$attendance_male','$attendance_female','$attendance_visitors','$dateTime')";
                                                      $attendanceResult = mysqli_query($conn, $attendanceSQL);
                                                      if($attendanceResult){
                                                        $_SESSION['Message']= "You have ".$attendance_male." Males, ".$attendance_female." Females and ".$attendance_visitors." Visitors";
                                                       
                                                          // Redirect_to("attendance.php");
                                                      }else{
                                                        $_SESSION['Message']= "Attendance Log Fails Please Try again";
                                                          // Redirect_to("attendance.php");
                                                      }

                                                    }
                                                  ?>
                                                <?php echo Message(); ?>
                                                <table class="table">

                                                    <tbody>
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="attendance_male">Male</label></td>
                                                            <td><input type="text" name="attendance_male"
                                                                    id="attendance_male" placeholder="eg. 5"
                                                                    class="form-control" value="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="attendance_female">Female</label></td>
                                                            <td><input type="text" name="attendance_female"
                                                                    id="attendance_female" placeholder="eg. 5"
                                                                    class="form-control" value="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="attendance_vistitors">Visitors</label></td>
                                                            <td><input type="text" name="attendance_vistitors"
                                                                    id="attendance_vistitors" placeholder="eg. 5"
                                                                    class="form-control" value="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button type="submit" id="log_attendance"
                                                                    name="log_attendance" class="btn btn-success"
                                                                    value="log"><i class="fa fa-briefcase"></i> Log
                                                                    Attendance</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard2" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard2"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">View Attendance Records</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <select class="form-group-material custom-select my-1 mr-sm-2"
                                                            id="attendance_view" required name="attendance_view">
                                                            <?php 
                                                                  $showDate = '';
                                                                  $sqlDate = "SELECT attendance_date FROM attendance";
                                                                  $resultDate = mysqli_query($conn, $sqlDate);

                                                                  if (mysqli_num_rows($resultDate) > 0) {
                                                                    while ($rowDate = mysqli_fetch_array($resultDate)) {
                                                                      $showDate .= '
                                                                          <option value="' . $rowDate['attendance_date'] . '">' . $rowDate['attendance_date'] . '</option>
                                                                        ';
                                                                    }
                                                                  } else {
                                                                    $showDate .= '
                                                                      <option>No Date Yet</option>
                                                                      ';
                                                                  }

                                                                  ?>
                                                            <?php echo $showDate; ?>
                                                        </select>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <!-- POPULATE FROM DATABASE -->

                                            <div id="viewDates"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--   <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">ss</h3>
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
                </div>-->
                        </div>
                    </div>
                </section>
                <!-- Page Footer-->
                <?php require_once('footer.php');?>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('footer_link.php');?>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>
<script>
$(document).on('change', '#attendance_view', function() {
    var attend = $('#attendance_view').val();
    // alert(attend);
    $.ajax({
        url: 'scripts.php',
        method: 'POST',
        data: {
            attend
        },
        success: function(data) {
            // alert(data);
            $('#viewDates').html(data);
        }
    });
})
</script>