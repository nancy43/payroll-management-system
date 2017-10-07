
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/index.js"></script>


</head>

<body>
<h1> PAYROLL MANAGEMENT SYSTEM </h1>
    
    <div class="login">


        <form name="loginform" onsubmit="return validateForm();" action="payroll.php" method="post" id="login">
            <input type="text" name="usr" placeholder="Username" required="required" /><br><br>
            <input type="password" name="pword" placeholder="Password" required="required" /> <br> <br>
            <button type="submit" value="Login" >Login</button>
        </form>
    </div>



</body>

</html>