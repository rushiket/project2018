<script>
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});
</script>

<?php
    session_start();
    require('connection.php');

    //If your session isn't valid, it returns you to the login screen for protection
   if(empty($_SESSION['voter_id'])){
      header("location:access-denied.php");
    } 
    //retrive voter details from the tbmembers table
    $result=mysql_query("SELECT * FROM tbMembers WHERE voter_id = '$_SESSION[voter_id]'")
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

	
$result=mysql_query("SELECT * FROM tbfingerprint WHERE voter_id = '$_SESSION[voter_id]'")
or die("There are no records of fingerprint to display ... \n" . mysql_error());

//if (mysql_num_rows($result01)<1)
//$result01 =null;

$row =mysql_fetch_array($result);
if($row)
{
	$fingerprint = $row["fingerprint"];
	
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
<script language="JavaScript" src="js/user.js"></script>
<script src="js/jquery-3.3.1.js"></script>
    
<script src="js/mfs100-9.0.2.6.js"></script>

<script language="javascript" type="text/javascript">


        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )
        var flag = 0;

// Function used to match fingerprint using jason object 

function Match() {

            try {
              //fingerprint stored as isotemplate

                var isotemplate = <?php echo json_encode($fingerprint); ?>;
                var res = MatchFinger(quality, timeout, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
                        
                        //variable flag used for authentication 
                        
                        flag=1;
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

//function to redirect to next page upon fingerprint matching

function redirect(){

    
    if(flag>=1){ 
    window.location.replace("vote.php"); 
    }
    else{
      alert("Scan Your Finger");
    }

  return false;
}

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
        <li class="active"><a href="index.php">Home</a></li>
        
        
       
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
            <table border="0" width="620" align="center">
            <CAPTION><h3>VOTER PROFILE</h3></CAPTION>
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
            <CAPTION><h3>Fingerprint Authentication</h3></CAPTION>
            <form action="finger_auth.php?id=<?php echo $_SESSION['voter_id']; ?>" method="post" onsubmit="">
            <table align="center">
				
				
                  
			   <td width="150px" height="190px" align="center" class="img">
                  <img id="imgFinger" width="145px" height="188px" class="padd_top" />
                     </td>
					
					  
					<td>
					<li>
                      <button type="input" onclick="return Match()" class="btn btn-default padd" >start scanning</button>
						
						
                      <button type="submit" onclick="return redirect()" class="btn btn-primary btn-lg  padd submit_buttom_padding btn-block" value="submit" name="submit">Submit</button>
                   </li>
				   </td>
				   

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
       
        <li><i class="fa fa-phone"></i>  (022)25973737<br>
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


