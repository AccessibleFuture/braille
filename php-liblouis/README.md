PHP-LibLouis v.0.9
===
PHP-LibLouis is a PHP Library that lets you interact with LibLouisXML directly from PHP code.

##About the Library 
The `PHP-LibLouis` is a PHP library with the goal of the library, making interacting with the command line tool `xml2brl (LibLouisXML)` an easy experience in PHP. This library allows complete braille translations from `PHP-LibLouis` library calls. The library allows interaction with the `xml2brl` program from within PHP without any knowledge of system calls.

##What you need to use PHP-LibLouis
In order to use the `PHP-LibLouis` PHP framework in your applications, you must first meet some requirements: 

###System Requirements
The system that `PHP-LibLouis` is running on **must have** `xml2brl (LibLouisXML)` and the LibLouis packages installed. Furthermore, this software has only been tested on L/MAMP-compatible environments.

####Installing xml2brl on Linux Systems
Installing `xml2brl` onto Linux-based systems with [apt-get](https://help.ubuntu.com/community/AptGet/Howto)

	sudo apt-get install liblouisxml-bin
	
####Installing xml2brl on Mac Systems
Installing `xml2brl` onto a Mac-based system with [MacPorts](http://macports.org)

	sudo port install liblouisxml
	
Installing `xml2brl` onto a Mac-based system with [Homebrew](http://mxcl.github.com/homebrew/)

	Package not yet available in Homebrew.

###PHP Requirements
PHP **must** be able to make a system call using the `system()`, `passthru`, and `exec()` functions. `PHP-LibLouis` relies on this link to be able to call the `xml2brl` program and pass data back and forth. On some systems (notably shared hosts), this functionality will most likely be disabled. Disabling this functionality will result in the inability to use `PHP-LibLouis` with your setup. Furthermore, 

`PHP-LibLouis` will run only on PHP v5.0 and higher, and the use of tempfiles must be allowed.

##Interacting with the Library

###Including PHP-LibLouis in your project 
You will first need to download the PHP-LibLouis framework, and then place the 'PHP-Liblouis' folder inside of your PHP project. Then, in order to use the functionality, you will need to include the `php-liblouis.php` file in your PHP project. 

	//include once 
	include_once 'php-liblouis.php';   
	
or 

	//require
	require_once 'php-liblouis.php';
	
**It is important that you DO NOT call any of the `PHP-LibLouis` functions or use any of the variables containing an underscore (_). These functions are for use by the `PHP-LibLouis` system for system functionality only.**

##Library Functions
There are numerous library functions that aid in the ability to translate a plain text string into various braille outputs.

###`function returnBrailleForString($textToTranslate, $libLouisOptions)`
When called, this function will return a Braille ASCII encoded string that can be used by your program at will. The `$textToTranslate` variable should be a plain-text string that you wish to translate into a braille-ready file. If the translation fails, then the function `returnBrailleForString` will return a `BOOL` of `FALSE`. Anything else should be considered a successfully translated string of text.

**Usage**
	
	include('/path/to/PHP-LibLouis.php');
	
	//vars
	$textToBeTranslated = "Hello, World!";
	
	$translatedText = returnBrailleForString($textToBeTranslated, "");
	
	if($translatedText == FALSE)
	{
		//translation failed
	}
	else
	{
		//do something with translated text
	}

###`function returnBRFFileForString($textToTranslate, $libLouisOptions)`



**Usage**

	include('/path/to/PHP-LibLouis.php');
	
	//vars 
	

### Options 


##Changelog
**Version 0.9**

- Initial version of the library available for beta testing

##License
PHP-LibLouis is released under the [MIT Open Source License](http://opensource.org/licenses/MIT).