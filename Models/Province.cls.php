<?php
class Province {
    private $refProvince;
    private $provinceName;
    
    function __construct($refProvince = null, $provinceName = null) {
        $this->refProvince = $refProvince;
        $this->provinceName = $provinceName;
    }
    
    public function getRefProvince()
    {
        return $this->refProvince;
    }
    
    public function getProvinceName()
    {
        return $this->provinceName;
    }
    
    public function setRefProvince($refProvince)
    {
        $this->refProvince = $refProvince;
    }
    
    public function setProvinceName($provinceName)
    {
        $this->provinceName = $provinceName;
    }
    
    function getAllProvinces($myCon) {
        $idx = 0;
        $sqlStmt = "SELECT RefProvince, ProvinceName FROM provinces";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $arrPackages[$idx++] = array("value"=>$oneRec["RefProvince"], "text"=>$oneRec["ProvinceName"]);
        }
        return $arrPackages;
    }

}