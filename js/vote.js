
function getVote(int)
{
  if (window.XMLHttpRequest)
  {
      xmlhttp=new XMLHttpRequest();
  }
  else
  {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  if(confirm("Your vote is for "+int))
  {
      xmlhttp.open("GET","save.php?vote="+int,true);
	  
      xmlhttp.send();
	 
	
  }

  else
  {
      alert("Choose another candidate "); 
  }
  
}

function getPosition(String)
{
  if (window.XMLHttpRequest)
  {
      xmlhttp=new XMLHttpRequest();
  }
  else
  {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.open("GET","vote.php?position="+String,true);
  xmlhttp.send();
}
