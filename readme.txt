=== Gutenberg Block Examples ===

Contributors: boospot
Tags: gutenberg, blocks, gutenberg blocks, wordpress blocks, builder
Requires at least: 5.0
Tested up to: 5.6.1
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: <http://www.gnu.org/licenses/gpl-2.0.html>

Gutenberg Block Examples is a plugin to demonstrate Example blocks

== Description ==

Changes Required to start Development:

1. After Adding more files as you go, use composer to update autoload if you need to. You shall need to have composer installed on your computer. In Terminal in the plugin directory, run following:
    *  `composer update`

2. To install NPM dependencies, run the following command:
   * `npm install`

3. After doing all the magic of coding, run:
   * `npm run build`

4. While developing you may use the watcher by using the command:
   * `npm run start`

Steps required to release plugin:

Once you have done all the build and plugin is ready to be released, you may follow these steps to issue the new plugin release:

1. Clone the repo toa new location probably your desktop:
   * `git clone your_repo_link.git`

2. Run Composer Update to build and install composer dependencies:
   * `composer update`
3. install npm modules and run build
   * `npm install`
   * `npm run build`

4. Once everything is built, you should remove the git directories, node_modules and other unnecessary directories:
   * `find . | grep .git | xargs rm -rf` to remove all git related files and directories
   * `rm node_modules -r` to remove all node modules since these are not required after the build process is done.
   * `rm composer.lock` optionally remove composer lock file
   * `rm package-lock.json` optionally remove npm package lock file

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* A change since the previous version.
* Another change.

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.



