
const {
  src, dest, series, parallel, watch,
} = require('gulp');

const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const browserSync = require('browser-sync').create();
const del = require('del');
const postcss = require('gulp-postcss');
const rename = require('gulp-rename');
const sass = require('gulp-dart-sass');
const sourcemaps = require('gulp-sourcemaps');
const webpack = require('webpack-stream');

const source = './site/';
const content = './content/'; // Only for reloading-convenience
const dist = './assets/';


async function clean(cb) {

  await del(dist + 'css');
  await del(dist + 'js');
  await del(dist + 'vendor');

  cb();
}

function copyDeps(cb) {

  src('node_modules/vue/dist/vue.global.js')
    .pipe(rename((srcPath) => {
      srcPath.basename = 'vue';
    }))
    .pipe(dest(dist + 'vendor/vue'));

  src('./node_modules/normalize.css/normalize.css')
    .pipe(postcss([cssnano()]))
    .pipe(dest(dist + 'vendor/normalize.css'));

  cb();
}

function copyDepsProd(cb) {

  src('node_modules/vue/dist/vue.global.prod.js')
    .pipe(rename((srcPath) => {
      srcPath.basename = 'vue';
    }))
    .pipe(dest(dist + 'vendor/vue'));

  src('./node_modules/normalize.css/normalize.css')
    .pipe(postcss([cssnano()]))
    .pipe(dest(dist + 'vendor/normalize.css'));

  cb();
}

function css(cb) {

  src(source + 'templates/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass.sync({ sourcemap: true, outputStyle: 'expanded' }))
    .on('error', (err) => {
      return console.log('Error!', err.message);
    })
    .pipe(sourcemaps.write())
    .pipe(dest(dist + 'css/templates'));

  cb();
}

function cssProd(cb) {

  src(source + 'templates/*.scss')
    .pipe(sass.sync({ sourcemap: false, outputStyle: 'compressed' }))
    .on('error', (err) => {
      return console.log('Error!', err.message);
    })
    .pipe(postcss([
      autoprefixer({ overrideBrowserslist: ['last 1 version'] }),
      cssnano(),
    ]))
    .pipe(dest(dist + 'css/templates'));

  cb();
}

function js(cb) {

  src(source + 'templates/')
    .pipe(webpack({
      mode: 'development',
      entry: {
        default: source + 'templates/default.js',
        gallery: source + 'templates/gallery.js',
        home: source + 'templates/home.js',
        plain: source + 'templates/plain.js',
        post: source + 'templates/post.js',
        project: source + 'templates/project.js',
        workingmethod: source + 'templates/workingmethod.js',
      },
      output: {
        filename: '[name].js',
      },
    }))
    .pipe(dest(dist + 'js/templates'));

  cb();
}

function jsProd(cb) {

  src(source + 'templates/')
    .pipe(webpack({
      mode: 'production',
      entry: {
        default: source + 'templates/default.js',
        gallery: source + 'templates/gallery.js',
        home: source + 'templates/home.js',
        plain: source + 'templates/plain.js',
        post: source + 'templates/post.js',
        project: source + 'templates/project.js',
        workingmethod: source + 'templates/workingmethod.js',
      },
      output: {
        filename: '[name].js',
      },
    }))
    .pipe(dest(dist + 'js/templates'));

  cb();
}

function watcher(cb) {

  watch(content + '*/*.md')
    .on('change', browserSync.reload);
  watch(content + '*/*.svg')
    .on('change', browserSync.reload);
  watch(source + '**/*.php')
    .on('change', browserSync.reload);
  watch(source + '**/*.scss')
    .on('change', series(css, browserSync.reload));
  watch(source + '**/*.js')
    .on('change', series(js, browserSync.reload));

  cb();
}

function watcherNoSync(cb) {

  watch(source + '**/*.scss')
    .on('change', series(css));
  watch(source + '**/*.js')
    .on('change', series(js));

  cb();
}

function sync(cb) {

  browserSync.init({
    proxy: 'https://podolski/',
    port: 3000,
    injectChanges: true,
    notify: false,
    open: true,
    browser: ['google chrome', 'firefox'],
    ghostMode: {
      clicks: true,
      scroll: true,
      forms: false,
    },
  });

  cb();
}

exports.default = series(clean, parallel(copyDeps, css, js), sync, watcher);
exports.nosync = series(clean, parallel(copyDeps, css, js), watcherNoSync);
exports.prod = series(clean, parallel(copyDepsProd, cssProd, jsProd));
