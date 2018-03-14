<?php
class Package {
    private $refPackage;
    private $title;
    private $desc;
    private $nbPicture;
    private $duration;
    private $price;
    
    public function __construct($refPackage = null, $title = null,
        $desc = null, $nbPicture = null, $duration = null)
    {
        $this->refPackage = $refPackage;
        $this->title = $title;
        $this->desc = $desc;
        $this->nbPicture = $nbPicture;
        $this->duration = $duration;
    }
    
    public function getRefPackage()
    {
        return $this->refPackage;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function getDesc()
    {
        return $this->desc;
    }
    
    public function getNbPicture()
    {
        return $this->nbPicture;
    }
    
    public function getDuration()
    {
        return $this->duration;
    }    
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function setRefPackage($refPackage)
    {
        $this->refPackage = $refPackage;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    
    public function setNbPicture($nbPicture)
    {
        $this->nbPicture = $nbPicture;
    }
    
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }

    static function header(){
        $str = "<table border='1'><tr>";
        $str = $str."<th>Package ID</th><th>Title</th><th>Description</th><th>Number of Pic</th><th>Duration</th><th>Price</th><tr>";
        return $str;
    }
    
    static function footer(){
        return "</table>";
    }
    
    function __toString(){
        return "<tr><td>$this->refPackage</td><td>$this->title</td><td>$this->desc</td><td>$this->nbPicture</td><td>$this->duration</td><td>CAD $this->price</td></tr>";
    }
    
    function addPackage($myCon) {
        $refPackage = null;
        $title = $this->title;
        $packageDesc = $this->desc;
        $nbPicture = $this->nbPicture;
        $duration = $this->duration;
        $price = $this->price;
        
        $sqlStmt = "INSERT INTO packages VALUES (null, '$title','$packageDesc',$nbPicture,$duration, $price)";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllPackages ($myCon){
        $idx = 0;
        $sqlStmt = "SELECT * FROM packages";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pkg = new Package();
            $pkg->setRefPackage($oneRec["RefPackage"]);
            $pkg->setTitle($oneRec["Title"]);
            $pkg->setDesc($oneRec["PackageDescription"]);
            $pkg->setNbPicture($oneRec["NbPicture"]);
            $pkg->setDuration($oneRec["Duration"]);
            $pkg->setPrice($oneRec["Price"]);
            $tabOfPackages[$idx++] = $pkg;
        }
        return $tabOfPackages;
    }
    
    function getAPackage ($myCon){
        $idx = 0;
        $refPackage = $this->getRefPackage();
        $sqlStmt = "SELECT * FROM packages WHERE RefPackage = $refPackage";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pkg = new Package();
            $pkg->setRefPackage($oneRec["RefPackage"]);
            $pkg->setTitle($oneRec["Title"]);
            $pkg->setDesc($oneRec["PackageDescription"]);
            $pkg->setNbPicture($oneRec["NbPicture"]);
            $pkg->setDuration($oneRec["Duration"]);
            $pkg->setPrice($oneRec["Price"]);
            return $pkg;
        }
    }
    function getAPackageByTitle ($myCon){
        $idx = 0;
        $title = $this->title;
        $sqlStmt = "SELECT * FROM packages WHERE Title = '$title'";
        
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pkg = new Package();
            $pkg->setRefPackage($oneRec["RefPackage"]);
            $pkg->setTitle($oneRec["Title"]);
            $pkg->setDesc($oneRec["PackageDescription"]);
            $pkg->setNbPicture($oneRec["NbPicture"]);
            $pkg->setDuration($oneRec["Duration"]);
            $pkg->setPrice($oneRec["Price"]);
            return $pkg;
        }
    }
    function updatePackage($myCon) {
        $refPackage = $this->refPackage;
        $title = $this->title;
        $desc = $this->desc;
        $nbPicture = $this->nbPicture;
        $duration = $this->duration;
        $price = $this->price;
        
        $sqlStmt = "UPDATE packages SET Title = '$title', PackageDescription = '$desc', NbPicture = $nbPicture, Duration = $duration, Price = $price WHERE RefPackage=$refPackage";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function deletePackage($myCon) {
        $refPackage = $this->refPackage;        
        $sqlStmt = "DELETE FROM packages WHERE RefPackage=$refPackage";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllTitle($myCon) {
        $idx = 0;
        $sqlStmt = "SELECT RefPackage, Title FROM packages";
        foreach($myCon->query($sqlStmt) as $oneRec) {            
            $arrPackages[$idx++] = array("value"=>$oneRec["RefPackage"], "text"=>$oneRec["Title"]);
        }
        return $arrPackages;
    }
    
    function displayAllPackages($tabOfPackages) {
        $str = $this->header();
        foreach ($tabOfPackages as $onePackage) {
            $str = $str . $onePackage;
        }
        $str = $str . $this->footer();
        return $str;
    }
    
}
?>