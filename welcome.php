<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hey, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. tere tulemast enda lehele.</h1>
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Logi enda kasutajast välja</a>
        <a href="sisu.php" class="btn btn-danger ml-2">Vaata enda kasutaja sisu</a>
    </p>
</body>
</html>