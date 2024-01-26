const { series } = require("gulp");
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const browserSync = require("browser-sync").create();

// Compile SCSS to CSS


function compileSass() {
  return gulp
    .src("assets/scss/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("assets/css"))
    .pipe(browserSync.stream());
}

// Watch for changes and reload the browser
function watch() {
 

  gulp.watch("assets/scss/**/*.scss", compileSass);
  gulp.watch("assets/js/*.js").on("change", browserSync.reload);
}

// exports.compileSass = compileSass;
// exports.watch = watch;ex
exports.run = gulp.series(compileSass, watch);
