# VaultWareXMLImporter
Helps us parse XML into an easy to use and manipulate PHP object

# Example
```php
$remotePropertyFile = 'ftp://'.
    $_ENV['SERVER_USERNAME']. ':' . 
    $_ENV['SERVER_PASSWORD'].'@'.$_ENV['SERVER_IP'].
    '/'.$file;
$vwImporter = new VaultWareImporter($remotePropertyFile);
$properties = $vwImporter->handle(); // Retrieve the properties from the file
$property = $properties->xpath('//Property'); // Get single property from feed response
```
