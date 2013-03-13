Remote-LibLouis v.1.0
===
Remote-LibLouis is a Ruby + Sinatra HTTP service that lets you interact with LibLouisXML remotely as a REST service.

##About the Library 

###System Requirements
System with Ruby and Ruby Gems Installed. 

####Installing LibLouis
Your system must have LibLouis installed (specifically the version that contains `file2brl`). If your system supports apt-get, then run the following command in the CLI interface to install LibLouis:

	sudo apt-get install liblouisutdml-bin
	

####Installing Remote-LibLouis

    bundle install
    
####Required Gems

	1. sinatra
	2. json
	3. tempfile
	4. unicorn

####Running Remote-LibLouis 

    cd location_of_remote-liblouis_directory

    unicorn -p 1234

Replace "1234" with the port number that you wish to use for the REST service.

##API

###JSON-Encoded Data
	POST ../braille.json
	
When posting to the /braille.json endpoint, use POST, and include the text that you wish to convert as the value of the key named "content." 

####JSON-Encoded Example
HTTP Body: 

	{
		"content": "Hello, world!"
	}
	
Response Body: 

	{
    	"content": "  ,hello1 _w6\r\n"
	}

The response body of the request that is returned will include the braille ascii text for the plain text sent to the service in the "content" key value.

###Form-Encoded Data

    POST .../braille

When posting to the /braille endpoint, use POST, and include the text that you wish to convert as the value of a key named "content."

####Form Encoded Example
HTTP Body: 

	content=Hello%2C+world%21
	
Response Body: 

	,hello1 _w6

The response body of the request that is returned will include the braille ascii text for the plain text sent to the service.




##API Status Codes
<table>
<tr>
<td>
	Code
</td>
<td>
	Meaning
</td>
<td>
	Returned Text
</td>
</tr>
<tr>
<td>
	200
</td>
<td>
	Everything worked properly, the conversion was successful, and the Braille ASCII has been sent back in the response.
</td>
<td>
	JSON or Form-Encoded response with braille ASCII based on sent plain text.
</td>
</tr>

<tr>
<td>
	404
</td>
<td>
	The only active endpoint is /braille and /braile.json. It only accepts POST. You will get this error code if you try to GET or POST to any other endpoint.
</td>
<td>
	"Not found; only POST is allowed. See documentation here: https://github.com/corybohon/braille/tree/master/remote-liblouis"
</td>
</tr>
<tr>
<td>
	501
</td>
<td>
	The text in the content body is blank. You must include a parameter key named "content" that has a value that contains the text you wish to convert to braille ascii.
</td>
<td>
	"You must specify content to convert to braille."
</td>
</tr>
<tr>
<td>
	502
</td>
<td>
	An error occured while translating your text -- the ouput from xml2brl contained no text. If problem persists, ensure that xml2brl is functioning properly on your system.
</td>
<td>
	"Content not successfuly converted to braille." 
</td>
</tr>
</table>

##Changelog
**Version 1.0**

- Inclusion of a JSON endpoint for the service; additional tweaks to the documentation and code documentation.

**Version 0.9**

- Initial version of the service available for beta testing

##License
Remote-LibLouis is released under the [MIT Open Source License](http://opensource.org/licenses/MIT).