// main.js
function toggle_menu() {
  var fMenu = document.getElementById('globalnav').style.display;
  if (fMenu == 'block') {// block
    document.getElementById('globalnav').style.display = 'none';
    document.menu_button.src = '/assets/menu.svg';
  } else {// none
    document.getElementById('globalnav').style.display = 'block'
    document.menu_button.src = '/assets/close.svg';
  }
}

function thumb_click(photopath, descri) {
  document.photo.src = photopath;
  if (descri == '') {
    descri = '&nbsp;';
  }
  document.getElementById("fig_caption").innerHTML = descri;
}

/* https://coliss.com/articles/build-websites/operation/css/viewport-units-on-mobile.html 
コンテンツの高さを画面の高さに合わせる
*/
// 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
let vh=window.innerHeight * 0.01;
// カスタム変数--vhの値をドキュメントのルートに設定
document.documentElement.style.setProperty('--vh',`${vh}px`);