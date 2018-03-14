<?php
class Picture {
    private $refPicture;
    private $picName;
    private $picPath;
    private $refAd;
    
    public function __construct($refPic = null, $picName = null,
        $picPath = null, $refAd = null)
    {
        $this->refPicture = $refPic;
        $this->picName = $picName;
        $this->picPath = $picPath;
        $this->refAd = $refAd;
    }
    
    public function getRefPicture()
    {
        return $this->refPicture;
    }
    
    public function getPicName()
    {
        return $this->picName;
    }
    
    public function getPicPath()
    {
        return $this->picPath;
    }
    
    public function getRefAd()
    {
        return $this->refAd;
    }
    
    public function setRefPicture($refPicture)
    {
        $this->refPicture = $refPicture;
    }
    
    public function setPicName($picName)
    {
        $this->picName = $picName;
    }
    
    public function setPicPath($picPath)
    {
        $this->picPath = $picPath;
    }
    
    public function setRefAd($refAd)
    {
        $this->refAd = $refAd;
    }
    static function header(){
        $str = "<table border='1'><tr>";
        $str = $str."<th>Picture ID</th><th>Picture Name</th><th>Picture</th><th>Ad ID</th></tr>";
        return $str;
    }
    
    static function footer(){
        return "</table>";
    }
    
    function __toString(){
        return "<td>$this->refPicture</td><td>$this->picName</td>
                <td><img src='$this->picPath'/></td><td>$this->refAd</td></tr>";
    }
    
    function addPicture($myCon) {
        $refPic = null;
        $picName = $this->picName;
        $picPath = $this->picPath;
        $refAd = $this->refAd;
        
        $sqlStmt = "INSERT INTO pictures VALUES (null, '$picName','$picPath', $refAd)";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    function getAllPictures ($myCon){
        $idx = 0;
        $tabOfPictures=null;
        $sqlStmt = "SELECT * FROM pictures";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pic = new Picture();
            $pic->setRefPicture($oneRec["RefPicture"]);
            $pic->setPicName($oneRec["PictureName"]);
            $pic->setPicPath($oneRec["PicPath"]);
            $pic->setRefAd($oneRec["RefAd"]);
            
            $tabOfPictures[$idx++] = $pic;
        }
        return $tabOfPictures;
    }
    
    function getPicturesByAd ($myCon){
        $idx = 0;
        $tabOfPictures = null;
        $refAd = $this->refAd;
        $sqlStmt = "SELECT * FROM pictures WHERE RefAd = $refAd";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pic = new Picture();
            $pic->setRefPicture($oneRec["RefPicture"]);
            $pic->setPicName($oneRec["PictureName"]);
            $pic->setPicPath($oneRec["PicPath"]);
            $pic->setRefAd($oneRec["RefAd"]);
            
            $tabOfPictures[$idx++] = $pic;
        }
        return $tabOfPictures;
    }
    
    function updatePicture ($myCon) {
        $refPic = $this->refPicture;
        $picPath = $this->picPath;
        $sqlStmt = "UPDATE pictures SET PicPath = $picPath WHERE RefPicture=$refPic";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    function deletePicture ($myCon) {
        $refPic = $this->refPicture;
        $sqlStmt = "DELETE FROM pictures WHERE RefPicture=$refPic";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function countPictureByAd($myCon) {
        $refAd = $this->refAd;
        $sqlStmt = "SELECT COUNT('RefPicture') FROM pictures WHERE RefAd=$refAd";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            return $oneRec[0];
        }
    }
    
    function displayAllPictures($tabOfPictures) {
        $str = $this->header();
        foreach ($tabOfPictures as $onePicture) {
            $str = $str . $onePicture;
        }
        $str = $str . $this->footer();
        return $str;
    }
}
?>