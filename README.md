# EasyXMLParser
Helps us parse XML strings into an easy to use and manipulate PHP object

# Example
```php
$remotePropertyFile = '/path/to/xml/on/server.xml';
// or
$remotePropertyFile = 'ftp://'.
    $_ENV['SERVER_USERNAME']. ':' . 
    $_ENV['SERVER_PASSWORD'].'@'.$_ENV['SERVER_IP'].
    '/'.$file;
$parser = new EasyXMLParser($remotePropertyFile);
$object = $parser->handle(); // Retrieve XML object
```
