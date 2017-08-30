'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const clean = require('gulp-clean-css');
const buffer = require('gulp-buffer');
const uglify = require('gulp-uglify');
const tap = require('gulp-tap');
const browserify = require('browserify');
const babel = require('babelify');

gulp.task('sass', () => {
	return gulp.src('./scss/style.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			precision: 10
		}))
		.pipe(autoprefixer({
      remove: 'false',
			browsers: ['last 4 versions', 'safari 8', 'safari 9', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']
		}))
		.pipe(clean({compatability: 'ie9'}))
		.pipe(sourcemaps.write())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('./'));
});

gulp.task('js', () => {
  return gulp.src('./js/*.js', { read: false })
    .pipe(tap((file) => {
      file.contents = browserify(file.path, {
        debug: true
      }).transform(babel, {
        presets: [ 'es2015' ]
      }).bundle();
    }))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
  gulp.watch('./js/**/*.js', ['js']);
  gulp.watch('./scss/**/*.scss', ['sass']);
});