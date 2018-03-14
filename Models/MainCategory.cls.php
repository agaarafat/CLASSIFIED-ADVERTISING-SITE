<?php
require_once 'Category.cls.php';

class MainCategory extends Category {
    public function __construct($refCat = null, $catTitle = null, $catDesc = null)
    {
        parent::__construct($refCat, $catTitle, $catDesc);
    }
    
    static function header(){
        $str = parent::header();
        $str = $str."</tr>";
        return $str;
    }
    function __toString(){
        return parent::__toString() . "</tr>";
    }   
    
    function addCategory($myCon) {
        $refCat = null;
        $catTitle = self::getCatTitle();
        $catDesc = self::getCatDesc();        
        $sqlStmt = "INSERT INTO categories VALUES (null, '$catTitle','$catDesc')";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllCategories ($myCon){
        $idx = 0;
        $sqlStmt = "SELECT * FROM categories";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $cat = new Category();
            $cat->setRefCategory($oneRec["RefCategory"]);
            $cat->setCatTitle($oneRec["CatTitle"]);
            $cat->setCatDesc($oneRec["CatDesc"]);
            
            $tabOfCategories[$idx++] = $cat;
        }
        return $tabOfCategories;
    }
    
    function getACategory ($myCon){
        $refCat = self::getRefCategory();
        $sqlStmt = "SELECT RefCategory, CatTitle FROM categories WHERE RefCategory = $refCat";
        foreach($myCon->query($sqlStmt) as $oneRec) {            
            return array("value"=>$oneRec['RefCategory'], "text"=>$oneRec["CatTitle"]);
        }
    }
    
    function updateCategory($myCon) {
        $refCat = self::getRefCategory();
        $catTitle = self::getCatTitle();
        $catDesc = self::getCatDesc();        
        $sqlStmt = "UPDATE categories SET CatTitle='$catTitle',CatDesc='$catDesc' WHERE RefCategory=$refCat";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }   
    
    function getAllTitle($myCon) {
        $idx = 0;
        $sqlStmt = "SELECT RefCategory, CatTitle FROM Categories";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $arrPackages[$idx++] = array("value"=>$oneRec["RefCategory"], "text"=>$oneRec["CatTitle"]);
        }
        return $arrPackages;
    }
}
?>