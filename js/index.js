var button = document.getElementById("toggle-btn");
var dashboardMain = document.querySelector(".dashboard-content-container");
var title = document.querySelector(".dashboard-title");
var sidebar = document.querySelector(".dashboard-sidebar");
var userImg = document.querySelector(".user-image");
var username = document.querySelector(".user-name");
var menuText = document.getElementsByClassName("menu-text");
var menuList = document.getElementsByClassName("dashboard-menu-list");

var sideBarIsOpen = true;

button.addEventListener("click", (event) => {
  event.preventDefault();

  if (sideBarIsOpen) {
    sidebar.style.width = "10%";
    sidebar.style.transition = "all 0.3s ease";
    dashboardMain.style.width = "90%";
    title.style.fontSize = "60px";
    username.style.fontSize = "18px";
    userImg.style.width = "60px";
    userImg.style.height = "60px";
    menuList[0].style.textAlign = "center";

    for (let i = 0; i < menuText.length; i++) {
      menuText[i].style.display = "none";
    }
  } else {
    sidebar.style.width = "20%";
    dashboardMain.style.width = "80%";
    title.style.fontSize = "80px";
    username.style.fontSize = "22px";
    userImg.style.width = "100px";
    userImg.style.height = "100px";
    menuList[0].style.textAlign = "left";

    for (let i = 0; i < menuText.length; i++) {
      menuText[i].style.display = "inline-block";
    }
  }

  sideBarIsOpen = !sideBarIsOpen;
});
