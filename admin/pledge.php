<?php 
// include('php_script/databaseConfig.php');
// include('php_script/session.php');
require_once('db.php');
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
                        <h2 class="no-margin-bottom">Pledge Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Pledges Page </li>
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
                                        <h3 class="h4">Set Pledges</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="show_pledges"></div>
                                        <label for="set_pledge">Set Pledge</label>
                                        <input type="text" id="set_pledge" name="set_pledge" placeholder="Set Pledges"
                                            class="form-control"><br />
                                        <div style="float:right">
                                            <button type="button" id="set_pledge_button" name="set_pledge_button"
                                                class="btn btn-secondary"><i class="fa fa-pencil"></i> Create
                                                Pledge</button>
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
                                        <h3 class="h4">Payment</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="setPledge"></div>
                                        <select class="form-group-material custom-select my-1 mr-sm-2" id="pledge_"
                                            name="pledge_">
                                            <option selected>Pledge...</option>
                                            <?php 
                                                $showPledge = '';
                                                $pledge_SQL = "SELECT * FROM pledge";
                                                $pledge_result = mysqli_query($conn, $pledge_SQL);

                                                while ($pledge_row = mysqli_fetch_array($pledge_result)) {
                                                $showPledge .= '
                                                        <option value="' . $pledge_row['pledgetitle'] . '">' . $pledge_row['pledgetitle'] . '</option>
                                                    ';
                                                }
                                                ?>
                                            <?php echo $showPledge; ?>
                                        </select>
                                        <div class="table-responsive">
                                            <label for="pledge_name">Payee's Name</label>
                                            <input type="text" name="pladge_name" id="pledge_name" class="form-control"
                                                Placeholder="Payee's name">
                                            <label for="pledge_amount">Amount</label>
                                            <input type="number" name="pladge_amount" id="pledge_amount"
                                                class="form-control" Placeholder="Payee's Amount"><br />
                                            <div style="float:right">
                                                <button type="button" name="pledge_payment_btn" id="pledge_payment_btn"
                                                    class="btn btn-primary">&#8373; Pay</button>
                                            </div>
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
                                        <h3 class="h4">Individual Pledges</h3>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-group-material custom-select my-1 mr-sm-2"
                                            id="pledge_individual" required name="pledge_individual">
                                            <option>Pledge...</option>
                                            <?php 
                                                $showPledge_individual = '';
                                                $pledge_individual_SQL = "SELECT * FROM pledge";
                                                $pledge_individual_result = mysqli_query($conn, $pledge_individual_SQL);

                                                while ($pledge_individual_row = mysqli_fetch_array($pledge_individual_result)) {
                                                $showPledge_individual .= '
                                                        <option value="' . $pledge_individual_row['pledgetitle'] . '">' . $pledge_individual_row['pledgetitle'] . '</option>
                                                    ';
                                                }
                                                ?>
                                            <?php echo $showPledge_individual; ?>
                                        </select>
                                        <div class="table-responsive">
                                            <div id="showPledge"></div>

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
                                        <h3 class="h4">Total Pledge Received</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="showTotal" align="center">

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
    $('#set_pledge_button').attr('disabled', true);
    $('#set_pledge').keyup(function() {
        $('#set_pledge_button').attr('disabled', false);
        if ($('#set_pledge').val().length === 0) {
            $('#set_pledge_button').attr('disabled', true);
        } else {
            $('#set_pledge_button').attr('disabled', false);
        }
    });
    //============================== CREATE PLEDGE
    $('#set_pledge_button').click(function() {
        var createPledge = $('#set_pledge').val();
        var createPledgeButton = $('#set_pledge').val();

        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                createPledge: createPledge,
                createPledgeButton: createPledgeButton
            },
            success: function(data) {
                $('#show_pledges').html(data);
                $('#set_pledge').val('');
            }
        });

    });

    //============================== PAY PLEDGE vALIDATTION ==================
    $('#pledge_payment_btn').attr('disabled', true);
    $('#pledge_name').attr('disabled', true);
    $('#pledge_amount').attr('disabled', true);

    //Pledge Title
    $('#pledge_').change(function() {
        $('#pledge_name').attr('disabled', false);
        if ($('#pledge_').val() === '') {
            $('#pledge_name').attr('disabled', true);
        } else {
            $('#pledge_name').attr('disabled', false);
        }
    });

    //Pledge Name
    $('#pledge_name').keyup(function() {
        $('#pledge_amount').attr('disabled', false);
        if ($('#pledge_name').val().length === 0) {
            $('#pledge_amount').attr('disabled', true);
            if ($('#pledge_amount').val('')) {
                $('#pledge_payment_btn').attr('disabled', true);
            }
        } else {
            $('#pledge_amount').attr('disabled', false);
        }
    });

    //Pledge Name
    $('#pledge_amount').keyup(function() {
        $('#pledge_payment_btn').attr('disabled', false);
        if ($('#pledge_amount').val().length === 0) {
            $('#pledge_payment_btn').attr('disabled', true);
        } else {
            $('#pledge_payment_btn').attr('disabled', false);
        }
    });

    //================================ PAY PLEDGE ==============================

    $('#pledge_payment_btn').click(function() {
        var pledge_ = $('#pledge_').val();
        var pledge_name = $('#pledge_name').val();
        var pledge_amount = $('#pledge_amount').val();
        var pledge_payment_btn = $('#pledge_payment_btn').val();

        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                pledge_: pledge_,
                pledge_name: pledge_name,
                pledge_amount: pledge_amount,
                pledge_payment_btn: pledge_payment_btn
            },
            success: function(data) {
                $('#setPledge').html(data);
                $('#pledge_').val('');
                $('#pledge_name').val('');
                $('#pledge_amount').val('');
            }
        });
    });

    //=========================== VIEW PLEDGE ====================
    $('#pledge_individual').change(function() {
        var pledge_individual = $('#pledge_individual').val();

        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                pledge_individual: pledge_individual
            },
            success: function(data) {

                $('#showPledge').html(data);

            }
        });
    });

    $('#pledge_individual').change(function() {
        var pledgeindividual = $('#pledge_individual').val();

        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                pledgeindividual: pledgeindividual
            },
            success: function(data) {


                $('#showTotal').html(data);
            }
        });
    });





});
</script>