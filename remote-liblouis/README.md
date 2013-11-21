# Remote LibLouis Translation Service

The remote translation service provides a simple API. The [Ruby version](./ruby) is an example implementation of this API. Implementations in other languages will be placed here as they are developed and made available. The [Amazon machine image](../USING-REMOTE-LIBLOUIS-AMI.md) uses the Ruby implementation.

## API

### JSON-Encoded Data

HTTP Request:

    POST http://localhost:1234/braille.json
  
When posting to the `braille.json` endpoint, use POST, and include the text that you wish to convert as the value of the key named "content". 

#### JSON-Encoded Example

HTTP Body: 

```json
{
    "content": "Hello, world!"
}
```

Response Body: 

```json
{
    "content": "  ,hello1 _w6\r\n"
}
```

The response body of the request that is returned will include the braille ascii text for the plain text sent to the service in the "content" key value.

### Form-Encoded Data

HTTP Request:

    POST http://localhost:1234/braille

When posting to the `braille` endpoint (without the `.json` extension), use POST, and include the text that you wish to convert as the value of a key named "content".

#### Form Encoded Example

HTTP Body: 

    content=Hello%2C+world%21
  
Response Body: 

    ,hello1 _w6

The response body of the request that is returned will include the braille ascii text suitable for embossing for the plain text sent to the service.

## API Status Codes

| Code | Meaning | Returned Text |
| ---- | ------- | ------------- |
| 200  OK | Everything worked properly, the conversion was successful, and the Braille ASCII has been sent back in the response. | JSON or Form-Encoded response with Braille ASCII based on sent plain texxt. |
| 400 Bad Request | The text in the content body is blank. You must include a parameter key named "content" that has a value that contains the text you wish to convert to Braille ASCII. | "You must specify content to convert to Braille." |
| 404 Not Found | The only active endpoints are `braille` and `braille.json`. Using any other URL will result in this code. | "Not found; only POST is allowed. See documentation here: https://github.com/umd-mith/braille/tree/master/remote-liblouis" |
| 405 Method Not Allowed | These endpoints only accept POSTs. Using any other method (i.e., GET, PUT, DELETE) will result in this code. | "Not found; only POST is allowed. See documentation here: https://github.com/umd-mith/braille/tree/master/remote-liblouis" |
| 502 Bad Gateway | An error occured while translating your text&mdash;the output from file2brl contained no text. If the problem persists, ensure that file2brl is functioning properly on your system. | "Content not successfully converted to Braille." |
