# Remote-LibLouis

Remote-LibLouis is a Ruby + [Sinatra](http://www.sinatrarb.com/) HTTP service that lets you interact with LibLouisXML remotely as a REST service.

## Installation

### System Requirements

Running the Ruby remote translation service requires a system with Ruby and [Ruby gems](http://rubygems.org/) installed. Most modern UNIX systems have Ruby already installed by default or have packages that make installation easy. 

The installation section assumes that you are installing on an Ubuntu system. You may need to modify the package names and commands to fit your system.

```bash
$ sudo apt-get install ruby rubygems
```

#### Installing LibLouis

Your system must have LibLouis installed (specifically the version that contains `file2brl`).

```bash
$ sudo apt-get install liblouisutdml-bin
```

#### Clone GitHub Repository

You will need a copy of this repository.

```bash
$ sudo apt-get install git
$ git clone https://github.com/umd-mith/braille.git
```

#### Installing Remote-LibLouis

In the directory containing the `Gemfile`, you will want to run the bundler to install needed Ruby gems:

* sinatra
* json
* tempfile
* unicorn

```bash
$ cd braille/remote-liblouis/ruby
$ sudo bundle install
```

#### Running Remote-LibLouis 

In the same directory where you ran the `bundle` command, you can start the translation service using `unicorn`:

```bash
$ unicorn -p 1234
```

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