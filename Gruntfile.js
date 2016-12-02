module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
	
		// Watch config ==
		watch: {
			compass: {
				files: ['scss/*.{scss,sass}'], //specify directory if needed
				tasks: ['compass:dev']
			},
			js: {
				files: ['js/*.js','!js/custom-head.min.js','!js/custom-body.min.js'], //specify directory if needed
				tasks: ['uglify:dev']
			}
		},
		// Compass config ==
		compass: {
			// Development ==
			dev: {
				options: {  
					require: ['compass/import-once/activate'], 
					httpPath: ['/'],           
					sassDir: ['scss'],
					cssDir: ['.'],
					imagesDir: ['img'],
					javascriptsDir: ['js'],
					fontsDir: ['fonts'],
					outputStyle: ['expanded'],
					noLineComments: true,
					environment: 'development',
                    force: true
				}
			},
			// Production ==
			prod: {
				options: {     
					require: ['compass/import-once/activate'],  
					httpPath: ['/'],          
					sassDir: ['scss'],
					cssDir: ['.'],
					imagesDir: ['img'],
					javascriptsDir: ['js'],
					fontsDir: ['fonts'],
					outputStyle: ['compact'],
					noLineComments: true,
					environment: 'production',
                    force: true
				}
			}
		},
		// Uglify config ==
		uglify: {
			// Development ==
			dev: {
				options: {
					mangle: false,
					beautify: true
				},
				files: {
					'js/custom-head.min.js': [
					'js/modernizr.js',
					'js/custom-head.js'
					],
					'js/custom-body.min.js': [
					'js/skip-link-focus-fix.js',
					'js/featherlight.js',
					'js/custom-body.js',
					'js/dev-scripts.js'
					] 
				}
			},
			// Staging ==
			stage: {
				options: {
					mangle: false,
					beautify: true
				},
				files: {
					'js/custom-head.min.js': [
					'js/modernizr.js',
					'js/custom-head.js'
					],
					'js/custom-body.min.js': [
					'js/skip-link-focus-fix.js',
					'js/custom-body.js'
					] 
				}
			},
			// Production ==
			prod: {
				options: {
					beautify: false
				},
				files: {
					'js/custom-head.min.js': [
					'js/modernizr.js',
					'js/custom-head.js'
					],
					'js/custom-body.min.js': [
					'js/skip-link-focus-fix.js',
					'js/custom-body.js'
					] 
				}
			}
		},
		// Modernizr config ==
		modernizr: {
			// Development ==
			dev: {
			  "crawl": false,
			  "customTests": [],
			  "dest": "js/modernizr.js",
			  "tests": [
			  	"backgroundsize",
			  	"cssanimations",
				"csstransforms",
				"csstransitions",
				"flexbox",
			    "fontface",
				"inlinesvg",
				"input",
				"inputtypes",
				"mediaqueries",
				"opacity",
				"video",
				"videoautoplay",
				"videoloop"
			  ],
			  "options": [
			    "mq",
			    "html5printshiv",
			    "html5shiv",
			    "setClasses"
			  ],
			  "uglify": false
			},
			// Production ==
			prod: {
			  "crawl": false,
			  "customTests": [],
			  "dest": "js/modernizr.js",
			  "tests": [
				"backgroundsize",
			    "flexbox",
			  	"inlinesvg",
			    "mediaqueries"
			  ],
			  "options": [
			    "mq",
			    "html5printshiv",
			    "html5shiv",
			    "setClasses"
			  ],
			  "uglify": false
			}
		},
		// JSHint config ==
		jshint: {
			// Development ==
			dev: {
				files: {
					src: ['js/custom-head.js','js/custom-body.js']
				},
				options: {
					"undef": true,
					"unused": true,	
					"browser": true,
					globals: {
			          jQuery: true
			        }
				}
			}
		}

	});

  // DEPENDENT PLUGINS =========================/

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks("grunt-modernizr");
	grunt.loadNpmTasks('grunt-contrib-jshint');

  // TASKS =====================================/

  	// -- Run "grunt" to run development
	grunt.registerTask('default', ['compass:dev', 'modernizr:dev', 'jshint:dev', 'uglify:dev', 'watch']);
	// -- Run "grunt stage" to run staging
	grunt.registerTask('stage', ['compass:dev', 'modernizr:prod', 'jshint:dev', 'uglify:stage', 'watch']);
	// -- Run "grunt prod" to run production
	grunt.registerTask('prod', ['compass:prod', 'modernizr:prod', 'uglify:prod']);
};