<?php
class ClassifiedAd {
    private $refAd;
    private $adTitle;
    private $proCondition;
    private $desc;
    private $category;
    private $subCategory;
    private $price;
    private $postDate;
    private $expDate;
    private $language;
    private $package;
    private $member;
    private $status; 
    

    public function __construct($refAd = null, $adTitle = null,
        $proCondition = null, $desc = null, $category = null,
        $subCategory = null, $price = null, $postDate = null,
        $expDate = null, $language = null, $package = null,
        $member = null)
    {
        $this->refAd = $refAd;
        $this->adTitle = $adTitle;
        $this->proCondition = $proCondition;
        $this->desc = $desc;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->price = $price;
        $this->postDate = $postDate;
        $this->expDate = $expDate;
        $this->language = $language;
        $this->package = $package;
        $this->member = $member;
    }
    
    public function getRefAd()
    {
        return $this->refAd;
    }
    
    public function getAdTitle()
    {
        return $this->adTitle;
    }
    
    public function getProCondition()
    {
        return $this->proCondition;
    }
    
    public function getDesc()
    {
        return $this->desc;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function getSubCategory()
    {
        return $this->subCategory;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function getPostDate()
    {
        return $this->postDate;
    }
    
    public function getExpDate()
    {
        return $this->expDate;
    }
    
    public function getLanguage()
    {
        return $this->language;
    }
    
    public function getPackage()
    {
        return $this->package;
    }
    
    public function getMember()
    {
        return $this->member;
    }
    
    public function setRefAd($refAd)
    {
        $this->refAd = $refAd;
    }
    
    public function setAdTitle($adTitle)
    {
        $this->adTitle = $adTitle;
    }
    
    public function setProCondition($proCondition)
    {
        $this->proCondition = $proCondition;
    }
    
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    }
    
    public function setExpDate($expDate)
    {
        $this->expDate = $expDate;
    }
    
    public function setLanguage($language)
    {
        $this->language = $language;
    }
    
    public function setPackage($package)
    {
        $this->package = $package;
    }
    
    public function setMember($member)
    {
        $this->member = $member;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    static function header(){
        $str = "<table class='table table-bordered'><tr>";
        $str = $str."<th>Ad Title</th><th>Product Condition</th><th>Description</th><th>Category : </th><th>Sub Category</th><th>Price</th><th>Post Date</th><th>Expired Date</th><th>Language</th><th>Package Name</th></tr>";
        return $str;
    }
    
    static function footer(){
        return "</table>";
    }
    
    function __toString(){
        return "<td>$this->adTitle</td><td>$this->proCondition</td>
                <td>$this->desc</td><td>$this->category</td><td>$this->subCategory</td>
                <td>$this->price</td><td>$this->postDate</td><td>$this->expDate</td>
                <td>$this->language</td><td>$this->package</td></tr>";
    }
    
    function addAd($myCon) {
        $refAd = null;
        $adTitle = $this->adTitle;
        $proCondition = $this->proCondition;
        $desc = $this->desc;
        $refCat = $this->category;
        $refSubCat = $this->subCategory;
        $price = $this->price;
        $postDate = Date('Y-m-d');
        $expDate = $this->expDate;
        $lan = $this->language;
        $refPackage = $this->package;
        $refMember = $this->member;
        
        $sqlStmt = "INSERT INTO ads VALUES (null, '$adTitle','$proCondition','$desc',$refCat,$refSubCat,$price,'$postDate','$expDate','$lan',$refPackage,$refMember, 'Pending')";
        
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllAds ($myCon){
        $idx = 0;
        $tabOfAds = null;
        $sqlStmt = "SELECT * FROM ads a, Categories c, SubCategories sc, Packages p 
            WHERE a.RefCategory = c.RefCategory AND a.RefSubCategory = sc.RefSubCategory AND a.RefPackage = p.RefPackage";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $ad = new ClassifiedAd();
            $ad->setRefAd($oneRec["RefAd"]);
            $ad->setAdTitle($oneRec["AdTitle"]);
            $ad->setProCondition($oneRec["ProductCondition"]);
            $ad->setDesc($oneRec["Description"]);
            $ad->setCategory($oneRec["CatTitle"]);
            $ad->setSubCategory($oneRec["SubCatTitle"]);
            $ad->setPrice($oneRec["Price"]);
            $ad->setPostDate($oneRec["PostDate"]);
            $ad->setExpDate($oneRec["ExpDate"]);
            $ad->setLanguage($oneRec["Language"]);
            $ad->setPackage($oneRec["Title"]);
            $ad->setMember($oneRec["RefMember"]);
            $ad->setStatus($oneRec["Status"]);
            
            $tabOfAds[$idx++] = $ad;
        }
        return $tabOfAds;
    }
    
    function getAdsByCategory ($myCon){
        $idx = 0;
        $refCat = $this->category;
        $tabOfAds = null;
        $sqlStmt = "SELECT * FROM ads a, Categories c, SubCategories sc, Packages p
            WHERE a.RefCategory = c.RefCategory AND a.RefSubCategory = sc.RefSubCategory AND a.RefPackage = p.RefPackage AND a.RefCategory = $refCat";
        
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $ad = new ClassifiedAd();
            $ad->setRefAd($oneRec["RefAd"]);
            $ad->setAdTitle($oneRec["AdTitle"]);
            $ad->setProCondition($oneRec["ProductCondition"]);
            $ad->setDesc($oneRec["Description"]);
            $ad->setCategory($oneRec["CatTitle"]);
            $ad->setSubCategory($oneRec["SubCatTitle"]);
            $ad->setPrice($oneRec["Price"]);
            $ad->setPostDate($oneRec["PostDate"]);
            $ad->setExpDate($oneRec["ExpDate"]);
            $ad->setLanguage($oneRec["Language"]);
            $ad->setPackage($oneRec["Title"]);
            $ad->setMember($oneRec["RefMember"]);
            $ad->setStatus($oneRec["Status"]);
            
            $tabOfAds[$idx++] = $ad;
        }
        return $tabOfAds;
    }
    
    function getAdsByLanguage ($myCon){
        $idx = 0;
        $lang = $this->language;
        $tabOfAds = null;
        $sqlStmt = "SELECT * FROM ads a, Categories c, SubCategories sc, Packages p
            WHERE a.RefCategory = c.RefCategory AND a.RefSubCategory = sc.RefSubCategory AND a.RefPackage = p.RefPackage AND Language = '$lang'";
        
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $ad = new ClassifiedAd();
            $ad->setRefAd($oneRec["RefAd"]);
            $ad->setAdTitle($oneRec["AdTitle"]);
            $ad->setProCondition($oneRec["ProductCondition"]);
            $ad->setDesc($oneRec["Description"]);
            $ad->setCategory($oneRec["CatTitle"]);
            $ad->setSubCategory($oneRec["SubCatTitle"]);
            $ad->setPrice($oneRec["Price"]);
            $ad->setPostDate($oneRec["PostDate"]);
            $ad->setExpDate($oneRec["ExpDate"]);
            $ad->setLanguage($oneRec["Language"]);
            $ad->setPackage($oneRec["Title"]);
            $ad->setMember($oneRec["RefMember"]);
            $ad->setStatus($oneRec["Status"]);
            
            $tabOfAds[$idx++] = $ad;
        }
        return $tabOfAds;
    }
    
    function getAllAdsOfMember ($myCon){
        $idx = 0;
        $refMember = $this->getMember();
        $sqlStmt = "SELECT * FROM ads a, Categories c, SubCategories sc, Packages p
            WHERE a.RefCategory = c.RefCategory AND a.RefSubCategory = sc.RefSubCategory AND a.RefPackage = p.RefPackage AND RefMember = $refMember";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $ad = new ClassifiedAd();
            $ad->setRefAd($oneRec["RefAd"]);
            $ad->setAdTitle($oneRec["AdTitle"]);
            $ad->setProCondition($oneRec["ProductCondition"]);
            $ad->setDesc($oneRec["Description"]);
            $ad->setCategory($oneRec["CatTitle"]);
            $ad->setSubCategory($oneRec["SubCatTitle"]);
            $ad->setPrice($oneRec["Price"]);
            $ad->setPostDate($oneRec["PostDate"]);
            $ad->setExpDate($oneRec["ExpDate"]);
            $ad->setLanguage($oneRec["Language"]);
            $ad->setPackage($oneRec["Title"]);
            $ad->setMember($oneRec["RefMember"]);
            
            $tabOfAds[$idx++] = $ad;
        }
        return $tabOfAds;
    }
    
    function getAAd($myCon) {
        $refAd= $this->refAd;
        $sqlStmt = "SELECT * FROM ads a, Categories c, SubCategories sc, Packages p 
            WHERE a.RefCategory = c.RefCategory AND a.RefSubCategory = sc.RefSubCategory 
            AND a.RefPackage = p.RefPackage AND RefAd = $refAd";
        
        foreach ($myCon->query($sqlStmt) as $oneRec) {
            $ad = new ClassifiedAd();
            $ad->setRefAd($oneRec["RefAd"]);
            $ad->setAdTitle($oneRec["AdTitle"]);
            $ad->setProCondition($oneRec["ProductCondition"]);
            $ad->setDesc($oneRec["Description"]);
            $ad->setCategory($oneRec["CatTitle"]);
            $ad->setSubCategory($oneRec["SubCatTitle"]);
            $ad->setPrice($oneRec["Price"]);
            $ad->setPostDate($oneRec["PostDate"]);
            $ad->setExpDate($oneRec["ExpDate"]);
            $ad->setLanguage($oneRec["Language"]);
            $ad->setPackage($oneRec["Title"]);
            $ad->setMember($oneRec["RefMember"]);
        }  
        
        return $ad;
    }
    
    function updateAd($myCon) {
        $refAd = $this->refAd;
        $desc = $this->desc;
        $price = $this->price;
        $lan = $this->language;
        
        $sqlStmt = "UPDATE ads SET Description='$desc',Price=$price, Language='$lan' WHERE refAd=$refAd";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function  DeleteAd($myCon) {
        $refAd = $this->refAd;
        $sqlStmt = "DELETE FROM ads WHERE RefAd = $refAd";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function authorizeAd($myCon) {
        $refAd = $this->refAd;
        $status = "Active";
        
        $sqlStmt = "UPDATE ads SET Status='$status' WHERE refAd=$refAd";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    
    function displayAllAds($tabOfAds) {
        $str = $this->header();
        foreach ($tabOfAds as $oneAd) {
            $str = $str . $oneAd;
        }
        $str = $str . $this->footer();
        return $str;
    }
    
    function displayAdToUser() {
        $str = "<table border='1'>";
        $str = $str . "<tr><td>Ad Title : </td><td> $this->adTitle </td></tr>";
        $str = $str . "<tr><td>Product Condition : </td><td> $this->proCondition </td></tr>";
        $str = $str . "<tr><td>Description : </td><td> $this->desc</td></tr>";
        $str = $str . "<tr><td>Category : </td><td> $this->category</td></tr>";
        $str = $str . "<tr><td>Sub Category : </td><td> $this->subCategory</td></tr>";
        $str = $str . "<tr><td>Price : </td><td> $this->price</td></tr>";
        $str = $str . "<tr><td>Post Date : </td><td> $this->postDate</td></tr>";
        $str = $str . "<tr><td>Expire Date : </td><td> $this->expDate</td></tr>";
        $str = $str . "<tr><td>Language : </td><td> $this->language</td></tr>";
        $str = $str . "<tr><td>Package : </td><td> $this->package</td></tr>";
        $str = $str . "</table>";
        
        
        return $str;
    }
}
?>