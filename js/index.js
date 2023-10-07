const button = document.getElementById("toggle-btn");
const dashboardMain = document.querySelector(".dashboard-content-container");
const title = document.querySelector(".dashboard-title");
const sidebar = document.querySelector(".dashboard-sidebar");
const userImg = document.querySelector(".user-image");
const username = document.querySelector(".user-name");
const menuText = document.getElementsByClassName("menu-text");
const menuList = document.getElementsByClassName("dashboard-menu-list");

let sideBarIsOpen = true;

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
