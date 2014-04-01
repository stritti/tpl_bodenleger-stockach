module.exports = function(grunt) {
  grunt.initConfig({

   pkg: grunt.file.readJSON('package.json'),

   sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
         // outputStyle: 'compressed'
        },
        files: {
          'src/css/app.css': 'src/sass/app.scss',
          'src/css/editor.css': 'src/sass/editor.scss',
          'src/css/print.css': 'src/sass/print.scss',
          //'src/css/pages/**/*.css': 'src/css/pages/**/*.scss'
        }        
      }
   },

   watch: {
      grunt: { 
         files: ['Gruntfile.js']
      },
      sass: {
        files: ['src/sass/**/*.{scss,sass}'],
        tasks: ['sass']
      },
      livereload: {
         files: ['src/*.html', 'src/*.php', 'src/js/**/*.{js,json}', 'src/css/*.css','src/img/**/*.{png,jpg,jpeg,gif,webp,svg}'],
         options: {
            livereload: true
         }
      }
   }
});

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-zip');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build','watch']);
}