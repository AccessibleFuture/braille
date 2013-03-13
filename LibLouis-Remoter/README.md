#LibLouis-Remoter
LibLouis-Remoter provides an easy-to-use framework for interacting with Remote-LibLouis. 

##Requirements
The LAMP-compatible server running LibLouis-Remoter must be capable of using the cURL PHP function. This framework was built and targed for PHP 5.x. 

##Using LibLouis-Remoter
You must first have set up the Remote-LibLouis service; next, import LibLouis-Remoter like so: 

	//include
	include_once 'path-to-LibLouis-Remoter/LibLouis-Remoter.php';
	
or

	//require
	require_once 'path-to-LibLouis-Remoter/LibLouis-Remoter.php';
	
	
##Available Functions 
Each function requires a server URL (with optional port number) in order to complete the request from the Remote-LibLouis service. The LibLouis-Remoter framework uses the JSON endpoint for Remote-LibLouis to complete the request and generate the Braille ASCII equivalent of the passed in text.


### returnBrailleForString($textToTranslate, $server, $port)
When called, this function will return a Braille ASCII string based on the string that you passed into $textToTranslate using the Remote-LibLouis service located at the $server (with optional $port number). Note that if the server doesn't use a port number for Remote-LibLouis, use an empty string (""); also, don't include endpoints -- the braille.json endpoint will automatically be added when making the call to the server.

#### Example
	<?php
	
	include_once 'LibLouis-Remoter.php';
	
	$textToTranslate = "Hello, World!";
	$server =  "http://50.17.123.123/";
	
	echo returnBrailleForString($textToTranslate, $server, $port);
	
	?>

### returnBRFFileForString($textToTranslate, $server, $port)
When called, this function will return a file whose contents contain the Braille ASCII text based on the string that you passed into $textToTranslate, using the Remote-LibLouis service located at the $server (with option $port number). Note that if the server doesn't use a port number for Remote-LibLouis, use an empty string (""); also, don't include endpoints -- the braille.json endpoint will automatically be added when making the call to the server.

Remember that the tempfile that is returned will not be unlinked by LibLouis-Remoter. It is up to you to call `unlink($file)` to remove the temp file.

#### Example
	<?php
	
	include_once 'LibLouis-Remoter.php';
	
	$textToTranslate = "Hello, World!";
	$server =  "http://50.17.123.123/";
	
	$translatedText = returnBRFFileForString($textToTranslate, $server, $port);
	
	//do something with $translatedText
	
	unlink($translatedText);
	
	?>