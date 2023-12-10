window.onload = function () {
    const hamburger = document.querySelector(".hamburger");
    const mobileNav = document.querySelector(".mobile-nav");

    hamburger.addEventListener('click', function () {
        mobileNav.classList.toggle("is-active");    
        hamburger.classList.toggle("is-active");
    })
}
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


// document.addEventListener("DOMContentLoaded", function () {
//   // Fetch user information when the page loads
//   fetchUserInfo();

//   // Function to fetch user information using AJAX
//   function fetchUserInfo() {
//       fetch('get_user_info.php')
//           .then(response => response.json())
//           .then(data => {
//               // Check if user is logged in
//               if (data.length > 0) {
//                   updateAccountDropdown(data[0].firstname, data[0].username);
//               }
//           })
//           .catch(error => console.error('Error fetching user information:', error));
//   }

//   // Function to update the account dropdown
//   function updateAccountDropdown(firstname, username) {
//       const accountDropdown = document.getElementById('account-dropdown-content');
      
//       // Update the dropdown content with user information and logout button
//       accountDropdown.innerHTML = `
//           <p>Name: ${firstname}</p>
//           <p>Email: ${username}</p>
//           <a href="logout.php">Logout</a>
//       `;
//   }
// });