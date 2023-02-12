<?php
session_start();
require '../db_conn.php';

if(isset($_POST['edit_product'])){
    $product_Id = mysqli_real_escape_string($conn, $_POST['product_Id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);
    $artikuj = mysqli_real_escape_string($conn, $_POST['artikuj']);

    $query = "UPDATE products SET name = '$name', price = '$price', photo = '$photo', artikuj = '$artikuj' WHERE id = '$product_Id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message'] = "Produkti u perditesua!";
        header("Location: editP.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Produkti nuk u perditesua!";
        header("Location: editP.php");
        exit(0);
    }
}
?>