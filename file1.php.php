<?php

$xmlFilePath = 'smartphones.xml';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $storage = $_POST["storage"];
    $price = $_POST["price"];

   
    if (file_exists($xmlFilePath)) {
        $xml = simplexml_load_file($xmlFilePath);
    } else {
        $xml = new SimpleXMLElement('<phones></phones>');
    }

    
    $phone = $xml->addChild('phone');
    $phone->addChild('brand', $brand);
    $phone->addChild('model', $model);
    $phone->addChild('storage', $storage);
    $phone->addChild('price', $price);

    
    $xml->asXML($xmlFilePath);

    
    header('Location: submit-smartphone.php');
    exit;
}
?>
