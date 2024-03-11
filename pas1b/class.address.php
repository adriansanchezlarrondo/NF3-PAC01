<?php
require("abstract.databoundobject.php");
require("class.pdofactory.php");

class Address extends DataBoundObject {

    protected $Address;
    protected $Address2;
    protected $District;
    protected $CityID;
    protected $PostalCode;
    protected $Phone;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("address");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "address" => "Address",
            "address2" => "Address2",
            "district" => "District",
            "city_id" => "CityID",
            "postal_code" => "PostalCode",
            "phone" => "Phone",
            "last_update" => "LastUpdate"));
    }
}

print "Running...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objAddress = new Address($objPDO);

$objAddress->setAddress('Calle del Sol, 123');
$objAddress->setAddress2('Piso 2, Puerta B');
$objAddress->setDistrict('Barrio de la Rivera');
$objAddress->setCityID(3);
$objAddress->setPostalCode('28010');
$objAddress->setPhone('910234567');
$objAddress->setLastUpdate(date("Y-m-d H:i:s"));

print "Address es " . $objAddress->getAddress() . "<br />";
print "Address2 es " . $objAddress->getAddress2() . "<br />";
print "District es " . $objAddress->getDistrict() . "<br />";
print "CityID es " . $objAddress->getCityID() . "<br />";
print "PostalCode es " . $objAddress->getPostalCode() . "<br />";
print "Phone es " . $objAddress->getPhone() . "<br />";
print "LastUpdate es " . $objAddress->getLastUpdate() . "<br />";

print "<br />Saving...<br />";
$objAddress->Save();

$id = $objAddress->getID();
print "ID in database is " . $id . "<br />";

print "<br />Committing a change...<br/>";
$objAddress->setAddress('Avenida del Parque, 456');
$objAddress->setAddress2('Torre A, Apartamento 301');
$objAddress->setDistrict('Distrito del Este');
$objAddress->setCityID(1);
$objAddress->setPostalCode('41005');
$objAddress->setPhone('955789012');
$objAddress->setLastUpdate(date("Y-m-d H:i:s"));

print "Address es " . $objAddress->getAddress() . "<br />";
print "Address2 es " . $objAddress->getAddress2() . "<br />";
print "District es " . $objAddress->getDistrict() . "<br />";
print "CityID es " . $objAddress->getCityID() . "<br />";
print "PostalCode es " . $objAddress->getPostalCode() . "<br />";
print "Phone es " . $objAddress->getPhone() . "<br />";
print "LastUpdate es " . $objAddress->getLastUpdate() . "<br />";


print "<br />Saving...<br />";
$objAddress->Save();

print "<br />Destroying object...<br />";
$objAddress->MarkForDeletion();
unset($objAddress);
?>
