let loginView = document.getElementById("login");
let signInView = document.getElementById("register");
let formContainer = document.getElementById("form-container")

function login() {
    loginView.style.left = "4px";
    signInView.style.right = "-600px";  
    formContainer.style.height = "450px";
    signInView.style.position = "absolute";
    loginView.style.position = "relative";

}

function register() {
    loginView.style.left = "-590px";
    signInView.style.right = "5px";
    signInView.style.position = "relative";
    loginView.style.position = "absolute";
    formContainer.style.height = "auto";
    signInView.style.marginLeft = "10px"
    
}   
// ----------------------------------------------

  

