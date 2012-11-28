<?

/*

	PHP-LibLouis System 
	
	Handles the system calls for PHP-LibLouis

*/
ini_set('display_errors', 1);


function _performSystemCall($callType, $textToTranslate, $options = kNoOptions, &$success)
{
	if($textToTranslate == kNoText || $callType == kNoCallType)
	{
		return kErrorTranslating_NoText;
		$success = false;
	}
	else if(!_isAvailable(""))
	{
		return kErrorTranslating_NotConfigured;
		$success = false;
	}
	else
	{
		if($callType == kCallTypeFile)
		{
			//Create a temp file and send back to caller
			if($option == kNoOptions)
			{
				//Proceed without options
			
				//if succeeded change $success to true, otherwise false
				$success = true; 
			}
			else
			{
				//Proceed with options
			
				//if succeeded change $success to true, otherwise false
				$success = true;
			}
		}
	
		if($callType == kCallTypeASCIIText)
		{
			//Create braille ASCII and send back to caller 
			if($option == kNoOptions)
			{
				//Proceed without options
			
				//if succeeded change $success to true, otherwise false
				$success = true;
			}
			else
			{
				//Proceed with options
			
				//if succeeded change $success to true, otherwise false
				$success = true;
			}
		}
	}
}

function _isLibLouisXMLInstalled($outputText)
{
	
}

function _isAvailable($func) {
    if (ini_get('safe_mode')) return false;
    $disabled = ini_get('disable_functions');
    if ($disabled) {
        $disabled = explode(',', $disabled);
        $disabled = array_map('trim', $disabled);
        return !in_array($func, $disabled);
    }
    return true;
}


?>