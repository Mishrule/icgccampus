<!-- /*This is from Attendance*/ -->
<?php
date_default_timezone_set("Africa/Accra");
$currentTime = time();
$dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    require_once('db.php');
    $mssg = '';
    if(isset($_POST['attend'])){
        $attendance_view = $_POST['attend'];
        $viewSQL = "SELECT * FROM attendance WHERE attendance_date = '$attendance_view'";
        
        $viewResult = mysqli_query($conn, $viewSQL);
        while($viewRow = mysqli_fetch_array($viewResult)){
             $mssg = '
                    <div align="center" class="card">
                       <h1>Male: <span>'.$viewRow['attendance_male'].'</span></h1>
                         <h1>Female: <span>'.$viewRow['attendance_female'].'</span></h1>
                         <h1>Visitor: <span>'.$viewRow['visitors'].'</span></h1>
                    </<div>
             ';
        }
        echo $mssg;
     }

     //=======================================| Expenditure |===========================================
    
      date_default_timezone_set("Africa/Accra");
      $currentTime = time();
      $dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
      if(isset($_POST['log_expense'])){
           $receiptNumber = mysqli_real_escape_string($conn, $_POST['receiptNumber']);
           $itemBought = mysqli_real_escape_string($conn, $_POST['itemBought']);
           $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                                                            
           $expenseSQL = "INSERT INTO expenditure VALUES('','$receiptNumber','$itemBought','$amount','$dateTime')";
           $expenseResult = mysqli_query($conn, $expenseSQL);
           if($expenseResult){
                echo '
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>You have successfull log an expense with with a receipt number '.$receiptNumber.' </strong>
                     <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                     </button>
                     </div>
               ';

          }else{
               echo '
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>Failed to log expense with receipt number '.$receiptNumber.' </strong>
                    <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
               ';
          }
    }

//============================================================================================================
//=========================================| SHOW EXPENDITURE ===============================================
if(isset($_POST['showChange'])){
     $showMsg = ' <table class="table table-striped" id="showTable">
                    <thead>
                      <th>#</th>
                      <th>Expense Name</th>
                      <th>Receipt Number</th>
                       <th>Amount</th>
                       <th>Purchase Date</th>
                     </thead>
                     <tbody>
                                                ';
     $showChange = $_POST['showChange'];
     $count = 1;
     $showSQL = "SELECT * FROM expenditure ORDER BY expenditure_date LIMIT $showChange";
     $showResult = mysqli_query($conn, $showSQL);
     while($showRow = mysqli_fetch_array($showResult)){
          $showMsg .='
               <tr>
                    <td>'.$count++.'</td>
                    <td>'.$showRow['expenditure_title'].'</td>
                     <td>'.$showRow['receipt_number'].'</td>
                    <td>'.$showRow['expenditure_Amount'].'</td>
                    <td>'.$showRow['expenditure_date'].'</td>
               </tr>        
          ';     
     }
    
          $showMsg .='
                </tbody>
             </table>         
          '; 
          echo $showMsg;                                 
}

//======================================================================================================================
/** 
 *                                          OFFERING PAGE
 **===================================================================================================================*/
if (isset($_POST['makePaymentBtn'])) {
    $firstOffering = mysqli_real_escape_string($conn, $_POST['firstOffering']);
    $secondOffering = mysqli_real_escape_string($conn, $_POST['secondOffering']);
    $WeekNumber = mysqli_real_escape_string($conn, $_POST['weekNumber']);

    $comput = $firstOffering + $secondOffering;

    $offeringSQL = "INSERT INTO offering VALUES('$firstOffering','$secondOffering','$WeekNumber','$dateTime','$comput')";
    $offeringResult = mysqli_query($conn, $offeringSQL);

    if ($offeringResult) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>You have successfully paid a total offering of ' . $comput . ' </strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Payment Failed try again...</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    }

}

//===================================== VIEW OFFERING BY WEEK =================
if (isset($_POST['offeringSearch'])) {
    $view_record_display_offering = '';
    $offeringSearch = mysqli_real_escape_string($conn, $_POST['offeringSearch']);

    $offeringSQL = "SELECT * FROM offering WHERE datetime = '$offeringSearch'";

    $offeringResult = mysqli_query($conn, $offeringSQL);


    $view_record_display_offering .= '
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>FIRST OFFERING</th>
                <th>SECOND OFFERING</th>
                <th>WEEK NO.</th>
                <th>TOTAL OFFERING</th>
                </thead>
                <tbody>
        ';
    $countz = 1;
    if (mysqli_num_rows($offeringResult) > 0) {
        while ($row = mysqli_fetch_array($offeringResult)) {
            $view_record_display_offering .= '
                <tr>
                    <td>' . $countz . '</td>
                    <td>
                        ' . $row['firstoffering'] . '                    
                    </td>
                    <td>
                        ' . $row['secondoffering'] . '
                    </td>
                    <td>
                        ' . $row['weeknumber'] . '
                    </td>
                    <td>
                        ' . $row['totaloffering'] . '
                    </td>
                </tr>
            ';
            $countz++;
        }
    } else {
        $view_record_display_offering .= '<td colspan="5"><marquee>NO Records Yet</marquee></td>';
    }
    $view_record_display_offering .= '</tbody></table>';
    echo $view_record_display_offering;



}


//===================================== VIEW OFFERING BY WEEK =================
if (isset($_POST['offeringLimit'])) {
    $view_display_offering = '';
    $offeringLimit = mysqli_real_escape_string($conn, $_POST['offeringLimit']);

    $offering_SQL = "SELECT * FROM offering ORDER BY  datetime DESC LIMIT $offeringLimit";

    $offering_Result = mysqli_query($conn, $offering_SQL);


    $view_display_offering .= '
            <table class="table table-responsive table-striped">
                <thead>
                <th>#</th>
                <th>DATE</th>
                <th>WEEK NO.</th>
                <th>FIRST OFFERING</th>
                <th>SECOND OFFERING</th>
                <th>TOTAL OFFERING</th>
                </thead>
                <tbody>
        ';
    $contz = 1;
    if (mysqli_num_rows($offering_Result) > 0) {
        while ($row = mysqli_fetch_array($offering_Result)) {
            $view_display_offering .= '
                <tr>
                    <td>' . $contz . '</td>
                    <td>
                        ' . $row['datetime'] . '                    
                    </td>
                    <td>
                        ' . $row['weeknumber'] . '
                    </td>
                    <td>
                        ' . $row['firstoffering'] . '
                    </td>
                    <td>
                        ' . $row['secondoffering'] . '
                    </td>
                    <td>
                        ' . $row['totaloffering'] . '
                    </td>
                </tr>
            ';
            $contz++;
        }
    } else {
        $view_display_offering .= '<td colspan="5"><marquee>NO Records Yet</marquee></td>';
    }
    $view_display_offering .= '<tr><td colspan = "6">
    <button type="button" style="float:right" class="btn btn-danger value="print"><i class="fa fa-print"></i> Print</button></td></tr>
    </tbody></table>';
    echo $view_display_offering;



}


//===================================================================================================================
/**
 * 
 *                                                PLEDGE
 *===================================================================================================================*/
//================================================= CREATE A PLEDGE
if (isset($_POST['createPledgeButton'])) {
    $createPledge = mysqli_real_escape_string($conn, $_POST['createPledge']);

    $sql = "INSERT INTO pledge VALUES('','$createPledge','$dateTime') ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>PLEDGE CREATED SUCCESSFULL </strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Ooops! Failed try again...</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    }

}
//=======================================|PLEDGE PAYMENT
if (isset($_POST['pledge_payment_btn'])) {
    $pledge_ = mysqli_real_escape_string($conn, $_POST['pledge_']);
    $pledge_name = mysqli_real_escape_string($conn, $_POST['pledge_name']);
    $pledge_amount = mysqli_real_escape_string($conn, $_POST['pledge_amount']);

    $pledge_Sql = "INSERT INTO pledge_payment VALUES('$pledge_','$pledge_name','$pledge_amount','$dateTime')";
    $pledge_result = mysqli_query($conn, $pledge_Sql);

    if ($pledge_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>PAYMENT MADE SUCCESSFULLY TO '.$pledge_name.' </strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Ooops! Failed try again...</strong>
                  <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    }

}


//================================ VIEW PLEDGE 
$view_display_pledge = '';
$Tdisplay = '';
if (isset($_POST['pledge_individual'])) {
    $pledge_individual = mysqli_real_escape_string($conn, $_POST['pledge_individual']);

    $pledge_individual_sql = "SELECT * FROM pledge_payment WHERE pledge_set = '$pledge_individual'";

    $pledge_individual_result = mysqli_query($conn, $pledge_individual_sql);
    $view_display_pledge .= '
            <table class="table table-responsive table-striped">
                <thead>
                <th>#</th>
                <th>PLEDGE TITLE</th>
                <th>NAME</th>
                <th>AMOUNT</th>
                <th>DATE</th>
                
                </thead>
                <tbody>
        ';
    $countz = 1;
    if (mysqli_num_rows($pledge_individual_result) > 0) {
        while ($row = mysqli_fetch_array($pledge_individual_result)) {
            $view_display_pledge .= '
                <tr>
                    <td>' . $countz++ . '</td>
                    <td>
                        ' . $row['pledge_set'] . '                    
                    </td>
                    <td>
                        ' . $row['payee_name'] . '
                    </td>
                    <td>
                        ' . $row['payee_amount'] . '
                    </td>
                    <td>
                        ' . $row['pledge_date'] . '
                    </td>
                    
                </tr>
            ';
            
        }
    } else {
        $view_display_pledge .= '<td colspan="5"><marquee>NO Records Yet</marquee></td>';
    }
    $view_display_pledge .= '<tr><td colspan = "5">
    <button type="button" style="float:right" class="btn btn-danger value="print">Print</button></td></tr>
    </tbody></table>';
    echo $view_display_pledge;



}

//========================================================
if (isset($_POST['pledgeindividual'])) {
    $pledgeindividual = mysqli_real_escape_string($conn, $_POST['pledgeindividual']);

    $showTotalSQL = "SELECT SUM(payee_amount) AS total FROM pledge_payment WHERE pledge_set = '$pledgeindividual'";
    $totalResult = mysqli_query($conn, $showTotalSQL);


    if (mysqli_num_rows($totalResult) > 0) {
        while ($Trow = mysqli_fetch_array($totalResult)) {
            $Tdisplay .= '
               <label><h1><span class="badge badge-pill badge-primary"> ' . $Trow['total'] . ' Ghana Cedis</span></h1></label>
            ';

        }
    } else {
        $Tdisplay .= '
               <label><span class="badge badge-pill badge-primary"><h1> No amount found </h1></span></label>
            ';
    }

    echo $Tdisplay;

}


//====================================================================================================================
?>