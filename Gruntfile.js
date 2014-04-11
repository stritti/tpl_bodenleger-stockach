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

   /**
    *
    */
   sass: {
      options: {
        includePaths: [
           'bower_components/foundation/scss',
        ]
      },
      dev: {
        options: {
          style: 'expanded',
          banner: '<%= tag.banner %>',
          compass: true
        },
        files: [{
            'src/css/app.css': 'src/sass/app.scss',
            'src/css/editor.css': 'src/sass/editor.scss'},
            {
               expand: true,
               cwd: "src/sass/pages",
               src: ["**/*.scss"],
               dest: "src/css/pages/",
               ext: ".css"
            }]
         
        
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

   jshint: {
      options: {
        jshintrc: '.jshintrc',
      },
      all: [
        'src/js/*.js',
        '!src/js/*.min.js',
        '!src/js/jquery.*.js'
      ]
   },
   /**
    *
    */
   copy: {
      deploy: {
         nonull: true,
         cwd: 'src/',
         src: ['**',  '!**/*.scss' ],
         expand: true,
         //dest: 'target/files/tpl_bodenleger-stockach/',
         dest: '../xampp_1_8_1/htdocs/templates/Bodenleger-Stockach/',
     },
   },

   /**
    *
    */
   compress: {
     main: {
       options: {
         archive: 'target/<%= pkg.name %>.zip'
       },
       files: [
         {
            cwd: 'target/files/<%= pkg.name %>/',
            src: ['target/files/<%= pkg.name %>/**'],
            dest: '/'
         }
       ]
     }
   },

   clean: {
      deploy: {
         src: ['target/files/<%= pkg.name %>/']
      },
   },
   /**
    * 
    */
   watch: {
      grunt: { 
         files: ['Gruntfile.js']
      },
      sass: {
         files: ['src/sass/**/*.{scss,sass}'],
         tasks: ['sass:dev']
      },
      livereload: {
         files: [
            'src/*',
            'src/css/**/*.css',
            'src/html/**/*.{html,php}',
            'src/images/**/*.{png,jpg,jpeg,gif}',
            'src/js/**/*.{js,json}',
            'src/language/**/*.ini'
         ],
         tasks: [ 'copy:deploy'],
         options: {
            //interrupt: true,
            livereload: true
         }
      },
   }  
});

   grunt.loadNpmTasks('grunt-sass');
   grunt.loadNpmTasks('grunt-contrib-watch');
   grunt.loadNpmTasks('grunt-contrib-compress');
   grunt.loadNpmTasks('grunt-contrib-copy');
   grunt.loadNpmTasks('grunt-contrib-jshint');
   grunt.loadNpmTasks('grunt-contrib-clean');

   /**
    * Build task
    * Run `grunt build` on the command line
    * Then compress all JS/CSS files
    */
   grunt.registerTask('build',
      'Compiles all of the assets and copies the files to the build directory.',
      ['sass:dist', 'jshint', 'compress']
   );
   /**
    * Default task
    * Run `grunt` on the command line
    */
   grunt.registerTask('default',
      [ 'sass:dev', 'watch']
   );
}