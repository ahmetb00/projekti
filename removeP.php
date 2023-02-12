<?php
session_start();
require '../db_conn.php';
if(isset($_POST['remove_product'])){
    $product_Id = mysqli_real_escape_string($conn, $_POST['remove_product']);
    $query = "DELETE FROM products WHERE id = '$product_Id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Producti u fshi!";
        header("Location: editP.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Producti nuk u fshi!";
        header("Location: editP.php");
        exit(0);
    }
}
?>