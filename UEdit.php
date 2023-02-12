<?php
session_start();
require '../db_conn.php';

if(isset($_POST['edit_user'])){
    $user_Id = mysqli_real_escape_string($conn, $_POST['user_Id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE users SET name = '$name', role = '$role', email = '$email' WHERE id = '$user_Id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message'] = "User-i u perditesua!";
        header("Location: ../editUsers.php");
        exit(0);
    }else{
        $_SESSION['message'] = "User-i nuk u perditesua!";
        header("Location: ../editUsers.php");
        exit(0);
    }
}
?>