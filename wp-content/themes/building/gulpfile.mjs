import gulp from "gulp";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import autoprefixer from "gulp-autoprefixer";
import cleanCSS from "gulp-clean-css";
import sourcemaps from "gulp-sourcemaps";
import browserSyncLib from "browser-sync";
import concat from "gulp-concat";
import uglify from "gulp-uglify";

// Inicialização de plugins
const sass = gulpSass(dartSass);
const browserSync = browserSyncLib.create();

// Caminhos dos arquivos
const paths = {
    scss: "./assets/scss/**/*.scss",
    css: "./assets/css",
    js: "./assets/js/**/*.js",
};

// Compila SASS para CSS
export function compileSass() {
    return gulp
        .src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer({ cascade: false }))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(paths.css))
        .pipe(browserSync.stream());
}

// Minifica e concatena JS
export function scripts() {
    return gulp
        .src(paths.js)
        .pipe(concat("../../main.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest("./assets/js"))
        .pipe(browserSync.stream());
}

// Inicia o servidor e observa mudanças
export function serve() {
    browserSync.init({
        proxy: "http://building.local/",
        notify: false,
    });

    gulp.watch(paths.scss, compileSass);
    gulp.watch(paths.js, scripts);
    gulp.watch("./**/*.php").on("change", browserSync.reload);
}

// Tarefas públicas
export default gulp.series(compileSass, scripts, serve);
