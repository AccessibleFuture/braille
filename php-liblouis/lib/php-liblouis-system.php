<?

/*

	PHP-LibLouis System 
	
	PHP-LibLouis was written by Cory Bohon (@coryb).
	
	Handles the system calls for PHP-LibLouis

*/
ini_set('display_errors', 1);

//This function will perform the system call to xml2brl on the command line 
// because regardless of the call type a file will need to be created, 
// the function will go ahead and create all of the necessary components 
// required by both BRF and Braille ascii return, then will handle the 
// necessary call returns at the end.
function _performSystemCall($callType, $text, $options = kNoOptions)
{	
	//if there's no call type specified, then error out
	if($callType == kNoCallType)
	{
		return kErrorTranslating_NoText;
	}
		
	//Create the temporary files that will be passed to xml2brl
	$_standardText = tempnam("/tmp", "pll_");
	$_translatedText = tempnam("/tmp", "pll_");
		
	//if the temp files had an error, then unlink and error out
	if($_standardText == FALSE || $_translatedText == FALSE)
	{
		unlink($_standardText);
		unlink($_translatedText);
		return kErrorHandlingFile;
	}
	else
	{
		//Write the contents of the passed text to the temp file
		$_handle = fopen($_standardText, "w");
		fwrite($_handle, $text);
		fclose($_handle);
	}
	
	if($options != kNoOptions)
	{
		//no options, then create the command
		$command = escapeshellcmd("file2brl -p" . " " . $_standardText . " " .  $_translatedText);
	}
	else
	{
		//right now, we don't handle options, so we'll just create the command sans options
		$command = escapeshellcmd("file2brl -p" . " " . $_standardText . " " .  $_translatedText);
	}
	
	//execute the command
	exec($command);
	
	//Echo the command using DEcho
	DEcho($command);

	//if we're handling ascii text, then do the necessary steps to return ASCII text
	if($callType == kCallTypeASCIIText){
		$_handle = fopen($_translatedText,"r");
		
		if(filesize($_translatedText) <=0){
			unlink($_standardText);
			unlink($_translatedText);
			return kErrorReceivingFile;
		}else{
			$_fileContents = fread($_handle, filesize($_translatedText));
		}
	
		fclose($_handle);
		
		unlink($_standardText);
		unlink($_translatedText);
		
		if($_fileContents){
			return $_fileContents;
		}else{
			unlink($_standardText);
			unlink($_translatedText);
			return kErrorReceivingFile;
		}
	}
	
	//if we're handling a file, then do the necessary steps to return the file
	if($callType == kCallTypeFile){
		unlink($_standardText);
		return $_translatedText;
	}
}

function _isAvailable($func) 
{
    if (ini_get('safe_mode')) return false;
    $disabled = ini_get('disable_functions');
    if ($disabled) {
        $disabled = explode(',', $disabled);
        $disabled = array_map('trim', $disabled);
        return !in_array($func, $disabled);
    }
    return true;
}

function _getUniqueFileName()
{
	srand();
	$_UIDFileName = date("m.d.y.H:i:s"); 
	$_UIDFileName .= rand();
}


?>