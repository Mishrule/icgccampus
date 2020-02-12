<?php 
// include('php_script/databaseConfig.php');
// include('php_script/session.php');
    require_once('db.php');
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
                        <h2 class="no-margin-bottom"> Expenditure Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Expenditure Page </li>
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
                                                    class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <div aria-labelledby="closeCard1"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Expenditure</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="display_payment"></div>
                                            <table class="table">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    <form id="expensiveForm">
                                                        <tr>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="receiptNumber">Receipt Number:</label></td>
                                                            <td><input type="number" name="receiptNumber"
                                                                    id="receiptNumber" placeholder="eg. 5"
                                                                    class="form-control" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="itemBought">Item Bought</label></td>
                                                            <td><input type="text" name="itemBought" id="itemBought"
                                                                    placeholder="eg. 5" class="form-control" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="amount">Amount</label></td>
                                                            <td><input type="number" name="amount" id="amount"
                                                                    class="form-control" placeholder="eg. 20" required>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button type="button" id="log_expense"
                                                                    name="log_expense" class="btn btn-success"
                                                                    value="log">&#8373; Make
                                                                    Payment</button>
                                                            </td>
                                                        </tr>
                                                    </form>
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
                                        <h3 class="h4">View Expensive</h3>
                                    </div>
                                    <div class="card-body">
                                        <div style="float:right">
                                            <select class="form-group-material custom-select my-1 mr-sm-2"
                                                id="offeringLimit" name="offeringLimit">

                                                <option value="1">5</option>
                                                <option value="2">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="10000">All</option>
                                            </select>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="showTable">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Expense Name</th>
                                                    <th>Receipt Number</th>
                                                    <th>Amount</th>
                                                    <th>Purchase Date</th>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $expenseSQL = "SELECT * FROM expenditure ORDER BY expenditure_date LIMIT 5";
                                                        $expenseResult = mysqli_query($conn, $expenseSQL);
                                                        $count = 1;
                                                        while($expenseRow = mysqli_fetch_array($expenseResult)){
                                                            echo '
                                                                <tr>
                                                                    <td>'.$count++.'</td>
                                                                    <td>'.$expenseRow['expenditure_title'].'</td>
                                                                    <td>'.$expenseRow['receipt_number'].'</td>
                                                                    <td>'.$expenseRow['expenditure_Amount'].'</td>
                                                                    <td>'.$expenseRow['expenditure_date'].'</td>
                                                                </tr>
                                                            ';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div id="offeringDisplay"></div>
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

    $(document).on('click', '#log_expense', function() {
        let receiptNumber = $('#receiptNumber').val();
        let itemBought = $('#itemBought').val();
        let amount = $('#amount').val();
        let log_expense = $('#log_expense').val();

        if (receiptNumber == '') {
            alert('Sorry Receipt Number can\'t be empty');
        } else if (itemBought == '') {
            alert('Sorry Item Bought can\'t be empty');
        } else if (amount === '') {
            alert('Sorry Amount can\'t be empty')
        } else {
            $.ajax({
                url: 'scripts.php',
                method: 'POST',
                data: {
                    receiptNumber,
                    itemBought,
                    amount,
                    log_expense
                },
                success: function(data) {
                    $('#display_payment').html(data);
                    $('#receiptNumber').val('');
                    $('#itemBought').val('');
                    $('#amount').val('');
                }
            });
        }
    });

    //=======================================================================================
    $(document).on('change', '#offeringLimit', function() {
        var showChange = $('#offeringLimit').val();
        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                showChange
            },
            success: function(data) {
                $('#showTable').html(data);
            }
        })
    });

    // $('#WeekNumber').focusin(function() {
    //     var firstOffering = $('#firstOffering').val();

    //     var secondOffering = $('#secondOffering').val();

    //     //convert text to floating point value
    //     var second = parseFloat(secondOffering);
    //     var first = parseFloat(firstOffering);

    //     var cal = first + second;
    //     $('#totalOffering').text(cal);
    // });

    //=========================| Focused Fields |=========================
    // $('#secondOffering').attr('disabled', true);
    // $('#WeekNumber').attr('disabled', true);
    // $('#makePayment').attr('disabled', true);


    //First Offering
    // $('#firstOffering').keyup(function() {
    //     $('#secondOffering').attr('disabled', false);
    //     if ($('#firstOffering').val().length === 0) {
    //         $('#secondOffering').attr('disabled', true);
    //         $('#WeekNumber').attr('disabled', true);
    //         $('#WeekNumber').val('');
    //         if ($('#secondOffering').val('')) {
    //             $('#makePayment').attr('disabled', true);
    //             $('#totalOffering').text('0.0');
    //         }
    //     } else {
    //         $('#secondOffering').attr('disabled', false);
    //     }
    // });

    // $('#secondOffering').keyup(function() {
    //     $('#WeekNumber').attr('disabled', false);
    //     if ($('#secondOffering').val().length === 0) {
    //         $('#WeekNumber').attr('disabled', true);
    //         if ($('#WeekNumber').val('')) {
    //             $('#makePayment').attr('disabled', true);
    //             $('#totalOffering').text('0.0');
    //         }
    //     } else {
    //         $('#WeekNumber').attr('disabled', false);
    //     }
    // });


    // $('#WeekNumber').keyup(function() {
    //     $('#makePayment').attr('disabled', false);
    //     if ($('#WeekNumber').val().length === 0) {
    //         $('#makePayment').attr('disabled', true);
    //         if ($('#makePayment').val('')) {
    //             $('#makePayment').attr('disabled', true);
    //         }
    //     } else {
    //         $('#makePayment').attr('disabled', false);
    //     }
    // });



    //  $('#secondOffering').focusin(function(){
    //    $('#WeekNumber').attr('disabled', false);
    //  });

    //  $('#WeekNumber').focusin(function(){
    //    $('#makePayment').attr('disabled', false);
    //  });

    //   $('#tithe_year').focusin(function(){
    //    $('#make_payment').attr('disabled', false);
    //  });


    // $('#makePayment').click(function() {
    //     var firstOffering = $('#firstOffering').val();
    //     var secondOffering = $('#secondOffering').val();
    //     var weekNumber = $('#WeekNumber').val();
    //     var makePaymentBtn = $('#makePayment').val();

    //     $.ajax({
    //         url: 'php_script/offeringScript.php',
    //         method: 'POST',
    //         data: {
    //             firstOffering: firstOffering,
    //             secondOffering: secondOffering,
    //             weekNumber: weekNumber,
    //             makePaymentBtn: makePaymentBtn
    //         },
    //         success: function(data) {
    //             $('#display_payment').html(data);
    //             $('#firstOffering').val('0.0');
    //             $('#secondOffering').val('0.0');
    //             $('#WeekNumber').val();
    //             $('#totalOffering').text('0.0');
    //             $('#secondOffering').attr('disabled', true);
    //             $('#WeekNumber').attr('disabled', true);
    //             $('#makePayment').attr('disabled', true);
    //         }
    //     })
    // });

    //=========================

    // $('#offering_record_search').change(function() {
    //     var offeringSearch = $('#offering_record_search').val();

    //     $.ajax({
    //         url: 'php_script/offeringScript.php',
    //         method: 'POST',
    //         data: {
    //             offeringSearch: offeringSearch
    //         },
    //         success: function(data) {
    //             $('#offeringDisplay').html(data);
    //         }
    //     });
    // });

    // $('#offeringLimit').change(function() {
    //     var offeringLimit = $('#offeringLimit').val();
    //     $.ajax({
    //         url: 'php_script/offeringScript.php',
    //         method: 'POST',
    //         data: {
    //             offeringLimit: offeringLimit
    //         },
    //         success: function(data) {
    //             $('#offering_all_Display').html(data);
    //         }
    //     });
    // });

});
</script>