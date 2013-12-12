<?php
class PHPLibLouisConstantsTest extends PHPUnit_Framework_TestCase
{
  public function testkConstants()
  {
     $this -> assertInternalType('string', @constant("kNoOptions"));
  
     $this -> assertInternalType('string', @constant("kDefaultOptions"));
 
     $this -> assertInternalType('string', @constant("kNoCallType"));
 
     $this -> assertInternalType('string', @constant("kCallTypeASCIIText"));
  
     $this -> assertInternalType('string', @constant("kCallTypeFile"));
  
     $this -> assertInternalType('string', @constant("kErrorTranslating_NoText"));
 
     $this -> assertInternalType('string', @constant("kErrorTranslating_NotConfigured"));
  
     $this -> assertInternalType('string', @constant("kErrorHandlingFile"));
  }
}
?>
