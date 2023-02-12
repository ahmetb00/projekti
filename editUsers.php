<?php
session_start();
require "db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <?php
        include ('message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Te dhenat e user-ave</h4>
                        <a href="dashboard.php" class="btn btn-danger float-end">Go Dashboard</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Ndryshimi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $users){
                                       ?>
                                        
                                        <tr>
                                            <td><?= $users['id']; ?></td>
                                            <td><?= $users['name']; ?></td>
                                            <td><?= $users['username']; ?></td>
                                            <td><?= $users['role']; ?></td>
                                            <td><?= $users['email']; ?></td>
                                            <td>
                                                <a href="userDataEdit/userEditor.php?id=<?= $users['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="userDataEdit/userRemover.php" method="POST" class="d-inline">
                                                <button type="submit" name="remove_user" value="<?= $users['id']; ?>" class="btn btn-danger btn-sm">Remove</button>
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