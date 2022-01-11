<?php

session_start();
 

include "conn.php";


 
if(isset($_GET['delete_user'])){
    $sqldelete_user="DELETE FROM `users` WHERE `users`.`id` = ?";
    $querydelete_user=$conn->prepare($sqldelete_user);
    $querydelete_user->execute([
        $_GET['delete_user']
    ]);
 
    header('Location:admin_page.php');
 
}
if(isset($_GET['delete_doc'])){
    $sqldelete_doc="DELETE FROM `uploaded_files` WHERE `uploaded_files`.`id` = ?";
    $querydelete_doc=$conn->prepare($sqldelete_doc);
    $querydelete_doc->execute([
        $_GET['delete_doc']
    ]);
 
    header('Location:admin_page.php');
 
}


 
$sql ="SELECT * FROM users";
$query = $conn->prepare($sql);
$query->execute();

$sql2 ="SELECT * FROM uploaded_files";
$query2 = $conn->prepare($sql2);
$query2->execute();


 
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Admin Panel</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="admin_page.php" class="btn btn-outline-primary">All Users and Documents</a>
                        <a href="add_user.php" class="btn btn-outline-primary">Add User</a>
                        <a href="search.php" class="btn btn-outline-primary">Search Form</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Process</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($line = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=$line['id']?></td>
                                <td><?=$line['username']?></td>
                                <td><?=$line['password']?></td>
                                <td><?=$line['email']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="update.php?id=<?=$line['id']?>" class="btn btn-secondary">Update</a>
                                        <a href="?delete_user=<?=$line['id']?>" onclick="return confirm('Are you sure you want to delete user?')" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Documents</th>
                                <th>UserID</th>
                                <th>Process</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($line = $query2->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=$line['id']?></td>
                                <td><?=$line['name']?></td>
                                <td><?=$line['userid']?></td>
                             
                                <td>
                                    <div class="btn-group">
                                        <a href="?delete_doc=<?=$line['id']?>" onclick="return confirm('Are you sure you want to delete document ?')" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </main>
    <footer></footer>
    <a href="logout.php"><b>Logout</b> </a>
</body>
</html>