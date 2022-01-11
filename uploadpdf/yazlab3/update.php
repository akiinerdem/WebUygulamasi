<?php
 
include "conn.php";

 
if(isset($_POST['update'])){
 
    $sql = "UPDATE `users` 
        SET `username` = ?, 
            `email` = ?, 
            `password` = ? WHERE `users`.`id` = ?";
            
    $array=[
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['id']
    ];
    $query = $conn->prepare($sql);
    $query->execute($array);
 
    header("Location:admin_page.php");
}
 
$sql ="SELECT * FROM users WHERE id = ?";
$query = $conn->prepare($sql);
$query->execute([
    $_GET['id']
]);
$line = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Update Users</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="admin_page.php" class="btn btn-outline-primary"> All Users and Documents</a>
                        <a href="add_user.php" class="btn btn-outline-primary">Add User</a>
                        <a href="search.php" class="btn btn-outline-primary">Search Form</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
    <div class="container">
        <form action="" method="post" class="row mt-4 g-3">
            <input type="hidden" name="id" value="<?=$line['id']?>">
            <div class="col-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username"" value="<?=$line['username']?>">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?=$line['email']?>">
            </div>
            <div class="col-6">
                <label for="passsword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?=$line['password']?>">
            </div>
           
            <button name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>