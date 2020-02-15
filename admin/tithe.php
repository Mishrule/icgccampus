<?php 
// include('php_script/databaseConfig.php');
// include('php_script/session.php')
  require_once('db.php');
  require_once('sessions.php');
  require_once('functions.php');
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
            <?php require_once('nav.php');?>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">tithe Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Tithe Page </li>
                    </ul>
                </div>
                <section class="tables">
                    <div id="success"></div>
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
                                        <h3 class="h4">Pay Tithe</h3>
                                    </div>
                                    <div class="card-body">
                                        <div>

                                        </div>
                                        <form action="<?php $_PHP_SELF; ?>" method="POST">
                                            <div class="table-responsive">
                                                <div align="center">
                                                    <?php 
                                                    date_default_timezone_set("Africa/Accra");
                                                    $currentTime = time();
                                                  $dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
                                                    if(isset($_POST['make_payment'])){
                                                      $tithe_member = mysqli_real_escape_string($conn, $_POST['tithe_member']);
                                                      $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                                                      $tithe_Month = mysqli_real_escape_string($conn, $_POST['tithe_Month']);
                                                      $tithe_year = mysqli_real_escape_string($conn, $_POST['tithe_year']);

                                                      $titheSQL = "INSERT INTO tithe VALUES('$tithe_member','$amount','$tithe_Month','$tithe_year','$dateTime')";
                                                      $titheResult = mysqli_query($conn, $titheSQL);
                                                      if($titheResult){
                                                        $_SESSION['Message']= $amount." Paid to  ". $tithe_member ." Records";
                                                        Redirect_to("tithe.php");
                                                      }else{
                                                        $_SESSION['Message']= "Payment Failed";
                                                        Redirect_to("tithe.php");
                                                      }

                                                    }else{
                                                      
                                                    }
                                                  ?>
                                                    <?php echo Message(); ?>
                                                    <p>
                                                        <!--<img src="#" class="img-thumbnail" alt="Image Here"></p>-->
                                                        <div id="titheImage"></div>
                                                    </p>

                                                    <p>
                                                        <label for="tithe_member">MemberID</label>
                                                        <select class="form-control" style="width:50%;"
                                                            id="tithe_member" required name="tithe_member">
                                                            <option selected>Select Member...</option>
                                                            <?php 
                                                          $tithe_Display = '';
                                                          $tithe_sql = "SELECT * FROM icgcmembers";
                                                          $tithe_result = mysqli_query($conn, $tithe_sql);
                                                          
                                                          while ($tithe_row = mysqli_fetch_array($tithe_result)) {
                                                              $tithe_Display .= ' 
                                                                <option value="' . $tithe_row['member_id'] . '">' . $tithe_row['member_id'] . '</option>
                                                              ';
                                                            }

                                                          ?>

                                                            <?php echo $tithe_Display; ?>
                                                        </select>
                                                    </p>
                                                    <p>
                                                        <label for="">Amount</label>
                                                        <input type="number" id="amount" style="width:50%;"
                                                            class="form-control" name="amount" placeholder="e.g 50.00"
                                                            value="" required>
                                                    </p>
                                                    <p>
                                                        <label class="my-1 mr-2" for="tithe_Month">Months</label>
                                                        <select class=" form-control " style="width:50%;"
                                                            id="tithe_Month" required name="tithe_Month">
                                                            <option selected>Month...</option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </p>
                                                    <p>
                                                        <label for="">Year </label>
                                                        <input type="number" name="tithe_year" class="form-control"
                                                            style="width:50%;" id="tithe_year"
                                                            placeholder="Enter Year eg. 2018" value="" required>
                                                    </p>
                                                    <p>
                                                        <div align="center">
                                                            <button class="btn btn-primary" style="float:right;"
                                                                type="submit" name="make_payment" id="make_payment"
                                                                data-toggle="modal" data-target="#myUpdateModal"
                                                                value="send">&#8373; Make Payment</button>
                                                        </div>
                                                    </p>

                                                </div>
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
                                        <h3 class="h4">Payment Records</h3>
                                    </div>
                                    <div class="card-body">
                                        <div style="float:left">

                                        </div>
                                        <div class="table-responsive">
                                            <form action="<?php $_PHP_SELF; ?>" method="POST">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <select
                                                                    class="form-group-material custom-select my-1 mr-sm-2"
                                                                    id="view_records_month" required
                                                                    name="view_records_month">
                                                                    <option selected>Month...</option>
                                                                    <option value="January">January</option>
                                                                    <option value="February">February</option>
                                                                    <option value="March">March</option>
                                                                    <option value="April">April</option>
                                                                    <option value="May">May</option>
                                                                    <option value="June">June</option>
                                                                    <option value="July">July</option>
                                                                    <option value="August">August</option>
                                                                    <option value="September">September</option>
                                                                    <option value="October">October</option>
                                                                    <option value="November">November</option>
                                                                    <option value="December">December</option>
                                                                </select>
                                                            </th>
                                                            <th>
                                                                <select
                                                                    class="form-group-material custom-select my-1 mr-sm-2"
                                                                    id="view_records_year" required
                                                                    name="view_records_year">
                                                                    <?php 
                                                                  $show = '';
                                                                  $mysql = "SELECT DISTINCT(payment_year) FROM tithe";
                                                                  $myresult = mysqli_query($conn, $mysql);
                                                                  while ($row = mysqli_fetch_array($myresult)) {
                                                                    $show .= '
                                                                      <option value="' . $row['payment_year'] . '">' . $row['payment_year'] . '</option>
                                                                      ';
                                                                  }
                                                                  ?>
                                                                    <?php echo $show; ?>
                                                                </select>
                                                            </th>
                                                            <th>
                                                                <select
                                                                    class="form-group-material custom-select my-1 mr-sm-2"
                                                                    id="view_record_limit" name="view_records_limit">

                                                                    <option value="5">5</option>
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="10000">All</option>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div style="float:right">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm"><i
                                                                            class="fa fa-print"></i> Print</button>
                                                                    <button type="submit" name="submitView"
                                                                        class="btn btn-primary btn-sm"><i
                                                                            class="fa fa-save"></i> Show</button>
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>member ID</th>
                                                                <th>payment Month</th>
                                                                <th>Amount</th>
                                                                <th>Payment Year</th>
                                                                <th>Date Paid</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                if(isset($_POST['submitView'])){
                                                                  $view_records_month = mysqli_real_escape_string($conn, $_POST['view_records_month']);
                                                                  $view_records_year = mysqli_real_escape_string($conn, $_POST['view_records_year']);
                                                                  $view_records_limit = mysqli_real_escape_string($conn, $_POST['view_records_limit']);
                                                                  
                                                                  $viewTitheSQL = "SELECT * FROM tithe WHERE payment_month='$view_records_month' AND payment_year='$view_records_year' ORDER BY payment_date DESC LIMIT $view_records_limit";

                                                                //   echo(print_r($viewTitheSQL));
                                                                  
                                                                  $viewTitheResult = mysqli_query($conn, $viewTitheSQL);
                                                                  $viewCount=1;
                                                                  if(mysqli_num_rows($viewTitheResult)>0){
                                                                    while($viewTitheRow = mysqli_fetch_array($viewTitheResult)){
                                                                      echo '
                                                                        <tr>
                                                                          <td>'.$viewCount++.'</td>
                                                                          <td>'.$viewTitheRow['member_id'].'</td>
                                                                          <td>'.$viewTitheRow['payment_month'].'</td>
                                                                          <td>'.$viewTitheRow['payment_amount'].'</td>
                                                                          <td>'.$viewTitheRow['payment_year'].'</td>
                                                                          <td>'.$viewTitheRow['payment_date'].'</td>
                                                                        </tr>
                                                                      ';
                                                                    }
                                                                  }else{
                                                                    echo '
                                                                      <tr>
                                                                          <td>NO TITHE RECORDS MADE</td>  
                                                                      </tr>
                                                                    ';
                                                                  }
                                                                }
                                                              ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>

                                            <!-- <div id="ViewRecord"></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard3" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard3"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Individual Tithe Report</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <form action="<?php $_PHP_SELF; ?>" method="POST">

                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Member:</th>
                                                            <th>
                                                                <select
                                                                    class="form-group-material custom-select my-1 mr-sm-2"
                                                                    id="view_record_search" required
                                                                    name="view_record_search">
                                                                    <option value="sel">Select Members...</option>
                                                                    <?php 
                                                                    $tithe_search = '';
                                                                    $individualSQL = "SELECT DISTINCT(member_id) FROM tithe";
                                                                    $individualResult = mysqli_query($conn, $individualSQL);
                                                                   
                                                                      while ($individualRow = mysqli_fetch_array($individualResult)) {
                                                                        $tithe_search .= '
                                                                          <option value=' . $individualRow['member_id'] . '>' . $individualRow['member_id'] . '</option>
                                                                        ';
                                                                      }
                                                                      
                                                                    
                                                                    ?>
                                                                    <?php echo $tithe_search; ?>
                                                                </select>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td colspan="3">
                                                                <div style="float:right">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm"><i
                                                                            class="fa fa-print"></i> Print</button>
                                                                    <button class="btn btn-success btn-sm" name="print"
                                                                        type="submit" name="show"
                                                                        value="Show">Show</button>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>member ID</th>
                                                                <th>payment Month</th>
                                                                <th>Amount</th>
                                                                <th>Payment Year</th>
                                                                <th>Date Paid</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                              if(isset($_POST['view_record_search'])){
                                                                
                                                                 $individualSearch = mysqli_real_escape_string($conn, $_POST['view_record_search']);
                                                                 $individualSearchSQL = "SELECT * FROM tithe WHERE member_id='$individualSearch'";
                                                                 $individualSearchResult = mysqli_query($conn, $individualSearchSQL);
                                                                 $individualCount=1;
                                                                 if(mysqli_num_rows($individualSearchResult)>0){
                                                                    while($individualRow = mysqli_fetch_array($individualSearchResult)){
                                                                      echo '
                                                                          <tr>
                                                                            <th scope="row">'.$individualCount++.'</th>
                                                                            <td>'.$individualRow['member_id'].'</td>
                                                                            <td>'.$individualRow['payment_month'].'</td>
                                                                            <td>'.$individualRow['payment_amount'].'</td>
                                                                            <td>'.$individualRow['payment_year'].'</td>
                                                                            <td>'.$individualRow['payment_date'].'</td>
                                                                          </tr>                                                                                  
                                                                      ';
                                                                    }
                                                                 }else{
                                                                    echo '
                                                                          <tr>
                                                                            
                                                                            <td colspan="6"><marquee>No Records Found</marquee></td>
                                                                            
                                                                          </tr>                                                                                  
                                                                      ';
                                                                  }
                                                                }
                                                              ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- <div class="card">
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
                  </div>-->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Page Footer-->
                <?php require_once('footer.php'); ?>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('footer_link.php');?>
</body>

</html>