<?php
    session_start();
    require('../connection.php');
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    } 
    $result=mysql_query("SELECT * FROM tbCandidates")
    or die("There are no records to display ... \n" . mysql_error()); 
    if (mysql_num_rows($result)<1){
        $result = null;
    }
?>

<?php
    $positions_retrieved=mysql_query("SELECT * FROM tbPositions")
	
    or die("There are no records to display ... \n" . mysql_error()); 
?>

<?php
   
	$candidate_region=mysql_query("SELECT * FROM location")
    or die("There are no records to display ... \n" . mysql_error()); 
?>

<?php
if (isset($_POST['Submit']))
{

   
    $newCandidateName =$_POST['name'];
	$newCandidatePosition =$_POST['position'];
	$newCandidateRegion =$_POST['region'];
    $sql = mysql_query( "INSERT INTO tbCandidates(candidate_name,candidate_position,candidate_region) VALUES ('$newCandidateName','$newCandidatePosition','$newCandidateRegion')" )
            or die("Could not insert candidate at the moment". mysql_error() );

    // redirect back to candidates
     header("Location: candidates.php");
    }
?>

<?php
    // deleting sql query
    // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
     // get id value
     $id = $_GET['id'];
     
     // delete the entry
     $result = mysql_query("DELETE FROM tbCandidates WHERE candidate_id='$id'")
     or die("The candidate does not exist ... \n"); 
     
     // redirect back to candidates
     header("Location: candidates.php");
     }
     else
     // do nothing   
?>






<!DOCTYPE html>

<html>
<head>
<title>Indian voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<script language="JavaScript" src="js/user.js">
</script>

</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
   
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
   
   
    
  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="login.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel Pages</a>
          <ul>
            <li><a href="manage-admins.php">Manage Admin</a></li>
            <li><a href="positions.php">Manage Positions</a></li>
            <li><a href="candidates.php">Manage Candidates</a></li>
			<li><a href="vote.php">Vote</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>
        
        <li><a href="http://localhost/project/index.php">Voter Panel</a></li>
			<li><a href="fingerprint_capture.php">Upload FingerPrint</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
    
  </header>
</div>

<div >
<table width="380" align="center">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td bgcolor="#FAEBD7">Candidate Name</td>
    <td bgcolor="#FAEBD7"><input type="text" name="name" /></td>
</tr>

<tr>
    <td bgcolor="#7FFFD4">Candidate Position</td>
    
    <td bgcolor="#7FFFD4"><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
        //loop through all table rows
          while ($row=mysql_fetch_array($positions_retrieved)){
         
		    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
        }
    ?>
    </SELECT>
    </td>
</tr>

<tr>
    <td bgcolor="#7FFFD4">Candidate Region</td>
    
    <td bgcolor="#7FFFD4"><SELECT NAME="region" id="region">select
    <OPTION VALUE="select">select
    <?php
        //loop through all table rows
      
			 while ($row=mysql_fetch_array($candidate_region)){
           echo "<OPTION VALUE=$row[state]>$row[state]";
        }
    ?>
    </SELECT>
    </td>
</tr>

<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
<th>candidate Region</th>
</tr>

<?php
    //loop through all table rows
    while ($row=mysql_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['candidate_id']."</td>";
    echo "<td>" . $row['candidate_name']."</td>";
    echo "<td>" . $row['candidate_position']."</td>";
	echo "<td>" . $row['candidate_region']."</td>";
    echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
    echo "</tr>";
    }
    mysql_free_result($result);
    mysql_close($link);
?>

</table>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="one_third first">
      <h6 class="title">Address</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
         
          <p>
          College     : A P SHAH INSTITUTE OF TECHNOLOGY <br>
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
</body>
</html>








