# Braille Translation Plugins

This repository holds several pieces of software built as part of the Braille project.

## WordPress Braille Plugin

The plugin in [`wp-plugin-braille`](./wp-plugin-braille) is available through [the WordPress plugin registry](http://wordpress.org/plugins/braille).

This plugin requires a local installation of LibLouis or access to a remote LibLouis translation service running an application similar to the one in [`remote-liblouis'](./remote-liblouis).

## Remote LibLouis Translation Service

An example remote service providing LibLouis translations for the WordPress plugin is available in the [`remote-liblouis`](./remote-liblouis) directory. The available version is a Ruby Sinatra application.

MITH has produced an Amazon EC2 machine image (AMI) with all of the required software installed. This AMI is public and freely available. See [these instructions](./USING-REMOTE-LIBLOUIS-AMI.md) for more information.