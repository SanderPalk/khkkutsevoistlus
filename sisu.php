<?php

include_once 'database1.php';
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$usermail = $_SESSION["username"];

$result = mysqli_query($conn,"SELECT * FROM KONTO_SISU WHERE Konto_id=(SELECT Konto_id FROM KONTOD WHERE Meil='".$usermail."')");

?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <meta charset="utf-8">
 <title> Retrive data</title>
 <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 75%;
            margin-left: 25%;
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        
        }
        
        tr:nth-child(even) {
            background-color: white;
        }
        header {float: right;}
        
    </style>
 </head>
<body>
<header>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
</header>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<button type="button" onClick="window.location.reload();">Refresh</button>
  <table>
  
  <tr>
    <td>Date</td>
    <td>Type</td>
    <td>Category</td>
    <td>Time</td>
    <td>Notes</td>
    <td>Tags</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Kuupaev"]; ?></td>
    <td><?php echo $row["Tyyp"]; ?></td>
    <td><?php echo $row["Kategooria"]; ?></td>
    <td><?php echo $row["Aeg"]; ?></td>
    <td><?php echo $row["Marge"]; ?></td>
    <td><?php echo $row["Silt"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>