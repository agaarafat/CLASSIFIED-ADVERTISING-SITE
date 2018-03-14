<?php
require_once 'Models/Picture.cls.php';
require_once 'dbconfig.php';
class Tools {
    public static function displayGridView($tab, $obj) {
        echo $obj->header();
        foreach ($tab as $oneE) {
            echo $oneE;
        }
        echo $obj->footer();
    }
    
    public static function displayListOfOption($arr) {
        //echo "<select name='cboItem'>";
        foreach ($arr as $oneItem) {
            echo "<option value='" .$oneItem["value"]. "'>" .$oneItem["text"]. "</option>";
        }
        //echo "</select>";
    }
    public static function displayListOfOption2($arr) {
        //echo "<select name='cboItem'>";
        foreach ($arr as $oneItem) {
            echo "<option value='" .$oneItem["text"]. "'>" .$oneItem["text"]. "</option>";
        }
        //echo "</select>";
    }
    public static function displayBlockAds($tab, $obj) {   
        $pic = new Picture();
        foreach ($tab as $oneAd) {
            $pic->setRefAd($oneAd->getRefAd());
            $result = $pic->getPicturesByAd($GLOBALS['myCon']);
            echo "<div class='col-sm-6' style='padding:10px;'>";            
            echo "<h3>" .$oneAd->getAdTitle(). "</h3>";
            if ($result == null) {
                echo "<img src='product_images/undefined.jpg' style='width:100%; height: 100px;'>";
            }
            else {
                foreach ($result as $onePic) {
                    echo "<img src='product_images/" .$onePic->getPicPath(). "' style='width:100%; height: 100px;'>";
                    break;
                }
            }
            echo "<br/><br/><p><b>Condition :</b> " .$oneAd->getProCondition(). ", Category : " . $oneAd->getCategory(). ", " .$oneAd->getSubCategory(). "</p>";
            echo "<p><b>Price :</b> ". $oneAd->getPrice() . "</p>";
            echo "<a class='btn btn-success btn-block' href='singlead.php?ref=".$oneAd->getRefAd()."' >Explore Ad</a>";
            
            echo "</div>";
        }
    }
    
    public static function displayBlockAdsForUpdate($tab, $obj) {
        $pic = new Picture();
        foreach ($tab as $oneAd) {
            $pic->setRefAd($oneAd->getRefAd());
            $result = $pic->getPicturesByAd($GLOBALS['myCon']);
            echo "<div class='col-sm-6' style='padding:10px;'>";
            echo "<h3>" .$oneAd->getAdTitle(). "</h3>";
            if ($result == null) {
                echo "<img src='product_images/undefined.jpg' style='width:100%; height: 100px;'>";
            }
            else {
                foreach ($result as $onePic) {
                    echo "<img src='product_images/" .$onePic->getPicPath(). "' style='width:100%; height: 100px;'>";
                    break;
                }
            }
            echo "<br/><br/><p><b>Condition :</b> " .$oneAd->getProCondition(). ", Category : " . $oneAd->getCategory(). ", " .$oneAd->getSubCategory(). "</p>";
            echo "<p><b>Price :</b> ". $oneAd->getPrice() . "</p>";
            echo "<a class='btn btn-success btn-block' href='adupdate.php?ref=".$oneAd->getRefAd()."' >Explore Ad</a>";
            
            echo "</div>";
        }
    }
    
    public static function displayBlockList($arr) {
        foreach ($arr as $oneElement) {
            echo "<input type='button' class='btn btn-warning btn-block' onclick='displayItem(" .$oneElement["value"]. ")' value='" .$oneElement["text"]. "'/>";         
        }
    }
    
    public  static  function inputPhoto($num) {
        for ($i=1; $i<$num+1; $i++) {
            echo "<form method='get'>";
            echo "<label class='col-sm-4 control-label'>Image $i</label>";
            echo "<input type='file' class='btn btn-success btn-block' name='imgHome[$i]' required='required'/>";
            echo "<input type='submit' name='btnPic' value='Submit'/>";
            echo "</form>";
        }
    }
    
    
}