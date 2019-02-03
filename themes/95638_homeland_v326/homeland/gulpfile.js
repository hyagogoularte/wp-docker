// Load Gulp 
const { src, dest, task, watch, series, parallel } = require( 'gulp' );

// CSS related plugins
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var cleanCSS = require( 'gulp-clean-css' );

// Utility plugins
var plumber = require( 'gulp-plumber' );
var rename = require( 'gulp-rename' );
var sourcemaps = require( 'gulp-sourcemaps' );
var cache = require( 'gulp-cache' );
var imagemin = require( 'gulp-imagemin' );

// JS related plugin
var uglify = require( 'gulp-uglify' );

// Browers related plugin
var browserSync = require('browser-sync').create();

// Project related variables
var projectURL = 'http://localhost';
var styleSRC = './src/scss/style.scss';
var styleAdminSRC = './src/scss/admin.scss';
var styleURL = './assets/css/';
var mapURL = './';

var jsSRC = './src/scripts/*.js';
var jsCustomSRC = './src/scripts/custom.js';
var jsAdminSRC = './src/scripts/admin.js';
var jsURL = './assets/js/';

var imgSRC = './src/img/**/*';
var imgURL = './assets/img/';

var styleWatch = './src/scss/**/*.scss';
var styleVendor = './assets/js/**/*.css';
var jsWatch = './src/scripts/**/*.js';
var jsVendor = './assets/js/**/*.js';
var imgWatch = './src/img/**/*.*'; 
var phpWatch = './**/*.php';


/**
 * Browser Sync Task and then watch all task
 */
function browser_sync() {
	browserSync.init({
		proxy: projectURL,
		injectChanges: true,
		open: false,
	});
}

function reload(done) {
	browserSync.reload;
	done();
}

/**
 * CSS Task
 */
function styles(done) {
	src( [ styleSRC, styleAdminSRC ] )
		.pipe( sourcemaps.init() )
		.pipe( plumber() )
		.pipe( sass({ 
			errLogToConsole: true,
			outputStyle: 'compact' 
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( cleanCSS() )
		.pipe( sourcemaps.write( mapURL ) )
		.pipe( plumber.stop() )
		.pipe( dest( styleURL ) )
		.pipe( browserSync.stream() );
	done();
}


/**
 * Custom Script Task
 */
function js(done) {
	src( [ jsCustomSRC, jsAdminSRC ] )
		.pipe( plumber() )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.init({ loadMaps: true }) )
		.pipe( uglify() )
		.pipe( sourcemaps.write( mapURL ) )
		.pipe( dest( jsURL ) )
		.pipe( browserSync.stream() );
	done();
}


/**
 * Trigger Plumber Function
 */
function triggerPlumber( src_file, dest_file ) {
	return src( src_file )
		.pipe( plumber() )
		.pipe( dest( dest_file ) );
}


/**
 * Images Task
 */
function images(done) {
	triggerPlumber( imgSRC, imgURL );
	src( imgSRC )
		.pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.jpegtran({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            }
          ]
        })
      ])
    )
    .pipe( dest( imgURL ) );
	done();
}


/**
 * Clean gulp cache
 */
function clearCache(done) {
 	cache.clearAll();
 	done();
}


/**
 * Watch Files
 */
function watch_files() {
	watch( styleWatch, series( styles, reload ) );
	watch( styleVendor ).on( 'change', browserSync.reload );
	watch( jsWatch, series( js, reload ) );
	watch( jsVendor ).on( 'change', browserSync.reload );
	watch( imgWatch, series( images, reload ) );
	watch( phpWatch ).on( 'change', browserSync.reload );
}

/**
 * Default Task
 */
task( "styles", styles );
task( "js", js );
task( "images", images );
task( "default", parallel( styles, js, images ) );
task( "watch", parallel( browser_sync, watch_files ) );