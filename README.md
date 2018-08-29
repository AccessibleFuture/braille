# Braille Translation Plugins

This repository holds several pieces of software built as part of [Making
Digital Humanities More Open](http://mith.umd.edu/research/project/braillesc/)
and related projects.

## WordPress Braille Plugin

License: [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html)

The plugin in [`wp-plugin-braille/`](./wp-plugin-braille) is available 
through [the WordPress plugin registry](http://wordpress.org/plugins/braille).
The version of the plugin in this repository is provided for ease of 
reference. The version of the plugin in [the WordPress subversion
repository](http://plugins.svn.wordpress.org/braille/) is considered
authoritative.

This plugin requires a local installation of LibLouis or access to a remote
LibLouis translation service running an application similar to the one in
[`remote-liblouis/`](./remote-liblouis).

## Moodle Braille Filter

License: [MIT](http://opensource.org/licenses/MIT)

A simple filter is provided in [`moodle-filter/`](./moodle-filter) that 
allows Moodle to display Braille content. This filter is in early
development. While it may be useful in conjunction with a Braille 
translation service, it is not packaged and distributed as a one-click 
installation.

## Remote LibLouis Translation Service

License: [MIT](http://opensource.org/licenses/MIT)

An example remote service providing LibLouis translations for the WordPress
plugin is available in the [`remote-liblouis/`](./remote-liblouis) directory.
The available version is a [Ruby](https://www.ruby-lang.org/en/)
[Sinatra](http://www.sinatrarb.com/) application.

MITH has produced an Amazon EC2 machine image (AMI) with all of the required
software installed. This AMI is public and freely available. See [these
instructions](./USING-REMOTE-LIBLOUIS-AMI.md) for more information.

## PHP Libraries

License: [MIT](http://opensource.org/licenses/MIT)

Two libraries, [`php-local-liblouis/`](./php-local-liblouis) and 
[`php-remote-liblouis/`](./php-remote-liblouis), are provided for 
interfacing with a local installation of the LibLouis library or a remote 
translation service, respectively. These libraries are included in the 
WordPress module. The remote translation service library is included in the 
Moodle filter.
