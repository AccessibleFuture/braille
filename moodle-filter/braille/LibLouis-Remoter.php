<?php
/*
  LibLouis-Remoter is an open source project developed by the University of
  Maryland Institute for Technology in the Humanities. 

  PHP-LibLouis, LibLouis-Remoter, and Remote-LibLouis was written by Cory 
  Bohon (@coryb).

  View README.md for information on how to use this library. 

  Licensed under the MIT Open Source License. The text for this license
  is available at http://opensource.org/licenses/MIT.
  
*/


function returnBrailleForString($textToTranslate, $url)
{
  $content = json_encode(array("content" => $textToTranslate));
  
  # Use the WordPress function if it's available - otherwise, fall back to
  # using libcurl.
  if(function_exists('wp_remote_post')) {
    $response = wp_remote_post( $url, array(
      'method' => 'POST',
      'timeout' => 15,
      'redirection' => 5,
      'httpversion' => '1.0',
      'blocking' => true,
      'headers' => array("Content-type: application/json"),
      'body' => $content,
      'cookies' => array()
      )
    );

    if( is_wp_error( $response ) ) {
      $error_message = $response->get_error_message();
      die("Error: call to URL $url failed with $error_message.");
    } else {
       $json_response = $response["body"];
    }
  }
  else {
    # cURL implementation to handle posting the content and 
    # getting a response back
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    $json_response = curl_exec($curl);
    
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    if ( $status != 200 ) {
        die(
          "Error: call to URL $url failed with status $status, " .
          "response $json_response, curl_error " . 
          curl_error($curl) . ", curl_errno " . curl_errno($curl)
        );
    }
    
    curl_close($curl);
  }

  $response = json_decode($json_response, true);
  
  return $response['content'];
}

function returnBRFFileForString($textToTranslate, $url)
{
  $content = json_encode(array("content" => $textToTranslate));

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,
          array("Content-type: application/json"));
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($curl, CURLOPT_TIMEOUT, 10);

  $json_response = curl_exec($curl);
  
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  
  if ( $status != 200 ) {
      die(
        "Error: call to URL $url failed with status $status, " .
        "response $json_response, curl_error " . 
        curl_error($curl) . ", curl_errno " . curl_errno($curl)
      );
  }
  
  curl_close($curl);
  
  $response = json_decode($json_response, true);
  
  # create temporary filename
  $_translatedText = tempnam(sys_get_temp_dir(), "pll_");
  
  if($_translatedText == FALSE)
  {
      return "";
  }
  else
  {
      # Write the contents of the passed text to the temporary file
      $_handle = fopen($_translatedText, "w");
      fwrite($_handle, $response);
      fclose($_handle);
  }

  # return the filename
  return $_translatedText;

}


?>