let toggleNav = document.getElementById("toggleNav");
let sideNav = document.getElementById("sideNavLink");
let toggleIcon = document.getElementById("toggleIcon");


toggleNav.addEventListener('click', function () {
    sideNav.classList.toggle("sideNavLink-isActive");
});

toggleNav.addEventListener('click', function () {
    toggleIcon.classList.toggle("fa-chevron-right");
    toggleIcon.classList.toggle("fa-chevron-left");
});



