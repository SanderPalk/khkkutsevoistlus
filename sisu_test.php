<?php

include_once 'database1.php';
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$userid = $_SESSION["id"];
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
        .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              padding-top: 100px; /* Location of the box */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }
            
            /* Modal Content */
            .modal-content, .modal-content2 {
              display: none;
              background-color: #fefefe;
              margin: auto;
              padding: 20px;
              border: 1px solid #888;
              width: 80%;
            }
            
            /* The Close Button */
            .close {
              color: #aaaaaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
              color: #000;
              text-decoration: none;
              cursor: pointer;
            }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 75%;
            margin-left: 25%;
            margin-top: 50px;
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
    <!--   LOG OUT JA HEADER   -->
    <?php echo htmlspecialchars($_SESSION["username"]); ?>
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
    <td>Update rows</td>
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
    <td><button class="myBtn2">Change</button></td>
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
  <body>
      <a href="process-update.php?id=<?php echo $row["Sisu_id"]; ?>"> Update</a>
      <!-- The Modal  ADD NEW-->
    <div id="myModal" class="modal">
    
      <!-- Modal content1 -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <form method="post" action="process.php">
	    <br>
		Date (YYYY-MM-DD)<br>
		<input type="text" name="date">
		<br>
		Type<br>
		<select id="type" name="type">
		    <option value="Private project">Private project</option>
		    <option value="WS task">WS task</option>
		    <option value="ES task">ES task</option>
		    <option value="competition">Competition</option>
		</select>
		<br>
		Category<br>
		<select id="category" name="category">
		    <option value="Design">Design</option>
		    <option value="Font-End">Front-End</option>
		    <option value="Back-End">Back-End</option>
		</select>
		<br>
		Time (hours)<br>
		<input type="number" name="time" min="1" max="24">
		<br>
		Notes<br>
		<input type="text" name="notes">
		<br>
		Tags<br>
		<input type="text" name="tags">
		<br><br>
		<input type="submit" name="save" value="submit">
	    </form>
        </div>
    </div>
    
    <!-- Modal content2 -->
    <div class="modal-content2">
        <span class="close">&times;</span>
        <form method="post" action="process.php">
	    ID<br>
	    <input type="number" name="ID" min="1" max="2">
	    <br>
		Date (YYYY-MM-DD)<br>
		<input type="text" name="date">
		<br>
		Type<br>
		<select id="type" name="type">
		    <option value="Private project">Private project</option>
		    <option value="WS task">WS task</option>
		    <option value="ES task">ES task</option>
		    <option value="competition">Competition</option>
		</select>
		<br>
		Category<br>
		<select id="category" name="category">
		    <option value="Design">Design</option>
		    <option value="Font-End">Front-End</option>
		    <option value="Back-End">Back-End</option>
		</select>
		<br>
		Time (hours)<br>
		<input type="number" name="time" min="1" max="24">
		<br>
		Notes<br>
		<input type="text" name="notes">
		<br>
		Tags<br>
		<input type="text" name="tags">
		<br><br>
		<input type="submit" name="save" value="submit">
	    </form>
        </div>
    <button id="myBtn">Add new</button>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  modal-content2.style.display = "hidden";
  
}

btn2.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
  </body>
</html>