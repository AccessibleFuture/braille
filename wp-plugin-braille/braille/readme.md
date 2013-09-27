# braille

- Requires at least: WordPress 3.0.1
- Tested up to: WordPress 3.4.2

This plugin was produced as part of the BrailleSC/Making DH More Open project. 

## Description

This plugin provides a "braille" shortcode to translate the enclosed text into Braille. Some sections of a website may be marked to be translated into Braille automatically without requiring the shortcode.

The plugin also provides a Braille output type for the [Anthologize plugin](http://anthologize.org/). You may select BRL or SimBraille output. BRL is suitable for embossing. SimBraille produces an HTML file with UTF-8 encoded glyphs representing the embossed form of the characters suitable for display in a visual interface.

## Installation

### Automatic Plugin Installation

To add this plugin using the built-in plugin installer:

1. Go to Plugins > Add New.
2. Under **Search**, type in "Braille".
3. Select the plugin from the list offered.
4. Click **Install Now** to install the plugin.
5. A popup window will ask you to confirm you wish to install the plugin.
6. Click **Proceed** to continue with the installation.
7. If successful, click **Activate PLugin** to activate it, or **Return to Plugin Installer** for further actions.

### Manual Installation

To install this plugin manually:

1. Download the plugin archive to your desktop.
2. Extract the plugin folder to your desktop.
3. Read through the "readme" file to insure you follow the installation instructions.
4. Upload the plugin folder to the `wp-content/plugins` folder in your WordPress directory.
5. Go to Plugins screen and find the newly uploaded plugin in the list.
6. Click **Activate Plugin** to activate it.

## Configuration

The plugin uses LibLouis to translate English text into Braille. You either need LibLouis installed on the same machine as your WordPress installation or access to a remote LibLouis service such as the one provided by the [example remote LibLouis service](https://github.com/umd-mith/braille/tree/master/remote-liblouis).

1. Go to Plugins screen and find the Braille plugin in the list.
2. Click on the plugin to go to the configuration screen.
3. Select "Local" or "Remote" LibLouis.
    1. If "Local" LibLouis, place the full path of the executable in the text box.
    2. If "Remote" LibLouis, place the full URL of the JSON service in the appropriate text box (e.g., if using the example remote-liblouis service mentioned above, use the `braille.json` endpoint).
4. Select the appropriate options for which parts of the website should be translated to Braille. If you are using this plugin to provide Braille translation for Anthologize, you do not need to select anything here.

## Frequently Asked Questions

### Does this plugin convert post text to Braille?

Yes, if the plugin is configured to do so through the plugin settings page.

## Changelog

### 0.1

* First upload of this WordPress plugin.