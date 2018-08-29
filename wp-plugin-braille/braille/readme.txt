=== braille ===

Contributors: corybohon, literaturegeek, jgsmith
Stable tag: 0.0.5
Tags: plugin, braille, anthologize
Requires at least: 3.0.1
Tested up to: 3.7.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to incorporate SimBraille or BRL formatted text from
English text.

== Description ==

The Braille plugin provides a number of Braille-related services to WordPress
websites and the Anthologize WordPress plugin.

= Short code =

A `braille` short code is available for translating English text into 
Braille. For example:

    [braille]Text to be translated into Braille.[/braille]

Depending on how the plugin is configured, this will place either UTF-8
SimBraille in the page, or the ASCII sequences used when embossing on paper.

= Page Part Translation =

Primarily designed for testing, different parts of a site may automatically
be translated into Braille.

Depending on how the plugin is configured, this will place either UTF-8
SimBraille in the page, or the ASCII sequences used when embossing on paper.

= Integration with Anthologize =

The Braille plugin provides a Braille output type for the [Anthologize
plugin](http://anthologize.org/). You may select BRL or SimBraille output.
BRL is suitable for embossing. SimBraille produces an HTML file with UTF-8 
encoded glyphs representing the embossed form of the characters suitable for 
display in a visual interface.

**N.B.: This plugin requires
[LibLouis](https://code.google.com/p/liblouisutdml/) installed on the same
system as the WordPress site or access to a remote service providing
LibLouis functionality. [A free and public Amazon machine image is available
with the necessary software installed and configured.](https://github.com/umd-mith/braille/blob/master/USING-REMOTE-LIBLOUIS-AMI.md)

= Configuration =

The plugin uses [LibLouis](https://code.google.com/p/liblouisutdml/) to
translate English text into Braille. You either need LibLouis installed on
the same machine as your WordPress installation or access to a remote
LibLouis service such as the one provided by the 
[example remote LibLouis service](https://github.com/umd-mith/braille/tree/master/remote-liblouis).

1. Go to Plugins screen and find the Braille plugin in the list OR select
the Braille Plugin from the list of available Settings (see the first 
screenshot).

2. Click on the plugin to go to the configuration screen.

3. Select "Local" or "Remote" LibLouis.

    1. If "Local" LibLouis, place the full path of the executable in the text
    box (e.g., `/usr/local/bin`).

    2. If "Remote" LibLouis, place the full URL of the JSON service in the
    appropriate text box (e.g., if using the example remote-liblouis service
    mentioned above, use the `braille.json` endpoint). [Information is
    available on using a free and public Amazon machine image to provide the
    remote LibLouis service.](https://github.com/umd-mith/braille/blob/master
    /USING-REMOTE-LIBLOUIS-AMI.md) See the second screenshot for where the
    remote service URL is configured.

4. Select the appropriate options for which parts of the website should be
translated to Braille. If you are using this plugin to provide Braille
translation for Anthologize, you do not need to select anything here.

== Screenshots ==

1. This screenshot shows where to find the plugin settings page.

2. This screenshot shows how to configure the Braille plugin to make use of a
remote LibLouis translation service. The actual IP address or hostname will
depend on where the service is hosted.

== Installation ==

= Automatic Plugin Installation =

To add this plugin using the built-in plugin installer:

1. Go to Plugins > Add New.

2. Under **Search**, type in "Braille".

3. Select the plugin from the list offered.

4. Select **Install Now** to install the plugin.

5. A popup window will ask you to confirm you wish to install the plugin.

6. Select **Proceed** to continue with the installation.

7. If successful, click **Activate Plugin** to activate it, or **Return to
   Plugin Installer** for further actions.

= Manual Installation =

To install this plugin manually:

1. Download the plugin archive to your desktop.

2. Extract the plugin folder to your desktop.

3. Read through the "readme" file to ensure you follow the installation
   instructions.

4. Upload the plugin folder to the `wp-content/plugins` folder in your
   WordPress directory.

5. Go to Plugins screen and find the newly uploaded plugin in the list.

6. Select **Activate Plugin** to activate it.

== Frequently Asked Questions ==

= Does this plugin convert post text to Braille? =

If the plugin is configured to do so, the content of blog posts, pages, and
other parts of the site will be translated into Braille without requiring the
use of the short code. Otherwise, the plugin will only provide Braille
translation of text enclosed in the `braille` short code.

Braille translation requires that one of the local or remote LibLouis settings
be configured properly. Without the LibLouis program, the plugin can not
provide Braille translations.

= How can I get access to a Braille translation service? =

If you are not comfortable installing or running [the example LibLouis remote
service](https://github.com/umd-mith/braille/tree/master/remote-liblouis) or
if you aren't able to install [the LibLouis
package](http://packages.ubuntu.com/precise/liblouisutdml-bin) on the same
server as your WordPress site, you can [use a publicly available Amazon
machine image](https://github.com/umd-mith/braille/blob/master/USING-REMOTE-
LIBLOUIS-AMI.md) to create your own remote LibLouis service.

== Changelog ==

= 0.0.4 =

* Clarify the documentation.

* Add link to documentation about the Amazon machine image for the LibLouis
  translation service.

= 0.0.3 =

* Fix reference to PHP library for local LibLouis installation use.

= 0.0.2 =

* Add note about LibLouis requirement to readme.

* Use WordPress API for interacting with remote services when the API is
  available.

* Use better plugin detection method to detect Anthologize.

* Sanitize plugin configuration settings.

= 0.0.1 =

* First upload of this WordPress plugin.

== Upgrade Notice ==

= 0.0.1 =

Initial version.
