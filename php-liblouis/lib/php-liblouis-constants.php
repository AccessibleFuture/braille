<?

/*

	PHP-LibLouis Constants
	
	Constants for use throughout PHP-LibLouis

*/

ini_set('display_errors', 1);

define("kNoOptions", "");
define("kDefaultOptions", "");

//Call Types
define("kNoCallType", "");
define("kCallTypeASCIIText", "ascii");
define("kCallTypeFile", "file");

//Errors
define("kErrorTranslating_NoText"					, "[PHP-LibLouis] E102: Error translating. No text provided");
define("kErrorTranslating_NotConfigured"			, "[PHP-LibLouis] E103: Error translating. LibLouis not installed and/or configured.");
define("kErrorHandlingFile"							, "[PHP-LibLouis] E104: There was an error handling the PHP tempfile.")


?>