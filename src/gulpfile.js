
"use strict";

var gulp = require('gulp');
var fs = require('fs');
var runSequence = require('run-sequence');
var plumber = require('gulp-plumber');
var addsrc = require('gulp-add-src');
var merge = require('merge-stream');
var image = require('gulp-imagemin');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var replace = require('gulp-replace');
var uglify = require('gulp-uglify');
var clean = require('gulp-clean');
var sourcemaps = require('gulp-sourcemaps');

var pkg = JSON.parse(fs.readFileSync('./package.json')),
	paths = {
		src: './theme/',
		dist: '../www/wp-content/themes/' + pkg.name + '/'
	};

gulp.task('clean', function() {
	return gulp.src(paths.dist)
        .pipe(clean({force: true}));
});

gulp.task('wp_files', function() {

	return gulp
			.src([
				paths.src + 'wp_files/**/*.php',
				paths.src + 'wp_files/style.css',
			])
			.pipe(plumber())
			.pipe(replace(/@@themeName/g, pkg.name))
			.pipe(replace(/@@prettyThemeName/g, pkg.prettyName))
			.pipe(replace(/@@themeAuthor/g, pkg.author))
			.pipe(replace(/@@themeVersion/g, pkg.version))
			.pipe(replace(/@@themeDescription/g, pkg.description))
			.pipe(addsrc(paths.src + 'wp_files/screenshot.png'))
			.pipe(gulp.dest(paths.dist))

});

gulp.task('lang', function() {

	return gulp
			.src([paths.src + 'lang/*.mo', '!' + paths.src + 'lang/*.temp.mo'])
			.pipe(gulp.dest(paths.dist + 'lang/'))

});

gulp.task('images', function() {

	return gulp
			.src(paths.src + 'images/**/*.{jpg,png,gif,svg,ico}')
			.pipe(plumber())
			.pipe(image())
			.pipe(gulp.dest(paths.dist + 'images/'))

});

gulp.task('fonts', function() {

	return gulp
			.src(paths.src + 'fonts/**/*')
			.pipe(gulp.dest(paths.dist + 'fonts/'))

});

gulp.task('lib_sass', function () {
    var cssStream;

    cssStream = gulp.src([
                    'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
                    // 'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
                    ]);

    return cssStream
        .pipe(concat('lib.css'))
        .pipe(gulp.dest(paths.dist + '/css/'))
        // .pipe(browserSync.stream());
});

gulp.task('main_sass', function () {
    var sassStream,
        cssStream;

    sassStream = gulp
			.src(paths.src + '/sass/main.scss')
			.pipe(plumber())
            .pipe(sourcemaps.init())
			.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(autoprefixer('last 3 version','safari 5', 'ie 9'))
			.pipe(cleanCSS())
            .pipe(sourcemaps.write());

    return merge(sassStream)
        .pipe(concat('main.css'))
        .pipe(gulp.dest(paths.dist + '/css/'))
});

gulp.task('lib_scripts', function() {

	return gulp
			.src([
				//'node_modules/lodash/lodash.min.js',
				//'node_modules/bootstrap/dist/js/bootstrap.min.js',
				//'node_modules/wowjs/dist/wow.min.js',
				'node_modules/owl.carousel/dist/owl.carousel.js',
			])
            .pipe(sourcemaps.init())
			.pipe(concat('lib.js'))
            .pipe(sourcemaps.write('.'))
			.pipe(gulp.dest(paths.dist + 'js/'))

});

gulp.task('main_scripts', function() {

	return gulp
			.src([
				paths.src + 'js/scroll.js',
				paths.src + 'js/ajax-listing.js',
				paths.src + 'js/sizes.js',
				paths.src + 'js/menu.js',
				paths.src + 'js/carousel.js',
			])
			.pipe(plumber())
            .pipe(sourcemaps.init())
            //.pipe(babel({ presets: ['env'] }))
			.pipe(uglify())
			.pipe(concat('main.js'))
            .pipe(sourcemaps.write('.'))
			.pipe(gulp.dest(paths.dist + 'js/'))

});

gulp.task('live', ['default'], function() {
    gulp.watch(paths.src + '**/*.php', ['wp_files']);
    gulp.watch(paths.src + 'lang/*', ['lang']);
    gulp.watch(paths.src + 'images/**/*', ['images']);
    gulp.watch(paths.src + 'sass/**/*.scss', ['main_sass']);
    gulp.watch(paths.src + 'js/**/*.js', ['main_scripts']);
});

gulp.task('default', function() {
	runSequence('clean', [
		'wp_files',
		'lang',
		'images',
		'fonts',
        'lib_sass',
		'main_sass',
		'lib_scripts',
		'main_scripts',
	]);
});
