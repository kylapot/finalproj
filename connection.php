<?php
    //localhost, root , password, database name
    $conn = mysqli_connect('localhost','root','admin','chat');
    if(mysqli_connect_errno()){
        echo "Error: " . mysqli_connect_errno() ;
    }
?>