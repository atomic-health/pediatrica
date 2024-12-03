// Require Gulp
var gulp = require('gulp'),
  // Require Gulp-sass plugin
  sass = require('gulp-sass'),
  // Sass globbing import for LibSass
  globbing = require('gulp-sass-glob'),
  // Require Sassdoc
  sassdoc = require('sassdoc'),
  // Require Sourcemaps
  sourcemaps = require('gulp-sourcemaps'),
  // Require Browser Sync for livereloading
  browserSync = require('browser-sync').create(),
  // Require Del to clean dev folder
  del = require('del'),
  // Require Process HTML
  processHtml = require('gulp-processhtml'),
  // Require iconfont generator plugin
  iconfont = require('gulp-iconfont'),
  iconfontCss = require('gulp-iconfont-css'),
  // Require PostCSS
  postcss = require('gulp-postcss'),
  // Require PostCSS autoprefixer
  autoprefixer = require('autoprefixer'),
  // Require postCSS clean
  cleanCSS = require('gulp-clean-css'),
  // CSSO Plugin
  csso = require('gulp-csso'),
  // Require Css-MQpacker// Clean CSS
  mqpacker = require('css-mqpacker'),
  mqsorter = require('sort-css-media-queries'),
  // Zip plugin
  zip = require('gulp-zip'),
  // Concat plugin
  concat = require('gulp-concat'),
  // uglify plugin
  uglify = require('gulp-uglify'),
  // SFTP deploy task
  sftp = require('gulp-sftp');

// Project settings
var config = {
  // Folders for assets, development environment
  folderDev: {
    base: '../',
    css: '../css',
    fonts: '../fonts',
    images: '../images',
    js: '../js'
  }, // If this path gets changed, remember to update .gitignore with the proper path to ignore images and css
  folderAssets: {
    base: './',
    styles: './styles',
    images: './img',
    js: './js'
  },
  folderDist: {
    base: 'dist',
    css: 'dist/css',
    fonts: 'dist/fonts',
    images: 'dist/img',
    js: 'dist/js'
  },
  folderDoc: {
    base: 'documentation'
  },
  postCSS: {
    processors: [
      autoprefixer({
        browsers: [
          // 'Android >= 2.3',
          // 'BlackBerry >= 7',
          // 'Chrome >= 9',
          // 'Firefox >= 4',
          // 'Explorer >= 9',
          // 'iOS >= 5',
          // 'Opera >= 11',
          // 'Safari >= 5',
          // 'OperaMobile >= 11',
          // 'OperaMini >= 6',
          // 'ChromeAndroid >= 9',
          // 'FirefoxAndroid >= 4',
          // 'ExplorerMobile >= 9',
          'last 2 versions',
          '> 1%',
          'last 3 iOS versions',
          'Firefox > 20',
          'ie 9' //This is a Default Autoprefixer Config. In case that you need to add other browser support uncomment from above.
        ]
      }),
      mqpacker({
        sort: mqsorter
      })
    ]
  }
};

// Sass Watch task definition
gulp.task('sass', function() {
  return gulp.src(config.folderAssets.styles + '/style.scss')
    .pipe(globbing({
      // Configure it to use SCSS files
      extensions: ['.scss']
    }))
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(config.postCSS.processors))
    .pipe(cleanCSS({
      advanced: true
    }))
    .pipe(csso())
    .pipe(sourcemaps.write('../'))
    .pipe(gulp.dest('../'))
    .pipe(browserSync.reload({
      stream: true
    }));
});

// // Browser Sync task definition
// gulp.task('serve', ['build'], function() {
//   return browserSync.init({
//     port: 3000,
//     server: {
//       baseDir: config.folderDev.base
//     },
//     ui: {
//       port: 1338
//     }
//   });
// });



// Generate webfonts
gulp.task('webfont', ['webfont:copy'], function() {
  return del([config.folderDev.fonts + '/*.scss']);
});

gulp.task('webfont:copy', ['webfont:generate'], function() {
  return gulp.src([config.folderDev.fonts + '/_icon-font.scss'])
    .pipe(gulp.dest(config.folderAssets.styles + '/libs/iconfont/'));
});

gulp.task('webfont:generate', function() {
  var fontName = 'icon-font';
  return gulp.src([config.folderAssets.base + '/icons/*.svg'])
    .pipe(iconfontCss({
      fontName: fontName,
      fontPath: '../fonts/',
      path: config.folderAssets.styles + '/libs/iconfont/gulp-icontemplate.css',
      targetPath: '_icon-font.scss'
    }))
    .pipe(iconfont({
      fontName: fontName,
      formats: ['ttf', 'eot', 'woff', 'woff2', 'svg'],
      normalize: true,
      fontHeight: 1001
    }))
    .pipe(gulp.dest(config.folderDev.fonts));
});

// Copy webfonts to Dist folder
gulp.task('copy:fonts', ['sass:build'], function() {
  return gulp.src(config.folderAssets.fonts + '/*.*')
    .pipe(gulp.dest(config.folderDist.fonts));
});


// Copy Vendors
gulp.task('copy:vendors', function() {
  return gulp.src([config.folderAssets.js + '/vendors/*.js'])
    .pipe(concat('vendors.js', {
      newLine: "\r\n;"
    }))
    .pipe(gulp.dest(config.folderDev.js));
});

//Copy JS
gulp.task('copy:js', ['copy:vendors'], function() {
  return gulp.src([config.folderAssets.js + '/*.js'])
    .pipe(concat('main.js', {
      newLine: "\r\n;"
    }))
    .pipe(gulp.dest(config.folderDev.js));
});

// // Copy Images
// gulp.task('copy:images', function() {
//   return gulp.src([config.folderAssets.images + '/**/*'])
//     .pipe(gulp.dest(config.folderDev.images));
// });


// Watch for changes
gulp.task('run', function() {
  gulp.watch(config.folderAssets.styles + '/**/*.scss', ['sass']);
  gulp.watch(config.folderAssets.base + '/icons/*.svg', ['webfont']);
  // gulp.watch(config.folderAssets.js + '/*', ['copy:js']);
  // gulp.watch(config.folderDev.js + '/*.js').on('change', browserSync.reload);
});

// Watch for changes
gulp.task('watch', ['build'], function() {
  gulp.watch(config.folderAssets.base + '/**/*.scss', ['sass']);
});

// Define build task
gulp.task('build', ['sass:build', 'copy:js', 'processHtml', 'copy:images', 'doc']);