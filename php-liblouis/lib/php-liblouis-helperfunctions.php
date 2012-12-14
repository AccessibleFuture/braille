<?

/*
	PHP-LibLouis Helper Functions 
	
	PHP-LibLouis was written by Cory Bohon (@coryb).
	
	Handles accessory functions for PHP-LibLouis
	
*/
ini_set('display_errors', 1);

//Development Echo Logging 

function DEcho($text)
{
	if(kDevelopmentEchoLogging){
		echo $text;
	}
}

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