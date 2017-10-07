<html>

<head>
    <title>Payrol management system</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
 <link rel="stylesheet" type="text/css" href="css/payroll.css">


</head>

<body>


    
                   <ul>
  <li><a href="#home">Home</a></li>
  <li><a href="pay.php">Pay Slip</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Employee</a>
    <div class="dropdown-content">
      <a href="delete1.php">Delete</a>
      <a href="edit1.php">Edit</a>
      <a href="insert.php">Insert</a>
    </div>
  </li>
</ul>
<div id="main">
        <h1>Admin Account</h1>
                <h2>Payroll Manager</h2>
        
<br> <br>
                <p>List of all employees:</p>
                
           
                <?php
//including the database connection file
include("connection.php");

     $result = mysqli_query($conn, "SELECT * FROM employee ORDER BY employee_id ASC"); // using mysqli_query instead
   
        echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Join Date</th><th>Annual Basic Pay</th><th>Monthly Pay(after_tax)</th><th>Export</th></tr>";
	while($res = mysqli_fetch_array($result)) { 		
        
        echo "<tr><td>" . $res["employee_id"]. "</td><td>" . $res["name"]. "</td><td> " . $res["email"]. "</td><td> " . $res["join_date"]. "</td><td> " . $res["annual_basic_pay"]. "</td><td> " . $res["monthly_pay"]. "</td><td><a href=\"edit.php?employee_id=$res[employee_id]\">Export</a></td></tr>";
         }
        echo "</table>";

	
?>
    </div>            
            


</body>

</html>