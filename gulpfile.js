
const app = require( './package.json' );
const gulp = require( 'gulp' );
const eslint = require( 'gulp-eslint' );
const babel = require( 'gulp-babel' );
const prettify = require( 'gulp-js-prettify' );
const uglify = require( 'gulp-uglify' );
const rename = require( 'gulp-rename' );
var sass = require('gulp-sass')(require('sass'));
const sourcemaps = require( 'gulp-sourcemaps' );
const minifyCSS = require( 'gulp-clean-css' );
const autoprefixer = require( 'gulp-autoprefixer' );
const notify = require( 'gulp-notify' );

const config = {
    babel: {
        presets: ['@babel/preset-env']
    },
    prettify: {
        "indent_with_tabs": true
    },
    js: {
        src: ['admin/js/*.js', '!admin/js/**/*.min.js', '!admin/js/slick.js'],
        dist: 'admin/js',
    },
    scss: {
        src: 'assets/frontend/css/scss/**/*.scss',
        dist: 'assets/frontend/css',
    },
  
};

// Tasks
gulp.task(
    'compile:js',
    () => {
        return gulp.src( config.js.src )
           // .pipe( sourcemaps.init( { largeFile: true } ) )
            .pipe( eslint() )
            .pipe( eslint.format() )
           // .pipe( babel( config.babel ) )
            .on( 'error', notify.onError( {title: "Error", message: "Error: <%= error.message %>"} ) ) // phpcs:ignore WordPressVIPMinimum.Security.Underscorejs.OutputNotation
            .pipe( prettify( config.prettify ) )
            // .pipe( gulp.dest( config.js.dist ) )
            .pipe( uglify() )
            .pipe( rename( { suffix: '.min' } ) )
           // .pipe( sourcemaps.write( '/.' ) )
            .pipe( gulp.dest( config.js.dist ) )
            .pipe( notify( {message: 'TASK: compile:js Completed! 💯', onLast: true} ) );
    }
);

gulp.task(
    'compile:scss',
    () => {
        return gulp.src( config.scss.src )
			.pipe( sourcemaps.init( { largeFile: true } ) )
            .pipe( sass().on( 'error', sass.logError ) )
            .on( 'error', notify.onError( {title: "Error", message: "Error: <%= error.message %>"} ) ) // phpcs:ignore WordPressVIPMinimum.Security.Underscorejs.OutputNotation
            .pipe(autoprefixer( 'last 2 version' ) )
            .pipe( gulp.dest( config.scss.dist ) )
            .pipe( minifyCSS() )
            .pipe( rename( { suffix: '.min'} ) )
			.pipe( sourcemaps.write( '/.' ) )
            .pipe( gulp.dest( config.scss.dist ) )
            .pipe( notify( {message: 'TASK: compile:scss Completed! 💯', onLast: true} ) );
    }
);


gulp.task( 'build', gulp.series( 'compile:js', 'compile:scss') );
gulp.task(
    'watch',
    function () {
        //gulp.watch( config.js.src, gulp.series( 'compile:js' ) );
        gulp.watch( config.scss.src, gulp.series( 'compile:scss' ) );
      //  gulp.watch( config.zip.src, gulp.series( 'makeZip' ) );
    }
);

