<?php 
require_once('db.php');
require_once('sessions.php');

?>
<?php
    //========================================| TESTIMONY |=================================================
    date_default_timezone_set("Africa/Accra");
$currentTime = time();
$dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
$msg = '';
    if(isset($_POST['testimonyBtn'])){
        
        // $testimonyImage = mysqli_real_escape_string($conn, $_POST['testimony_Btn']);
        $testimony_message = mysqli_real_escape_string($conn, $_POST['testimony_message']);
        $testimony_by = mysqli_real_escape_string($conn, $_POST['testimony_by']);

        if($testimony_message == '' && $testimony_by == ''){
          $msg .= 'Sorry fields be empty';
        }else{
          $image = $_FILES["testimony_image"]["name"];
  $target = "img/" . basename($_FILES["testimony_image"]["name"]);

  $thanksGivingSQL = "INSERT INTO testimony VALUES('','$image','$testimony_message','$testimony_by','$dateTime')";
  $thanksGivingResult = mysqli_query($conn, $thanksGivingSQL);
  move_uploaded_file($_FILES["testimony_image"]["tmp_name"], $target);
  if ($thanksGivingResult) {

    $msg .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>You have successfully registered a testimony by ' . $testimony_by . ' </strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                //  Message();
                header('location:thanks_giving.php');
                
       
  } else {
    $msg .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Registration Failed try again...</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';

   
  }
        }
        

  


    }
?>
<!DOCTYPE html>
<html>
<?php require_once('head.php');?>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <?php require_once('header.php');?>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php require_once('nav.php');?>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Thanks Giving Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Thanks Giving Page </li>
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
                                        <h3 class="h4">Thanks Giving</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div align="center" id="showTestimony"><?php echo $msg; ?></div>
                                            <form action="<?php $_PHP_SELF; ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <table class="table">
                                                    <thead>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="testimony_image">Image</label></td>
                                                            <td><input type="file" name="testimony_image"
                                                                    id="testimony_image" placeholder="eg. Frank Arthur"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="testimony_message">Message</label></td>
                                                            <td><input type="text" name="testimony_message"
                                                                    id="testimony_message" placeholder="eg 0245118878"
                                                                    class="form-control"></td>
                                                        </tr>
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="testimony_by">Testimony By</label></td>
                                                            <td><input type="text" name="testimony_by" id="testimony_by"
                                                                    placeholder="eg. Maa Joyce" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><button type="submit" style="float:right"
                                                                    name="testimonyBtn" id="testimonyBtn"
                                                                    class="btn btn-outline-primary"
                                                                    value="testimonyBtn"><i class="fa fa-pencil"></i>
                                                                    Create</button></td>
                                                        </tr>
                                                        <tr>

                                                    </tbody>
                                                </table>
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

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>
                                                            <label for="visitor limit">Limit</label>
                                                            <select style="width:30%"
                                                                class="form-group-material custom-select my-1 mr-sm-2"
                                                                id="visitor_limit" name="visitor_limit">

                                                                <option value="0">Select...</option>
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

                                                </tbody>
                                            </table>
                                            <div id="visitorDisplay"></div>
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
    <!-- JavaScript files-->
    <?php require_once('footer_link.php');?>
</body>

</html>
<script>
$(document).ready(function() {
    $('#testimonyBtn').click(function() {
        if ($('#testimony_message').val() === '') {
            alert('Fields can\'t be empty')

        } else if ($('#testimony_by').val() === '') {
            alert('Fields can\'t be empty')
        } else {
            alert('Created Successfully');

        }

    });




})
</script>