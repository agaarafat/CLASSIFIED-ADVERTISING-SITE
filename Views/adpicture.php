<?php 
require_once 'Models/Picture.cls.php';

$pic = new Picture();
$pic->setRefAd($refAd);
$result = $pic->getPicturesByAd($myCon);
?>

<div class="col-sm-6">
    <div class="w3-container">
      <h2>Products Picture</h2>
    </div>
    
    <div class="w3-content" style="max-width:1200px">
      <?php 
        if ($result != null) {
        foreach ($result as $oneRec) {
      ?>
      <img class="mySlides" src="product_images/<?php echo $oneRec->getPicPath(); ?>" style="width:550px; height: 260px;">
      <?php }?>
      <div class="w3-row-padding w3-section">
      <?php 
      $i = 1;
        foreach ($result as $oneRec) {
      ?>
        <div class="w3-col s4">
          <img class="demo w3-opacity w3-hover-opacity-off" src="product_images/<?php echo $oneRec->getPicPath(); ?>" style="width:100%" onclick="currentDiv(<?php echo $i;?>)">
        </div>
       <?php 
        $i = $i+1;
        }}
        
        else {
            echo "<img src='product_images/undefined.jpg' style='width:100%;'>";
        }
        ?>
      </div>
    </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>