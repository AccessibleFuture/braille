<?

/*

	PHP-LibLouis Public Access
	
	PHP-LibLouis was written by Cory Bohon (@coryb).
	
	Handles the publically accessible functionality for PHP-LibLouis. 
	
*/

ini_set('display_errors', 1);

//Include Statements
include_once 'php-liblouis-helperfunctions.php';
include_once 'php-liblouis-system.php'; 
include_once 'php-liblouis-constants.php';

function returnBRFFileForString($textToTranslate, $libLouisOptions)
{
	return _performSystemCall(kCallTypeFile, $textToTranslate, $libLouisOptions);
}

function returnBrailleForString($textToTranslate, $libLouisOptions)
{
	return _performSystemCall(kCallTypeASCIIText, $textToTranslate, $libLouisOptions);
}


?>