'use strict';
 
module.exports = function (grunt) {
 
  grunt.initConfig({
    watch: {
      options: {
        livereload: 9001
      },
      sass: {
        files: ['sass/{,**/}*.scss'],
        tasks: ['compass:dev', 'autoprefixer:dev'],
        options: {
          livereload: false
        }
      },
      css: {
        files: ['css/{,**/}*.css']
      },
      images: {
        files: ['images/**']
      },
      js: {
        files: [
          'js/{,**/}*.js',
          '!js/{,**/}*.min.js'
        ],
        tasks: ['jshint', 'uglify:dev']
      }
    },
 
    compass: {
      options: {
        config: 'config.rb',
        bundleExec: true
      },
      dev: {
        options: {
          environment: 'development',
          outputStyle: 'expanded',
        }
      },
      dist: {
        options: {
          environment: 'production',
          outputStyle: 'compressed',
          imagesDir: 'images-min',
          force: true
        }
      }
    },
 
    autoprefixer: {
      options: {
        browsers: ['last 3 versions', '> 1%', 'Explorer 8'] // more codenames at https://github.com/ai/autoprefixer#browsers
      },
      dev: {
        files: [{
          expand: true,
          cwd: 'css',
          src: '**/*.css',
          dest: 'css'
        }]
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'css',
          src: '**/*.css',
          dest: 'css'
        }]
      }
    },
 
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'js/{,**/}*.js',
        '!js/{,**/}*.min.js'
      ]
    },
 
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 3
        },
        files: [{
          expand: true,
          cwd: 'images',
          src: ['**/*.png', '**/*.jpg'],
          dest: 'images-min/'
        }]
      }
    },
 
    svgmin: {
      dist: {
        files: [{
          expand: true,
          cwd: 'images',
          src: '**/*.svg',
          dest: 'images-min'
        }]
      }
    },
 
    uglify: {
      dev: {
        options: {
          mangle: false,
          compress: false,
          beautify: true
        },
        files: [{
          expand: true,
          cwd: 'js',
          src: ['**/*.js', '!**/*.min.js'],
          dest: 'js',
          ext: '.min.js'
        }]
      },
      dist: {
        options: {
          mangle: true,
          compress: true
        },
        files: [{
          expand: true,
          cwd: 'js',
          src: ['**/*.js', '!**/*.min.js'],
          dest: 'js',
          ext: '.min.js'
        }]
      }
    },
 
    copy: {
      dist: {
        files: [
          {
            expand: true,
            cwd: 'images',
            src: ['**', '!**/*.svg', '!**/*.png', '!**/*.jpg'],
            dest: 'images-min'
          }
        ]
      }
    },
 
    parallel: {
      assets: {
        grunt: true,
        tasks: ['imagemin', 'svgmin', 'uglify:dist', 'copy:dist']
      }
    }
  });
 
 
  grunt.event.on('watch', function(action, filepath) {
    grunt.config([
      'compass:dev',
      'jshint'
    ], filepath);
  });
 
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-parallel');
  grunt.loadNpmTasks('grunt-svgmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
 
  grunt.registerTask('build', [
    'parallel:assets',
    'compass:dist',
    'autoprefixer:dist',
    'jshint'
  ]);
};
