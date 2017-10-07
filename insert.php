<html>

<head>
    <title>Insert an employee</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/payroll.css" />
    
</head>

<body>
<?php
     $gender="";
     $name="";
     $email="";
     $birth_date="";
     $address="";
     $city="";
     $province="";
     $website="";
     $join_date="";
     $basic_pay="";
     $employee_id="";
     $zip_code="";

     $genderErr="";
     $nameErr="";
     $emailErr="";
     $birth_dateErr="";
     $addressErr="";
     $cityErr="";
     $provinceErr="";
     $websiteErr="";
     $join_dateErr="";
     $basic_payErr="";
     $employee_idErr="";
     $zip_codeErr="";

     if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed"; 
            }
          }

        
         
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
              } else {
                $gender = test_input($_POST["gender"]);
         }
         
         if(empty($_POST["email"])){
            $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
          }
        }
         
        
            if (empty($_POST["address"])) {
                $addressErr = "Address is required";
              } else {
                $address = test_input($_POST["address"]);
         }
        
        
            if (empty($_POST["city"])) {
                $cityErr = "city is required";
              } else {
                $city = test_input($_POST["city"]);
         }
         
        if (empty($_POST["province"])) {
            $provinceErr = "province is required";
          } else {
            $province = test_input($_POST["province"]);
         }
         
         if(empty($_POST["website"])){
            $website = "";
        } else {
          $website = test_input($_POST["website"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL"; 
          }
        }
      
         
        if (empty($_POST["basic_pay"])) {
            $basic_payErr = "pay is required";
          } else {
            $basic_pay = test_input($_POST["basic_pay"]);
         }
        
         if (empty($_POST["employee_id"])) {
            $employee_idErr = "Id is required";
          } else {
            $employee_id = test_input($_POST["employee_id"]);
         }
         
         if (empty($_POST["zip"])) {
            $zip_codeErr = "zip is required";
          } else {
            $zip_code = test_input($_POST["zip"]);
         }
        
         if (empty($_POST["birth_date"])) {
            $birth_dateErr = "Birth Date is required";
          } else {
            $birth_date = test_input($_POST["birth_date"]);
         }
        
         if (empty($_POST["join_date"])) {
            $join_dateErr = "Date is required";
          } else {
            $join_date = test_input($_POST["join_date"]);
         }

         include("connection.php");


      



                $name = $conn->real_escape_string($_POST["name"]);
                $gender = $conn->real_escape_string($_POST["gender"]);
                $join_date = $conn->real_escape_string($_POST["join_date"]);
                $birth_date = $conn->real_escape_string($_POST["birth_date"]);
                $zip_code = $conn->real_escape_string($_POST["zip"]);
                $employee_id = $conn->real_escape_string($_POST["employee_id"]);
                $basic_pay = $conn->real_escape_string($_POST["basic_pay"]);
                $website = $conn->real_escape_string($_POST["website"]);
                $province = $conn->real_escape_string($_POST["province"]);
                $city = $conn->real_escape_string($_POST["city"]);
                $address = $conn->real_escape_string($_POST["address"]);
                $email = $conn->real_escape_string($_POST["email"]);     
                 $sql="INSERT INTO `employee` ( `employee_id`,`name`, `gender`, `birth_date`, `address`, `city`, `province`, `postal_code`, `email`, `website`, `join_date`, `annual_basic_pay`)
                  VALUES('$employee_id','$name','$gender','$birth_date',
                                '$address','$city','$province','$zip_code',
                               '$email','$website','$join_date','$basic_pay')";
                   $success = $conn->query($sql);
                   $sql2="update employee set monthly_pay= (annual_basic_pay/12) - ((annual_basic_pay/12)*0.15);";
                    $conn->query($sql2);
                   if(!$success){
                       die("couldn't enter data: ".$conn->error);
         
                   }   else{
                    header("Location: payroll.php");
                   }
                   $conn->close();         



        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
        
        
      
        
       
          
       ?>

        <!-- Header -->
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
        
                <h2>Payroll Manager</h2>
<div>
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Add an Employee!</legend>

                        <!-- Text input-->

                                      <label>Id</label><br>
                                    <input name="employee_id"   type="text" value="<?php echo $employee_id; ?>">
                                    <span style="color: red;">* <?php echo $employee_idErr;?></span>
                               <br><br>


                                <label >name</label><br>
                                    <input name="name"   type="text" value="<?php echo $name; ?>">
                                   
                                    <span style="color: red;">* <?php echo $nameErr;?></span>
                               <br> <br>
                                <label >birth date</label><br>
                                    <input name="birth_date"   type="date" value="<?php echo $birth_date; ?>">
                                    <span style="color: red;">* <?php echo $birth_dateErr;?></span>
                                    <br> <br>
                                <label >email</label><br>
                               
                                    <input name="email"   type="text" value="<?php echo $email; ?>">
                                    <span style="color: red;">* <?php echo $emailErr;?></span>
                                    <br> <br>
                                      <label>Gender</label><br>
                               
                                    <select name="gender"   value="<?php echo $gender; ?>">
                                    <option  >Please select your Gender</option>
                          <option>Male</option>
                          <option>Female</option>
                          
                          
                        </select>
                                    <span style="color: red;">* <?php echo $genderErr;?></span>
                                    <br><br>
                                      <label>Address</label><br>
                            
                                    <input name="address"  type="text" value="<?php echo $address; ?>">
                                
                                    <span style="color: red;">* <?php echo $addressErr;?></span>
                                    <br><br>
                                     <label >City</label><br>
                            
                                    <input name="city"  type="text" value="<?php echo $city; ?>">
                              
                                    <span style="color: red;">* <?php echo $cityErr;?></span>
                               <br><br>
                                <label >Province</label>
                                <br>
                                    <select name="province"  value="<?php echo $province; ?>">
                          <option  >Please select your Province</option>
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
                        <span style="color: red;">* <?php echo $provinceErr;?></span>
                               
                               <br><br>
                                 <label >Zip Code</label><br>
                           
                                    <input name="zip"  type="text" value="<?php echo $zip_code; ?>">
                                    <span style="color: red;">* <?php echo $zip_codeErr;?></span>
                               <br><br>
                                <label>Website or domain name</label><br>
                                    <input name="website" placeholder="Website or domain name" type="text" value="<?php echo $website; ?>">
                                    <span style="color: red;">* <?php echo $websiteErr;?></span>
                                    <br><br>
                             <label >Join Date</label>
                          <br>
                                    <input name="join_date"   type="date" value="<?php echo $join_date; ?>">
                                    <span style="color: red;">* <?php echo $join_dateErr;?></span>
                               <br><br>
                               <label >Annual Pay</label>
                           <br>
                                    <input name="basic_pay"  type="text" value="<?php echo $basic_pay; ?>">
                                    <span style="color: red;">* <?php echo $basic_payErr;?></span>
                               

                                   <br><br>

                        
                                <button onclick="alert('Employee Added Successfully!')"<input type="submit" name="submit" value="Submit">ADD </button>
                           
                    </fieldset>
                </form>
               
     </div>    
      
       
</body>
</html>