<?php
session_start();
require "../db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <?php
        include ('../message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Te dhenat e produkteve</h4>
                        <a href="addProduct.php" class="btn btn-primary float-end">Ruaj nje product</a>
                        <a href="../dashboard.php" class="btn btn-danger float-left">Go Dashboard</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Cmimi</th>
                                    <th>Photo link</th>
                                    <th>Vlera e artikujve</th>
                                    <th>Ndryshimi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM products";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $products){
                                       ?>
                                        
                                        <tr>
                                            <td><?= $products['id']; ?></td>
                                            <td><?= $products['name']; ?></td>
                                            <td><?= $products['price']; ?></td>
                                            <td><?= $products['photo']; ?></td>
                                            <td><?= $products['artikuj']; ?></td>
                                            <td>
                                                <a href="productEditor.php?id=<?= $products['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="removeP.php" method="POST" class="d-inline">
                                                <button type="submit" name="remove_product" value="<?= $products['id']; ?>" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<h5>No data!</h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>