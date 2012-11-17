<?

/*

	PHP-LibLouis Public Access
	
	Handles the publically accessible functionality for PHP-LibLouis. 
	
*/
echo "Included php-liblouis-public_access.php";

ini_set('display_errors', 1);

//Include Statements
include_once 'php-liblouis-helperfunctions.php';
include_once 'php-liblouis-system.php'; 
include_once 'php-liblouis-constants.php';

echo_error_no_direct_access();


?>