<?php session_start();?>
<html>
<meta charset="UTF-8">
<body style="background-color:white">
<style>
 p {font-family: 'New Times Roman';
      color: #222222;
      font-size:18px;
      line-height: 1.5;
      word-space: 12px;        
            
    
     }
    
     .des {font-style:italic; font-size:18px;  line-height: 1.5;
      word-space: 12px;    }
    
      .foot{ font-size:12px;color:#19648a;  }
    
     @media screen and (max-width: 480px) {
         .center {{ margin:auto; width:100%; border:1px solid grey; padding-left:10px; padding-right: 10px; padding-top: 20px; padding-bottom: 0px}
   
            
         }
     }
    
    
    
     .center { margin:auto; width:80%; border:1px solid lightblue; padding-left:20px; padding-right: 20px; padding-top: 20px; padding-bottom: 0px}
   
     h3 {color: #19648a; font-size:20px;}
    
     a:link {
          text-decoration:none;
          color: #19648a;
          }
          a:visited {
          text-decoration:none;
          color: #6868CB;
          }
          a:hover {
          text-decoration:underline;
          color: #BF81CF;
          }
    
   
     body {
     
      background-color:white;
     
     
     }
    
     div {background-color:white;}
    
 
 
 
 
 
 
 
 
input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: lightblue;
    color: purple;
    border-radius: 20px;
    width: 200px;
    height:100px;
    font-size: 1em;
    font-family:'Courier New';
}

#mess {

 background-color: lightblue;
    color: black;
    border-radius: 20px;
    width: 900px;
    height: 90px;
    font-size: 1em;
font-family:'Courier New';
}


#messsent {

 background-color: lightgrey;
    color: black;
    border-radius: 20px;
    width: 70px;
    height: 20px;
    font-size: 0.5em;
font-family:'Courier New';
}

#newmess {
 background-color: lightpink;
    color: green;
    border-radius: 10px;
    width: 700px;
    height: 70px;
    font-size: 1.5em;


font-family:'Courier New';

}
</style>
<script>
MathJax = {
   tex: {
     inlineMath: [['$', '$'], ['\\(', '\\)']]
   },
   svg: {
     fontCache: 'global'
   }
 };
 </script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


     <br>
     
    
      <a href="resources.txt"> <a href="../index.html">New Enlightenment Site</a>
     
     
        <h1 style="text-align:center;font-size:44px;color: #19648a;">BLOGTITLE</h1>
        
        <div style="text-align:center;color:#19648a; background-color: white"><i> </i></div><br>
           
            <hr><br>
    <br>
    <br>
    






<script>


var gotonew = function gotn(){

window.location.href='NAMEnew.php';

}
var viewmess = function vm(name){

var form = document.createElement('form');
form.style.visibility = 'hidden';
form.method = 'POST';
form.action = 'NAMEmessview.php';
var input = document.createElement('input');
    input.name = "name";
    input.value = name;
    form.appendChild(input);
document.body.appendChild(form);
form.submit();}

</script>


<?php

if($_SESSION["auth"]!="yes"){

echo("<script>window.location.href='NAMElogin.php'</script>");     }


function getname($title){return explode("#", $title)[0];}
function gtdate($title){return explode("#", $title)[1];}

function sortFunction( $b, $a ) {
      if($a=="." || $a==".."){return -1;}
if($b=="." || $b==".."){return  1;}
    
    return (strtotime(gtdate($a)) - strtotime(gtdate($b)))   ;
}



$dir = 'NAMEposts';
$premessages = scandir($dir);

usort($premessages,"sortFunction");


foreach($premessages as $title){
if($title != "." && $title !=".."){

 echo('<br> <div class="center"><p><h3>  ');
 $tit = getname($title);
 echo ($tit);
 
 echo('</h3></p><p class="des"></p><p>    ');
     

 $loc = 'NAMEposts/'.$title;
 $message = file_get_contents($loc);
 echo($message);
 
 echo('</p>
     <p class="foot">');
 
 $tit = gtdate($title);
 echo ($tit);
 echo ('
  </p>
     <br> ');




echo('<button id="messsent" name="'.$title.'" onclick="viewmess(this.name)">Edit</button></div><br>');



}



}

 ?>
 

<br>
<br>

<div class="center">
<button id="newmess" onclick="gotonew()" style="font-size:22px">New Post</button>
<br><br>

</div>

</div>
<br>
<br>
</html>
