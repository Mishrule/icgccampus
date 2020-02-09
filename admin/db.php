<?php 
    $connectionError = 'Sorry Fail Connect to Database';
    $host='localhost';
    $username = 'root';
    $password = '';
    $dbName = 'icgccampus';
    $conn = mysqli_connect($host, $username, $password, $dbName);
    if($conn){
        
    }else{
        echo mysqli_error($conn).$connectionError;
    }
?>