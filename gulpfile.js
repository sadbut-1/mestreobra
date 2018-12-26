const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('admin.js');
});

// // Todos os arquivos CSS que serão compactados
// // Explicação: /* busca todos os arquivos de uma pasta, /**/*.* busca todos os arquivos de uma pasta e sub pasta.
// var css = [
//     './public/lp/css/*.css',
//     './public/lp/fonts/*.css'
// ];
//
// // Núcleo do Gulp
// var gulp = require('gulp');
//
// // Verifica alterações em tempo real, caso haja, compacta novamente todo o projeto
// var watch = require('gulp-watch');
//
// // Minifica o CSS
// var cssmin = require("gulp-cssmin");
//
// // Agrupa todos arquivos em UM
// var concat = require("gulp-concat");
//
// // Remove comentários CSS
// var stripCssComments = require('gulp-strip-css-comments');
//
// // Processo que agrupará todos os arquivos CSS, removerá comentários CSS e minificará.
// gulp.task('minify-css', function(){
//     gulp.src(css)
//         .pipe(concat('style-final.min.css'))
//         .pipe(stripCssComments({all: true}))
//         .pipe(cssmin())
//         .pipe(gulp.dest('./public/lp/css/'));
// });
//
// // Cria a TASK padrão, esta linha será processada quando o comando "GULP" for executado
// gulp.task('default',['minify-css']);
