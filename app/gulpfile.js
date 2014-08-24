var gulp = requiere('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp task('css', function(){
    gulp.scr('app/assets/sass/main.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/css'));
});