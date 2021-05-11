// main.js
function toggle_menu() {
  var angle = screen && screen.orientation && screen.orientation.angle;
  if (angle == undefined) {
    angle = window.orientation;    // iOS用
  }
  var fMenu = document.getElementById('globalnav').style.display;
  if (fMenu == 'block' || fMenu == 'flex') {// block
    document.getElementById('globalnav').style.display = 'none';
    document.menu_button.src = '/assets/menu.svg';
  } else {// none
    if (angle != 0) {
      document.getElementById('globalnav').style.display = 'flex'
    } else {
      document.getElementById('globalnav').style.display = 'block'
    }
    document.menu_button.src = '/assets/close.svg';
  }
}