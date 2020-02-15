<?php 
    require_once('db.php');
    require_once('sessions.php');
    require_once('functions.php');

$msg = '';
date_default_timezone_set("Africa/Accra");
$currentTime = time();
$dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

if (isset($_POST['registerBtn'])) {
  $memberid = mysqli_real_escape_string($conn, $_POST['registerMemberID']);
  $fullname = mysqli_real_escape_string($conn, $_POST['registername']);
  $program = mysqli_real_escape_string($conn, $_POST['registerprogram']);
  $level = mysqli_real_escape_string($conn, $_POST['memberLevel']);
  $hall = mysqli_real_escape_string($conn, $_POST['registerhall']);
  $contact = mysqli_real_escape_string($conn, $_POST['registercontact']);
  $email = mysqli_real_escape_string($conn, $_POST['registeremail']);
  $gender = mysqli_real_escape_string($conn, $_POST['memberGender']);


  $image = $_FILES["imageFile"]["name"];
  $target = "img/" . basename($_FILES["imageFile"]["name"]);

  $registerSQL = "INSERT INTO icgcmembers VALUES('','$memberid','$fullname','$gender','$program','$level','$hall','$contact','$email','$image','$dateTime')";
  $registerResult = mysqli_query($conn, $registerSQL);
  move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target);
  if ($registerResult) {

    /*$msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>You have successfully registered ' . $fullname . ' </strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';*/
        $_SESSION['Message']= "You have successfully registered ". $fullname ." Records";
        Redirect_to("register_members.php");
  } else {
    // $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //               <strong>Registration Failed try again...</strong>
    //               <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //               </button>
    //             </div>';

    $_SESSION['Message']="Registration Failed try again...";
        Redirect_to("register_members.php");
  }



}

?>
<!DOCTYPE html>
<html>
<?php require_once('head.php'); ?>

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
                        <h2 class="no-margin-bottom"><i class="fa fa-user"></i> Members Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Members Page </li>
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
                                        <h3 class="h4">Register Members</h3>
                                    </div>
                                    <div align="center"><?php //echo $msg;
                                        echo Message();
                                    ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <form method="POST" action="<?php $_PHP_SELF; ?>"
                                                enctype="multipart/form-data">
                                                <label class="col-sm-3 form-control-label">Create a Member</label>
                                                <div class="col-sm-12">
                                                    <div class="form-group-material">
                                                        <input id="register-MemberID" type="text"
                                                            name="registerMemberID" required class="input-material">
                                                        <label for="register-MemberID"
                                                            class="label-material">MemberID</label>
                                                    </div>
                                                    <div class="form-group-material">
                                                        <input id="register-name" type="text" name="registername"
                                                            required class="input-material">
                                                        <label for="register-name" class="label-material">Full
                                                            Name</label>
                                                    </div>
                                                    <div class="form-group-material">
                                                        <input id="register-program" type="text" name="registerprogram"
                                                            required class="input-material">
                                                        <label for="register-program" class="label-material">program of
                                                            Study</label>
                                                    </div>
                                                    <label class="my-1 mr-2" for="memberGender">Gender</label>
                                                    <select class="form-group-material custom-select my-1 mr-sm-2"
                                                        id="memberGender" name="memberGender">
                                                        <!-- <option selected>Choose...</option>-->
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>

                                                    </select><br />
                                                    <label class="my-1 mr-2" for="memberLevel">Level</label>
                                                    <select class="form-group-material custom-select my-1 mr-sm-2"
                                                        id="memberLevel" name="memberLevel">
                                                        <!--  <option selected>Choose...</option>-->
                                                        <option value="level100">Level 100</option>
                                                        <option value="level200">Level 200</option>
                                                        <option value="level300">Level 300</option>
                                                        <option value="level400">Level 400</option>
                                                        <option value="alumni">Alumni</option>
                                                    </select><br />
                                                    <div class="form-group-material">
                                                        <input id="register-hall" type="text" name="registerhall"
                                                            required class="input-material">
                                                        <label for="register-hall" class="label-material">Hall of
                                                            Affiliate</label>
                                                    </div>
                                                    <div class="form-group-material">
                                                        <input id="register-contact" type="contact"
                                                            name="registercontact" required class="input-material">
                                                        <label for="register-contact"
                                                            class="label-material">Contact</label>
                                                    </div>
                                                    <div class="form-group-material">
                                                        <input id="register-email" type="email" name="registeremail"
                                                            required class="input-material">
                                                        <label for="register-email" class="label-material">Email</label>
                                                    </div>
                                                    <div class="custom-file">
                                                        <label>Choose Image</label>
                                                        <input type="file" class="form-control" name="imageFile"
                                                            id="imageFile">

                                                    </div><br /><br />
                                                    <div align="center">
                                                        <button class="btn btn-primary" style="float:right;"
                                                            type="submit" name="registerBtn" id="registerBtn"
                                                            value="send"><i class="fa fa-pencil"></i>Register
                                                            Student</button>
                                                    </div>

                                                    <!--  <button type="submit" style="float:right;" id="register" name="register" class="btn btn-primary" value="register">Register</button> -->
                                                </div>
                                            </form>
                                        </div>
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
                                        <h3 class="h4">Registered Members</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div style="float:right">

                                                <select class="form-group-material custom-select my-1 mr-sm-2"
                                                    id="mLimit" name="mLimit">

                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="10000">All</option>
                                                </select>
                                            </div>

                                            <table class="table table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Member ID</th>
                                                        <th>Full Name</th>
                                                        <th>Level</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        
                                                        $registeredMembersSQL = "SELECT * FROM icgcmembers ORDER BY date_time DESC LIMIT 10";
                                                        // print_r( $registeredMembersSQL);
                                                        $registeredExecution = mysqli_query($conn, $registeredMembersSQL);
                                                        $registerCount = 1;
                                                        if(mysqli_num_rows($registeredExecution)>0){
                                                            while($registeredRow = mysqli_fetch_array($registeredExecution)){
                                                            echo '
                                                                <tr>
                                                                    <th scope="row">'.$registerCount++.'</th>
                                                                    <td>'.$registeredRow['member_id'].'</td>
                                                                    <td>'.$registeredRow['fullname'].'</td>
                                                                    <td>'.$registeredRow['level'].'</td>
                                                                    <td><a href="#" class="btn btn-primary btn-sm" name="'.$registeredRow['id'].'">Edit</a></td>
                                                                    <td><a href="#" class="btn btn-danger btn-sm" name="'.$registeredRow['id'].'">Delete</a></td>
                                                                </tr>
                                                            ';
                                                        }
                                                        }else{
                                                            echo "Sorry No Member is Registered";
                                                        }

                                                        
                                                    ?>

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
                                        <h3 class="h4">Search for Member</h3>
                                    </div>
                                    <div class="card-body">
                                        <form align="center" method="post" action="<?php $_PHP_SELF;?>">
                                            <div class="form-group-material">
                                                <input id="searchText" type="text" name="searchText" required
                                                    class="input-material">
                                                <label for="searchText" class="label-material"><i
                                                        class="fa fa-search"></i>Search Members</label>
                                                <div><br />
                                                    <button type="submit" id="searchBtn" name="searchBtns"
                                                        class="btn btn-info btn-sm"><i
                                                            class="fa fa-search"></i>Search</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="table-responsive">
                                            <?php 
                                                if(isset($_POST['searchBtns'])){
                                                    $search = mysqli_real_escape_string($conn, $_POST['searchText']);
                                                    $searchSQL = "SELECT * FROM icgcmembers WHERE member_id='$search' OR fullname = '$search' OR contact='$search'";
                                                    print_r($searchSQL);
                                                    // print_r($searchSQL);
                                                    $searchResult = mysqli_query($conn, $searchSQL);
                                                    if(mysqli_num_rows($searchResult)>0){
                                                        while($searchRow = mysqli_fetch_array($searchResult)){
                                                            echo '
                                                                <div align="center">
                                                                    <img class="img-thumbnail" src="img/'.$searchRow['image'].'" width="200px" height="200px;" /><br><hr>
                                                                    <h1>'.$searchRow['fullname'].'</h1><hr>
                                                                    <h2>'.$searchRow['member_id'].'</h2><hr>
                                                                    <h3>'.$searchRow['contact'].'</h3><hr>
                                                                    <h3>'.$searchRow['hall'].'</h3><hr>
                                                                    <h3>'.$searchRow['email'].'</h3><hr>
                                                                    <h3>'.$searchRow['date_time'].'</h3><hr>
                                                                </div>
                                                            ';
                                                            
                                                        }
                                                        
                                                    }else{
                                                        echo '
                                                            <hr>
                                                                <marquee>NO STUDENT RECORD FOUND</marquee>
                                                            <hr>
                                                        ';
                                                    }

                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard4" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard4"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Alumni Members</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div style="float:right">

                                                <select class="form-group-material custom-select my-1 mr-sm-2"
                                                    id="alu_Limit" name="alu_Limit">

                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="10000">All</option>
                                                </select>
                                            </div>
                                            <table class="table table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Member ID</th>
                                                        <th>Full Name</th>
                                                        <th>Level</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        
                                                        $alumniMembersSQL = "SELECT * FROM icgcmembers WHERE level='alumni' ORDER BY date_time DESC LIMIT 10";
                                                        $alumniExecution = mysqli_query($conn, $alumniMembersSQL);
                                                        $registerCount = 1;
                                                        if(mysqli_num_rows($alumniExecution)>0){
                                                            while($alumniRow = mysqli_fetch_array($alumniExecution)){
                                                            echo '
                                                                <tr>
                                                                    <th scope="row">'.$registerCount++.'</th>
                                                                    <td>'.$alumniRow['member_id'].'</td>
                                                                    <td>'.$alumniRow['fullname'].'</td>
                                                                    <td>'.$alumniRow['level'].'</td>
                                                                    <td><a href="#" class="btn btn-primary btn-sm" name="'.$alumniRow['id'].'">Edit</a></td>
                                                                    <td><a href="#" class="btn btn-danger btn-sm" name="'.$alumniRow['id'].'">Delete</a></td>
                                                                </tr>
                                                            ';
                                                        }
                                                        }else{
                                                            
                                                            echo '
                                                                <tr>
                                                                    <td colspan="6"><marquee>SORRY NO MEMBER IS ALUMNI</marquee></td>
                                                                </tr>
                                                            ';
                                                        }

                                                        
                                                    ?>

                                                </tbody>
                                            </table>
                                            <div id="alumnidisplay"></div>
                                            <!--<table class="table table-striped table-sm">
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
                        </table> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Page Footer-->
                <?php require_once('footer.php');?>
            </div>
        </div>
    </div>
    <?php require_once('footer_link.php'); ?>
</body>

</html>