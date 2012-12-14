<?

/*

	PHP-LibLouis Constants
	
	PHP-LibLouis was written by Cory Bohon (@coryb).
	
	Constants for use throughout PHP-LibLouis

*/

ini_set('display_errors', 1);

//Developer-only Constants
define("kDevelopmentEchoLogging", "TRUE");

//Options Types
define("kNoOptions", "");
define("kDefaultOptions", "");

//Call Types
define("kNoCallType", "");
define("kCallTypeASCIIText", "ascii");
define("kCallTypeFile", "file");

//Errors
define("kErrorTranslating_NoText"					, "[PHP-LibLouis] E102: Error translating. No text provided");
define("kErrorTranslating_NotConfigured"			, "[PHP-LibLouis] E103: Error translating. LibLouis not installed and/or configured.");
define("kErrorHandlingFile"							, "[PHP-LibLouis] E104: There was an error handling the PHP tempfile.");
define("kErrorReceivingFile"						, "[PHP-LibLouis] E105: There was an error getting translated text back from xml2brl.");


?>