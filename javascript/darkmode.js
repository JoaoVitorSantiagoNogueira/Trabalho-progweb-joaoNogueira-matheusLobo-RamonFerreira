function ToggleDarkMode() {
  document.body.classList.toggle("dark-mode");

  if (document.body.classList.length > 0) {
    document.getElementById("darkmodeIcon").src = "img/sun.png";
  } else {
    document.getElementById("darkmodeIcon").src = "img/moon.png";
  }
}
