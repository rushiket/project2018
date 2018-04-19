<?php
	require('connection.php');

	session_start();
	//If your session isn't valid
	if(empty($_SESSION['member_id'])){
	 	header("location:access-denied.php");
	}
	$result=mysql_query("Select * from tbMembers where member_id = '$_SESSION[member_id]'")
	or die("there are no record to display.....\n".mysql_error());
	if(mysql_num_rows($result)<1)
	{
		$result=null;
	}
	
	$row =mysql_fetch_array($result);
	if($row)
	{
		$stdID=$row['member_id'];
		$State=$row['state'];
	}
?>

<?php
if (isset($_GET['id']) && isset($_POST['update']))
{
	$stdID=$_GET['id'];
	$State=$_POST['state'];
	
	$sql=mysql_query("UPDATE tbMembers SET state='$State' where member_id='$stdID'")
	or die("An Address has been updated." . mysql_error()) ;
	
	header("Location : change_address.php");
	
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
<script language="JavaScript" src="js/change_state.js"></script>

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
        <li><i class="fa fa-phone"></i> +91 (022)25973737</li>
        <li><i class="fa fa-envelope-o"></i> principal@apsit.org.in </li>
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
			<li><a href="vote.php">Change Address</a></li>
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
    
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
            <table border="0" width="620" align="center">
            <CAPTION><h3>DEFAULT ADDRESS</h3></CAPTION>
            <form>
            <br>
            <tr><td></td><td></td></tr>
  
			 <tr>
                <td style="color:#000000"; >State:</td>
                <td style="color:#000000"; ><?php echo $State; ?></td>
            </tr>
		
            </table>
            </form>

        </blockquote>
      
      </li>
      <li class="one_half">
        <blockquote>
            <table  border="0" width="620" align="center">
            <CAPTION><h3>CURRENT ADDRESS</h3></CAPTION>
            <form action="change_address.php?id=<?php echo $_SESSION['member_id']; ?>" method="post"  onsubmit="return updateState(this)">
            <table align="center">
			
			<tr><td style="background-color:#0000ff" >State:</td>
			<td style="background-color:#0000ff">
			<input style="color:#000000";  type="text" font-weight:bold;" name="state" maxlength="100" value=""></td></tr>


            <tr><td style="background-color:#0000ff" >&nbsp;</td></td><td style="background-color:#0000ff" >
			<input style="color:#ff0000";  type="submit" name="update" value="Update Address"></td></tr>

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
          Name        : A P SHAH INSTITUTE OF TECHNOLOGY <br>
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
       
        <li><i class="fa fa-phone"></i> (022)25973737<br>
          </li>


      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">
        
        <li><i class="fa fa-envelope-o"></i> principal@apsit.org.in </li>

      </ul>
    </div>


    <!-- ################################################################################################ -->
  </footer>
</div>

</body>
</html>


