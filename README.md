# gutenbergBlockExamples
Skeleton for WordPress Plugin Boilerplate with Namespace and Gutenberg Block support


## Changes Required to start Development:
   
1. After Adding more files as you go, use composer to update autoload if you need to. You shall need to have composer installed on your computer. In Terminal in the plugin directory, run following:
    *  `composer update`
   
2. To install NPM dependencies, run the following command:
   * `npm install`
   
3. After doing all the magic of coding, run:
   * `npm run build`
   
4. While developing you may use the watcher by using the command:
   * `npm run start`

## Steps required to release plugin:

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
   


