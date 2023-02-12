<?php
session_start();
include "../db_conn.php";

if(isset($_POST['shiko_te_dhenat'])){
    $product_Id = mysqli_real_escape_string($conn, $_POST['shiko_te_dhenat']);
    $query = "SELECT * FROM products WHERE id='$product_Id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) === 1){
        $row = mysqli_fetch_assoc($query_run);
        ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="product.css">
            </head>
            <body>
            <!-- Header Start -->
            <header class="header">
                <div class="menu wrapper">
                <a href="#" class="brand">Logo</a>
                <nav class="nav">
                    <ul class="nav__wrapper">
                    <li class="nav__item"><a href="#">Home</a></li>
                    <li class="nav__item"><a href="../dashboard.php">Products</a></li>
                    <li class="nav__item"><a href="#">Services</a></li>
                    <li class="nav__item"><a href="#">Hire us</a></li>
                    <li class="nav__item"><a href="#">Contact</a></li>
                    </ul>
                </nav>
                </div>
            </header>
            <!-- Header End -->
                <div class="product_card">
                    <div class="fotoja_desc"><img src="../<?= $row['photo']?>" />
                    <h1 class="text_desc"><?= $row['name']?></h1></div>
                    <div class="card">
                        <span class="cmimi"><?= $row['price']?></span>
                        <span class="disp"> Disponueshmeria: <br>
                        <span class="artikuj" style="margin-left: 25px"><strong><?= $row['artikuj']?> artikuj</strong></span>
                        </span>
                        <center><button class="butoni">Shto në shportë</button> </center>
                    </div> 
                </div>
            </body>
            </html>

        <?php
    }else{
        header("Location: ../dashboard.php");
        exit(0);
    }
}
?>