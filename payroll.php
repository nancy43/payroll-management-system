<html>

<head>
    <title>Payrol Management System</title>
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

        <h1> PAYROLL MANAGER</h1> <br> <br>
  

                <h2>LOGGED IN AS: <br>
                 NANCY SHARMA</h2>
        
<br> <br>
<br><br>

                <p>List of all employees:</p>
                <?php
//including the database connection file
 include("connection.php");

 $result = mysqli_query($conn, "SELECT * FROM employee ORDER BY employee_id ASC"); // using mysqli_query instead
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>City</th><th>Join Date</th><th>Annual Basic Pay</th><th>Gender</th><th>Birthdate</th><th>Zipcode</th><th>Province</th><th>Address</th><th>website</th></tr>";
	while($res = mysqli_fetch_array($result)) { 		
        
        echo "<tr><td>" . $res["employee_id"]. "</td><td>" . $res["name"]. "</td><td> " . $res["email"]. "</td><td> " . $res["city"]. "</td><td> " . $res["join_date"]. "</td><td> " . $res["annual_basic_pay"]. "</td><td>". $res["gender"]. "</td><td> ". $res["birth_date"]. "</td><td>". $res["postal_code"]. "</td><td> " . $res["province"]. "</td><td> ". $res["address"]. "</td><td> ". $res["website"]. "</td></tr>";
         }
        echo "</table>";
	
	
?>
           </div>
                <!-- <?php
//including the database connection file
include("connection.php");

     $result = mysqli_query($conn, "SELECT * FROM employee ORDER BY employee_id ASC"); // using mysqli_query instead
   
        echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Join Date</th><th>Annual Basic Pay</th><th>Monthly Pay(after_tax)</th></tr>";
	while($res = mysqli_fetch_array($result)) { 		
        
        echo "<tr><td>" . $res["employee_id"]. "</td><td>" . $res["name"]. "</td><td> " . $res["email"]. "</td><td> " . $res["join_date"]. "</td><td> " . $res["annual_basic_pay"]. "</td><td> " . $res["pay_tax"]. "</td></tr>";
         }
        echo "</table>";

	
?> -->
                
            


</body>

</html>