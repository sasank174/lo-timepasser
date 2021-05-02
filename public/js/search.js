function fx(str)
{
var s1=document.getElementById("qu").value;
var xmlhttp;
if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    document.getElementById("livesearch").style.display="block";
    return;
  }
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.display="block";
    }
  }
xmlhttp.open("GET","call_ajax.php?n="+s1,true);
xmlhttp.send();
}
