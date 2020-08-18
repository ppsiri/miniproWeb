<?php 
    $conn = mysqli_connect("localhost","root","","miniproweb");
    
    if(!$conn){
        die("Failed to connect to Database".mysqli_error($conn) );
    }
    echo "Connected successfully";
?>