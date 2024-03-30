window.onload = function () {
    const hamburger = document.querySelector(".hamburger");
    const mobileNav = document.querySelector(".mobile-nav");

    hamburger.addEventListener('click', function () {
        mobileNav.classList.toggle("is-active");    
        hamburger.classList.toggle("is-active");
    })  
}

// toggle for log out

  let dropdown = document.querySelector(".dropdownContent");
  let toggleBtn = document.getElementById("account-dropdown");
  let toggleIcon = document.getElementById("logoutIcon");

  toggleBtn.addEventListener('click', function () {
    dropdown.classList.toggle("dropdownIsActive");
  });

  toggleIcon.addEventListener('click', function () {
    dropdown.classList.toggle("dropdownIsActive");
  });


// toggle for log in pass
function togglePasswordVisibility() {
    var passwordField = document.getElementById("input-password");
    var eyeIcon = document.getElementById("toggle-visible");

    if (passwordField.type == "password") {
      passwordField.type = "text";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    } else {
      passwordField.type = "password";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    }
  }

  // toggle for sign in pass
function togglePasswordRegVisibility() {
    var passwordRegField = document.getElementById("input-password-register");
    var regEyeIcon = document.getElementById("reg-toggle-visible");

    if (passwordRegField.type == "password") {
        passwordRegField.type = "text";
        regEyeIcon.classList.remove("fa-eye-slash");
        regEyeIcon.classList.add("fa-eye");
      } else {
        passwordRegField.type = "password";
        regEyeIcon.classList.remove("fa-eye");
        regEyeIcon.classList.add("fa-eye-slash");
    }
}

/***************************************  *********************************************/
