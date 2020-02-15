<?php 
// include('php_script/session.php');
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
                        <h2 class="no-margin-bottom">Offering Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Visitors Page </li>
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
                                        <h3 class="h4">Visitors Registrations</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="showVisitors"></div>
                                            <table class="table">
                                                <thead>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="male_visitor">Name</label></td>
                                                        <td><input type="text" name="male_visitor" id="male_visitor"
                                                                placeholder="eg. Frank Arthur" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="visitor_contact">Contact</label></td>
                                                        <td><input type="text" name="visitor_contact"
                                                                id="visitor_contact" placeholder="eg 0245118878"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="visitor_residence">Residence</label></td>
                                                        <td><input type="text" name="visitor_residence"
                                                                id="visitor_residence" placeholder="eg. Maa Joyce"
                                                                class="form-control"></td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><button type="text" style="float:right"
                                                                name="register_visitor" id="register_visitor"
                                                                class="btn btn-outline-primary"
                                                                value="visitor_button"><i class="fa fa-pencil"></i>
                                                                Register</button></td>
                                                    </tr>
                                                    <tr>

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
    /* Visitors Registrations page */
    $('#register_visitor').click(function() {
        let male = $('#male_visitor').val();
        let contact = $('#visitor_contact').val();
        let residence = $('#visitor_residence').val();
        let visitorbtn = $('#register_visitor').val();

        if (male === '') {
            // alert('Sorry Male can\'t be empty');
            $('#showVisitors').html("<p align='center' style='color:red;'>SORRY MALE CAN'T BE EMPTY");
        } else if (contact === '') {
            // alert('Sorry Contact can\'t be empty');
            $('#showVisitors').html(
                "<p align='center' style='color:red;'>SORRY CONTACT CAN'T BE EMPTY");
        } else if (residence === '') {
            // alert('Sorry Residence can\'t be empty');
            $('#showVisitors').html(
                "<p align='center' style='color:red;'>SORRY RESIDENCE CAN'T BE EMPTY");
        } else {
            $.ajax({
                url: 'scripts.php',
                method: 'POST',
                data: {
                    male,
                    contact,
                    residence,
                    visitorbtn
                },
                success: function(data) {
                    $('#showVisitors').html(data);
                    $('#male_visitor').val('');
                    $('#visitor_contact').val('');
                    $('#visitor_residence').val('');
                }
            });
        }
    });

    $('#visitor_limit').change(function() {
        let limits = $('#visitor_limit').val();
        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                limits
            },
            success: function(data) {
                $('#visitorDisplay').html(data);

            }
        });
    });

})
</script>