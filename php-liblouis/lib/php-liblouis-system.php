<?

/*

	PHP-LibLouis System 
	
	PHP-LibLouis was written by Cory Bohon (@coryb).
	
	Handles the system calls for PHP-LibLouis

*/
ini_set('display_errors', 1);


function _performSystemCall($callType, $text, $options = kNoOptions)
{	
	if($callType == kNoCallType)
	{
		return kErrorTranslating_NoText;
	}
		
	//Create the temporary files that will be passed to xml2brl
	$_standardText = tempnam("/tmp", "pll_");
	$_translatedText = tempnam("/tmp", "pll_");
		
	if($_standardText == FALSE)
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
		$command = escapeshellcmd("xml2brl -p" . " " . $_standardText . " " .  $_translatedText);
	}
	else
	{
		$command = escapeshellcmd("xml2brl -p" . " " . $_standardText . " " .  $_translatedText);
	}
	
	exec($command);
	
	DEcho($command);

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
	
	if($callType == kCallTypeFile){
		unlink($_standardText);
		return $_translatedText;
	}
}

function _isLibLouisXMLInstalled($outputText)
{
	
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