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
  document.getElementById("fig_caption").innerHTML = descri;
}