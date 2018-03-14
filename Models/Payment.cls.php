<?php
class Payment {
    private $refPayment;
    private $pmntType;
    private $amount;
    private $desc;
    private $pmntDate;
    private $refMember;
    
    public function __construct($refPmnt = null, $pmntType = null,
        $amount = null, $desc = null, $pmntDate = null, $refMember = null)
    {
        $this->refPayment = $refPmnt;
        $this->pmntType = $pmntType;
        $this->amount = $amount;
        $this->desc = $desc;
        $this->pmntDate = $pmntDate;
        $this->refMember = $refMember;
    }
    
    public function getRefPayment()
    {
        return $this->refPayment;
    }
    
    public function getPmntType()
    {
        return $this->pmntType;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }
    
    public function getDesc()
    {
        return $this->desc;
    }
    
    public function getPmntDate()
    {
        return $this->pmntDate;
    }
    
    public function getRefMember()
    {
        return $this->refMember;
    }
    
    public function setRefPayment($refPayment)
    {
        $this->refPayment = $refPayment;
    }
    
    public function setPmntType($pmntType)
    {
        $this->pmntType = $pmntType;
    }
    
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    
    public function setPmntDate($pmntDate)
    {
        $this->pmntDate = $pmntDate;
    }
    
    public function setRefMember($refMember)
    {
        $this->refMember = $refMember;
    }

    static function header(){
        $str = "<table border='1'><tr>";
        $str = $str."<th>Payment Type</th><th>Description</th><th>Payment Date</th><th>Amount</th></tr>";
        return $str;
    }
    
    static function footer(){
        return "</table>";
    }
    
    function __toString(){
        return "<td>$this->pmntType</td><td>$this->desc</td>
                <td>$this->pmntDate</td><td>$this->amount</td></tr>";
    }
    
    function addPayment($myCon) {
        $refPayment = null;
        $paymentType = $this->pmntType;
        $amount = $this->amount;
        $desc = $this->desc;
        $paymentDate = Date('Y-m-d');
        $refMember = $this->refMember;
        
        $sqlStmt = "INSERT INTO payments VALUES (null, '$paymentType',$amount,'$desc','$paymentDate', $refMember)";
        $result = $myCon->exec($sqlStmt);
        return $result;
    }
    
    function getAllPayments ($myCon){
        $idx = 0;
        $sqlStmt = "SELECT * FROM payments";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pmnt = new Payment();
            $pmnt->setRefPayment($oneRec["RefPayment"]);
            $pmnt->setPmntType($oneRec["PaymentType"]);
            $pmnt->setAmount($oneRec["Amount"]);
            $pmnt->setDesc($oneRec["Description"]);
            $pmnt->setPmntDate($oneRec["PaymentDate"]);
            $pmnt->setRefMember($oneRec["RefMember"]);
            
            $tabOfPayments[$idx++] = $pmnt;
        }
        return $tabOfPayments;
    }
    
    function getPaymentsByMember ($myCon){
        $idx = 0;
        $refMember = $this->refMember;
        $sqlStmt = "SELECT * FROM payments WHERE RefMember = $refMember";
        foreach($myCon->query($sqlStmt) as $oneRec) {
            $pmnt = new Payment();
            $pmnt->setRefPayment($oneRec["RefPayment"]);
            $pmnt->setPmntType($oneRec["PaymentType"]);
            $pmnt->setAmount($oneRec["Amount"]);
            $pmnt->setDesc($oneRec["Description"]);
            $pmnt->setPmntDate($oneRec["PaymentDate"]);
            $pmnt->setRefMember($oneRec["RefMember"]);
            
            $tabOfPayments[$idx++] = $pmnt;
        }
        return $tabOfPayments;
    }
    
    function displayAllPayments($tabOfPayments) {
        $str = $this->header();
        foreach ($tabOfPayments as $onePayment) {
            $str = $str . $onePayment;
        }
        $str = $str . $this->footer();
        return $str;
    }
}
?>