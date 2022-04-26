<?php
    $did = ($_POST['did']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error)
    {
        die ("Connection error !" .$conn->connect_error);
    }else{

        echo "Connection Successful !!!";
    }

    $sql = "DELETE FROM student WHERE id='$did'";
    if($conn->query($sql)===TRUE)
    {
        echo ("Data Deleted Successfully !!!");
    }
    else{
        echo "Error occured while deleting data".$conn->error. $conn->errno;
    }
    $conn->close();

?>