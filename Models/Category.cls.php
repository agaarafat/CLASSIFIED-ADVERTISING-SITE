<?php
class Category {
    private $refCategory;
    private $catTitle;
    private $catDesc;
    
    public function __construct($refCat = null, $catTitle = null, $catDesc = null)
    {
        $this->refCategory = $refCat;
        $this->catTitle = $catTitle;
        $this->catDesc = $catDesc;
    }
    public function getRefCategory()
    {
        return $this->refCategory;
    }
    
    public function getCatTitle()
    {
        return $this->catTitle;
    }
    
    public function getCatDesc()
    {
        return $this->catDesc;
    }
    
    public function setRefCategory($refCategory)
    {
        $this->refCategory = $refCategory;
    }
    
    public function setCatTitle($catTitle)
    {
        $this->catTitle = $catTitle;
    }
    
    public function setCatDesc($catDesc)
    {
        $this->catDesc = $catDesc;
    }

    static function header(){
        $str = "<table class='table table-bordered'><tr>";
        $str = $str."<th>ID</th><th>Title</th><th>Description</th>";
        return $str;
    }
    
    static function footer(){
        return "</table>";
    }
    
    function __toString(){
        return "<tr><td>$this->refCategory</td><td>$this->catTitle</td><td>$this->catDesc</td>";
    }   
    function displayAllCategories($tabOfCategories) {
        $str = $this->header();
        foreach ($tabOfCategories as $oneCategory) {
            $str = $str . $oneCategory;
        }
        $str = $str . $this->footer();
        return $str;
    }
}
?>