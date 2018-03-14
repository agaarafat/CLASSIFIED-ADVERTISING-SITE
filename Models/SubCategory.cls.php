<?php
require_once 'Category.cls.php';

class SubCategory extends Category {
    private $category;
    
    public function __construct($refCat = null, $catTitle = null, 
        $catDesc = null, $category = null)
    {
        parent::__construct($refCat, $catTitle, $catDesc);
        $this->category = $category;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }

    static function header(){
        $str = parent::header();
        $str = $str."<th>Main Category</th></tr>";
        return $str;
    }
    function __toString(){
        return parent::__toString() . "<td>$this->category</td></tr>";
    }   
    function addSubCategory($myCon) {
        $refSubCat = null;
        $sCatTitle = self::getCatTitle();
        $sCatDesc = self::getCatDesc();
        $refCat = $this->category;
        $sqlStmt = "INSERT INTO subcategories VALUES (null, '$sCatTitle','$sCatDesc', $refCat)";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllCategories ($myCon){
        $idx = 0;
        $sqlStmt = "SELECT * FROM categories c, subcategories sc WHERE c.RefCategory = sc.RefCategory";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $scat = new SubCategory();
            $scat->setRefCategory($oneRec["RefSubCategory"]);
            $scat->setCatTitle($oneRec["SubCatTitle"]);
            $scat->setCatDesc($oneRec["SubCatDesc"]);
            $scat->setCategory($oneRec["CatTitle"]);
            
            $tabOfSubCategories[$idx++] = $scat;
        }
        return $tabOfSubCategories;
    }
    function getASubCategoriy ($myCon){
        $refCat = self::getRefCategory();
        $sqlStmt = "SELECT RefSubCategory, SubCatTitle FROM SubCategories WHERE RefSubCategory = $refCat";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            return array("value"=>$oneRec['RefCategory'], "text"=>$oneRec["CatTitle"]);
        }
    }
    function updateSubCategory($myCon) {
        $refSubCat = self::getRefCategory();
        $sCatTitle = self::getCatTitle();
        $sCatDesc = self::getCatDesc();
        $sqlStmt = "UPDATE subcategories SET SubCatTitle='$sCatTitle',SubCatDesc='$sCatDesc' WHERE RefSubCategory=$refSubCat";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function deleteSubCategory($myCon) {
        $refSubCat = self::getRefCategory();
        $sqlStmt = "DELETE FROM subcategories WHERE RefSubCategory=$refSubCat";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllTitle($myCon) {
        $idx = 0;
        $sqlStmt = "SELECT RefSubCategory, SubCatTitle FROM SubCategories WHERE RefCategory = $this->category";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $arrPackages[$idx++] = array("value"=>$oneRec["RefSubCategory"], "text"=>$oneRec["SubCatTitle"]);
        }
        return $arrPackages;
    }
}
?>
?>