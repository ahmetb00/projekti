<?php
session_start();
require '../db_conn.php';
if(isset($_POST['remove_user'])){
    $user_Id = mysqli_real_escape_string($conn, $_POST['remove_user']);
    $query = "DELETE FROM users WHERE id = '$user_Id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "User-i u fshi!";
        header("Location: ../editUsers.php");
        exit(0);
    }else{
        $_SESSION['message'] = "User-i nuk u fshi!";
        header("Location: ../editUsers.php");
        exit(0);
    }
}
?>