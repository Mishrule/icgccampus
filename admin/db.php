<?php 
    $connectionError = 'Sorry Fail Connect to Database';
    $host='localhost';
    $username = 'root';
    $password = '';
    $dbName = 'icgccampus';
    $con = mysqli_connect($host, $username, $password, $dbName);
    if($con){
        
    }else{
        echo mysqli_error($con).$connectionError;
    }
?>