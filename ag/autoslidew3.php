<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
 /* max-width: 1400px;
  max-height: 800px;
  /*width:100%;*/
  
  position: relative;
  margin: auto;
                      }
        img
          {
          width:100%;
  
          }

      @media(min-width: 1400px) 
          {

            .slideshow-container {
            max-width:1400px;
                                }
          
           img
            {
            height: 650px;
            }
          }

      @media(max-width: 1200px) and (min-width:801px)
          {
          .slideshow-container {
            max-width:900px;
                                }
           img
            {
            height: 500px;
            }
          }

         @media(max-width: 1399px) and (min-width:1201px)
          {
          .slideshow-container {
            max-width:1200px;
                                }
           img
            {
            height: 500px;
            }
          }

      @media(max-width: 800px) and (max-width:800px)
          {
          .slideshow-container {
            max-width:700px;
                                }
           img
            {
            height: 350px;
            }
          }
.brd
{
  border:2px solid black;
  
  
}


/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: white;
  background-color: black;
  font-size: 25px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  font-weight: bold;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #2372ef;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

body
  {
    background-color: #6886b7;;
  }

</style>
</head>
<body>




<div class="slideshow-container">

<?php
$ind=10;
$phots=array("rec","hin","ind","hin2","kims","adai");
$photdesc=array("Recreation Club Function","Hindi Fortnight Celebrations","Independence Day 2017","Hindi Magazine","KIMS Medical Camp","ADy Visit 2018");
$ind=1;
$x=0;
if (isset($_REQUEST["m"])) $ind=$_REQUEST["m"];
if (isset($_REQUEST["r"])) $x=$_REQUEST["r"];
$phot=$phots[$x];
//echo "<div class='slideshow-container'>";
while (true)
{
if(!(file_exists("images/$phot/fil".$ind.".jpg"))) break;

echo "<div class='mySlides fade brd'>";
echo "<img src='images/$phot/fil".$ind.".jpg'  class='brd' id='imgg'> ";
echo "<div class='text'>$photdesc[$x]</div>";
echo "</div>";

$ind+=1;
}
//echo "</div>";
?>


<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
    <?php
    for ($x=1;$x<$ind;$x++)
    {
      echo "<span class='dot' onclick='currentSlide($x)'></span>";
    }
    ?>
  
</div>

<script>
document.getElementById('imgg').style.width=screen.width-200;
document.getElementById('imgg').style.height=screen.height-200;
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
