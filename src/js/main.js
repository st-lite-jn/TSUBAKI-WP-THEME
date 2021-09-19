import {gnavToggle , gnavPosition} from "./_gnav";
import {searchToggle , searchPosition} from "./_search";
import {headerFixed} from "./_header";
import {carousels} from "./_carousels";
import {title} from "./_title";
import {wpEmbedVideo} from "./_wp-embed";

/**
 * 関数の発火処理
 */

//最初の HTML 文書の読み込みと解析が完了したとき、スタイルシート、画像、サブフレームの読み込みが完了するのを待たずに発火
window.addEventListener('DOMContentLoaded',()=>{
    gnavPosition();
    searchPosition();
    carousels();
    gnavToggle();
    searchToggle();
    headerFixed();
    wpEmbedVideo();
    hljs.highlightAll();
});
//ページ全体が、スタイルシートや画像などのすべての依存するリソースを含めて読み込まれたときに発火
window.addEventListener('load', () => {
    title();
});

//画面をリサイズしたときに発火
let queue = null,
    wait = 100;
window.addEventListener( 'resize', function() {
    clearTimeout( queue );
    queue = setTimeout(function() {
        gnavPosition();
        searchPosition();
        wpEmbedVideo();
    }, wait);
},false);

//画面をスクロール時に実行
window.addEventListener( 'scroll' , () => {
    headerFixed();
});

