var gulp = require( 'gulp' ),
		browserify = require( 'browserify' ),
		reactify = require( 'reactify' ),
		babelify = require( 'babelify' ),
		source = require( 'vinyl-source-stream' );

var sass = require('gulp-sass'),
		sourcemaps = require('gulp-sourcemaps'),
		rename = require('gulp-rename'),
		autoprefixer = require('gulp-autoprefixer');




gulp.task( 'react', function() {
	return gulp.src( 'components/Index.jsx' )
		.on('error', ErrorHandler)
		.pipe( react() )
		.pipe( gulp.dest( 'js' ) );
});

var bundler = browserify( './components/Index.jsx' );
 bundler.transform( reactify )
				.transform(babelify, {presets: ["es2015", "react"]});

gulp.task( 'js', bundle );
// bundler.on( 'update', bundle );

function bundle() {
	return bundler.bundle()
		.on('error', ErrorHandler)
		.pipe( source( 'theme.js' ) )
			// .pipe( buffer() )
			// .pipe( sourcemaps.init( { loadMaps: true } ) )
			// .pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( './' ) );
}


function ErrorHandler (error) {
  console.log(error.toString())
  this.emit('end')
}







var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};

gulp.task('sass', function () {
  return gulp
    .src('./sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('ErrorHandler', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(rename( 'style.css' ) )
    .pipe(gulp.dest('./'));
});




// Watcher
gulp.task( 'watch', function() {
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch('components/**/*.jsx', ['js']);
});