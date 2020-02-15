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
                        <h2 class="no-margin-bottom">Events Page</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Events Page </li>
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
                                        <h3 class="h4">EVENTS</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div align="center" id="showEvent"></div>
                                            <table class="table">
                                                <thead>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="eventTopic">Topic</label></td>
                                                        <td><input type="text" name="eventTopic" id="eventTopic"
                                                                placeholder="eg. Tour" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td><label for="eventDesc">Description</label></td>
                                                        <td>

                                                            <textarea cols='7' class="form-control" rows='6'
                                                                name='eventDesc'
                                                                placeholder="There is going to be an upcoming Tour"
                                                                id='eventDesc'></textarea></td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><button type="text" style="float:right"
                                                                name="eventBtn" id="eventBtn"
                                                                class="btn btn-outline-primary" value="eventBtn"><i
                                                                    class="fa fa-pencil"></i>
                                                                Create Events</button></td>
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
                                        <h3 class="h4">View Events</h3>
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
                                                            <label for="event_limit">Limit</label>
                                                            <select style="width:30%"
                                                                class="form-group-material custom-select my-1 mr-sm-2"
                                                                id="event_limit" name="event_limit">

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
                                            <div id="eventDisplay"></div>
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
    $('#eventBtn').click(function() {
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
    });

    $('#event_limit').change(function() {
        let limits_event = $('#event_limit').val();
        $.ajax({
            url: 'scripts.php',
            method: 'POST',
            data: {
                limits_event
            },
            success: function(data) {
                $('#eventDisplay').html(data);

            }
        });
    });

})
</script>