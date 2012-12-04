<?

/*

	PHP-LibLouis System 
	
	Handles the system calls for PHP-LibLouis

*/
ini_set('display_errors', 1);


function _performSystemCall($callType, $text, $options = kNoOptions)
{	
	if($callType == kNoCallType)
	{
		
	}
	
	if($callType == kCallTypeASCIIText)
	{	
		//Create the temporary files that will be passed to xml2brl
		$_standardText = tempnam("/tmp", "pll_");
		$_translatedText = tempnam("/tmp", "pll_");
		
		if($_standardText == FALSE)
		{
			return kErrorHandlingFile;
		}
		else
		{
			//Write the contents of the passed text to the temp file
			$handle = fopen($_standardText, "w");
			fwrite($handle, $text);
			fclose($handle);
		}
		
		
		if($options != kNoOptions)
		{
			$command = escapeshellcmd("xml2brl -p" . " " . $_standardText . " " .  $_translatedText);
		}
		else
		{
			$command = escapeshellcmd("xml2brl -p" . " " . $_standardText . " " .  $_translatedText);
		}
		
		$ShellOutput = "";
		
		exec($command);
		
		echo $command;
		
		return $ShellOutput;
		
		unlink($_tempFileToWrite);
	}
	
	if($callType == kCallTypeFile)
	{
		
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