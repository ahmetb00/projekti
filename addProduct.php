<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php
        include ('../message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Products</h4>
                        <a href="../dashboard.php" class="btn btn-danger float-end">Go Dashboard</a>
                    </div>
                    <div class="card-body">
                        <form action="ruajP.php" method="POST">
                        <div class="mb-3">
                                <label>Product Id</label>
                                <input type="text" name="id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Cmimi i produktit</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Photo link</label>
                                <input type="text" name="photo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Shuma e artikujve</label>
                                <input type="text" name="artikuj" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_product" class="btn btn-primary">Ruaj Produktin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>