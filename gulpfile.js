var gulp = require('gulp');
var g = require('gulp-load-plugins')({
	pattern: ['gulp-*', 'gulp.*'],
	replaceString: /\bgulp[\-.]/
});

var runSequence = require('run-sequence'),
		clean = require('del'),
		browserSync = require('browser-sync'),
		browserify = require('browserify'),
		buffer = require('vinyl-buffer'),
		source = require('vinyl-source-stream');

gulp.task('styles', function() {
	gulp.src('resources/sass/app.scss')
		.pipe(g.plumber({
			errorHandler: function (error) {console.log(error.message); this.emit('end');}
		}))
		.pipe(g.stylelint({
			reporters: [{formatter:'string', console:true}]
		}))
		.pipe(g.sass())
		.pipe(g.autoprefixer('last 2 versions'))
		.pipe(g.rename({suffix: '.min'}))
		.pipe(g.cssnano())
		.pipe(gulp.dest('public/'))
		.pipe(browserSync.reload({stream:true}));
});
gulp.task('fontawesome', function() {
	gulp.src('resources/sass/vendors/font-awesome/fonts/*')
		.pipe(gulp.dest('public/fonts/'));
	gulp.src('resources/sass/vendors/font-awesome/font-awesome.scss')
		.pipe(g.sass())
		.pipe(g.autoprefixer('last 2 versions'))
		.pipe(g.rename({suffix: '.min'}))
		.pipe(g.cssnano())
		.pipe(gulp.dest('public/'))
		.pipe(browserSync.reload({stream:true}));
});

gulp.task('lint', function() {
	gulp.src('resources/app/**/*.js')
		.pipe(g.plumber({
			errorHandler: function (error) {console.log(error.message); this.emit('end');}
		}))
		.pipe(g.standard());
});
gulp.task('browserify',['lint'], function() {
	return browserify({
		entries: 'resources/app/app.js',
		debug: true
	})
	.bundle()
	.pipe(source('app.js'))
	.pipe(g.plumber({
		errorHandler: function (error) {console.log(error.message); this.emit('end');}
	}))
	.pipe(gulp.dest('resources/assets/'));
});
gulp.task('uglify',['browserify'], function() {
  gulp.src('resources/assets/app.js')
		.pipe(g.plumber({
			errorHandler: function (error) {console.log(error.message); this.emit('end');}
		}))
		.pipe(g.rename({suffix: '.min'}))
		.pipe(g.ngAnnotate())
		.pipe(g.uglify())
		.pipe(gulp.dest('public/'))
		.pipe(browserSync.reload({stream:true}));
});

gulp.task('templates', function() {
	gulp.src('resources/app/**/*.html')
		.pipe(gulp.dest('public/'))
		.pipe(browserSync.reload({stream:true}));
});

gulp.task('build', function() {
    runSequence(['styles', 'fontawesome', 'templates', 'uglify']);
});

gulp.task('reload', function() {
	browserSync.reload();
});
gulp.task('serve', function () {
	browserSync({
		proxy: "laravel.dev",
		online: false
	});
});

gulp.task('watch', function() {
    gulp.watch('resources/app/**/*.js', ['uglify']);
    gulp.watch('resources/sass/**/*.scss', ['styles']);
    gulp.watch('resources/app/**/*.html', ['templates']);
		gulp.watch('resources/views/**/*.php', ['reload']);
});

gulp.task('default', ['build', 'serve', 'watch'], function() {});
