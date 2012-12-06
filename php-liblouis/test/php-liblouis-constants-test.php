<?php
class PHPLibLouisConstantsTest extends PHPUnit_Framework_TestCase
{
  public function testkNoOptions()
  {
     $this -> assertInternalType('string', @constant("kNoOptions"));
  }

  public function testkDefaultOptions()
  {
     $this -> assertInternalType('string', @constant("kDefaultOptions"));
  }

  public function testkNoCallType()
  {
     $this -> assertInternalType('string', @constant("kNoCallType"));
  }

  public function testkCallTypeASCIIText()
  {
     $this -> assertInternalType('string', @constant("kCallTypeASCIIText"));
  }

  public function testkCallTypeFile()
  {
     $this -> assertInternalType('string', @constant("kCallTypeFile"));
  }

  public function testkErrorTranslating_NoText()
  {
     $this -> assertInternalType('string', @constant("kErrorTranslating_NoText"));
  }

  public function testkErrorTranslating_NotConfigured()
  {
     $this -> assertInternalType('string', @constant("kErrorTranslating_NotConfigured"));
  }

  public function testkErrorHandlingFile()
  {
     $this -> assertInternalType('string', @constant("kErrorHandlingFile"));
  }
}
?>
