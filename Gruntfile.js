/*
Copyright 2014
An free open source Joomla! Template
http://www.bodenleger-stockach.de
By @stritti

 Full source at https://github.com/stritti/tpl_bodenleger-stockach
 Licensed under the MIT License (MIT) license. Please see LICENSE for more information.

 Our templates are downloadable for everyone and for free. You are allowed
 to modify this template to suite your needs and as you wish, the only thing not allowed
 is removing the backlink to www.bodenleger-stockach.de - if you like to move it,  place the link
 somewhere else in your site for example in your links section or impressum.
*/
'use strict';

/**
 * Grunt Module
 */
module.exports = function(grunt) {
  /**
   * Configuration
   */
  grunt.initConfig({
    /**
     * Get package meta data
     */
      pkg: grunt.file.readJSON('package.json'),
   /**
    * Project banner
    */
   tag: {
     banner: '/*!\n' +
             ' * <%= pkg.name %>\n' +
             ' * <%= pkg.title %>\n' +
             ' * <%= pkg.url %>\n' +
             ' * @author <%= pkg.author %>\n' +
             ' * @version <%= pkg.version %>\n' +
             ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
             ' */\n'
   },

   sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dev: {
        options: {
          style: 'expanded',
          banner: '<%= tag.banner %>',
          compass: true
        },
        files: {
            'src/css/app.css': 'src/sass/app.scss',
            'src/css/editor.css': 'src/sass/editor.scss',
        }
      },
      dist: {
        options: {
          style: 'compressed',
          compass: true
        },
        files: {
            'src/css/app.css': 'src/sass/app.scss',
            'src/css/editor.css': 'src/sass/editor.scss',
         }
      }
   },

   watch: {
      grunt: { 
         files: ['Gruntfile.js']
      },
      sass: {
        files: ['src/sass/**/*.{scss,sass}'],
        tasks: ['sass:dev']
      },
      livereload: {
         files: ['src/*.html', 'src/*.php', 'src/js/**/*.{js,json}', 'src/css/*.css','src/img/**/*.{png,jpg,jpeg,gif,webp,svg}'],
         options: {
            livereload: true
         }
      }
   },


   compress: {
     main: {
       options: {
         archive: 'target/<%= pkg.name %>.zip'
       },
       files: [
         {src: ['target/files/<%= pkg.name %>/**'], dest: '/'} // includes files in path and its subdirs
       ]
     }
   }   
});

grunt.loadNpmTasks('grunt-sass');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-compress');

  /**
   * Build task
   * Run `grunt build` on the command line
   * Then compress all JS/CSS files
   */
  grunt.registerTask('build', ['sass:dist', 'compress']);
  /**
   * Default task
   * Run `grunt` on the command line
   */
  grunt.registerTask('default', ['sass:dev','watch']);
}