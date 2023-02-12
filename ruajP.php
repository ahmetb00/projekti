<?php
session_start();
require "../db_conn.php";

if(isset($_POST['save_product'])){
    $product_Id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);
    $artikuj = mysqli_real_escape_string($conn, $_POST['artikuj']);

    $query = "INSERT INTO products (id, name, price, photo, artikuj) VALUES 
                  ('$product_Id', '$name', '$price', '$photo', '$artikuj')";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Producti u  shtua";
        header("Location: addProduct.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Producti nuk u shtua!";
        header("Location: addProduct.php");
        exit(0);
    }
}

?>