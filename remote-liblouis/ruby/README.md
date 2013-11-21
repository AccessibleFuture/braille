# Remote-LibLouis v.1.0

Remote-LibLouis is a Ruby + Sinatra HTTP service that lets you interact with LibLouisXML remotely as a REST service.

## About the Library 

### System Requirements

System with Ruby and Ruby Gems Installed. 

#### Installing LibLouis

Your system must have LibLouis installed (specifically the version that contains `file2brl`). On Ubuntu run the following from the command line to install LibLouis:

    sudo apt-get install liblouisutdml-bin

#### Installing Remote-LibLouis

    bundle install
    
#### Required Gems

1. sinatra
2. json
3. tempfile
4. unicorn

#### Running Remote-LibLouis 

    cd location_of_remote-liblouis_directory

    unicorn -p 1234

Replace "1234" with the port number that you wish to use for the REST service.

#### Configuring the WordPress Braille Plugin

When using this service as the remote LibLouis service for the Braille WordPress plugin, use the `braille.json` endpoint.

## Changelog

**Version 1.0**

- Inclusion of a JSON endpoint for the service; additional tweaks to the documentation and code documentation.

**Version 0.9**

- Initial version of the service available for beta testing

## License

Remote-LibLouis is released under the [MIT Open Source License](http://opensource.org/licenses/MIT).