<?php
session_start();
require '../db_conn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Editor</title>
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
                        <h4>Edit User</h4>
                        <a href="../dashboard.php" class="btn btn-danger float-end">Go Dashboard</a>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $user_Id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM users WHERE id='$user_Id'";
                            $query_run = mysqli_query($conn, $query);
                            
                            if(mysqli_num_rows($query_run) > 0){
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="UEdit.php" method="POST">
                                    <input type="hidden" name="user_Id" value="<?=$user['id']?>">
                                    <div class="mb-3">
                                        <label>User Name</label>
                                        <input type="text" name="name" value="<?= $user['name']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Role</label>
                                        <input type="text" name="role" value="<?= $user['role']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Email</label>
                                        <input type="text" name="email" value="<?= $user['email']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="edit_user" class="btn btn-primary">Edit User</button>
                                    </div>
                                </form>
                        <?php
                            }else{
                                echo "<h4>Asnje ID si kjo nuk u gjet!</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>