[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)
[![Build Status](https://secure.travis-ci.org/stritti/tpl_bodenleger-stockach.svg?branch=master)](https://travis-ci.org/stritti/tpl_bodenleger-stockach)
tpl_bodenleger-stockach
=======================

Responsive Joomla! 3.0 Template based on Foundation 5.0 initially designed for
[Bodenleger Stockach](http://www.bodenleger-stockach.de)

### Features
 * SEO
 	* optimized breadcrumbs
 	* microformats for contacts
 	* header enhancements (Facebook, Google+ etc.)
 	* optimized for local SEO
 * Multidevice
 	* the layout is completly responsive
 	* support for smartphones, tablet, desktop
 	* responsive navigation menu




### License
The template is free to use under the [MIT license](http://www.opensource.org/licenses/mit-license.php).

### Credits
 * [ZURB Foundation Responsive Library](http://foundation.zurb.com),
   Free to use under the MIT license ( http://www.opensource.org/licenses/mit-license.php )
 * [jQuery JavaScript Library v2.1.0](http://jquery.com/),
   Released under the MIT license ( http://jquery.org/license)
 * [jQuery Plugin: jQueryFullscreenCycler](https://github.com/nbunney/jQueryFullscreenCycler)
   Released under GNU GENERAL PUBLIC LICENSE ( https://github.com/nbunney/jQueryFullscreenCycler/blob/master/LICENSE )


### Development
Full source of template at (https://github.com/stritti/tpl_bodenleger-stockach)

## Requirements
You'll need to have the following items installed before continuing.

  * [Node.js](http://nodejs.org): Use the installer provided on the NodeJS website.
  * [Grunt](http://gruntjs.com/)
  * [Bower](http://bower.io)

If you haven't used [Grunt](http://gruntjs.com/) before, be sure to check out the
[Getting Started](http://gruntjs.com/getting-started) guide, as it explains how to create a
[Gruntfile](http://gruntjs.com/sample-gruntfile) as well as install and use Grunt plugins.

## Setup Project
After installation clone the git repository:
```shell
git clone git@github.com:stritti/tpl_bodenleger-stockach.git
```

Then run in same directory following commands:
```shell
npm install && bower install
npm install -g grunt-cli
npm install -g bower
npm install -g livereload2
npm install grunt-contrib-watch --save-dev
npm install grunt-contrib-sass --save-dev
npm install grunt-contrib-cssmin --save-dev
npm install grunt-contrib-compress --save-dev
npm install grunt-contrib-copy --save-dev
npm install grunt-contrib-jshint --save-dev
npm install grunt-contrib-uglify --save-dev
npm install grunt-contrib-clean --save-dev
npm install grunt-bower-concat --save-dev

bower install zurb/bower-foundation
```

While you're working on the project, run:

`grunt`


[![Analytics](https://ga-beacon.appspot.com/UA-327996-12/stritti/tpl_bodenleger-stockach)](https://github.com/igrigorik/ga-beacon)
