
<!DOCTYPE html>
<html>
<body style="background-color:powderblue;">


<?php
//session_start();
ini_set ("display_errors", "1");
error_reporting(E_ALL);


ob_start();
session_start();
require('../connection.php');

$tbl_name="tbadministrators"; // Table name


$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$encrypted_mypassword=md5($mypassword); 



$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysql_error());
$result=mysql_query($sql) or die(mysql_error());


$count=mysql_num_rows($result);


if($count==1){
    
    
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;

                    $user = mysql_fetch_assoc($result);
     				$_SESSION['admin_id'] = $user['admin_id'];

                    header("Location:admin.php");
                    exit;
                }
            


else {
    echo "<br> <br> <br> ";
    echo "<center> <h3>Wrong Username or Password<br><br>Return to <a href=\"index.php\">login</a> </h3></center>";
}

ob_end_flush();

?> 




</body>
</html>