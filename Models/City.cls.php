<?php
class City {
    private $refCity;
    private $cityName;
    private $province;
    
    function __construct($refCity = null, $cityName = null, $province = null) {
        $this->refCity = $refCity;
        $this->cityName = $cityName;
        $this->province = $province;
    }
    
    public function getRefCity()
    {
        return $this->refCity;
    }
    
    public function getCityName()
    {
        return $this->cityName;
    }
    
    public function getProvince()
    {
        return $this->province;
    }
    
    public function setRefCity($refCity)
    {
        $this->refCity = $refCity;
    }
    
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
    }
    
    public function setProvince($province)
    {
        $this->province = $province;
    }
    
    function getAllCities($myCon) {
        $idx = 0;
        $sqlStmt = "SELECT RefCity, CityName FROM cities c, provinces p WHERE c.RefProvince = p.RefProvince AND ProvinceName = '$this->province'";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $arrPackages[$idx++] = array("value"=>$oneRec["RefCity"], "text"=>$oneRec["CityName"]);
        }
        return $arrPackages;
    }
    
}