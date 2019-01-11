var btn = document.querySelector('.toggle_btn');
var nav = document.querySelector('.navigation');

btn.onclick = function() {
  nav.classList.toggle('navigation_open');
}
