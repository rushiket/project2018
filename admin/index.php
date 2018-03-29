


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Login Form</title>


      <link rel="stylesheet" href="css/style.css">

      <script language="JavaScript" src="js/admin.js">
  </script>

  
</head>

<body style="background-image:url('images/demo/backgrounds/admin.png');">


  

<div class="pen-title">
  <h1>Admin Login Form</h1>
</div>

<div class="container" >
  <div class="card"></div>

  <div class="card">
    <h1 class="title">Login</h1>
    <form name="form1" action="checklogin.php" method="post" onsubmit="return loginValidate(this)">

      <div class="input-container">
        <input name="myusername"  type="text" required="required"/>
        <label>Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="mypassword"  type="password"  required="required"/>
        <label>Password</label>
        <div class="bar"></div>
      </div>

     

      <div class="button-container">

        <button name="Submit"><span>Login</span></button>

      </div>
      <br><br>
    <center>Return to <a href="http://localhost/project/index.php">Voter Panel</a></center>

    </form>
  </div>
  
</div>


</body>
</html>




