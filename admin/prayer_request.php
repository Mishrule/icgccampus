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
                        <h2 class="no-margin-bottom">Prayer Request Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Prayer Request Page </li>
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
                                        <h3 class="h4">Prayer Request</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table">
                                                <thead>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="pname">Name</label></td>
                                                        <td><input type="text" name="pname" id="pname"
                                                                placeholder="eg. Frank Arthur" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="ppoint">Prayer Point</label></td>
                                                        <td><input type="text" name="ppoint" id="ppoint"
                                                                placeholder="eg 0245118878" class="form-control"></td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="prayer_date">Date</label></td>
                                                        <td><input type="text" name="prayer_date" id="prayer_date"
                                                                placeholder="eg. Maa Joyce" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="prayer_status">Status</label></td>
                                                        <td><input type="text" name="prayer_status" id="prayer_status"
                                                                placeholder="eg. Prayed" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><button type="text" style="float:right"
                                                                name="prayerBtn" id="prayerBtn"
                                                                class="btn btn-outline-primary" value="prayer"><i
                                                                    class="fa fa-pencil"></i>
                                                                Update</button></td>
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
                                        <h3 class="h4">Prayer List</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>
                                                            <label for="prayerStatus">Prayer Status</label>
                                                            <select style="width:100%"
                                                                class="form-group-material custom-select my-1 mr-sm-2"
                                                                id="prayerStatus" name="prayerStatus">

                                                                <option value="0">Change Status</option>
                                                                <option value="prayed">Prayed</option>
                                                                <option value="un_prayed">UnPrayed</option>

                                                            </select>
                                                        </th>
                                                        <th>
                                                            <label for="prayer_limit">Limit</label>
                                                            <select style="width:100%"
                                                                class="form-group-material custom-select my-1 mr-sm-2"
                                                                id="prayer_limit" name="prayer_limit">

                                                                <!-- <option value="0">Select...</option> -->
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
                                            <div id="prayerDisplay"></div>
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
    /* EVENT Registrations page */
    /*   $('#eventBtn').click(function() {
        let topic = $('#eventTopic').val();
        let eventDesc = $('#eventDesc').val();
        let eventbtn = $('#eventBtn').val();

        if (topic === '') {

            $('#showEvent').html("<p align='center' style='color:red;'>SORRY TOPIC CAN'T BE EMPTY");
        } else if (eventDesc === '') {

            $('#showEvent').html(
                "<p align='center' style='color:red;'>SORRY DESCRIPTIONS CAN'T BE EMPTY");
        } else {
            $.ajax({
                url: 'scripts.php',
                method: 'POST',
                data: {
                    topic,
                    eventDesc,
                    eventbtn
                },
                success: function(data) {
                    $('#showEvent').html(data);
                    $('#eventTopic').val('');
                    $('#eventDesc').val('');

                }
            });
        }
    }); */

    $('#prayerStatus').change(function() {
        let prayerStatus = $('#prayerStatus').val();
        let prayerlimit = $('#prayer_limit').val();

        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                prayerlimit,
                prayerStatus
            },
            success: function(data) {
                $('#prayerDisplay').html(data);
            }
        });
    });

})
</script>