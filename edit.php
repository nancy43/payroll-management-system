<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	

	$employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
	
	  $name = mysqli_real_escape_string($conn, $_POST['name']);
	  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
	  $email = mysqli_real_escape_string($conn, $_POST['email']);	
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
    $join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $basic_pay = mysqli_real_escape_string($conn, $_POST['basic_pay']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
	// checking empty fields
	if(empty($name) || empty($gender) || empty($email) || empty($website) || empty($city) || empty($birth_date) || empty($join_date) || empty($province) || empty($basic_pay) || empty($zip_code) || empty($address) || empty($employee_id)) {	
			
		
			echo "<font color='red'>field is empty.</font><br/>";
	
			
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE employee SET name='$name',gender='$gender',email='$email',birth_date='$birth_date',website='$website',employee_id='$employee_id',province='$province',postal_code='$zip_code'
        ,address='$address',join_date='$join_date',birth_date='$birth_date',annual_basic_pay='$basic_pay' WHERE employee_id=$employee_id");
		
		//redirectig to the display page. In our case, it is 
		header("Location: payroll.php");
	}
}
?>
<?php
//getting id from url
$employee_id = $_GET['employee_id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM employee WHERE employee_id=$employee_id");

// echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Gender</th><th>Birth Date</th><th>Website</th><th>Address</th><th>Province</th><th>Zip Code</th><th>City</th><th>Join Date</th><th>Annual Basic Pay</th></tr>";

while($res = mysqli_fetch_array($result))
{
    $employee_id = $res['employee_id'];
	$name = $res['name'];
	$gender = $res['gender'];
    $email = $res['email'];
    $birth_date = $res['birth_date'];
    $website = $res['website'];
    $address = $res['address'];
    $province = $res['province'];
    $city = $res['city'];
    $zip_code = $res['postal_code'];
    $join_date = $res['join_date'];
    $basic_pay = $res['annual_basic_pay'];

}
?>
<html>
<head>	
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/payroll.css" />
</head>

<body>
     <ul>
  <li><a href="payroll.php">Home</a></li>
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
        <h1>Admin</h1>
                <h2>Payroll Manager</h2>
                <p>List of all employees</p>

                       

                        <!-- Text input-->
<form>
    <fieldset>
         <legend>Edit an Employee!</legend>
                                       <label>Id</label><br>
                                    <input name="employee_id"   type="text" value="<?php echo $employee_id; ?>">
                                    
                             <br><br>
                             <label >name</label><br>
                                    <input name="name"   type="text" value="<?php echo $name; ?>">
                                   
                               <br><br>
                               <label >birth date</label><br>
                                    <input name="birth_date"   type="date" value="<?php echo $birth_date; ?>">
                                    <br><br>
                                    <label >email</label><br>
                               
                                    <input name="email"   type="text" value="<?php echo $email; ?>">
                                    
                               
<br><br>
                            <label>Gender</label><br>
                           
                                    <select name="gender"   value="<?php echo $gender; ?>">
                                    <option  >Please select your Gender</option>
                          <option>M</option>
                          <option>F</option>
                          
                          
                        </select>
                                    
                               <br><br>
                            <label>Address</label><br>
                            
                                    <input name="address"  type="text" value="<?php echo $address; ?>">
                                    <br><br>
                               
                       
                            <label >City</label><br>
                            
                                    <input name="city"  type="text" value="<?php echo $city; ?>">
                                    <br><br>
                               
                            <label >Province</label>
                           
                           <br>
                                    <select name="province" >
                          <option value="<?php echo $province; ?>" >Please select your Province</option>
                          <option>ON</option>
                          <option>QC</option>
                          <option >NS</option>
                          <option >NB</option>
                          <option >MB</option>
                          <option >BC</option>
                          <option >PE</option>
                          <option >SK</option>
                          <option >PE</option>
                          <option> SK</option>
                          <option >AB</option>
                          <option >NL</option>
                          
                        </select>
                       
                               <br><br>
                          
                                    
                               
                            <label>Website or domain name</label><br>
                           
                                    <input name="website" type="text" value="<?php echo $website; ?>">
                                    <br><br>
                                    
                              
                            <label >Join Date</label>
                          <br>
                                    <input name="join_date"   type="date" value="<?php echo $join_date; ?>">
                                  
                               <br><br>
                            <label >Annual Pay</label>
                           <br>
                                    <input name="basic_pay"  type="text" value="<?php echo $basic_pay; ?>">
                              <br><br>
                                <button <input type="submit" name="update" value="Update">Update </button>
                            </div>
                        </div>

                    </fieldset>
                </form>
               
         


</body>
</html>
