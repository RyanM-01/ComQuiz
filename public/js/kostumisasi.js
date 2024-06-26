const badan = document.querySelector("body"),
  changeThemeBlue = badan.querySelector(".circleblue"),
  changeThemeBlack = badan.querySelector(".circleblack"),
  changeThemePurple = badan.querySelector(".circlepurple"),
  changeThemeGreen = badan.querySelector(".circlegreen"),
  dashContent = document.querySelector(".dash-content");

changeThemeBlue.addEventListener("click", () => {
  console.log("Clicked blue");
  badan.classList.toggle("blue");
  badan.classList.remove("purple", "green", "black", "roastedpeach", "swimmingpool", "cottoncandy");
  saveTheme("blue");
});

changeThemeBlack.addEventListener("click", () => {
  console.log("Clicked black");
  badan.classList.toggle("black");
  badan.classList.remove("purple", "green", "blue", "roastedpeach", "swimmingpool", "cottoncandy");
  saveTheme("black");
});

changeThemePurple.addEventListener("click", () => {
  console.log("Clicked purple");
  badan.classList.toggle("purple");
  badan.classList.remove("blue", "green", "black", "roastedpeach", "swimmingpool", "cottoncandy");
  saveTheme("purple");
});

changeThemeGreen.addEventListener("click", () => {
  console.log("Clicked green");
  badan.classList.toggle("green");
  badan.classList.remove("purple", "blue", "black", "roastedpeach", "swimmingpool", "cottoncandy");
  saveTheme("green");
});

function saveTheme(theme) {
  localStorage.setItem("theme", theme);
}

document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme) {
    badan.classList.add(savedTheme);
  }
});
