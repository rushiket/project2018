<?php
    session_start();
    require('connection.php');

    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['member_id'])){
      header("location:access-denied.php");
    } 
    //retrive voter details from the tbmembers table
    $result=mysql_query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
    or die("There are no records to display ... \n" . mysql_error()); 
    if (mysql_num_rows($result)<1){
        $result = null;
    }
    $row = mysql_fetch_array($result);
    if($row)
     {
         // get data from db
         $stdId = $row['member_id'];
         $firstName = $row['first_name'];
         $lastName = $row['last_name'];
         $email = $row['email'];
         $voter_id = $row['voter_id'];
		 $state = $row['state'];
		 $district = $row['district'];
		 $city =$row['city'];
		 
     }
?>

<?php
    // updating sql query
    if (isset($_POST['update'])){
        $myId =  $_GET[id];
		$myFirstName=$_POST['first_name'];
		$myLastName=$_POST['last_name'];
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myVoterid = $_POST['voter_id'];
		$myState = $_POST['state'];
		$myDistrict =$_POST['district'];
		$myCity =$_POST['city'];

        $newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

        $sql = mysql_query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', voter_id = '$myVoterid', password='$newpass',state ='$myState',district='$myDistrict', city = '$myCity' WHERE member_id = '$myId'" )
                or die( mysql_error() );

        // redirect back to profile
         header("Location: manage-profile.php");
    }
?>




<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="css/user_styles.css" rel="stylesheet" type="text/css" /> -->
<script language="JavaScript" src="js/updateprofile.js">
</script>

</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-pinterest" href="https://uk.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="faicon-twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-rss" href="https://www.rss.com/"><i class="fa fa-rss"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> +91 7208119935</li>
        <li><i class="fa fa-envelope-o"></i> mrushiket@gmail.com </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a class="drop" href="#">Voter Pages</a>
          <ul>
            
            <li><a href="manage-profile.php">Manage my profile</a></li>
			<li><a href="change_address.php">Change Address</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
            <table border="0" width="620" align="center">
            <CAPTION><h3>MY PROFILE</h3></CAPTION>
            <form>
            <br>
            <tr><td></td><td></td></tr>
            <tr>
                <td style="color:#000000"; >Id:</td>
                <td style="color:#000000"; ><?php echo $stdId; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >First Name:</td>
                <td style="color:#000000"; ><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Last Name:</td>
                <td style="color:#000000"; ><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Email:</td>
                <td style="color:#000000"; ><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Voter Id:</td>
                <td style="color:#000000"; ><?php echo $voter_id; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Password:</td>
                <td style="color:#000000"; >Encrypted</td>
            </tr>
			 <tr>
                <td style="color:#000000"; >State:</td>
                <td style="color:#000000"; ><?php echo $state; ?></td>
            </tr>
			 <tr>
                <td style="color:#000000"; >District:</td>
                <td style="color:#000000"; ><?php echo $district; ?></td>
            </tr>
			 <tr>
                <td style="color:#000000"; >City:</td>
                <td style="color:#000000"; ><?php echo $city; ?></td>
            </tr>
            </table>
            </form>

        </blockquote>
      
      </li>
      <li class="one_half">
        <blockquote>
            <table  border="0" width="620" align="center">
            <CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
            <form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
            <table align="center">
            <tr><td  style="background-color:#0000ff"  >First Name:</td>
			<td style="background-color:#0000ff"  >
			<input  style="color:#000000"; type="text" font-weight:bold;" name="first_name" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#bf00ff">Last Name:</td><td style="background-color:#bf00ff">
			<input style="color:#000000";  type="text" font-weight:bold;" name="last_name" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#0000ff" >Email Address:</td>
			<td style="background-color:#0000ff">
			<input style="color:#000000";  type="text" font-weight:bold;" name="email" maxlength="100" value=""></td></tr>

            <tr><td style="background-color:#bf00ff" >Voter Id:</td>
			<td style="background-color:#bf00ff">
			<input  style="color:#000000";  type="text"  font-weight:bold;" name="voter_id" maxlength="100" value=""></td></tr>
			
			<tr><td style="background-color:#0000ff" >State:</td>
			<td style="background-color:#0000ff">
			<input style="color:#000000";  type="text" font-weight:bold;" name="state" maxlength="100" value=""></td></tr>

            <tr><td style="background-color:#bf00ff" >District:</td>
			<td style="background-color:#bf00ff">
			<input  style="color:#000000";  type="text"  font-weight:bold;" name="district" maxlength="100" value=""></td></tr>
			
			<tr><td style="background-color:#0000ff" >City:</td>
			<td style="background-color:#0000ff">
			<input style="color:#000000";  type="text" font-weight:bold;" name="city" maxlength="100" value=""></td></tr>
			
            <tr><td style="background-color:#0000ff" >New Password:</td>
			<td style="background-color:#0000ff" >
			<input  style="color:#000000";  type="password" font-weight:bold;" name="password" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#bf00ff" >Confirm New Password:</td>
			<td style="background-color:#bf00ff" >
			<input   style="color:#000000";  type="password"  font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#0000ff" >&nbsp;</td></td><td style="background-color:#0000ff" >
			<input style="color:#ff0000";  type="submit" name="update" value="Update Profile"></td></tr>

            </table>
            </form>
            </table>



        </blockquote>
      
      </li>

    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="title">Address</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
         
          <p>
          Name        : A P SHAH INSTITUTE OF TECHNOLOGY<br>
          University  : Mumbai <br>
          Batch       : 2017-18 <br>
          Dept        : Computer Engineering <br>
          </p>
          </address>
        </li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
       
        <li><i class="fa fa-phone"></i> +91 (022)25973737<br>
          </li>


      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">
        
        <li><i class="fa fa-envelope-o"></i> principal@apsit.org.in </li>

      </ul>
    </div>

  </footer>
</div>
</body>
</html>


