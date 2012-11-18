<?

/*
	PHP-LibLouis Helper Functions 
	
	Handles accessory functions for PHP-LibLouis
	
*/
ini_set('display_errors', 1);



//Error Messages
function error_no_direct_access()
{
	echo "No direct access available.";
}

function error_no_cli_access()
{
	echo "Error accessing the CLI interface.";
}

function custom_error($errorMessage)
{
	echo $errorMessage;
}

?>