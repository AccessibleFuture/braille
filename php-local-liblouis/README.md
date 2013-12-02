# PHP-LibLouis

PHP-LibLouis is a PHP Library that lets you interact with LibLouisXML directly from PHP code.

## About the Library 

The `PHP-LibLouis` is a PHP library with the goal of the library, making interacting with the command line tool `file2brl` (LibLouisXML) an easy experience in PHP. This library allows complete braille translations from `PHP-LibLouis` library calls. The library allows interaction with the `file2brl` program from within PHP without any knowledge of system calls.

## What you need to use PHP-LibLouis

In order to use the `PHP-LibLouis` PHP framework in your applications, you must first meet some requirements: 

### System Requirements

The system that `PHP-LibLouis` is running on **must have** `file2brl` (LibLouisXML) and the LibLouis packages installed. Furthermore, this software has only been tested on L/MAMP-compatible environments.

#### Installing file2brl on Linux Systems

Installing `file2brl` onto Linux-based systems with [apt-get](https://help.ubuntu.com/community/AptGet/Howto)

```bash
$ sudo apt-get install liblouisutdml-bin
```

### PHP Requirements

PHP **must** be able to make a system call using the `system()`, `passthru()`, and `exec()` functions. `PHP-LibLouis` relies on this link to be able to call the `file2brl` program and pass data back and forth. On some systems (notably shared hosts), this functionality will most likely be disabled. Disabling this functionality will result in the inability to use `PHP-LibLouis` with your setup. Furthermore, `PHP-LibLouis` will run only on PHP v5.0 and higher, and the use of tempfiles must be allowed. If you are unable to meet these requirements, you may want to consider using the [translation service library](../php-remote-liblouis) instead.

## Interacting with the Library

### Including PHP-LibLouis in your project 

You will first need to download the PHP-LibLouis framework, and then place the contents of the 'php-local-liblouis' folder inside of your PHP project. Then, in order to use the functionality, you will need to include the `php-liblouis.php` file in your PHP project. 

```php
<?php
//include once 
include_once 'php-liblouis.php';   
?>
```

or 

```php
<?php
//require
require_once 'php-liblouis.php';
?>
```

**It is important that you DO NOT call any of the `PHP-LibLouis` functions or use any of the variables containing an underscore (_). These functions are for use by the `PHP-LibLouis` system for system functionality only.**

## Library Functions

There are numerous library functions that aid in the ability to translate a plain text string into various braille outputs.

### returnBrailleForString($textToTranslate, $libLouisOptions)

When called, this function will return a Braille ASCII encoded string that can be used by your program at will. The `$textToTranslate` variable should be a plain-text string that you wish to translate into a Braille ASCII string of text. If the translation fails, then the function `returnBrailleForString` will return a constant of either `kErrorTranslating_NoText`, `kErrorHandlingFile`, or `kErrorReceivingFile`. Anything else should be considered a successfully translated string of text.

**Usage**

```php
<?php
include('/path/to/PHP-LibLouis.php');

//vars
$textToBeTranslated = "Hello, World!";

$translatedText = returnBrailleForString($textToBeTranslated, kNoOptions);

if($translatedText == kErrorTranslating_NoText || 
   $translatedText == kErrorHandlingFile       || 
   $translatedText == kErrorReceivingFile       )
{
  //translation failed
}
else
{
  //do something with $translatedText
}
?>
```

### returnBRFFileForString($textToTranslate, $libLouisOptions)

When called, this function will return a PHP tempfile with the Braille ASCII contents included that can be used in your program at will. The `$textToTranslate` variable should be a plain-text string that you wish to translate into a braille-ready file. Remember that the tempfile that is returned will not be `unlinked` by `PHP-LibLouis`. It is up to you to call `unlink($file)` to remove the temp file.

**Usage**

```php
<?php
include('/path/to/PHP-LibLouis.php');

//vars 
$textToBeTranslated = "Hello, World!";

$fileWithTranslatedText = returnBRFFileForString($textToBeTranslated, kNoOptions);

if($fileWithTranslatedText == kErrorTranslating_NoText || 
   $fileWithTranslatedText == kErrorHandlingFile       || 
   $fileWithTranslatedText == kErrorReceivingFilem      )
{
  //translation failed
}
else
{
  //do something with $fileWithTranslatedText
}

unlink($fileWithTranslatedText);
?>
```  
  
### Constants

There are many helpful constants that make `PHP-LibLouis` easier to check for errors and all-around easier to use. Below are all of the constants that `PHP-LibLouis` uses. 

#### Option Constants 

| Option Constant Name | Description |
| -------------------- | ----------- |
| kNoOptions           | Uses the standard `file2brl` translation options. |

#### Error Constants

The error constants make it easier to detect and check for errors in your program's logic. Here are the error constants that PHP-LibLouis uses. 

| Error Constant Name | Description |
| ------------------- | ----------- |
| kErrorTranslating_NoText | Means that there was no text provided to the translation function. Ensure that text was provided in the correct argument order. |
| kErrorTranslating_NotConfigured | LibLouis and/or file2brl is not installed on the system. Follow our guide above to install file2brl onto your system before attempting to use the PHP-LibLouis framework. |
| kErrorHandlingFile | There was an error creating, reading, or writing to the PHP temp files. Ensure that PHP temp files, and specifically the tempnam() PHP function, is allowed. |
| kErrorReceivingFile | No text was provided back in the translation file from the file2brl CLI program. Ensure that file2brl is installed and working properly. |

### Temp Files

`PHP-LibLouis` utilizes PHP tempfiles to interact with the `file2brl` command line program. As a result, two temp files will be stored on your system at `/tmp` for every system call made to `PHP-LibLouis`. If an error is encountered, or if you are using the `returnBrailleForString()` function, then all of the temp files at this location will be cleaned up automatically by initiating a call to the `unlink()` PHP function. **However, the translated text file that is returned by `returnBRFFileForString()` will not be cleaned up automatically through the `unlink()` PHP function&mdash;it is up to your program to clean up the remaining temp file resulting from the use of `returnBRFFileForString()` .**

### Options

For version 0.9 of the PHP-LibLouis framework, options are not yet included; however, as the documentation states, any options will be passed to the functions as a string for either `returnBrailleForString()` or `returnBRFFileForString()`.

## Changelog

**Version 0.9**

- Initial version of the library available for beta testing

## License

PHP-LibLouis is released under the [MIT Open Source License](http://opensource.org/licenses/MIT).

---

# Testing with PHPUnit

PHPUnit can be installed following the directions at 
[http://www.phpunit.de/manual/current/en/installation.html](http://www.phpunit.de/manual/current/en/installation.html).

To run the tests:

```bash
$ phpunit test/*
>>>>>>> 46d6d03eaa9f260bd508693078f2ec34a3b81c04
```
