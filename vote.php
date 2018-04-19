<?php
  require('connection.php');

  session_start();
  
  //if(empty($_SESSION['voter_id'])){
  //    header("location:access-denied.php");
  //  } 
?>
<?php
    
    $positions=mysql_query("SELECT * FROM tbPositions")
    or die("There are no records to display ... \n" . mysql_error()); 
  ?>
  
  <?php
    
    $location=mysql_query("SELECT * FROM location")
    or die("There are no records to display ... \n" . mysql_error()); 
  ?>
  
  <?php
    
     if (isset($_POST['Submit']))
     {
       
       $position = $_POST['position']; 
       
       
       $result = mysql_query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
       or die(" There are no records at the moment ... \n"); 
     
     }
     else
     // do something
  
?>
<!DOCTYPE html>

<html>
<head>
<title>Indian voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="css/user_styles.css" rel="stylesheet" type="text/css" /> -->
<script language="JavaScript" src="js/user.js"></script>
<script language="JavaScript" src="js/vote.js"></script>

<script type="text/javascript">

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
        <li><i class="fa fa-phone"></i> +91 (022)25973737</li>
        <li><i class="fa fa-envelope-o"></i> principal@apsit.org.in </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.php">ONLINE VOTING</a></h1>
    </div>
 </header>
</div>
<!--<h3> Make your Vote in  <span id="countdowntimer">10 </span> Seconds</h3>

<script type="text/javascript">
    var timeleft = 10;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },10000);
</script>

-->
<script type="text/javascript">   
function Redirect() 
{  
window.location.href="voting_page.php"; 
}
var display  = document.write("You will be redirected to a new page in 1 minute"); 
 console.log(display);

   display.style.fontSize = "100px";
   display.innerHTML = "String";
setTimeout('Redirect()', 6000);   
</script>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      



            <div >
            <table bgcolor="#00FF00" width="420" align="center">
            <form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
           
			
			  <tr>
                <td bgcolor="#5D7B9D" >Choose State</td>
                <td bgcolor="#5D7B9D" style="color:#000000"; ><SELECT NAME="state" id="state" onclick="getPosition(this.value)">
                <OPTION  VALUE="select">select
                <?php 
                  //loop through all table rows
                  while ($row=mysql_fetch_array($location)){
                    echo "<OPTION VALUE=$row[state]>$row[state]"; 
                  }
                ?>
                </SELECT></td>
                <td bgcolor="#5D7B9D" ></td>
            </tr>
			
			 <tr>
                <td bgcolor="#5D7B9D" >Choose Position</td>
                <td bgcolor="#5D7B9D" style="color:#000000"; ><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
               <OPTION  VALUE="select">select
                <?php 
                  //loop through all table rows
                  while ($row=mysql_fetch_array($positions)){
                    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
                  }
                ?>
				 <td bgcolor="#5D7B9D" ><input style="color:#ff0000";  type="submit" name="Submit" value="See Candidates" /></td>
               </td>
                
            </tr>
			
            <tr>
               
            </tr>
            </form> 
            </table>
            <table width="270" align="center">
            <form>
            <tr>
                <th>Candidates:</th>
				
            </tr>
            <?php
              
                if (isset($_POST['Submit']))
                {
                  while ($row=mysql_fetch_array($result)){
                    
                      echo "<tr>";
                      echo "<td style='background-color:#bf00ff'>" . $row['candidate_name']. "</td>";
					//   echo "<td style='background-color:#bf00ff'>" . $row['state']. "</td>";
                      echo "<td style='background-color:#bf000f'><input type='radio' name='vote' value='$row[candidate_name]'   onclick='getVote(this.value)' /></td>";
                      echo "</tr>";
                  }
                  mysql_free_result($result);
                //  mysql_close($link);
              //}
                }
                else
              // do nothing
            ?>
	<!--<script type="text/javascript">
alert("review your answer");
window.location.href = "voter_page.php";
</script>
-->
            <tr>
                <h4>Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</h4>
                
            </tr>
            </form>
            </table>
            </div>


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

