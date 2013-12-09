# PHP Remote LibLouis

LibLouis-Remoter provides an easy-to-use framework for interacting with 
Remote-LibLouis. 

## Requirements

The LAMP-compatible server running LibLouis-Remoter must be capable of using
the cURL PHP function. This framework was built and targeted for PHP 5.x.

## Using LibLouis-Remoter

You must first have set up the Remote-LibLouis service; next, import 
LibLouis-Remoter like so: 

```php
<?php
//include
include_once 'path-to-LibLouis-Remoter/LibLouis-Remoter.php';
?>
```

or

```php
<?php
//require
require_once 'path-to-LibLouis-Remoter/LibLouis-Remoter.php';
?>
```	
	
## Available Functions 

Each function requires a server URL (with optional port number) in order to
complete the request from the Remote-LibLouis service. The LibLouis-Remoter
framework uses the JSON endpoint for Remote-LibLouis to complete the request
and generate the Braille ASCII equivalent of the passed in text.


### returnBrailleForString($textToTranslate, $service_url)

When called, this function will return a Braille ASCII string based on the
string that you passed into `$textToTranslate` using the Remote-LibLouis
service located at the `$service_url`.


```php
<?php

include_once 'LibLouis-Remoter.php';

$textToTranslate = "Hello, World!";
$service_url =  "http://50.17.123.123/braille.json";

echo returnBrailleForString($textToTranslate, $url);

?>
```

### returnBRFFileForString($textToTranslate, $service_url)

When called, this function will return a file whose contents contain the
Braille ASCII text based on the string passed in through $textToTranslate
using the Remote-LibLouis service located at the $service_url.

Remember that the temporary file that is returned will not be unlinked by 
LibLouis-Remoter. It is up to you to call `unlink($file)` to remove the
temp file.

```php
<?php
	
include_once 'LibLouis-Remoter.php';

$textToTranslate = "Hello, World!";
$url =  "http://50.17.123.123/braille.json";

$fileWithTranslatedText = returnBRFFileForString($textToTranslate, $service_url);

//do something with $fileWithTranslatedText

unlink($fileWithTranslatedText);

?>
```

## License

LibLouis-Remoter is released under the 
[MIT Open Source License](http://opensource.org/licenses/MIT).