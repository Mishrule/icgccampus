<!-- /*This is from Attendance*/ -->
<?php
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
?>